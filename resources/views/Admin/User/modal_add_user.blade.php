<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-5">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label>NIP</label>
                            <input name="nid" type="number" class="form-control">
                        </div>
                        <div class="col">
                            <label>Tanggal Lahir</label>
                            <input name="dob" type="date" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-4">
                            <label>Nomor Telepon</label>
                            <input name="no_hp" type="number" class="form-control">
                        </div>
                        <div class="col">
                            <label>Tanggal Bergabung</label>
                            <input name="join_date" type="date" class="form-control">
                        </div>
                        <div class="col">
                            <label>Role</label>
                            <select name="hak_akses" class="form-control">
                                <option selected disabled>Pilih Role</option>
                                @if (auth()->user()->hak_akses == 1)
                                    <option value="1">Admin</option>
                                @endif
                                <option value="2">Operator</option>
                                <option value="3">Guru</option>
                            </select>
                        </div>
                    </div>
                    <br>


            </div>
            <div class="modal-footer">
                <button type="sumbit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
