@extends('layout.dashboard')
@section('content')
    <div class="row">
        @if ($pesanan->count() != '')
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Detail Pesanan</span>
                                <span class="badge badge-primary badge-pill">{{ $pesanan->sum('qty') }}</span>
                            </h4>
                            <ul class="list-group mb-3">
                                @foreach ($pesanan as $ps)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-sm-4">
                                            <div>
                                                <h4 class="my-0">{{ $ps->nama }}</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="text-muted">Rp. {{ number_format($ps->sub_total) }}</span>
                                        </div>
                                        <form action="{{ url('pesanan/' . $ps->ps_id . '/update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $ps->id }}" name="id_order">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-warning btn-xs"><i
                                                            class="fa fa-pen"></i>
                                                    </button>
                                                    <input type="number" name="qty" class="form-control"
                                                        value="{{ $ps->qty }}">
                                                    <a href="{{ url('pesanan/' . $ps->ps_id . '/delete') }}"
                                                        class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total</span>
                                    <strong id="total" data-total="{{ $pesanan->sum('sub_total') }}">Rp.
                                        {{ number_format($pesanan->sum('sub_total', 0)) }}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted"><b>Transaksi</b></span>
                        </h4>
                        <form action="{{ route('transaksi-store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="total_bayar" value="{{ $pesanan->sum('sub_total') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pelanggan : </label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    autocomplete="off">
                                @error('nama')
                                    <div class="invalid-feedback">* {{ $errors->first('nama') }}</div>
                                @enderror
                            </div>
                            <label class="required">Jumlah Pembayaran : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="jumlah_pembayaran"
                                    class="form-control @error('jumlah_pembayaran') is-invalid @enderror"
                                    id="jumlah_pembayaran" autocomplete="off">
                                @error('jumlah_pembayaran')
                                    <div class=" invalid-feedback">* {{ $errors->first('jumlah_pembayaran') }}
                                    </div>
                                @enderror
                            </div>
                            <label class="required">Kembalian : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="kembalian" class="form-control" id="kembalian" autocomplete="off"
                                    readonly>
                            </div>
                            <button class="btn btn-primary btn-sm btn-block" type="submit">
                                Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
        <!--Makanan-->
        @if ($makanan->isNotEmpty())
            <h2><b>Makanan</b></h2>
            @foreach ($makanan as $mk)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('manajer/menu/' . $mk->gambar) }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4>{{ $mk->nama }}</h4>
                                    <span class="price">Rp. {{ number_format($mk->harga, 0) }}</span>
                                </div>
                            </div>
                        </div>
                        <center>
                            <form action="{{ route('pesanan-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="kasir_id" class="form-control"
                                        value="{{ $kasir->id }}">
                                    <input type="hidden" name="menu_id" class="form-control" value="{{ $mk->id }}">
                                    <input type="hidden" name="harga" class="form-control" value="{{ $mk->harga }}">
                                    <input type="hidden" name="qty" class="form-control" value="1">
                                </div>
                                @if ($pesanan->where('menu_id', $mk->id)->count() == 1)
                                    <span>
                                        <i class="fas fa-sync fa-spin mb-4"></i>
                                        Sedang di pesan
                                    </span>
                                @elseif ($mk->status == 'tersedia')
                                    <div class="shopping-cart mb-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-basket"></i></button>
                                    </div>
                                @endif
                            </form>
                        </center>
                    </div>
                </div>
            @endforeach
            {{ $makanan->links() }}
        @endif

        <!--Minuman-->
        @if ($minuman->isNotEmpty())
            <h2><b>Minuman</b></h2>
            @foreach ($minuman as $mm)
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset('manajer/menu/' . $mm->gambar) }}" alt="">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4>{{ $mm->nama }}</h4>
                                    <span class="price">Rp. {{ number_format($mm->harga, 0) }}</span>
                                </div>
                            </div>
                        </div>
                        <center>
                            <form action="{{ route('pesanan-store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="kasir_id" class="form-control"
                                        value="{{ $kasir->id }}">
                                    <input type="hidden" name="menu_id" class="form-control" value="{{ $mm->id }}">
                                    <input type="hidden" name="harga" class="form-control" value="{{ $mm->harga }}">
                                    <input type="hidden" name="qty" class="form-control" value="1">
                                </div>
                                @if ($pesanan->where('menu_id', $mm->id)->count() == 1)
                                    <span>
                                        <i class="fas fa-sync fa-spin mb-4"></i>
                                        Sedang di pesan
                                    </span>
                                @elseif ($mm->status == 'tersedia')
                                    <div class="shopping-cart mb-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-basket"></i></button>
                                    </div>
                                @endif
                            </form>
                        </center>
                    </div>
                </div>
            @endforeach
            {{ $minuman->links() }}
        @endif
    </div>

    @include('sweetalert::alert')

    @push('js')
        <script>
            $(document).ready(function() {
                $('#jumlah_pembayaran').keyup(function(e) {
                    var total = parseInt($('#total').attr('data-total'));
                    var nominal = parseFloat($('#jumlah_pembayaran').val().replace(/,/g, ""));
                    var kembali = total - nominal;
                    if (total < nominal) {
                        var noNegative = Math.abs(kembali)
                        $('#kembalian').val(noNegative);
                    } else {
                        $('#kembalian').val(0);
                    }
                });
            });
        </script>
    @endpush
@endsection
