@extends('dashboard.layouts.backenddashboard')

@section('styles')
    <style>
        .preview-image:hover {
            opacity: 0.7;
            box-shadow: 3px 3px 3px 3px black;
            transition-delay: 0.2s;
        }

        .button-menu {
            border: none;
            font-weight: bolder;
            font-size: 17px;
            outline: none;
            padding: 6px 8px;
            background-color: transparent;
            cursor: pointer;
            border-radius: 20px;
            margin-left: 5px;
            margin-bottom: 5px;
            color: #000s;
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

        .button-menu.active::after {
            content: '';
            background-color: rgba(0, 30, 255, 0.374);
            display: block;
            margin-left: 10px;
            height: 3px;
            position: relative;
            left: -1.1em;
            bottom: 0rem;
            width: calc(100% + 1em);
        }

        .button-menu.active {
            background-color: transparent;
            color: #007bff;
        }

        .filterDiv {
            display: none;
        }

        .show {
            display: block;
        }
    </style>
@endsection

@section('date')
    {{ $waktu }}
@endsection

@section('welcome')
    <div class="d-flex mt-2 gap-2">
        <p class="text-center m-sm-auto">Halo {{ auth()->user()->name }}!</p>
        <p class="text-center m-sm-auto">Selamat Bekerja <i class="far fa-smile-wink"></i>
        </p>
    </div>
@endsection

@section('text')
    {{-- Modal Tambah Meja --}}
    <div class="modal fade" id="tambahmejamakan" tabindex="-1" aria-labelledby="tambahmejamakan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahmejamakan">Tambah Meja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/dashboard/posts" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <div class="form-label">Nomor Meja</div>
                                    <input type="number" class="form-control mb-3" placeholder="Contoh : 03" name="no_meja" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if ($message = Session::get('berhasil'))
        <div class="alert alert-success alert-block d-none" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <br>
    <div class="row d-flex overflow-x-auto">
        <div class="col-8">
            <div class="card" style="height: 531px; background: whitesmoke;">
                <div class="card-header">
                    <h3 class="card-title" style="float: none; display: grid; text-align: center; font-weight: bolder; font-size: 30px;">Daftar Menu & Produk</h3>
                </div>
                <div class="card-body">
                    <div class="dashboard-btn" id="myBtnContainer" style="text-align: center;">
                        <button class="button-menu active" onclick="filterSelection('semua')">Semua</button>
                        @foreach ($category as $item)
                            <button class="button-menu" onclick="filterSelection('{{ Str::slug($item->nama_kategori) }}')"> {{ $item->nama_kategori }}</button>
                        @endforeach
                    </div>
                    <h5 class="text-black text-center rounded" id="filter" style="font-weight: bolder; background-color: whitesmoke; margin-top: 20px; margin-bottom: 20px;"></h5>
                    <div class="row g-3 overflow-y-auto" style="height: 313px;">
                        @foreach ($products as $item)
                            <div class="col-4 filterDiv {{ Str::slug($item->category->nama_kategori) }}">
                                <div class="modal fade" id="previewmenu{{ $item->id }}" tabindex="-1" aria-labelledby="#previewmenu" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="#previewmenu">Preview Menu/Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/menu/update/{{ $item->id }}" method="POST" enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-4">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="d-flex gap-2">
                                                                        <h5>Nama Menu</h5>
                                                                        <h5 style="margin-left: 75px;">Harga Menu</h5>
                                                                    </div>
                                                                    <div class="d-flex gap-2">
                                                                        <input disabled type="text" class="form-control mb-3" placeholder="Berikan Nama..." name="name" value="{{ $item->name }}" required autofocus>
                                                                        <input disabled type="number" class="form-control mb-3" placeholder="Masukkan Harga..." value="{{ $item->price }}" name="price" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <h5>Kategori Menu</h5>
                                                                        <select disabled name="category_id" class="form-select" required>
                                                                            <option value="">-- Pilih Kategori --</option>
                                                                            @foreach ($category as $result)
                                                                                <option value="{{ $result->id }}" {{ $result->id == $item->category_id ? 'selected' : null }}>{{ $result->nama_kategori }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <div class="form-label" style="font-size: 20px;">Gambar Menu</div>
                                                                        <input disabled type="file" name="image" id="edit_foto_{{ $item->id }}" accept=".png,jpg,.jpeg" class="form-control">
                                                                    </div>
                                                                    <div class="form-label" style="font-size: 20px;">Deskripsi Menu</div>
                                                                    <textarea disabled name="description" class="form-control" placeholder="Deskripsi Menu..." required style="padding-bottom: 50px;">{{ $item->description }}</textarea>
                                                                </div>
                                                                <div class="col-6">
                                                                    <img id="preview-edit-foto-{{ $item->id }}" src="{{ $item->image == null ? 'https://www.qpip.org/modules/typify/qpip_dashboard/img/user-thumbnail.png' : asset('upload/product/' . $item->image) }}" alt="preview image" class="w-100" style="object-fit:contain; border-radius: 10px;" loading="lazy">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#previewmenu{{ $item->id }}">
                                        <img src="{{ asset('upload/product/' . $item->image) }}" class="preview-image w-100" style="border-radius: 10px; height: 90px; object-fit: cover;">
                                        <div class="position-relative d-flex justify-content-end" style="right: 7px; bottom: 27px;">
                                            <span class="badge rounded-pill" style="background: rgba( 255, 255, 255, 0.5 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ); backdrop-filter: blur( 2px ); -webkit-backdrop-filter: blur( 2px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 ); color: #000; font-weight: bolder;">{{ $item->name }}</span>
                                        </div>
                                        <div class="position-relative d-flex justify-content-end" style="right: 142px; top: -100px;">
                                            <span class="badge rounded-pill" style="background: rgba( 255, 255, 255, 0.5 );box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ); backdrop-filter: blur( 2px ); -webkit-backdrop-filter: blur( 2px );border-radius: 10px;border: 1px solid rgba( 255, 255, 255, 0.18 ); color: #000; font-weight: bolder;">{{ $item->price }}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            {{-- <div class="card">
                <div class="card-header">
                    <h1 class="card-title" style="font-weight: bolder; font-size: 30px; float: none; display: grid; text-align: center;">Daftar Meja</h1>
                    <div class="card-tools">
                        </span>
                    </div>
                </div>
                <div class="card-body overflow-y-auto" style="height: 200px;">
                    @foreach ($tables as $item)
                        <div class="d-flex gap-1 align-items-center mb-2">
                            <div class="col-2">
                                <span class="fas fa-table" style="font-size: 35px;"></span>
                            </div>
                            <div class="col-7">
                                <h6 class="text-black" style="margin-left: 5px;">{{ $item->nama_meja }}</h6>
                            </div>
                            <div class="col-3">
                                <a href="/admin/dashboard/destroy/{{ $item->id }}" class="btn btn-danger delete-confirm rounded" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Meja">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}
            <div>
                <div class="card" style="background: whitesmoke;">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h1 class="card-title" style="font-weight: bolder; font-size: 25px; float: none; display: grid; text-align: center; justify-content: left;">Generate QR Code</h1>
                            <span class="ms-auto" data-bs-toggle="modal" data-bs-target="#tambahmejamakan">
                                <button class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Meja" style="border-radius: 50%">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </span>
                        </div>
                        <div class="card-tools">
                        </div>
                    </div>
                    <div class="card-body overflow-y-auto" style="height: 470px;">
                        @foreach ($tables as $item)
                            <div class="d-flex gap-1 align-items-center mb-3">
                                <div class="col-2">
                                    <span class="fas fa-table" style="font-size: 35px; color: #000000b0;"></span>
                                </div>
                                <div class="3">
                                    <span>Meja {{ $item->no_meja }}</span>
                                </div>
                                <div class="ms-auto">
                                    <a href="/admin/dashboard/destroy/{{ $item->id }}" class="btn btn-danger btn-sm rounded delete-confirm" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Meja">
                                        <i class="fas fa-trash" style="font-size: 15px;"></i>
                                    </a>
                                    <span data-bs-toggle="modal" data-bs-target="#editmenu{{ $item->id }}">
                                        <button type="button" class="btn btn-warning btn-sm rounded text-black" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Meja">
                                            <i class="fas fa-pen" style="font-size: 15px;"></i>
                                        </button>
                                    </span>
                                    <a href="/admin/generate/{{ $item->id }}" class="btn btn-success btn-sm rounded" data-bs-toggle="tooltip" data-bs-placement="left" title="Download Qrcode">
                                        <i class="fas fa-download" style="font-size: 15px;"></i>
                                    </a>
                                </div>
                            </div>
                            {{-- Modal Edit Menu --}}
                            <div class="modal fade" id="editmenu{{ $item->id }}" tabindex="-1" aria-labelledby="#editmenu" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="#editmenu">Edit Meja Makan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/admin/dashboard/update/{{ $item->id }}" method="POST" enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mb-4">
                                                            <div class="form-label">Nomor Meja</div>
                                                            <input type="number" class="form-control mb-3" placeholder="Berikan Nomer Meja..." value="{{ $item->no_meja }}" name="no_meja" required autofocus>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning" style="border-radius: 10px;">
                                                    <i class="fas fa-pen"></i>
                                                    Update Meja</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
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
                var current = document.getElementsByClassName("button-menu active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
        $('.addAttr').click(function() {
            var id = $(this).data('id');
            $('#id').val(id);
        });


        $('.delete-confirm').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin?',
                text: 'Data Ini Akan Dihapus Secara Permanen!',
                icon: 'warning',
                buttons: ["Batal", "Hapus!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endpush
