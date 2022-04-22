<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('invent.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang">
                        </div>
                        <div class="col">
                            <label>Ruangan</label>
                            <select name="ruangan_id" id="" class="form-control">
                                @foreach ($ruang as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col">
                            <label>Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                @foreach ($kategori as $ktg)
                                    <option value="{{ $ktg->id }}">{{ $ktg->name }}</option>
                                @endforeach
                                <option value="0">Kategori Baru</option>
                            </select>
                            <br>
                            <input type="text" name="name" id="add_another" class="form-control"
                                placeholder="Tulis Kategori" style="display:none;">
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga">
                        </div>
                        <div class="col">
                            <label>Stock</label>
                            <input type="number" class="form-control" name="stock">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
