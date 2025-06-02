
    <div class="position-fixed bottom-0 end-0 m-3 z-index-5" id="fixedbuttons">
        <button class="btn btn-square btn-theme shadow rounded-circle" type="button" data-bs-toggle="offcanvas" data-bs-target="#theming" aria-controls="theming"><i class="bi bi-palette"></i></button>
        <br>
        <button class="btn btn-theme btn-square shadow mt-2 d-none rounded-circle" id="backtotop"><i class="bi bi-arrow-up"></i></button>
    </div>
    <div class="modal adminuiux-modal fade" id="addreminder" tabindex="-1" aria-labelledby="addremindermodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="modal-title h5" id="addremindermodalLabel">Add Reminder</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="subject" placeholder="Enter Subject">
                        <label for="subject">Subject</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" id="description" rows="3" placeholder="Description"></textarea>
                        <label for="description">Description</label>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-theme">Add</button>
                    <button type="button" class="btn btn-link theme-red" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('mobile/js/inner-js/script.auth.js') }}"></script>
</body>
</html>