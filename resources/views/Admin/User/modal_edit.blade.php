<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true" id="Edit{{ $item->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-5">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control" value="{{ $item->name }}">
                        </div>
                        <div class="col">
                            <label>NIP</label>
                            <input name="nid" type="number" class="form-control" value="{{ $item->nid }}">
                        </div>
                        <div class="col">
                            <label>Tanggal Lahir</label>
                            <input name="dob" type="date" class="form-control" value="{{ $item->dob }}">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-4">
                            <label>Nomor Telepon</label>
                            <input name="no_hp" type="number" class="form-control" value="{{ $item->no_hp }}">
                        </div>
                        <div class="col">
                            <label>Tanggal Bergabung</label>
                            <input name="join_date" type="date" class="form-control" value="{{ $item->join_date }}">
                        </div>
                        <div class="col">
                            <label>Role</label>
                            <select name="hak_akses" class="form-control">

                                <option value="1" {{ $item->hak_akses == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="2" {{ $item->hak_akses == '2' ? 'selected' : '' }}>Operator</option>
                                <option value="3" {{ $item->hak_akses == '3' ? 'selected' : '' }}>Guru</option>
                            </select>
                        </div>
                    </div>
                    <br>


            </div>
            <div class="modal-footer">
                <button type="sumbit" class="btn btn-primary">Perbarui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
