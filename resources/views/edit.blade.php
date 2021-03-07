@extends('layouts.admin')

@section('main-content')

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row d-flex justify-content-center">
        <div class="col-lg-4">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My Account</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('pegawai.update',$pegawai) }}" autocomplete="off">
                      @csrf
                        @method('PUT')
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama">nama<span class="small text-danger">*</span></label>
                                        <input type="text"  class="form-control" name="nama"  value="{{ old('email')??$pegawai->nama }}">
                                    </div>
                                    <div class="form-group">
                                      <label class="form-control-label" for="umur">umur<span class="small text-danger">*</span></label>
                                      <input type="number" class="form-control" name="umur"   value="{{ old('umur')??$pegawai->umur}}">
                                  </div>
                                </div>
                            </div>

                        </div>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

@endsection
