<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
    id="Edit{{ $item->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tp-ujian.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-12">
                            <label>Nama Ujian</label>
                            <input name="name" type="text" class="form-control" value="{{ $item->name }}">
                        </div>

                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>

            </div>
            </form>
        </div>
    </div>
</div>
