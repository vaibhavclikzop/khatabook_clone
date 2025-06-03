   

<!-- add business modal -->
<div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-bottom">
        <div class="modal-content rounded-top-4">
            <div class="modal-header gap-3 border-0">
                <h1 class="modal-title fs-5" id="businessModalLabel">Edit Business Name</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.business')}}" method="post">
            @csrf
                <input type="hidden" name="user_id" value="{{ session()->get('user_id') }}">
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="my_business" id="businessName" placeholder="My business" value="{{isset($user) && !empty($user) ? $user : ''}}">
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary w-100" data-bs-dismiss="modal">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>