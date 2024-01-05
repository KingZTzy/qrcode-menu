<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1">
    <title>Transaction</title>
    <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="sweetalert2.min.css">

    <style>
        body {
            background: #e9e9e9;
        }

        @media print {
            #printPageButton {
                display: none;
            }
        }

        .box {
            position: relative;
            width: 130px;
            height: 120px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            border-radius: 20px;
        }

        .box::before {
            content: '';
            position: absolute;
            width: 100px;
            /* width: 250px; */
            height: 140%;
            /* background: linear-gradient(orange, rgb(255, 81, 0)); */
            background: linear-gradient(0deg, #0d6efd 0%, rgba(255, 0, 0, 1) 62%);
            /* background: linear-gradient(0deg, rgba(255, 0, 0, 1) 0%, rgba(195, 42, 53, 1) 62%); */
            /* background: conic-gradient(#fd004c, #fe9000, #fff020, #3edf4b, #3363ff, #b102b7, #fd004c); */
            animation: anime 3s linear infinite;
        }

        .box::after {
            content: '';
            position: absolute;
            background: #212529;
            inset: 4px;
            border-radius: 20px;
        }

        .box-title {
            z-index: 10;
        }

        @keyframes anime {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Modal Alert Back-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h6 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin Untuk Kembali?</h6>
                </div>
                <div class="modal-body">
                    <div>
                        <h6 class="text-center" style="font-size: 14px;">Pastikan anda telah mengunduh/screenshot data transaksi anda</h6>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                    <a href="/{{ $table->id }}" type="button" class="btn btn-secondary">Iya!</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="invoice-page p-4" id="box" onload="window.print()">
            <div class="container-fluid bg-dark text-white rounded" style="padding-bottom: 15px;">
                <div class="text-center" style="font-size: 25px">
                    <h2 style="padding-top: 20px;">Transaksi Saya</h2>
                    <div class="box mt-4 mx-auto">
                        <h1 class="box-title" style="font-size: 70px;">{{ $table->no_meja }}</h1>
                        {{-- <h1 class="box-title" style="font-size: 30px;">KIM-JF</h1> --}}
                    </div>
                </div>
                <div class="row mb-4 mt-5">
                    <div class="col-3">
                        <table class="table-sm text-white">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $transaction->nama_pemesan }}</td>
                                </tr>
                                <tr>
                                    <td>No. Hp</td>
                                    <td>:</td>
                                    <td>{{ $transaction->nomorhp }}</td>
                                </tr>
                                <tr>
                                    <td>Invoice</td>
                                    <td>:</td>
                                    <td>#{{ $transaction->kode }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{ $transaction->created_at->isoFormat('D') }}/{{ $transaction->created_at->isoFormat('M') }}/{{ $transaction->created_at->isoFormat('Y') }}. {{ $transaction->created_at->format('H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="table table-sm text-white">
                        <thead>
                            <tr>
                                <th>Menu</th>
                                <th class="text-center">Harga</th>
                                <th class="text-end">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaction->TransactionItem as $item)
                                <tr>
                                    <td>
                                        <div style="font-weight: 300;">{{ $item->product->name }}</div>
                                        <small style="font-weight: 300;">x{{ $item->quantity }}</small>
                                    </td>
                                    <td>
                                        <div class="justify-content-center d-flex mt-2" style="font-weight: 300; font-size: 13px;">
                                            <div>Rp.&nbsp;</div>
                                            <div>{{ number_format($item->harga, 0, ',', '.') }}</div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex me-auto mt-2" style="font-size: 13px; color: rgb(255, 85, 0);">
                                            <div class="ms-auto">Rp.&nbsp;</div>
                                            <div>{{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th colspan="2" class="text-start" style="font-weight: 300;">Sub Total</th>
                                <th>
                                    <div class="d-flex" style="font-weight: 300;">
                                        <div class="ms-auto">Rp.&nbsp;</div>
                                        <div>{{ number_format($transaction->subtotal, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-start" style="font-weight: 300;">Pajak
                                    <small>11%</small>
                                </th>
                                <th>
                                    <div class="d-flex" style="font-weight: 300;">
                                        <div class="ms-auto">Rp.&nbsp;</div>
                                        <div>{{ number_format($transaction->pajak, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2" class="text-start fw-bold" style="font-size: 15px;">Total</th>
                                <th>
                                    <div class="d-flex" style="color: orange; font-size: 15px;">
                                        <div class="ms-auto">Rp.&nbsp;</div>
                                        <div>{{ number_format($transaction->total, 0, ',', '.') }}</div>
                                    </div>
                                </th>
                            </tr>
                        </tfoot> --}}
                    </table>
                    <div class="d-flex">
                        <h6 style="font-weight: 500;">Sub Total</h6>
                        <small class="ms-auto" style="font-weight: 500;">Rp. {{ number_format($transaction->subtotal, 0, ',', '.') }}</small>
                    </div>
                    <div class="d-flex">
                        <h6 style="font-weight: 500;">Pajak <small style="font-weight: 500;">11%</small></h6>
                        <small class="ms-auto" style="font-weight: 500;">Rp. {{ number_format($transaction->pajak, 0, ',', '.') }}</small>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <h5 style="font-weight: bolder;">Total</h5>
                        <h5 class="ms-auto" style="color: rgb(255, 85, 0); font-weight: bolder;">Rp. {{ number_format($transaction->total, 0, ',', '.') }}</h5>
                    </div>
                </div>
                <div class="mt-5 text-center" style="background: white; padding: 15px;">
                    {!! QrCode::size(250)->generate('kimjf.online/invoice/' . $table->id . '/' . $transaction->id) !!}
                </div>
                <div class="content-block">
                    <h6 class="text-white text-center mt-3 mb-5" style="font-weight: bolder;">Silahkan Menuju ke Kasir Untuk Melakukan Pembayaran</h6>
                </div>
                <div class="d-flex justify-content-center">
                    <img src="/image/kimwhite1.png" style="height: 40px;">
                </div>
                <div class="content-block text-white text-center mt-1">
                    <small>KIM-JF. SMKTAG, Surabaya</small>
                </div>
            </div>
        </div>
        <div class="d-flex gap-4 justify-content-center mb-4">
            <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"id="printPageButton">Beranda</button>
            <button class="btn btn-success" onClick="window.print();" id="printPageButton">Unduh</button>
        </div>
    </div>


    <script>
        let btn = document.getElementById('btn');
        let box = document.getElementById('box');

        btn.addEventListener('click', function() {
            html2PDF(box, {
                jsPDF: {
                    format: 'a4',
                },
                imageType: 'image/jpeg',
                output: 'table.pdf'
            });
        });

        // Sweetalert
        $('.back-confirm').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin Untuk Kembali?',
                text: 'Pastikan untuk mengunduh/screenshot invoice anda',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>

    <script>
        function showTime() {
            var date = new Date(),
                utc = new Date(Date.UTC(
                    date.getFullYear(),
                    date.getMonth(),
                    date.getDate(),
                    date.getHours(),
                    date.getMinutes(),
                    date.getSeconds()
                ));

            document.getElementById('time').innerHTML = utc.toLocaleTimeString();
        }

        setInterval(showTime, 1000);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

</body>

</html>
