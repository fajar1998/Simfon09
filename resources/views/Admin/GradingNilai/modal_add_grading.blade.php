<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Grading</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('graden.store') }}" method="POST">
                    @csrf
                    <form>
                        <div class="row">
                            <div class="col">
                                <label>Nama Grading</label>
                                <input type="text" class="form-control" name="grade_name">
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Point Grading</label>
                                <input type="text" class="form-control" name="grade_point">
                            </div>
                            <div class="col">
                                <label>Nilai Awal</label>
                                <input type="text" class="form-control" name="start_marks">
                            </div>
                            <div class="col">
                                <label>Nilai Akhir</label>
                                <input type="text" class="form-control" name="end_marks">
                            </div>

                        </div>

                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Point Awal</label>
                                <input required type="text" class="form-control" name="start_point">
                            </div>
                            <div class="col">
                                <label>Point Akhir</label>
                                <input type="text" class="form-control" name="end_point">
                            </div>
                            <div class="col">
                                <label>NIlai</label>
                                <input type="text" class="form-control" name="remarks">
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
