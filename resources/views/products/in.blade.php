@extends('master')
@section('main')
    {{-- modal add --}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Stock Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('store-in') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="suppliers">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label"> Nama Produk</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="barang" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="qty" name="qty_m" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Harga Awal</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" min="1" placeholder="Products" name="masuk" autocomplete="off">
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


    @foreach ($in as $d)
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
        <h1>Gudang</h1>
        <div class="card card-info ">

            <div class="card-body">

                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add +
                </button>
                <a href="/masuk/barang" class="btn btn-danger mb-3">CETAK PDF</a>

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Suppliers</th>
                            <th>Barang</th>
                            <th>Stock</th>
                            <th>Harga Awal</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($in as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->suppliers }}</td>
                                <td>{{ $d->barang }}</td>
                                <td>{{ $d->qty_m }}</td>
                                <td>Rp. @money((float)$d->masuk)</td>
                                <td>Rp. @money((float)$d->masuk*$d->qty_m)</td>
                                <td>
                                    <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editIn{{ $d->id }}">Edit</i></a>
                                    <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $d->id }}">delete</i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @include('products/editIn')
    </section>
@endsection
