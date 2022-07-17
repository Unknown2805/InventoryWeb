@extends('master')


@section('main')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h1>Rekap Data Products</h1>
            </div>
            <div class="card-body">
                {{-- @if(!isset($data2[0]->masjid))
                <a></a>
                @elseif(!isset($data[0]->masuk))
                <a></a>
                @else
                <a href="/rekap/cetak" class="btn btn-danger">CETAK PDF</a>
                @endif --}}
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tanggal }}</td>
                                <td>{{ $d->uraian }}</td>
                                <td>Rp. @money((float)"$d->masuk ? $d->masuk : 0") </td>
                                <td>Rp. @money((float)"$d->keluar ? $d->keluar : 0")</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
