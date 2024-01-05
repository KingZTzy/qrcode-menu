<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="containter mt-5">
        <div class="container-fluid">
            <div class="mb-3">
                <a href="/admin/meja-makan" class="btn btn-success">Kembali</a>
            </div>
            {!! QrCode::size(300)->generate('kimjf.online/meja/' . $product->id) !!}
        </div>
    </div>

    {{-- {{ $product->id }} --}}
</body>

</html>
