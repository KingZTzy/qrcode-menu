@extends('dashboard.layouts.backend')
@section('heading')
    @if ($message = Session::get('berhasil'))
        <div class="alert alert-success alert-block d-none" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="d-flex gap-4 ms-3 me-3">
        <h1>Meja Makan</h1>
        <div class="ms-auto">
            <span data-bs-toggle="modal" data-bs-target="#tambahmejamakan">
                <button class="btn btn-primary btn-sm rounded" data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Meja"><i class="fa fa-plus fa-sm"></i> Tambah Meja</button>
            </span>
        </div>
    </div>
@endsection

@section('date')
    {{ $waktu }}
@endsection

@section('text')
    {{-- Modal Image
        @foreach ($products as $item)
            <div class="modal fade" id="imagemodal{{ $item->id }}" tabindex="-1" aria-labelledby="imagemodal{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="imagemodal{{ $item->id }}">{{ $item->name }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img id="imagemodal{{ $item->id }}" src="{{ asset('upload/product/' . $item->image) }}" alt="modal image" class="w-100" style="height: 400px; border-radius: 15px;" loading="lazy">
                            </div>
                            <div class="mt-3">
                                <h4>Deskripsi Menu</h4>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    Tutup Modal Image --}}

    {{-- Modal Tambah Meja --}}
    <div class="modal fade" id="tambahmejamakan" tabindex="-1" aria-labelledby="tambahmejamakan" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahmejamakan">Tambah Meja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/admin/meja-makan/posts" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">
                                    <div class="form-label">Nomor Meja</div>
                                    <input type="number" class="form-control mb-3" placeholder="Contoh: 03" name="no_meja" required autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px;">
                            <i class="fas fa-plus"></i>
                            Tambah Meja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="myTable" class="table table-bordered table-valign-middle">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th class="text-center">Nomor Meja</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $item)
                    <tr>
                        <td style="font-weight: bolder; text-align: center;">{{ $loop->iteration }}.</td>
                        <td class="text-center">{{ $item->no_meja }}</td>
                        <td class="text-center">
                            {{-- <a href="/admin/qrcode/{{ $item->id }}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a> --}}
                            {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#editmenu{{ $item->id }}" class="btn btn-warning" style="border-radius: 50%;">
                                <i class="fas fa-pen"></i>
                            </button>
                            <a href="/admin/meja-makan/destroy/{{ $item->id }}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" class="btn btn-danger" style="border-radius: 50%;">
                                <i class="fas fa-trash" style="font-size: 15px;"></i>
                            </a> --}}
                            <a href="/admin/meja-makan/destroy/{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Meja" class="btn btn-danger btn-sm rounded-3 delete-confirm text-white">
                                <i class="fa fa-trash" style="padding-left: 1.5px; padding-right: 1.5px;"></i>
                            </a>
                            <span data-bs-toggle="modal" data-bs-target="#editmenu{{ $item->id }}">
                                <button type="button" class="btn btn-warning btn-sm rounded-3 text-black" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Meja">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </span>
                        </td>
                    </tr>

                    {{-- Modal Edit Menu --}}
                    <div class="modal fade" id="editmenu{{ $item->id }}" tabindex="-1" aria-labelledby="#editmenu" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="#editmenu">Edit Meja Makan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/admin/meja-makan/update/{{ $item->id }}" method="POST" enctype="multipart/form-data" id="myForm">
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
                    {{-- Tutup Modal Edit Menu --}}
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

{{-- @push('javascript')
    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endpush --}}
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


        // Sweetalert
        $('.delete-confirm').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Apakah Anda Yakin?',
                text: 'Data Ini Akan Dihapus Secara Permanen!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
@endpush
