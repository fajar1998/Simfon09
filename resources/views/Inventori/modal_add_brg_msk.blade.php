<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('brg.masuk') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>Nomor Barang</label>
                            <input type="number" class="form-control" name="no_barang_masuk">
                        </div>

                        <div class="col">
                            <label>Nama Barang</label>
                            <select name="id_barang" id="id_barang" class="form-control">
                                @foreach ($inv as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="col">
                            <label>Jumlah Masuk</label>
                            <input type="text" class="form-control" name="jumlah_brg_msk">
                        </div>

                    </div>
                    <br>

                    <br>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
