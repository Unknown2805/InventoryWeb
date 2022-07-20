@extends('master')

@section('main')



<section class="section">
    <h1>Transaksi</h1>
        <div class="card card-info ">

            <div class="card-body">

                <table class="table table-striped" id="table1" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>barang</th>
                            <th>Harga Awal</th>
                            <th>Harga Jual</th>
                            <th>Tersisa</th>
                        
                        </tr>
                    </thead>
                
                    @php
                        $serial = 1;
                    @endphp
         
                @foreach ($sale as $s)

                <tr>
                    <td>{{ $serial++ }}</td>
                    <td>{{ $s->barang }}</td>
                    <td>{{ $s->masuk }}</td>
                    <td>{{ $s->keluar}}</td>
                    <td>{{ $s->qty_m}}</td>
                    <td>
                        <a class="btn shadow btn-outline-warning btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editOut{{ $s->id }}">Jual</i></a>
                        
                    </td>
                </tr>   
                @endforeach
       
                </table>
            </div>
        </div>
    @include('products/editOut')

</section>
@endsection