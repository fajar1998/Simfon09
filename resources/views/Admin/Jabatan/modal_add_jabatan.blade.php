<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-12">
                            <label>Nama Jabatan</label>
                            <input name="name" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-12">
                            <label>Deskripsi</label>
                            <input name="desk" type="text" class="form-control" required>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>
