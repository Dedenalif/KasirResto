@extends('manajer.dashboard')
@section('content')
    @push('css')
        <!-- Datatable -->
        <link href="{{ asset('template/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @endpush
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('manajer-filter') }}" method="GET">
                        <h4 class="card-title mb-3">Filter Tanggal</h4>
                        <div class="row m-3">
                            <div class="col-md-5">
                                <label>Dari tanngal</label>
                                <input type="date" name="dari_tgl" class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label>Sampai tanggal</label>
                                <input type="date" name="sampai_tgl" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mt-4">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('manajer-filter') }}" method="GET">
                        <h4 class="card-title mb-3">Filter Kasir</h4>
                        <div class="row m-3">
                            <div class="col-md-8">
                                <label>Nama Kasir</label>
                                <input type="text" name="nama" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary mt-4">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kasir</th>
                                        <th>Pelanggan</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dt->k_nama }}</td>
                                            <td>{{ $dt->p_nama }}</td>
                                            <td>Rp. {{ number_format($dt->total_bayar, 0) }}</td>
                                            <td>{{ $dt->tgl_transaksi }}</td>
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
    @endpush

    @include('sweetalert::alert')
@endsection
