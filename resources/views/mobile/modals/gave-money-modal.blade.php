<!-- You Gave Modal -->
<div class="modal fade" id="youGaveModal" tabindex="-1" aria-labelledby="youGaveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="youGaveModalLabel">You gave ₹ 0 to {{ isset($customer) && isset($customer->name) ? $customer->name : '' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gave.money') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="customer_id" value="{{ request()->route('id') }}">
                <input type="hidden" name="type" value="give">
                <input type="hidden" name="user_id" value="{{ session()->get('user_id') }}">

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" placeholder="Enter description" name="description">
                    </div>

                    <div class="mb-3">
                        <label for="attachment" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.xls,.xlsx">
                    </div>

                    <div class="mb-3">
                        <label for="transaction_date" class="form-label">Transaction Date</label>
                        <input type="date" class="form-control" id="transacation-date" placeholder="Enter transaction date" name="transaction_date">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>