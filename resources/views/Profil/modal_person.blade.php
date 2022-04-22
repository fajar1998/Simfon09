 <!-- Profile Modal -->
 <div id="profile_info" class="modal custom-modal fade" role="dialog">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Informasi PRofil</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">

                 <form method="post" action="{{ route('profil.store') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                         <div class="col-md-12">
                             <div class="profile-img-wrap edit-img">
                                 <img id="showImage"
                                     src="{{ !empty($user->image) ? url('upload/foto_user/' . $user->image) : url('upload/wa1.jpg') }}"
                                     alt="user">
                                 <div class="fileupload btn">
                                     <span class="btn-text">edit</span>
                                     <input type="file" name="image" class="upload" id="image">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Nama</label>
                                         <input name="name" type="text" class="form-control"
                                             value="{{ $user->name }}">
                                     </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Tanggal Lahir</label>
                                         <div class="cal-icon">
                                             <input name="dob" class="form-control" type="date"
                                                 value="{{ $user->dob }}">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Jenis Kelamin</label>
                                         <select name="jenkel" class="select form-control">
                                             <option value="Laki-Laki"
                                                 {{ $user->jenkel == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                                             </option>
                                             <option value="Perempuan"
                                                 {{ $user->jenkel == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                             </option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label>Nomor telepon</label>
                                         <input name="no_hp" type="text" class="form-control"
                                             value="{{ $user->no_hp }}">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group">
                                 <label>Alamat</label>
                                 <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
                             </div>
                         </div>






                     </div>
                     <div class="submit-section">
                         <button type="submit" class="btn btn-primary submit-btn">Perbarui</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>


 <!-- /Profile Modal -->
