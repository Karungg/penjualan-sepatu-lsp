<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index(): View
    {
        $transactions = Transaction::with(
            ['user', 'product', 'account']
        )
            ->where('user_id', auth()->id())
            ->get();

        return view('transactions', [
            'transactions' => $transactions
        ]);
    }

    public function store(string $productId): RedirectResponse
    {
        $accountId = Account::first()->value('id');
        $totalAmount = Product::where('id', $productId)->value('price');

        Transaction::create([
            'product_id' => $productId,
            'user_id' => auth()->id(),
            'account_id' => $accountId,
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        return redirect(route('transaction.index'));
    }

    public function storePayment(Request $request, string $id)
    {
        $request->validate([
            'proof_of_payment' => 'required|mimetypes:image/jpeg,image/png,image/jpg|max:2048',
        ]);

        $file = $request->file('proof_of_payment');

        $randomName = Str::random(20) . '.' . $file->getClientOriginalExtension();

        $file->storeAs('proof_of_payments', $randomName, 'public');

        Transaction::where('id', $id)
            ->update([
                'proof_of_payment' => 'proof_of_payments/' . $randomName
            ]);

        return redirect(route('transaction.index'));
    }
}
