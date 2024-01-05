@extends('dashboard.layouts.backend')
@section('heading')
    @if ($message = Session::get('berhasil'))
        <div class="alert alert-success alert-block" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="d-flex gap-4 ms-3 me-3">
        <h1>Menu</h1>
        <div class="ms-auto">
            <span data-bs-toggle="modal" data-bs-target="#tambahmenu">
                <button class="btn btn-primary btn-sm rounded" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Menu">
                    <i class="fa fa-plus fa-sm"></i>
                    Tambah Menu</button>
            </span>
        </div>
    </div>
@endsection

@section('date')
    {{ $waktu }}
@endsection

@section('text')
    <!-- Modal Image -->
    @foreach ($products as $item)
        <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" aria-labelledby="imagemodal{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="imagemodal{{ $item->id }}">{{ $item->name }}</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <img id="imagemodal{{ $item->id }}" src="{{ asset('upload/product/' . $item->image) }}" alt="modal image" style="width: 300px; height: 200px; border-radius: 15px;" loading="lazy">
                        </div>
                        <div class="mt-4 mb-5">
                            <h4>Deskripsi Menu</h4>
                            <p>{{ $item->description }}</p>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <h4>Harga Menu</h4>
                                <P>Rp. {{ number_format($item->price, 0, ',', '.') }}</P>
                            </div>
                            <div class="col-4">
                                <h4>Kategori Menu</h4>
                                <P>{{ $item->category->nama_kategori }}</P>
                            </div>
                            {{-- <div class="col-4">
                                <h4>Status</h4>
                                <P>{{ $item->status == 1 ? 'Tersedia' : 'Tidak Tersedia' }}</P>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- Tutup Modal Image --}}


    <!-- Modal Tambah Menu -->
    <div class="modal fade" id="tambahmenu" tabindex="-1" aria-labelledby="tambahmenu" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content overflow-y-auto">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahmenu">Tambah Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/menu/posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex gap-2">
                                        <h5>Nama Menu</h5>
                                        <h5 style="margin-left: 90px;">Harga Menu</h5>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <input type="text" class="form-control mb-3" placeholder="Berikan Nama..." name="name" required autofocus>
                                        <input type="number" min="1" class="form-control mb-3" placeholder="Masukkan Harga..." name="price" required>
                                    </div>
                                    <div class="mb-3">
                                        <h5>Pilih Kategori</h5>
                                        <select name="category_id" class="form-select" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-label">Pilih Gambar</div>
                                        <input type="file" name="image" id="tambah_foto" accept=".png,jpg,.jpeg" class="form-control" required>
                                    </div>
                                    <div class="form-label">Deskripsi</div>
                                    <textarea name="description" class="form-control" placeholder="Deskripsi Menu..." required style="padding-bottom: 50px;"></textarea>
                                </div>
                                <div class="col-6">
                                    <img id="preview-tambah-foto" src="https://www.freeiconspng.com/thumbs/fast-food-png/related-icons-fast-food-icon-forbidden-to-eat-food-icon-hamburger-icon--27.png" alt="preview image" class="w-100" style="object-fit:contain; border-radius: 10px;" loading="lazy">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Tutup Modal Tambah Menu --}}

    <div class="card-body overflow-x-auto">
        <table id="myTable" class="table table-bordered table-valign-middle">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th class="text-center">Gambar Menu</th>
                    <th class="text-center">Nama Menu</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Nama Kategori</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td style="font-weight: bolder; text-align: center;">{{ $loop->iteration }}.</td>
                        <td class="text-center">
                            <img src="{{ asset('upload/product/' . $item->image) }}" data-bs-toggle="modal" data-bs-target="#imagemodal{{ $item->id }}" class="w-100" style="border-radius: 10px; height: 90px; object-fit: cover; cursor: pointer;">
                        </td>
                        <td class="text-center">{{ $item->name }}
                        </td>
                        <td class="text-center">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="text-center">{{ $item->category->nama_kategori }}</td>
                        <td class="text-center td-status">
                            <div class="rounded {{ $item->status ? 'bg-success' : 'bg-danger' }} td-color">{{ $item->status == 1 ? 'Tersedia' : 'Habis' }}</div>
                        </td>
                        <td class="text-center">
                            <a href="/admin/menu/destroy/{{ $item->id }}" data-bs-toggle="tooltip" data-bs-target="left" title="Hapus Menu" class="btn btn-danger btn-sm rounded-3 delete-confirm text-white">
                                <i class="fa fa-trash" style="font-size: 15px; padding-left: 1.5px; padding-right: 1.5px;"></i>
                            </a>
                            <span data-bs-toggle="modal" data-bs-target="#editmenu{{ $item->id }}">
                                <button type="button" class="btn btn-warning btn-sm rounded-3 text-black" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Menu">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </span>
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input status" data-id="{{ $item->id }}" data-csrf="{{ csrf_token() }}" type="checkbox" role="switch" id="flexSwitchCheckDefault{{ $item->id }}" name="status" style="margin-left: -1.2em !important; cursor: pointer;" {{ $item->status == 1 ? 'checked' : null }} data-bs-toggle="tooltip" data-bs-placement="left" title="Ubah Status">
                                <label class="form-check-label" for="flexSwitchCheckDefault{{ $item->id }}" style="margin-left: 1.5em; cursor: pointer;"></label>
                            </div>
                        </td>
                    </tr>

                    {{-- Modal Edit Menu --}}
                    <div class="modal fade" id="editmenu{{ $item->id }}" tabindex="-1" aria-labelledby="#editmenu" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="#editmenu">Edit Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/admin/menu/update/{{ $item->id }}" method="POST" enctype="multipart/form-data" id="myForm">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="d-flex gap-2">
                                                        <h5>Nama Menu</h5>
                                                        <h5 style="margin-left: 90px;">Harga Menu</h5>
                                                    </div>
                                                    <div class="d-flex gap-2">
                                                        <input type="text" class="form-control mb-3" placeholder="Berikan Nama..." name="name" value="{{ $item->name }}" required autofocus>
                                                        <input type="number" class="form-control mb-3" placeholder="Masukkan Harga..." value="{{ $item->price }}" name="price" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <h5>Kategori Menu</h5>
                                                        <select name="category_id" class="form-select" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                            @foreach ($category as $result)
                                                                <option value="{{ $result->id }}" {{ $result->id == $item->category_id ? 'selected' : null }}>{{ $result->nama_kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        {{-- <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="tersedia" style="margin-left: -1.2em !important" value="1">
                                                            <label class="form-check-label" for="flexSwitchCheckDefault" style="margin-left: 1.5em;">Tersedia</label>
                                                        </div> --}}
                                                        {{-- <h5>Status Menu</h5> --}}
                                                        {{-- <div class="row ms-1">
                                                            @foreach ($status as $result)
                                                                <div class="col-6">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio" name="status_id" value="{{ $result->id }}" id="btn-{{ $result->id }}" {{ $result->id == $item->status_id ? 'checked' : null }}>
                                                                        <label class="form-check-label" for="btn-{{ $result->id }}">
                                                                            {{ $result->status }}
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div> --}}
                                                        {{-- <select name="status_id" class="form-select" required>
                                                            @foreach ($status as $result)
                                                                <option value="{{ $result->id }}" {{ $result->id == $item->status_id ? 'selected' : null }}>{{ $result->status }}</option>
                                                            @endforeach
                                                        </select> --}}
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-label" style="font-size: 20px;">Gambar Menu</div>
                                                        <input type="file" name="image" id="edit_foto_{{ $item->id }}" accept=".png,jpg,.jpeg" class="form-control">
                                                    </div>
                                                    <div class="form-label" style="font-size: 20px;">Deskripsi Menu</div>
                                                    <textarea name="description" class="form-control" placeholder="Deskripsi Menu..." required style="padding-bottom: 50px;">{{ $item->description }}</textarea>
                                                </div>
                                                <div class="col-6">
                                                    <img id="preview-edit-foto-{{ $item->id }}" src="{{ $item->image == null ? 'https://www.qpip.org/modules/typify/qpip_dashboard/img/user-thumbnail.png' : asset('upload/product/' . $item->image) }}" alt="edit image" class="w-100" style="object-fit:contain; border-radius: 10px;" loading="lazy">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning" style="border-radius: 10px;">
                                            <i class="fas fa-pen"></i>
                                            Update Menu</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Tutup Modal Edit Menu --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('javascript')
    <script type="text/javascript">
        $(document).ready(function(e) {
            $('#tambah_foto').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-tambah-foto').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
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
    @foreach ($products as $item)
        <script>
            $(document).ready(function(e) {
                $('#edit_foto_{{ $item->id }}').change(function() {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        $('#preview-edit-foto-{{ $item->id }}').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                });
            });
        </script>
    @endforeach

    <script type="text/javascript">
        $(function() {
            $(document).change('.status', function(e) {
                const btn_switch = $(e.target);
                // console.log(btn_switch);
                var status = btn_switch.prop('checked') == true ? 1 : 0;
                var menu_id = btn_switch.data('id');
                // console.log(btn_switch, status);
                // var csrf = btn_switch.data('csrf');
                // console.log(menu_id);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/menu/update-toogle',
                    data: {
                        'status': status,
                        'menu_id': menu_id
                    },
                    success: function(data) {
                        // console.log(data.success)
                        let status = parseInt(data.current_status) ? 'Tersedia' : 'Habis';
                        // let color = parseInt(data.current_status) ? 'bg-success' : 'bg-danger';
                        // let color_before = !parseInt(data.current_status) ? 'bg-success' : 'bg-danger';

                        // const td_status = btn_switch.parent().parent().parent().find('.td-status');
                        const div_status = btn_switch.parent().parent().parent().find('.td-color');

                        div_status.html(status);
                        div_status.toggleClass('bg-success');
                        div_status.toggleClass('bg-danger');
                        // btn_switch.parent().parent().parent().find('.td-status').html(status);
                    }
                });
            })
        })
    </script>
@endpush
