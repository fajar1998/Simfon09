 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Entry Absens</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <table class="table table-bordered">
                     <form method="post" action="{{ route('absenstaff.store') }}">
                         @csrf
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <h5>Tanggal Absensi <span class="text-danger">*</span></h5>
                                     <div class="controls">
                                         <input type="date" name="date" class="form-control" required>
                                     </div>
                                 </div>
                             </div> {{-- //end col-md-6 --}}
                         </div> {{-- //end row --}}
                         <thead>
                             <tr>
                                 <th rowspan="2" class="text-center" style="vertical-align: middle;">#</th>
                                 <th rowspan="2" class="text-center" style="vertical-align: middle;">Daftar</th>
                                 <th colspan="3" class="text-center" style="vertical-align: middle; width:30%">Status
                                 </th>
                             </tr>
                             <th class="text-center btn hadir_all"
                                 style="display:table-cell; background-color: #40d9ff">
                                 Hadir</th>
                             <th class="text-center btn Thadir_all"
                                 style="display:table-cell; background-color: #40d9ff">
                                 Tidak Hadir</th>
                             <th class="text-center btn izin_all" style="display:table-cell; background-color: #40d9ff">
                                 Izin
                             </th>
                         </thead>
                         <tbody>
                             @foreach ($staff as $key => $stf)
                                 <tr id="div{{ $stf->id }}" class="text-center">
                                     <input type="hidden" name="staff_id[]" value="{{ $stf->id }}">
                                     <td>{{ $key + 1 }}</td>
                                     <td>{{ $stf->name }}</td>

                                     <td colspan="3">
                                         <div class="switch-toggle switch-3 switch-candy">

                                             <input name="status_kehadiran{{ $key }}" type="radio"
                                                 value="Hadir" id="hadir{{ $key }}" checked="checked">
                                             <label for="hadir{{ $key }}">Hadir</label>
                                             &nbsp;
                                             &nbsp;
                                             &nbsp; &nbsp;
                                             &nbsp;
                                             &nbsp;
                                             <input name="status_kehadiran{{ $key }}" type="radio"
                                                 value="Tidak Hadir" id="thadir{{ $key }}">
                                             <label for="thadir{{ $key }}">Tidak Hadir</label>
                                             &nbsp;
                                             &nbsp;
                                             &nbsp; &nbsp;
                                             &nbsp;
                                             &nbsp;
                                             <input name="status_kehadiran{{ $key }}" type="radio"
                                                 value="Izin" id="izin{{ $key }}">
                                             <label for="izin{{ $key }}">Izin</label>

                                         </div>
                                     </td>

                                 </tr>
                             @endforeach
                         </tbody>
                 </table>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-primary">Simpan</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
             </div>
             </form>
         </div>
     </div>
 </div>
