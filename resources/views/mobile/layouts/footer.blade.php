
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
    <!-- <script src="{{ asset('mobile/js/inner-js/script.auth.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</body>
</html>