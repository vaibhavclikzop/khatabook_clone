<!-- transaction list -->
@if($transactions->count() > 0)

<div class="container-fluid mt-3">
    <div class="row">
        <div class="card-body p-0">
            <input type="hidden" id="route" value="{{route('user.filter')}}">
            <input type="hidden" id="token" value="{{session()->get('token')}}">
            <input type="hidden" id="transaction-route" value="{{ url('transaction') }}">
            <div class="list-group list-group-flush w-100" id="customerListContainer">
                @foreach($transactions as $transaction)
                    <a href="{{ route('view.transaction_detail', ['id' => $transaction->t_id]) }}" class="list-group-item list-group-item-action p-3 w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="rounded-circle me-3">
                                <span class="text-dark bold rounded-circle border px-2 py-1">{{ strtoupper(substr($transaction->name,0, 1));}}</span>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{$transaction->formatted_date = \Carbon\Carbon::parse($transaction->transaction_date)->format('d M y - h:ia');}}</h6>
                                <small class="text-muted">₹ {{$transaction->amount}}</small>
                            </div>
                            <div class="transactions">
                                <div class="gave">
                                    <span class="text-muted">@if(isset($transaction->t_type) && $transaction->t_type == 'give')
                                        You Gave
                                    @else
                                        You Got
                                    @endif
                                    </span>
                                    <div class="{{ isset($transaction->t_type) && $transaction->t_type == 'give' ? 'text-danger' : 'text-success' }} rounded-pill fs-6">{{ isset($transaction->t_type) && $transaction->t_type == 'give' ? '-' : '' }} ₹ {{$transaction->amount}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="pagination-container">
            {{ $transactions->links() }}
        </div>
    </div>
</div>
@endif
