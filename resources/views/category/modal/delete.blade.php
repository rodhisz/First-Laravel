<!-- Delete Modal -->
<form action="{{route('delete.category', $p->id)}}" method="post">
@csrf
@method('DELETE')
<div class="modal fade" id="delCategory{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Delete</span>
                    <span class="fw-light">Category</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div>
                            <p>Are you sure you want to delete <strong>{{$p->name_category}}</strong> category ?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="submit" id="addRowButton" class="btn btn-danger">Delete</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</form>
