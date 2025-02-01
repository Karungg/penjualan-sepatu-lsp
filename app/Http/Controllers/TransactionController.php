<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
}
