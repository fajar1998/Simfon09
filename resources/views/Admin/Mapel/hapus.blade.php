  <!-- SMALL MODAL -->
  <div id="ModalDelete{{ $item->id }}" class="modal fade">
      <div class="modal-dialog " role="document">
          <div class="modal-content bd-0 tx-14">
              <div class="modal-header pd-x-20">
                  <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Notice</h6>
                  <form method="post" action="{{ route('mapel.destroy', $item->id) }}">
                      {{ method_field('delete') }}
                      @csrf
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body pd-20">
                  <h3>Hapus Mata Pelajaran {{ $item->name }} ??</h3>

              </div>
              <div class="modal-footer justify-content-center">
                  <button type="submit" class="btn btn-danger pd-x-20">Hapus</button>
                  <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Batal</button>
              </div>
              </form>
          </div>
      </div><!-- modal-dialog -->
  </div><!-- modal -->
