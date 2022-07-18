@extends('master')

@section('main')
    <div class="modal fade" id="modalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h2 class="modal-title" style="color: white">Add manager</h2>
                    <button style="color: white" type="button" class="" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action={{ url('/store-manager') }} id="formAdd" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body container">
                        <div class="col-md-12 mb-4">
                            <div class="form-floating">
                                <input required type="text" class="form-control mt-2" id="floatingName"
                                    placeholder="Name" name="name" required>
                                <label for="floatingKeterangan">Name</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-floating">
                                <input required asp-for="email" type="email"
                                    class="form-control mt-3 @error('email') is invalid @enderror" id="floatingEmail"
                                    placeholder="Email" name="email" required>
                                <label for="floatingEmail">Email</label>
                            </div>
                            @error('email')
                                <div class='mt-1'>
                                    <span class=" text-danger" asp-validation-for="email">
                                        {{ $message }}
                                    </span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-floating">
                                <input required type="password" class="form-control mt-3 " id="floatingPassword"
                                    placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="form-floating">
                                <input required type="file" class="form-control mt-3 "
                                    placeholder="Profile" name="gambar">
                                <label for="floatingPassword">Image Profile</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn_add mt-3">Submit</button>
                        </div>



                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($user as $d)
        <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{-- <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div> --}}
                    <form action={{ url('/manager-destroy/' . $d->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <center class="mt-3">
                                <h5>
                                    apakah anda yakin ingin menghapus data ini?
                                </h5>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Hapus!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container-fluid">
        <div class="row">
            <div class="py-3">
                <h1>manager</h1>
            </div>

            <div class="card shadow mb-5">
                <div class="card-body">
                    <button class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#modalAdd"><i
                            class="bx bx-list-plus"></i> Add+</button>
                    <table class="table table-striped" id="table1" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $serial = 1;
                        @endphp
                        @foreach ($user as $u)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            @if($u->gambar == null)
                            <td><img src="assets/images/faces/1.jpg" alt="". width="170" height="170"></td>
                            @else
                            <td><img src="{{asset('/storage/User/' . $u->gambar) }}" alt="". width="170" height="170"></td>
                            @endif
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>{{ $u->roles->pluck('name')->implode('') }}</td>
                            <td>
                                <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $u->id }}">delete</i></a>

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
