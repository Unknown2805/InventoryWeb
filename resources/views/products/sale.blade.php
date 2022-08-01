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
                                <th>Stock</th>
                                <th>Harga Jual</th>
                                <th>Aksi</th>
                            
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach ($sale as $s)

                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->barang }}</td>
                                    <td>Rp. @money((float)$s->masuk)</td>
                                    <td>{{ $s->qty_m == null ? "habis"  : $s->qty_m  }}</td>

                                    @if($s->keluar == null)
                                    <td>Belum ada</td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#addOut{{ $s->id }}">Add +</i></a>
                                        
                                    </td>
                                    @elseif($s->keluar != null && $s->qty_m != null)
                                    <td>Rp. @money((float)$s->keluar)</td>
                                    <td>
                                        <a class="btn btn-outline-warning btn-sm" data-bs-toggle="modal"
                                                                        data-bs-target="#editOut{{ $s->id }}">Jual</i></a>
                                        
                                    </td>
                                    @elseif($s->qty_m == null && $s->keluar != null)
                                    <td>Rp. @money((float)$s->keluar)</td>
                                    <td>
                                        <a class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                                                        data-bs-target="#">habis</i></a>
                                    </td>
                                    @endif

                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @include('products/editOut')
    </section>
    
    <script type="text/javascript">
     

        function formatbaru(e){
            let hasil = formatedit(e.target.value);

            e.target.value = hasil;
        }
      
        /* Fungsi formateditom */
        function formatedit(angka) {
            var prefix = "Rp";
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            edit = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      
          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if (ribuan) {
            separator = sisa ? '.' : '';
            edit += separator + ribuan.join('.');
          }
      
          edit = split[1] != undefined ? edit + ',' + split[1] : edit;
          return prefix == undefined ? edit : (edit ? 'Rp ' + edit : '');
        }
            
    </script>

@endsection