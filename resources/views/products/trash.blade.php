@extends('master')
@section('main')
    {{-- modal add --}}

    <!-- Modal -->
    


    @foreach ($trash as $d)


    <div class="modal fade" id="editTrash{{$d ->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{url('editTrash/' . $d ->id)}} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
    
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Jumlah Barang Rusak</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" min="0" max="{{$d->qty_m}}" placeholder="Jumlah" name="qty_r" autocomplete="off" > 
                        </div>
                          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <div class="modal fade" id="delete{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  
                    <form action={{ url('/deleteIn/delete/' . $d->id) }} method="POST" enctype="multipart/form-data">
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

    <section class="section">
        <h1>Produk Rusak</h1>
        <div class="card card-info ">

            <div class="card-body">
                @foreach ($trash as $s)
                    
                @endforeach
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Suppliers</th>
                            <th>Barang</th>
                            <th>Rusak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trash as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->suppliers }}</td>
                                <td>{{ $d->barang }}</td>
                                <td>{{ $d->qty_r }}</td>
                                @if($d->qty_r == null)
                                <td>
                                    <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editTrash{{ $d->id }}">trash</i></a>
                                </td>
                                @else
                                <td>
                                    <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editTrash{{ $d->id }}">edit</i></a>
                                </td>
                                @endif

                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
