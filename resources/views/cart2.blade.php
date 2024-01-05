<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1.0">
    <title>Checkout & Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="/image/kimwhite1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<style>
    body {
        user-select: none;
        background: rgb(193, 192, 192);
    }

    .button-checkout {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: #0d6efd;
        font-size: 15px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        /* margin-top: 50px;
        margin-left: 75px; */
        letter-spacing: 4px;
        background-color: transparent;
        overflow: hidden;
        justify-items: center;
        justify-content: center;
        border: 2px solid #0d6efd;
        border-radius: 10px;
    }

    .button-checkout:hover {
        background: #0d6efd;
        color: #fff;
        border-radius: 10px;
        /* box-shadow: 0 0 5px orange, 0 0 25px orange, 0 0 50px orange, 0 0 100px orange; */
    }

    .button-checkout:disabled,
    button[disabled] {
        position: relative;
        display: inline-block;
        padding: 10px 20px;
        color: grey;
        font-size: 15px;
        text-decoration: none;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.5s;
        /* margin-top: 50px;
        margin-left: 75px; */
        letter-spacing: 4px;
        background-color: transparent;
        overflow: hidden;
        justify-items: center;
        justify-content: center;
        border: 2px solid grey;
        border-radius: 10px;
    }

    .box {
        position: relative;
        width: 190px;
        height: 170px;
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
        width: 150px;
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
        font-size: 100px;
        /* font-size: 50px; */
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

<body>
    <div class="container pt-3 pb-3">
        <form action="/checkout/{{ $table->id }}" method="POST">
            @csrf
            <div class="bg-dark rounded p-3 mb-3">
                <div class="d-flex mb-4 align-items-center justify-content-start">
                    <a href="/{{ $table->id }}" style="font-size: 17px; color:rgba(255, 255, 255, 0.858); text-decoration:none;">
                        <i class="bi bi-chevron-double-left text-white" style="font-size: 17px;"></i>
                        Pesanan Saya
                    </a>
                    <div class="ms-auto">
                        <img src="/image/kimwhite1.png" style="height: 60px;">
                    </div>
                </div>
                <div>
                    <div class="p-4 text-center mb-0 mb-3">
                        <h5 class="text-white mb-3 no-meja">NOMOR MEJA</h5>
                        <div class="card bg-transparent border-0">
                            <div class="box mx-auto text-white" id="box">
                                <h1 class="box-title" id="box-title">{{ $table->no_meja }}</h1>
                                {{-- <h1 class="box-title" id="box-title">KIM-JF</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-label text-white">
                        Nama Pemesan<span class="text-danger" style="font-size: 17px;"> *</span>
                    </div>
                    <input type="text" class="form-control" id="name" autocomplete="off" type="name" name="name" placeholder="Ketik Nama Anda..." for="name" required autofocus value="{{ old('name') }}">
                </div>
                <div class="mb-2">
                    <div class="form-label text-white">
                        No. Handphone<span class="text-danger" style="font-size: 17px;"> *</span>
                    </div>
                    <input type="number" class="form-control" id="nomorhp" autocomplete="off" type="nomorhp" name="nomorhp" placeholder="Ketik Nomor Hp Anda..." for="nomorhp" required value="{{ old('nomorhp') }}">
                </div>
            </div>
            <div class="bg-dark rounded p-3">
                <div class="row g-3 mb-3 overflow-x-auto">
                    <?php $subtotal = 0; ?>
                    @foreach ($transactionPending as $item)
                        <?php $subtotal += (int) $item->harga * $item->quantity; ?>
                        <div class="col-12">
                            <div class="row g-0 align-items-center">
                                <div class="col-6">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <img src="{{ asset('upload/product/' . $item->product->image) }}" style="height: 50px; border-radius: 15%;width: 50px;object-fit: cover;">
                                        </div>
                                        <div>
                                            <h6 class="text-white mb-0" style="font-size: 12px;">{{ $item->product->name }}</h6>
                                            <p class="text-white mb-0" style="font-size: 12px;">x{{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <p class="text-white mb-3" style="font-size: 12px;">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                                </div>
                                <div class="col-3 text-end">
                                    <p class="mb-3" style="font-size: 12px; color: rgb(255, 85, 0);">Rp. {{ number_format((int) $item->harga * (int) $item->quantity, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex mb-1">
                    <div class="text-white">Subtotal</div>
                    <div class="ms-auto text-white" style="font-weight: bold;">Rp. {{ number_format($subtotal, 0, ',', '.') }}</div>
                </div>
                <div class="d-flex">
                    <div class="text-white">Pajak
                        <Small>11%</Small>
                    </div>
                    <div class="ms-auto text-white" style="font-weight: bold;">
                        @php
                            $pajak = $subtotal * (11 / 100);
                        @endphp
                        Rp. {{ number_format($pajak, 0, ',', '.') }}
                    </div>
                </div>
                <hr class="my-3" style="border: 1px solid white; opacity: 0.8;">
                <div class="d-flex">
                    <div style="color: #fff; font-weight: bold; font-size: 20px;">Total</div>
                    <div class="ms-auto" style="color: rgb(255, 85, 0); font-size: 20px; font-weight: bold;">Rp. {{ number_format($subtotal + $pajak, 0, ',', '.') }}</div>
                </div>
                <div class="d-flex justify-content-center" style="margin-top: 90px;">
                    <button disabled class="button-checkout" id="submit" type="submit">Checkout</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>
        // submitButton
        const submitButton = document.getElementById('submit');
        var name_filled = 0;
        var nomorhp_filled = 0;

        $("#name").keyup(function() {
            var input = $(this);

            if (input.val() == "") {
                name_filled = 0;
            } else {
                name_filled = 1;
            }

            if (name_filled == 1 && nomorhp_filled == 1) {
                enableButton();
            } else {
                disableButton();
            }
        });

        $("#nomorhp").keyup(function() {
            var input = $(this);

            if (input.val() == "") {
                nomorhp_filled = 0;
            } else {
                nomorhp_filled = 1;
            }

            if (name_filled == 1 && nomorhp_filled == 1) {
                enableButton();
            } else {
                disableButton();
            }
        });

        function disableButton() {
            submitButton.disabled = true;
        }

        function enableButton() {
            submitButton.disabled = false;
        }
    </script>
</body>

</html>
