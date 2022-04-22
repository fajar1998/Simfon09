<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('staff.store') }}" method="POST">
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
                            <label>Jenis Kelamin</label>
                            <select name="jenkel" class="form-control">
                                <option selected disabled>Pilih Gender</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-5">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option selected disabled>Pilih Status</option>
                                <option value="Pns">Pns</option>
                                <option value="Honor">Honor</option>
                            </select>
                        </div>

                        <div class="col-3">
                            <label>Jabatan</label>
                            <select name="jabatan_id" class="form-control">
                                <option selected disabled>Pilih Jabatan</option>
                                @foreach ($jabatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4">
                            <label>Gaji</label>
                            <input name="gaji" type="text" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-6">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control">
                        </div>

                        <div class="col-4">
                            <label>Foto</label>
                            <input name="image" type="file" class="form-control" id="image">
                        </div>

                        <div class="col-2">
                            <div class="controls">
                                <img id="showImage" src="{{ url('upload/wa1.jpg') }}"
                                    style="width: 100px; width:100px;border:1px solid #000000;">

                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="sumbit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
