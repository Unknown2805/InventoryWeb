@extends('master')
@section('main')
    {{-- modal add --}}

    <!-- Modal -->
    


    @foreach ($data as $d)
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
        <h1>Rekap Product</h1>
        <div class="card card-info ">

            <div class="card-body">
                <a href="/report/barang" class="btn btn-danger ">CETAK PDF</a>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Suppliers</th>
                            <th>Barang</th>
                            <th>Jumlah masuk</th>
                            <th>Stock</th>
                            <th>Terjual</th>
                            <th>Sisa</th>
                            <th>Pendapatan</th>
                            <th>Rugi</th>
                            <th>Untung</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->created_at }}</td>
                                <td>{{ $d->suppliers }}</td>
                                <td>{{ $d->barang }}</td>
                                <td>{{ $d->qty_m + $d->qty_k}}</td>
                                <td>{{ $d->qty_m ? $d->qty_m : $d->qty_m = "0"}}</td>
                                <td>{{ $d->qty_k ? $d->qty_k : $d->qty_k = "0"}}</td>
                                <td>{{ $d->qty_m - $d->qty_k ? $d->qty_m - $d->qty_k : $d->qty_m - $d->qty_k = "0"}}</td>
                                
                                @if( $d->keluar <= $d->masuk)
                                <td class="text-danger">0</td>
                                <td class="text-danger">{{ $d->masuk*$d->qty_r + $d->keluar*$d->qty_k}}</td>
                                <td class="text-danger">0</td>
                                @elseif($d->keluar >= $d->masuk)
                                <td class="text-success">{{ $d->keluar}}</td>
                                <td class="text-success">{{ $d->masuk*$d->qty_r}}</td>
                                <td class="text-success">{{ $d->keluar - $d->masuk}}</td>
                                @endif

                                <td></td>
                               

                            
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
