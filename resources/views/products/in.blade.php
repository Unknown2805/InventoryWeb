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
                            <label for="formGroupExampleInput" class="form-label">Suppliers</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Uraian" name="suppliers">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Products</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="barang" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">qty</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="qty" name="qty" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="formGroupExampleInput2" placeholder="Products" name="in" autocomplete="off">
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



    <section class="section">
        <h1>Pemasukan</h1>
        <div class="card card-info ">

            <div class="card-body">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data
                </button>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Suppliers</th>
                            <th>Barang</th>
                            <th>Quantity</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
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
                                <td>{{ $d->qty }}</td>
                                <td>{{$d->in}}</td>
                                <td>Rp. @money((float)$d->in*$d->qty)</td>
                                <td>
                                    <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editIn{{ $d->id }}">Edit</i></a>
                                    {{-- <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $d->id }}">delete</i></a> --}}
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
