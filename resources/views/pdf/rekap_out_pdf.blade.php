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
		<h5>Data Rekap Keluar</h4>
	</center>
 
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Terjual</th>
                <th>Pendapatan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sold as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>{{ $d->barang }}</td>
                    <td>{{ $d->qty_k }}</td>
                    <td>Rp. @money((float)$d->keluar)</td>
                    <td>Rp. @money((float)$d->keluar*$d->qty_k)</td>
                </tr>
            @endforeach

        </tbody>
    </table>
 
</body>
</html>










