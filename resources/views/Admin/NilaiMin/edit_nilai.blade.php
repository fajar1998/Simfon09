@extends('master')
@section('title', 'Tambah Nilai Minimal')
@section('konten')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Nilai</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="card">

            <div class="card-body">
                <form method="post" action="{{ route('nilaimin.update', $editData[0]->kelas_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="add_item">


                                <div class="form-group">
                                    <h5>Nama Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="kelas_id" required="" class="form-control">
                                            @foreach ($kelas as $klas)
                                                <option value="{{ $klas->id }}"
                                                    {{ $editData['0']->kelas_id == $klas->id ? 'selected' : '' }}>
                                                    {{ $klas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- //end form group --}}



                                @foreach ($editData as $edit)
                                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                        <div class="row">



                                            <div class="col-md-3">

                                                <div class="form-group">
                                                    <h5>Mata Pelajaran <span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <select name="mapel_id[]" required="" class="form-control">
                                                            @foreach ($mapel as $subjek)
                                                                <option value="{{ $subjek->id }}"
                                                                    {{ $edit->mapel_id == $subjek->id ? 'selected' : '' }}>
                                                                    {{ $subjek->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Nilai Tertinggi<span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="full_mark[]"
                                                            value="{{ $edit->full_mark }}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end col-md-5 --}}

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Nilai Pas<span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="pass_mark[]"
                                                            value="{{ $edit->pass_mark }}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end col-md-5 --}}

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <h5>Nilai Subjektif<span class="text-danger">*</span>
                                                    </h5>
                                                    <div class="controls">
                                                        <input type="text" name="subjektif_mark[]"
                                                            value="{{ $edit->subjektif_mark }}" class="form-control">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>{{-- end col-md-5 --}}




                                            <div class="col-md-2" style="padding-top: 25px;">
                                                <span class="btn btn-success addeventmore"><i
                                                        class="fa fa-plus-circle"></i></span>
                                                <span class="btn btn-danger removeeventmore"><i
                                                        class="fa fa-minus-circle"></i></span>

                                            </div>{{-- end col-md-5 --}}

                                        </div> {{-- //end row --}}
                                    </div>
                                @endforeach
                            </div>


                        </div>
                        {{-- End Row --}}



                    </div>
            </div>


        </div>
        {{-- end add_item --}}
        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
        </div>
        </form>


        </section>


    </div>
    </div>


    <div style="visibility: hidden;">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">




                <div class="form-row">
                    <div class="col-md-3">

                        <div class="form-group">
                            <h5>Mata Pelajaran <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="mapel_id[]" required="" class="form-control">
                                    @foreach ($mapel as $subjek)
                                        <option value="{{ $subjek->id }}">{{ $subjek->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nilai Tertinggi<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" value="{{ $edit->full_mark }}"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>{{-- end col-md-5 --}}

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nilai Pas<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" value="{{ $edit->pass_mark }}"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>{{-- end col-md-5 --}}

                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Nilai Subjektif<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="subjektif_mark[]" value="{{ $edit->subjektif_mark }}"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>{{-- end col-md-5 --}}
                    <div class="col-md-2" style="padding-top: 25px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span>

                    </div>{{-- end col-md-2 --}}

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", '.removeeventmore', function(event) {
                $(this).closest(".delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });
    </script>

@endsection
