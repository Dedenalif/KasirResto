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
                    <form action="{{ route('filter-pendapatan') }}" method="GET">
                        <h4 class="card-title mb-5">Filter Pendapatan</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Dari tanngal</label>
                                <input type="date" name="dari_tgl"
                                    class="form-control @error('dari_tgl') is-invalid @enderror">
                                @error('dari_tgl')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('dari_tgl') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Sampai tanggal</label>
                                <input type="date" name="sampai_tgl"
                                    class="form-control @error('sampai_tgl') is-invalid @enderror">
                                @error('sampai_tgl')
                                    <div class="invalid-feedback">
                                        {{ $errors->first('sampai_tgl') }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mt-4" name="cari" value="cari">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button type="submit" class="btn btn-warning mt-4" name="cetak" value="cetak">
                                    <i class="fas fa-print"></i>
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
                                        <th>Tanggal</th>
                                        <th>Pendapatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendapatan as $dt)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dt->day }}</td>
                                            <td>Rp. {{ number_format($dt->pendapatan, 0) }}</td>
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
