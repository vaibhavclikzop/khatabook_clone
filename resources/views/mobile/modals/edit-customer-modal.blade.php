<!-- Edit Customer Modal -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <form action="{{ route('customer.update', ['id' => $customer?->id ?? '']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="customer_name" name="name" value="{{ isset($customer) ? $customer->name : '' }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="customer_number" name="number" value="{{ $customer->number }}" required>
                    </div>
                </div>
                <footer class="adminuiux-mobile-footer hide-on-scrolldown style-1">
                    <div class="container">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <div class="d-flex justify-content-between py-2">
                                    <!-- Delete Button -->
                                    <button type="button" id="deleteCustomerBtn" class="btn btn-danger">
                                        <i class="fa fa-trash pe-3"></i>Delete Customer
                                    </button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save pe-3"></i>Save</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </footer>
            </form>
        </div>
    </div>
</div>
<form id="deleteCustomerForm" action="{{ route('customer.delete', ['id' => $customer->id]) }}" method="POST">
    @csrf
    @method('DELETE')
</form>
