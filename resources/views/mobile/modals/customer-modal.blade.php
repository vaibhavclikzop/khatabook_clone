 <!-- add customer modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header gap-3">
                <i class="fa-solid fa-arrow-left" data-bs-dismiss="modal" aria-label="Close"></i>
                <h1 class="modal-title fs-5" id="addCustomerModalLabel">Add Customer</h1>
            </div>
            <form action="{{route('add.customers')}}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ session()->get('user_id') }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Party name">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" id="number" name="number" placeholder="Mobile Number">
                    </div>
                    <div class="mb-3 form-check m-0 p-0 d-flex gap-2">
                        <label for="">Who are they?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="customer" checked>
                            <label class="form-check-label" for="inlineRadio1">Customer</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="supplier">
                            <label class="form-check-label" for="inlineRadio2">Supplier</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer position-fixed bottom-0 w-100 gap-4">
                    <button type="submit" class="btn btn-primary form-control">ADD CUSTOMER</button>
                </div>
            </form>
        </div>
    </div>
</div>