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
                        Catatan Transaksi
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Pelanggan</th>
                                        <th>Total</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <span class="badge badge-primary">{{ $dt->kode }}</span>
                                            </td>
                                            <td>{{ $dt->nama }}</td>
                                            <td>Rp. {{ number_format($dt->total_bayar, 0) }}</td>
                                            <td>Rp. {{ number_format($dt->jumlah_pembayaran, 0) }}</td>
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
@endsection
