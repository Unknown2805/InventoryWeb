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
		<h5>Data Rekap Barang Masuk</h4>
	</center>
 
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Suppliers</th>
                <th>Barang</th>
                <th>Transport</th>
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
                    <td>{{ $d->transport}}</td>
                    <td>{{ $d->qty_m == null ? "habis"  : $d->qty_m  }}</td>
                    <td>Rp. @money((float)$d->masuk)</td>
                    @if($d->qty_m == null)
                    <td></td>
                    @else
                    <td>Rp. @money((float)$d->masuk*$d->qty_m)</td>
                    @endif
                    <td>
                        <a class="btn shadow btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#editIn{{ $d->id }}">Edit</i></a>
                        <a class="btn shadow btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $d->id }}">delete</i></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
 
</body>
</html>










