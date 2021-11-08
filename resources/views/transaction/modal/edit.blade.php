<!-- Edit Modal -->
<div class="modal fade" id="editPending{{$or->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Confirmation</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('edit.pending')}}" role="form" id="editform" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" value="{{$or->id}}" name="id">
                <div class="modal-body">
                    <p class="small">Edit Order Status</p>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Status</label>
                                <select class="form-select input-fixed" name="status">
                                    <option value="1">Pending</option>
                                    <option value="2">Lunas</option>
                                    <option value="3">Dikirim</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="addRowButton" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
