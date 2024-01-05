<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('image/kimwhite1.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <title>KIM-JF Menu</title>
    @laravelPWA
    {{-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/shimawhite.png') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <script src="https://kit.fontawesome.com/3b14d7c563.js" crossorigin="anonymous"></script>

    <style>
        body {
            user-select: none;
        }

        .navbar-bar {
            color: #000;
            font-size: 25px;
            cursor: pointer;
            margin-left: 45px;
        }

        .dashboard-btn {
            background-color: transparent;
            padding-top: 5px;
            margin-top: 15px;
            margin-bottom: 10px;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 20px;
        }

        .button-menu {
            border: none;
            font-size: 15px;
            outline: none;
            padding: 6px 8px;
            background-color: transparent;
            cursor: pointer;
            border-radius: 20px;
            margin-left: 5px;
            margin-bottom: 5px;
            color: #000;
        }

        .button-menu::after {
            content: '';
            background-color: transparent;
            display: block;
            height: 3px;
            position: relative;
            left: -1.3em;
            bottom: 0rem;
            width: calc(100% + 2.6em);
        }

        .button-menu:hover {
            background-color: rgb(145, 145, 145);
        }

        /* .button-menu.active::after {
            content: '';
            background-color: rgba(255, 166, 0, 0.374);
            display: block;
            margin-left: 10px;
            height: 3px;
            position: relative;
            left: -1.3em;
            bottom: 0rem;
            width: calc(100% + 1em);
        } */

        .button-menu.active {
            background-color: transparent;
            color: rgba(255, 0, 0, 1);
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
            width: 160px;
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

        .box.box-small {
            width: 130px;
            height: 110px;
        }

        .box-title {
            font-size: 90px;
            /* font-size: 50px; */
            z-index: 10;
        }

        .box .box-title-small {
            /* font-size: 28px; */
            font-size: 48px;
        }

        @keyframes anime {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .filterDiv {
            display: none;
        }

        .show {
            display: block;
        }

        .badge {
            color: white;
            background: red;
        }

        .span-qty-card {
            padding: 0 .5rem;
        }

        /* Laptop View */

        @media screen and (max-width: 1240px) {
            .no-meja {
                /* margin-top: 50px; */
            }
        }

        .navbar-toggler::after {
            border: none;
            outline: none;
            scroll-behavior: smooth;
        }

        .dropdown::after {
            border: none;
            outline: none;
            scroll-behavior: smooth;
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
            border: none;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="modal fade" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content overflow-y-auto">
                <div class="modal-header d-flex justify-content-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pesanan Anda</h1>
                </div>
                <div class="modal-body">
                    <?php $subtotal = 0; ?>
                    @if ($transactionPendings)
                        @foreach ($transactionPendings as $result)
                            <?php $subtotal += (int) $result->harga * $result->quantity; ?>
                            <div class="row g-2">
                                <div class="col-3">
                                    <img class="rounded w-100 mb-3" src="{{ asset('upload/product/' . $result->product->image) }}" style="height: 60px;">
                                </div>
                                <div class="col-4 mt-3">
                                    <p class="mb-0" style="font-size: 14px;">{{ $result->product->name }}</p>
                                    <p style="font-size: 13px;"><strong>Rp. {{ number_format((int) $result->harga * (int) $result->quantity, 0, ',', '.') }}</strong></p>
                                </div>
                                <div class="col-5 mt-3">
                                    <button type="button" x-on:click="quantity == 0 ? 0 : quantity--" data-id="{{ $result->product_id }}" class="btn btn-minus btn-primary btn-sm rounded" style="background-color:transparent;color:#000;border:1px solid #000;padding:2px 4px 2px 4px">
                                        <i class="bi bi-dash" style="font-size: 13px;"></i>
                                    </button>
                                    <span class="span-qty-card" x-text="quantity">{{ $result->quantity }}</span>
                                    <button type="button" x-on:click="quantity++" data-id="{{ $result->product_id }}" class="btn btn-plus btn-primary btn-sm rounded" style="background-color:transparent;color:#000;border:1px solid #000;padding:2px 4px 2px 4px">
                                        <i class="bi bi-plus" style="font-size: 13px;"></i>
                                    </button>
                                    <button type="button" data-id="{{ $result->product_id }}" class="btn btn-delete ms-auto" style="outline:none; border: none;">
                                        <i class="fas fa-trash" style="color: red; font-size: 17px; outline: none;"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary w-100 h-100" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-3">
        <div class="row g-0">
            <nav class="navbar navbar-expand-lg" style="position: fixed; z-index: 111; border: none; outline: none; scroll-behavior: smooth; background-color: #212529;">
                <div class="dropdown" id="menu-header" style="border: none; outline: none;">
                    <button class="navbar-toggler dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-expanded="false" style="border: none; outline: none; scroll-behavior: smooth;">
                        <span class="bi bi-justify" style="color: white; font-size: 30px;"></span>
                    </button>
                    <div class="dropdown-menu" style="border-bottom-right-radius: 30px !important; margin-top: -50px; margin-bottom: 100px; scroll-behavior: smooth;">
                        <div class="text-center mt-2" id="close">
                            <i class="bi bi-grid-fill" style="color: #212529; font-size: 20px;"></i>
                        </div>
                        <div class="dashboard-btn" id="myBtnContainer" style="text-align: left;">
                            <button class="button-menu active" onclick="filterSelection('semua')" style="font-weight: 400;">
                                <i class="bi bi-grid-fill" style="font-weight: bolder !important; font-size: 17px;"></i>&nbsp;
                                Semua</button>
                            @foreach ($category as $item)
                                <button class="button-menu" onclick="filterSelection('{{ Str::slug($item->nama_kategori) }}')" style="font-weight: 400;">
                                    <i class="fas fa-{{ $item->icon }}" style="font-size: 17px; font-weight: bolder !important;"></i>&nbsp;
                                    {{ $item->nama_kategori }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-1 gap-1">
                    <a href="/{{ $table->id }}" class="navbar-brand text-decoration-none mt-1 mx-auto">
                        <h3 style="top: 32px; color: #fff; font-size: 17px;">KIM-JF</h3>
                    </a>
                    <img src="/image/kimwhite1.png" alt="logo" class="logo-image" style="width: 50px; object-fit: contain; margin-right: 13px;">
                </div>
            </nav>
            <div class="w-100" style="height: 275px;">
                <div class="col-12" id="col-box">
                    <div class="p-4 text-center mt-5">
                        {{-- <h3 class="text-white mb-3 no-meja">No. Meja</h3> --}}
                        <h5 class="text-white mb-3 no-meja">NOMOR MEJA</h5>
                        <div class="card bg-transparent border-0">
                            <div class="box mx-auto text-white" id="box">
                                <h1 class="box-title" id="box-title">{{ $table->no_meja }}</h1>
                                {{-- <h1 class="box-title" id="box-title"></h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-0 ms-2 me-2 mt-2">
            <div class="col-12">
                <h3 class="text-white mt-5" id="filter"></h3>
                <div class="row g-3">
                    @foreach ($products as $item)
                        @php
                            $transactionPending = \App\Models\TransactionPending::where('session', session()->get('session'))
                                ->where('product_id', $item->id)
                                ->first();
                            $transaction_qty = $transactionPending ? $transactionPending->quantity : 0;
                        @endphp
                        <div class="col-6 mb-4 filterDiv {{ Str::slug($item->category->nama_kategori) }}">
                            <form action="{{ url('add-to-cart/' . $item->id) }}" method="POST">
                                @csrf
                                <div x-data="{ quantity: {{ $transaction_qty }} }">
                                    <input type="hidden" name="quantity" x-model="quantity">
                                    <div class="modal fade" id="product-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->name }}</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-center w-100">
                                                        <img src="{{ asset('upload/product/' . $item->image) }}" class="rounded" style="height: 150px; width: 175px; object-fit: cover;">
                                                    </div>
                                                    <div class="mt-4">
                                                        <p style="text-align: justify;">{{ $item->description }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-start">
                                                    <div class="align-items-center">
                                                        <h1 class="fs-5 font-weight-bolder">Rp. {{ number_format($item->price, 0, ',', '.') }}</h1>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 ms-auto">
                                                        <div>
                                                            <button type="button" x-on:click="quantity == 0 ? 0 : quantity--" data-id="{{ $item->id }}" class="btn btn-minus btn-primary btn-sm rounded" style="background-color: transparent; color: #000; border: 1px solid #000; padding: 2px 4px 2px 4px">
                                                                <i class="bi bi-dash" style="font-size: 13px;"></i>
                                                            </button>
                                                        </div>
                                                        <div>
                                                            <span id="span-modal-{{ $item->id }}">{{ $transaction_qty }}</span>
                                                        </div>
                                                        <div>
                                                            <button type="button" x-on:click="quantity++" data-id="{{ $item->id }}" class="btn btn-plus btn-primary btn-sm rounded" style="background-color: transparent; color: #000; border: 1px solid #000; padding: 2px 4px 2px 4px">
                                                                <i class="bi bi-plus" style="font-size: 13px;"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-success btn-sm" style="background-color: orange; color: white; border: 1px solid orange">+ Add</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative overflow-hidden mb-2" data-bs-toggle="modal" data-bs-target="#product-{{ $item->id }}">
                                        <img src="{{ asset('upload/product/' . $item->image) }}" class="w-100 rounded" style="height: 150px; object-fit: cover;">
                                        <div class="position-absolute" style="right: 10px; bottom: 10px;">
                                            <span class="badge rounded-pill" style="background: rgba( 255, 255, 255, 0.5 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );backdrop-filter: blur( 2px );-webkit-backdrop-filter: blur( 2px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 ); color: #000; font-weight: bolder;">Rp. {{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                    <h6 class="text-white text-center">{{ $item->name }}</h6>
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                        <div>
                                            <button type="button" x-on:click="quantity == 0 ? 0 : quantity--" data-id="{{ $item->id }}" class="btn btn-minus btn-sm rounded align-items-center" style="background-color: transparent; color: white; border: 0.1px solid white; padding: 2px 4px 2px 4px">
                                                <i class="bi bi-dash" style="font-size: 15px;"></i>
                                            </button>
                                        </div>
                                        <div>
                                            <span id="span-card-{{ $item->id }}" class="text-white">{{ $transaction_qty }}</span>
                                        </div>
                                        <div>
                                            <button type="button" x-on:click="quantity++" data-id="{{ $item->id }}" class="btn btn-plus btn-sm rounded align-items-center" style="background-color: transparent; color: white; border: 0.1px solid white; padding: 2px 4px 2px 4px"><i class="bi bi-plus" style="font-size: 15px;"></i></button>
                                        </div>
                                        {{-- <div class="ms-auto">
                                            <button type="submit" class="btn btn-success btn-sm" style="background-color: orange; color: white; border: transparent">+ Add</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="fixed-bottom">
                <div class="row g-0">
                    <div class="col-9 bg-white" style="border-top-left-radius: 10px;">
                        <div class="d-flex align-items-center justify-content-center ms-2 me-3" style="padding-top: 10px; padding-bottom: 10px;">
                            <div>
                                <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#cart" class="text-decoration-none">
                                    <i class="fas fa-shopping-basket" style="margin-top: 8px; margin-left: 5px; font-size: 23px; color: #0d6efd;"></i>
                                    <span class="footer-count badge" style="position: absolute; margin-top: 2px; font-size: 10px;">{{ $count }}</span>
                                </a>
                            </div>
                            <div class="ms-auto">
                                {{-- <h6 class="mb-0" style="font-weight: bold;">Rp. {{ number_format($subtotal, 0, ',', '.') }}</h6> --}}
                                <h6 class="mb-0 footer-subtotal" style="font-weight: bold;"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <a href="/cart/{{ $table->id }}">
                            <button class="btn btn-info w-100 rounded-0" style="border-top-right-radius: 10px !important; background-color: #0d6efd; color: white; border: none; font-weight: bold; padding-top: 15px; padding-bottom: 16px;">Lanjut</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('/sw.js') }}"></script>

    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>

    <script>
        filterSelection("semua")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("filterDiv");

            const elem = document.getElementById('filter');
            elem.textContent = c.toUpperCase();

            if (c == "semua") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
                // document.getElementById('dialog-title').innerHTML = name;
                // document.getElementById('filter').innerHTML = filter;

            }

            // document.getElementById('filter') = c;
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }

        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("button-menu");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }

        $('.addAttr').click(function() {
            var id = $(this).data('id');

            $('#id').val(id);
        });

        const col_box = document.querySelector('#col-box');
        const box = document.querySelector('#box');
        const box_title = document.querySelector('#box-title');
        const myDropdown = document.getElementById('menu-header')

        myDropdown.addEventListener('shown.bs.dropdown', function() {
            // console.log('masuk');

            col_box.classList.toggle("col-12");
            col_box.classList.toggle("col-6");
            col_box.classList.toggle("offset-6");

            box.classList.toggle("box-small");

            box_title.classList.toggle("box-title-small");
        })

        myDropdown.addEventListener('hidden.bs.dropdown', function() {
            col_box.classList.toggle("col-12");
            col_box.classList.toggle("col-6");
            col_box.classList.toggle("offset-6");

            box.classList.toggle("box-small");

            box_title.classList.toggle("box-title-small");

        })


        // var ele = document.getElementById('container');
        // if (ele) {
        //     ele.style.visibility = "visible";
        // }

        // bind the onscroll event to window
        window.onscroll = () => {
            // console.log('ke scroll');
            $('.navbar-toggler').dropdown('hide');
        };
    </script>

    <script>
        $(document).ready(function() {

            initSubTotal();
            initCount();

            $(document).on('click', '.btn-plus', function(e) {
                // console.log('masuk');
                let product_id = $(this).data('id');

                $.ajax({
                    url: "api/increment/" + product_id + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        console.log(res);
                        initCart();
                        initCount();

                        console.log($('#span-card-' + product_id));
                        $('#span-card-' + product_id).html(res);
                        $('#span-modal-' + product_id).html(res);
                    }
                });
            });

            $(document).on('click', '.btn-minus', function(e) {
                // console.log('masuk');
                let product_id = $(this).data('id');

                $.ajax({
                    url: "api/decrement/" + product_id + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        // console.log(res);
                        initCart();
                        initCount();

                        console.log($('#span-card-' + product_id));
                        $('#span-card-' + product_id).html(res);
                        $('#span-modal-' + product_id).html(res);
                    }
                });
            });

            $(document).on('click', '.btn-delete', function(e) {
                // console.log('masuk');
                let product_id = $(this).data('id');

                $.ajax({
                    url: "api/delete/" + product_id + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        initCart();
                        initCount();

                        $('#span-card-' + product_id).html(res);
                        $('#span-modal-' + product_id).html(res);
                    }
                });
            });

            function initCart() {
                $.ajax({
                    url: "api/getCart" + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(result) {
                        // console.log(result);
                        // console.log(result[0].product.name);

                        // console.log(result[0].quantity);

                        $('#cart .modal-body').html('');

                        result.forEach(element => {

                            let product = "{{ asset('upload/product') }}/" + element.product.image;

                            let price = parseInt(element.product.price) * parseInt(element.quantity);

                            let total = new Intl.NumberFormat("id-ID").format(price);

                            let list_cart = '<div class="row g-2"><div class="col-3"><img class="rounded w-100 mb-3" src="' + product + '" style="height:60px"></div><div class="col-4 mt-3"><p class="mb-0" style="font-size: 14px;">' + element.product.name + '</p><p style="font-size: 13px;"><strong>Rp. ' + total + '</strong></p></div><div class="col-5 mt-3"><button type="button" x-on:click="quantity == 0 ? 0 : quantity--" class="btn-minus btn-primary btn-sm rounded" data-id="' + element.product.id + '" style="background-color:transparent; color:#000; border:1px solid #000; padding:2px 4px 2px 4px"><i class="bi bi-dash" style="font-size: 13px;"></i></button><span class="span-qty-card">' + element.quantity + '</span><button type="button" x-on:click="quantity++" class="btn-plus btn-primary btn-sm rounded" data-id="' + element.product.id + '" style="background-color:transparent;color:#000;border:1px solid #000;padding:2px 4px 2px 4px"><i class="bi bi-plus" style="font-size: 13px;"></i></button><button type="button" data-id="' + element.product.id + '" class="btn btn-delete ms-auto" style="outline: none; border: none;"><i class="fas fa-trash" style="color: red; font-size: 17px; outline: none;"></i></button></div></div>';

                            let current_html = $('#cart .modal-body').html();

                            $('#cart .modal-body').html(current_html + list_cart);

                        });


                        initSubTotal();
                        initCount();
                    }
                });
            }

            function initSubTotal() {
                $.ajax({
                    url: "api/getSubTotal" + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(result) {
                        let subtotal = result[0];

                        $('.footer-subtotal').html(subtotal);
                    }
                });
            }

            function initCount() {
                $.ajax({
                    url: "api/getCount" + "/{{ session()->get('session') }}",
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(result) {
                        // let subtotal = result[0];

                        $('.footer-count.badge').html(result);
                    }
                });
            }
        });

        $('#close').click(function(e) {
            e.preventDefault();
            $('#dropdownMenuButton1').click();
        });
    </script>
</body>

</html>
