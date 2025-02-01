<x-app-layout>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="paymentModalLabel">Payment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container my-5">
            @forelse ($transactions as $transaction)
                <div class="row g-4">
                    <div class="col-lg-4">
                        <img src="{{ asset($transaction->product->image) }}" class="img-fluid rounded shadow-sm mb-4"
                            alt="{{ $transaction->product->title }}">
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="card-title mb-0">Order #{{ $transaction->id }}</h5>
                                    <span class="badge bg-success">{{ $transaction->status }}</span>
                                </div>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Purchase Date:</strong>
                                            {{ $transaction->created_at }}</p>
                                        <p class="mb-1"><strong>Total Amount:</strong>
                                            Rp.{{ $transaction->total_amount }}</p>
                                        <p class="mb-1"><strong>Serial Number:</strong>
                                            {{ $transaction->product->title }}</p>
                                        <p class="mb-1"><strong>Model:</strong>
                                            {{ $transaction->product->description }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-1"><strong>Method Payment:</strong>
                                            {{ $transaction->account->bank }}</p>
                                        <p class="mb-1"><strong>Behalf Of:</strong>
                                            {{ $transaction->account->behalf_of }}</p>
                                        <p class="mb-1"><strong>Account Number:</strong>
                                            {{ $transaction->account->account_number }}</p>
                                    </div>
                                </div>

                                <div class="timeline mt-4">
                                    <div class="progress mb-3" style="height: 4px;">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="timeline-step">
                                            <i class="bi bi-check-circle-fill text-success"></i>
                                            <p class="small mt-2">Waiting For Payment</p>
                                        </div>
                                        <div class="timeline-step">
                                            @if ($transaction->status == 'shipped')
                                                <i class="bi bi-check-circle-fill text-success"></i>
                                            @endif
                                            <p class="small mt-2">Shipped</p>
                                        </div>
                                        <div class="timeline-step">
                                            @if ($transaction->status == 'success')
                                                <i class="bi bi-check-circle-fill text-success"></i>
                                            @endif
                                            <p class="small mt-2">Success</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2 mt-4">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#paymentModal">
                                        Pay Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </section>
</x-app-layout>
