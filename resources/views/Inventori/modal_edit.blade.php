<div id="Edit{{ $item->id }}" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content tx-size-sm">
            <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Update Barang</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pd-20">
                <form method="post" action="{{ route('invent.update', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mg-b-25">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Nama Barang: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_barang"
                                    value="{{ $item->nama_barang }}">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Ruangan <span class="text-danger">*</span></label>
                                <select required name="ruangan_id" id="" class="form-control">
                                    @foreach ($ruang as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->ruangan_id == $data->id ? 'selected' : '' }}>
                                            {{ $data->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Harga: <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="harga" value="{{ $item->harga }}">
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Stok: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="number" name="stock" value="{{ $item->stock }}">
                            </div>
                        </div><!-- col-3 -->



                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Submit </button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->

                </form>
            </div><!-- modal-body -->

        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->
