<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Invoice Qrcode</title>
    <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            user-select: none;
            margin: 0;
            padding: 0;
            font: 400 .875rem 'Open Sans', sans-serif;
            color: #bcd0f7;
            background: #1A233A;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #bcd0f7;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #8a99b5;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #1a233a;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: left;
            font-size: 0.8rem;
            color: #8a99b5;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #272e48;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #8a99b5;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #1a233a;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }

        .card {
            background: #272E48;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .custom-table {
            border: 1px solid #2b3958;
        }

        .custom-table thead {
            background: #2f71c1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #172033;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #1a243a;
        }

        .custom-table>tbody td {
            border: 1px solid #2e3d5f;
        }

        .table {
            background: #1a243a;
            color: #bcd0f7;
            font-size: .75rem;
        }

        .text-success {
            color: #c0d64a !important;
        }

        input[type="number"] {
            background: transparent;
            border: none;
            outline: none;
            color: #c0d64a;
            font-weight: bolder;
            font-size: 18px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row gutters mt-3">
            <div class="specific">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                <div class="invoice-header">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <div class="d-flex gap-1 align-items-center justify-content-center">
                                                <img src="/image/kimwhite1.png" style="height: 120px;">
                                                {{-- <p class="invoice-logo text-decoration-none mb-2">KIM-JF</p> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <address class="text-center mt-2">
                                                Kim-JF, SMKTAG. Surabaya
                                                <br>
                                                +6283890123
                                            </address>
                                        </div>
                                    </div>
                                    <!-- Row end -->

                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <address class="mt-1">
                                                    <h6 style="font-size: 15px;">No. Meja : {{ $table->no_meja }}</h6>
                                                    <h6 style="font-size: 15px;">Nama &ensp; &ensp;: {{ $transaction->nama_pemesan }}</h6>
                                                    <h6 style="font-size: 15px;">No. Hp&ensp; &nbsp;: {{ $transaction->nomorhp }}</h6>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <div class="invoice-num">
                                                    <div>Invoice&ensp; &nbsp; &ensp;: #{{ $transaction->kode }}</div>
                                                    <div>Tanggal&nbsp; &nbsp;&ensp; : {{ $transaction->created_at->isoFormat('D') }}/{{ $transaction->created_at->isoFormat('M') }}/{{ $transaction->created_at->isoFormat('Y') }}. {{ $transaction->created_at->format('H:i') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-body">
                                    <!-- Row start -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Menu</th>
                                                <th scope="col" class="text-center">Jml</th>
                                                <th scope="col" class="text-center">Harga</th>
                                                <th scope="col" class="text-end">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaction->TransactionItem as $item)
                                                <tr>
                                                    <th scope="row" style="font-weight: 300; color: #8a99b5;">{{ $item->product->name }}</th>
                                                    <td style="font-weight: 300; color: #8a99b5;" class="text-center">{{ $item->quantity }}</td>
                                                    <td style="font-weight: 300; color: #8a99b5;" class="text-center">Rp. {{ number_format($item->harga, 0, ',', '.') }}</td>
                                                    <td style="font-weight: 300;" class="text-end">Rp. {{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- Row end -->

                                    {{-- <hr> --}}
                                    <div class="d-flex">
                                        <div class="col-3">
                                            <h6 style="font-size: 15px; font-weight: 500;">Subtotal</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 style="font-size: 15px; font-weight: 500;">Rp. {{ number_format($transaction->subtotal, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-3">
                                            <h6 style="font-size: 15px; font-weight: 500;">Pajak <small>11%</small></h6>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 style="font-size: 15px; font-weight: 500;">Rp. {{ number_format($transaction->pajak, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 10px;">
                                    <div class="d-flex">
                                        <div class="flex-fill">
                                            <h6 class="ms-auto" style="font-size: 18px; font-weight: bold;">Total</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <h6 class="text-end" style="font-size: 18px; font-weight: bold;" id="total">Rp. {{ number_format($transaction->total, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-2">
                                        <div class="flex-fill">
                                            <h6 class="ms-auto" style="font-size: 18px; font-weight: bold;">Bayar</h6>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <label class="ms-auto" for="bayar" style="font-weight: bold; color: #bcd0f7; font-size: 15px;">Rp.</label>
                                            <input type="number" class="text-end" id="rupiah" name="bayar" placeholder="0" style="width: 30%; color: #bcd0f7; font-weight: bold;">
                                            {{-- <h6 class="text-success" style="font-size: 18px; font-weight: bold;">Rp. {{ number_format($transaction->total, 0, ',', '.') }}</h6> --}}
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="flex-fill">
                                            <h6 class="text-success" style="font-size: 18px; font-weight: bold;">Kembali</h6>
                                        </div>
                                        <div class="d-flex justify-content-end align-items-center">
                                            <label for="kembalian" style="font-weight: bold; color: #c0d64a; font-size: 15px;">Rp. </label>
                                            <input disabled type="number" id="kembalian" class="text-end" name="kembalian" placeholder="0" style="width: 30%; font-weight: bold;">
                                        </div>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <hr>
                                        <small style="color: #8a99b5;">Terimakasih Telah Datang</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <button type="button" class="btn btn-primary">Download Invoice</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        // function sum() {
        //     var harga = {{ $transaction->total }};
        //     var bayar = document.getElementById('bayar').value;

        //     var kembalian = parseInt(bayar) - parseInt(harga);

        //     if (!isNaN(kembalian)) {
        //         document.getElementById('kembalian').value = kembalian;
        //     }
        //     // console.log(kembalian);
        // }

        /* Dengan Rupiah */
        var dengan_rupiah = document.getElementById('rupiah');
        dengan_rupiah.addEventListener('keyup', function(e) {
            dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {

            const number = angka;
            const bayar = angka.replace('.', '');

            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            // const bayar = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

            // const bayar = prefix == undefined ? rupiah : (rupiah ? rupiah : '')
            // console.log(bayar);

            var harga = {{ $transaction->total }};

            var kembalian = parseInt(bayar) - parseInt(harga);

            var bilangan = kembalian;

            var number_string = bilangan.toString(),
                sisauang = number_string.length % 3,
                rupiahuang = number_string.substr(0, sisauang),
                ribuanuang = number_string.substr(sisauang).match(/\d{3}/g);

            if (ribuanuang) {
                separator = sisauang ? '.' : '';
                rupiahuang += separator + ribuanuang.join('.');
            }

            if (!isNaN(kembalian)) {
                document.getElementById('kembalian').value = rupiahuang;
            }

            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
    <script type="text/javascript">
        document.querySelector('button').addEventListener('click', function() {
            html2canvas(document.querySelector('.specific'), {
                onrendered: function(canvas) {
                    // Uncomment the line below if you want to append the canvas to the body
                    // document.body.appendChild(canvas);
                    return Canvas2Image.saveAsPNG(canvas);
                }
            });
        });
    </script>
    <script src="https://superal.github.io/canvas2image/canvas2image.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</body>

</html>
