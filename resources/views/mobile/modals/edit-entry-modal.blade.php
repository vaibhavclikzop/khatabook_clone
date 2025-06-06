<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('transaction.update', ['id' => $transaction->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" id="amount" value="{{ $transaction->amount }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $transaction->description ? $transaction->description : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="transaction_date" class="form-label">Transaction Date</label>
                        <input type="date" name="transaction_date" class="form-control" id="t_date" value="{{ $transaction->transaction_date ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') : '' }}">
                    </div>
                    @if($transaction->attachment)
                        <div class="mb-3">
                            <label class="form-label">Attachment:</label><br>

                            @php
                                $extension = pathinfo($transaction->attachment, PATHINFO_EXTENSION);
                                $fileUrl = asset('attachments/' . $transaction->attachment);
                            @endphp

                            @if(in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif']))
                                <img src="{{ $fileUrl }}" alt="attachment" class="img-thumbnail" width="150">
                            @elseif(strtolower($extension) === 'pdf')
                                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-outline-secondary">
                                    View PDF Attachment
                                </a>
                            @elseif(in_array(strtolower($extension), ['xls', 'xlsx']))
                                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-outline-success">
                                    Download Excel Attachment
                                </a>
                            @else
                                <a href="{{ $fileUrl }}" target="_blank" class="btn btn-outline-primary">
                                    Download Attachment
                                </a>
                            @endif
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Transaction Date</label>
                        <input type="file" class="form-control" id="attachment" name="attachment" accept=".jpg,.jpeg,.png,.pdf,.xls,.xlsx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
