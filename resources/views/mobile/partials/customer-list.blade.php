<!-- customer list -->
@if($customers_info->count() > 0)
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card adminuiux-card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Customer List</h5>
                    <a href="{{route('dashboard.view')}}">
                        <button class="btn btn-sm btn-link">
                        <i class="fa fa-refresh"></i>
                    </a>
                    </button>
                </div>
                <div class="card-body p-0">
                    <div class="p-3 border-bottom">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="hidden" id="route" value="{{route('user.filter')}}">
                            <input type="hidden" id="user_id" value="{{session()->get('user_id')}}">

                            <input type="hidden" id="transaction-route" value="{{ url('transaction') }}">

                            <input type="text" class="form-control border-start-0" placeholder="Search customers..." 
                            id="customerSearch">
                        </div>
                    </div>
                    <div class="list-group list-group-flush w-100" id="customerListContainer">
                        @foreach($customers_info as $customer)
                            <a href="{{ route('view.transaction', ['id' => $customer->id]) }}" class="list-group-item list-group-item-action p-3 w-100">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="rounded-circle me-3">
                                       <span class="text-dark bold rounded-circle border px-2 py-1">{{ strtoupper(substr($customer->name, 0,1));}}</span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{$customer->name}}</h6>
                                        <small class="text-muted">{{$customer->number}}</small><br>
                                        <small class="text-muted">({{$customer->type}})</small>
                                    </div>
                                    <div class="badge bg-success rounded-pill">
                                        ₹ {{ $customer->latest_amount ?? '0.00' }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
