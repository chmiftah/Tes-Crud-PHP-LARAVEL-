



        @extends('layouts.admin')
        @section('main-content')
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
            @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                          <div class="row d-flex justify-content-between mb-3">
                            <div>
                              <a class="btn btn-primary"  data-toggle="modal" data-target="#addModal"><i class="fas fa-plus "></i> Add Data</a>
                            </div>
                            <div class="d-flex">
                                <form action="/pegawai/cari" method="GET">
                                  <div class="d-flex">
                                    <input type="text" required name="cari"  class="form-control input-sm mx-1" style="width:150px;">
                                    <button class="btn btn-primary">cari</button>
                                  </div>
                                  </form>
                            </div>
                          </div>
                            <div class="row">
                               <table class="table table-striped">
                                 <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Umur</th>
                                   <th>Aksi</th>
                                 </tr>
                                 @if (count($pegawai))
                                 @foreach ($pegawai as $data)
                                 <tr>
                                <td>1</td>
                                <td>{{ $data->nama}}</td>
                                <td>{{ $data->umur }}</td>

                                <td>
                                    <div>
                                        <form action="{{ route('pegawai.delete',$data) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('pegawai.edit',$data) }}" class="btn btn-primary btn-sm"  > <i class="fas fa-pencil-alt fa-sm"></i></a>
                                          <button class="btn-sm btn btn-danger" type="submit" onclick="javascript:return confirm('yakin ingin menghapus')"> <i class="fas fa-trash-alt fa-sm" ></i></button>
                                          </form>

                                    </div>
                                </td>
                                </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                  <td><div class="alert alert-danger">data tidak ditemukan</div></td>
                                 </tr>
                                 @endif
                               </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                  <div>
                    pages: {{ $pegawai->currentPage() }} | total : {{ $pegawai->total() }} data
                  </div>
                  <div>{{ $pegawai->links() }}</div>
                </div>
            </div>


          {{-- add modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add Data Pegawai</h2>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pegawai.post') }}" method="post">
                        @csrf
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-2">
                            <label for="name">Nama</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="nama" id="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-2">
                            <label for="name">umur</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="number" name="umur" id="name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <button class="btn btn-primary mx-3" type="submit">Simpan</button>
                        <button class="btn btn-danger" data-dismiss="modal">cancel</button>
                       </div>
                    </form>
                </div>
            </div>
        </div>
     </div>

        @endsection






