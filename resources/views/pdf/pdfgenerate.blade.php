<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Code Table</title>
    <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        body {
            user-select: none;
            -webkit-print-color-adjust: exact;
            background-image: url("/image/bg.jpg");
        }

        .colored {
            background-color: #212529;
            /* background: rgb(255, 145, 0); */
            /* background: linear-gradient(315deg, rgba(255, 145, 0, 1) 47%, rgba(255, 84, 5, 1) 47%); */
        }

        .box {
            /* height: 1746px; */
            /* height: 671px; */
            /* height: 700px; */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .button-download {
            border: 3px solid #fff;
            border-radius: 10px;
            background: transparent;
            color: white;
            font-size: 30px;
            margin-top: 25px;
            margin-left: 380px;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="containter mt-1">
        <div class="ms-3">
            <a href="/admin/dashboard" class="btn btn-dark btn-sm" style="font-size: 25px;">
                <i class="bi bi-arrow-left"></i>
            </a>
        </div>
        <div class="container-fluid text-center">
            <div class="d-flex justify-content-center">
                <button id="btn" class="button-download" data-bs-toggle="tooltip" data-bs-target="left" title="Download QRcode">
                    <i class="bi bi-cloud-download"></i>
                </button>
                {{-- Canvas --}}
                <div id="box" class="box colored" style="height: 450px; width: 475px;">
                    <div class="d-flex align-items-center mt-3 mb-3 gap-4">
                        <img src="/image/kimwhite1.png" alt="logo" style="height: 80px; width: 90px; margin-right: 40px;">
                        <h1 style="font-size: 45px; color: white;">MEJA {{ $data->no_meja }}</h1>
                        {{-- <button id="btn" class="button-download" data-bs-toggle="tooltip" data-bs-target="left" title="Download QRcode">
                            <i class="bi bi-cloud-download"></i>
                        </button> --}}
                    </div>
                    <div>
                        <div class="p-3" style=" background: white;">
                            {!! QrCode::size(250)->generate('192.168.179.207:8000/' . $data->id) !!}
                        </div>
                    </div>
                    <h4 class="mt-3 text-white">SCAN TO VIEW OUR MENU</h4>
                </div>
                {{-- Tutup Canvas --}}
            </div>
        </div>
    </div>

    {{-- {{ $product->id }} --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.7/dist/html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

    <script>
        let btn = document.getElementById('btn');
        let page = document.getElementById('box');

        btn.addEventListener('click', function() {
            html2PDF(page, {
                jsPDF: {
                    format: 'a4',
                },
                imageType: 'image/jpeg',
                output: 'table.pdf'
            });
        });
    </script>
</body>

</html>
