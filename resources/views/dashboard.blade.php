@extends('master')

@section('main')
    {{-- editpp --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{ url('dashboard/tambah') }} method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Nama Products</label>
                            <input type="text" class="form-control" id="formGroupExampleInput"
                                placeholder="Nama Products" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Foto Profile</label>
                            <input type="file" class="form-control" id="formGroupExampleInput2" placeholder="Foto Profil"
                                name="gambar">
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

    <div class="page-heading" style="cursor:pointer">


        @hasrole('owner')
            <a data-bs-toggle="modal" data-bs-target="#editOwner{{ Auth::user()->id }}">

                <div class="text-start">
                    <div class="avatar avatar-lg">
                        <img
                            src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/' . Auth::user()->gambar) }}">
                    </div>
                    <span class="font-bold ms-1" style="font-size: 24px">
                        {{ Auth::user()->name }}
                    </span>
                </div>

            </a>
        @endhasrole

        @hasrole('manager')
            <a data-bs-toggle="modal" data-bs-target="#editManager{{ Auth::user()->id }}">

                <div class="text-start">
                    <div class="avatar avatar-lg">
                        <img
                            src="{{ Auth::user()->gambar == null ? asset('assets/images/faces/1.jpg') : asset('/storage/profile/' . Auth::user()->gambar) }}">
                    </div>
                    <span class="font-bold ms-1" style="font-size: 24px">
                        {{ Auth::user()->name }}
                    </span>
                </div>

            </a>
        @endhasrole
    </div>

    <div class="page-content">
        <section>
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h6>Rekap Penjualan Product</h6>
                            </div>


                            <div class="card-body">

                                <div class="row">


                                    <div class="col-12 col-md-12">
                                        <div class="text-center">
                                            <canvas id="products_b"></canvas>
                                            <button onclick="downloadPDF()">Download Pdf</button>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <h6>Penjualan Product Terlaris</h6>
                            </div>


                            <div class="card-body">

                                <div class="row">


                                    <div class="col-12 col-sm-12">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Barang</th>
                                                    <th>Terjual</th>
                                                    <th>Harga</th>
                                                </tr>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pro as $d)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $d->barang }}</td>
                                                        <td>{{ $d->qty_k }}</td>
                                                        <td>{{ $d->keluar }}</td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div>




   @include('formEditProfile')

   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


   <script>
       const b_products = [
           'January',
           'February',
           'March',
           'April',
           'May',
           'June',
           'July',
           'Aug',
           'Sep',
           'Oct',
           'Nov',
           'Dec'
       ];

       const b_productsd = {
           labels: b_products,
           datasets: [{
               label: 'Keuntungan',
               backgroundColor: '#43beaf',
               borderRadius: 4,
               barThickness: 10,
               
               data: [
               @foreach ($data_month_un_p as $ikm )
               {{ $ikm }},
               @endforeach
               ]
           }, {
               label: 'Kerugian',
               backgroundColor: '#dc3545',
               borderRadius: 4,
               barThickness: 10,
               data: [
               @foreach ($data_month_rug_p as $okm)
               {{ $okm }},
               @endforeach
               ],
           }]
       };

       const bar_products = {
           type: 'bar',
           data: b_productsd,
           options: {
               responsive: true,
               indexAxis: 'x',
               plugins: {
               legend: {
                   position: 'bottom',
                   labels: {
         usePointStyle: true,
       },
               },},
           }
       };
   </script>

   <script>
       const bulanan_products = new Chart(
           document.getElementById('products_b'),
           bar_products
       );
   </script>

        </section>
    </div>




    @include('formEditProfile')

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"
        integrity="sha512-dw+7hmxlGiOvY3mCnzrPT5yoUwN/MRjVgYV7HGXqsiXnZeqsw1H9n9lsnnPu4kL2nx2bnrjFcuWK+P3lshekwQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- CHART Masjid --}}
    <script>
        const products = {
            labels: [
                'Jumlah',
                'Jumlah'
            ],
            datasets: [{
                label: '',
                data: [],
                backgroundColor: [
                    '#435EBE',
                    '#43beaf'
                ],
                hoverOffset: 4
            }]
        };

        const productsd = {
            type: 'doughnut',
            data: products,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'end',
                    },
                }
            },
        };

        const chartproducts = new Chart(
            document.getElementById('d_products'),
            productsd
        );
    </script>



    <script>
        const b_products = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        const b_productsd = {
            labels: b_products,
            datasets: [{
                label: 'Keuntungan',
                backgroundColor: '#43beaf',
                borderRadius: 4,
                barThickness: 10,

                data: [
                    @foreach ($data_month_un_p as $ikm)
                        {{ $ikm }},
                    @endforeach
                ]
            }, {
                label: 'Kerugian',
                backgroundColor: '#dc3545',
                borderRadius: 4,
                barThickness: 10,
                data: [
                    @foreach ($data_month_rug_p as $okm)
                        {{ $okm }},
                    @endforeach
                ],
            }]
        };

        const bar_products = {
            type: 'bar',
            data: b_productsd,
            options: {
                responsive: true,
                indexAxis: 'x',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                        },
                    },
                },
            }
        };
    </script>

    <script>
        const bulanan_products = new Chart(
            document.getElementById('products_b'),
            bar_products
        );
    </script>
@endsection
