@extends('layout.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Kasir
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('kasir-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                            @error('name')
                                <div class="invalid-feedback">* {{ $errors->first('name') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputPassword1" autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">* {{ $errors->first('email') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin"
                                id="exampleFormControlSelect1">
                                <option selected disabled>---Pilih Jenis Kelamin---</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">* {{ $errors->first('jenis_kelamin') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">No HP</label>
                            <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                id="exampleInputPassword1">
                            @error('no_hp')
                                <div class="invalid-feedback">* {{ $errors->first('no_hp') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('alamat')
                                <div class="invalid-feedback">* {{ $errors->first('alamat') }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
