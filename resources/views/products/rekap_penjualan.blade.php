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
        
        
    {{-- buat halaman baru --}}
        <h1>Rekap Penjualan</h1>
        <div class="card card-info ">

            <div class="card-body">
                @if(!isset($data[0]->keluar))
                @else
                <a href="/report/barang" class="btn btn-danger ">CETAK PDF</a>
                <a href="/excel/barang" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Barang</th>         
                            <th>Terjual</th>
                            <th>Pendapatan</th>
                            <th>Rugi</th>
                            <th>Untung</th>
                            <th>Bersih</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->updated_at }}</td>
                            <td>{{ $d->barang }}</td>
                            <td>{{ $d->qty_k ? $d->qty_k : $d->qty_k = "0"}}</td>
                            
                            @if( $d->masuk >= $d->keluar)
                                <td class="text-danger">0</td>
                                <td class="text-danger">{{ $d->masuk*$d->qty_r + $d->keluar*$d->qty_k}}</td>
                                <td class="text-danger">0</td>
                                <td>{{ ($d->keluar - $d->masuk)*$d->qty_k - $d->transport - ($d->qty_r*$d->masuk + $d->qty_k*$d->keluar)}}</td>
            
                                @elseif($d->keluar >= $d->masuk)
                                <td class="text-success">{{ $d->keluar*$d->qty_k}}</td>
                                <td class="text-danger">{{ $d->masuk*$d->qty_r}}</td>
                                <td class="text-success">{{ ($d->keluar - $d->masuk)*$d->qty_k}}</td>
                                <td>{{ ($d->keluar - $d->masuk)*$d->qty_k - $d->transport - ($d->qty_r*$d->masuk)}}</td>
                                @endif
            
                            </tr>
                        @endforeach
            
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
