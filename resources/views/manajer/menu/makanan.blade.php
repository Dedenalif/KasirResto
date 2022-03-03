@extends('layout.dashboard')
@section('content')
    @push('css')
        <!-- Datatable -->
        <link href="{{ asset('template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @endpush
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Makanan
                    </div>
                    <a href="{{ route('menu-add') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('manajer/menu/' . $dt->gambar) }}" style="width: 200px;">
                                            </td>
                                            <td>{{ $dt->nama }}</td>
                                            <td>{{ $dt->kategori }}</td>
                                            <td>Rp. {{ number_format($dt->harga,0) }}</td>
                                            <td>
                                                <a href="{{ url('menu/' . $dt->id . '/edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm delete"
                                                    data-id="{{ $dt->id }}" data-name="{{ $dt->nama }}">
                                                    <i class="fa fa-trash"></i>
                                                </a><br>
                                                @if ($dt->status == 'tersedia')
                                                <a href="{{ url('status/' . $dt->id . '/edit') }}"
                                                    class="btn btn-success btn-sm mt-3">Tersedia
                                                </a>
                                                @else
                                                <a href="{{ url('status/' . $dt->id . '/edit') }}"
                                                    class="btn btn-warning btn-sm mt-3">Habis
                                                </a>
                                                @endif
                                            </td>
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
    @push('js')
        <!-- Datatable -->
        <script src="{{ asset('template/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/js/plugins-init/datatables.init.js') }}"></script>

        {{-- Delete confirmation --}}
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(".table").on("click", ".delete", function() {
                var dataId = $(this).attr('data-id');
                var dataName = $(this).attr('data-name');
                swal({
                        title: "Yakin ?",
                        text: "Kamu akan menghapus data dengan" + " Nama " + dataName + "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        timer: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "menu/" + dataId + "/delete"
                        } else {
                            swal("Gagal menghapus data");
                        }
                    });
            });
        </script>
    @endpush

    @include('sweetalert::alert')
@endsection
