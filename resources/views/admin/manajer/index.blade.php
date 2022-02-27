@extends('admin.dashboard')
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
                        Manajer
                    </div>
                    <a href="{{ route('manajer-add') }}" class="btn btn-primary btn-sm">Tambah Manajer</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{ $dt->name }}</td>
                                            <td>{{ $dt->email }}</td>
                                            <td>
                                                <a href="{{ url('manajer/' . $dt->m_id . '/edit') }}"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm delete"
                                                    data-id="{{ $dt->m_id }}" data-name="{{ $dt->name }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
                            window.location.href = "manajer/" + dataId + "/delete"
                        } else {
                            swal("Gagal menghapus data");
                        }
                    });
            });
        </script>
    @endpush

    @include('sweetalert::alert')
@endsection
