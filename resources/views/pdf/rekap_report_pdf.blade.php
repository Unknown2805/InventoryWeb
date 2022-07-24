<!DOCTYPE html>
<html>
<head>
	<title>Data Rekap Barang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Data Rekap Product</h4>
	</center>
 <h3>Data Product</h3>
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Suppliers</th>
                <th>Barang</th>
                <th>Jumlah masuk</th>
                <th>Stock</th>
                <th>Harga jual</th>
                
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
                    <td>{{ $d->keluar}}</td>
                    
                    

                </tr>
            @endforeach

        </tbody>
    </table>
<br/>
<h3>Data Penjualan</h3>
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
                <td>{{ $d->created_at }}</td>
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
</body>
</html>










