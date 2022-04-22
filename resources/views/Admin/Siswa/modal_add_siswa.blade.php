<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-5">
                            <label>Nama</label>
                            <input name="name" type="text" class="form-control">
                        </div>
                        <div class="col">
                            <label>NIS</label>
                            <input name="nid" type="number" class="form-control">
                        </div>
                        <div class="col">
                            <label>Tanggal Lahir</label>
                            <input name="dob" type="date" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-3">
                            <label>Nomor Telepon</label>
                            <input name="no_hp" type="number" class="form-control">
                        </div>
                        <div class="col-4">
                            <label>Nama Ayah</label>
                            <input name="fname" type="text" class="form-control">
                        </div>

                        <div class="col-4">
                            <label>Nama Ibu</label>
                            <input name="mname" type="text" class="form-control">
                        </div>

                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <label>Jenis Kelamin</label>
                            <select name="jenkel" class="form-control">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Agama</label>
                            <select name="agama" class="form-control">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>

                        <div class="col">
                            <label>Tahun</label>
                            <select name="tahun_id" required="" class="form-control">
                                <option value="" selected="" disabled="">Pilih tahun</option>
                                @foreach ($tahun as $thn)
                                    <option value="{{ $thn->id }}">{{ $thn->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col">
                            <label>Kelas</label>
                            <select name="kelas_id" required="" class="form-control">
                                <option value="" selected="" disabled="">Pilih Kelas</option>
                                @foreach ($kelas as $klas)
                                    <option value="{{ $klas->id }}">{{ $klas->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">

                        <div class="col-5">
                            <label>Alamat</label>
                            <input name="alamat" type="text" class="form-control">
                        </div>
                        <div class="col-3">
                            <label>Foto</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>

                        <div class="col-3">
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

    });
</script>
