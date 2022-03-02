@extends('layout.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Edit Manajer
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('manajer/' . $dt->m_id . '/update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $dt->user_id }}" id="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ $dt->name }}">
                            @error('name')
                                <div class="invalid-feedback">* {{ $errors->first('name') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ $dt->email }}">
                            @error('email')
                                <div class="invalid-feedback">* {{ $errors->first('email') }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
