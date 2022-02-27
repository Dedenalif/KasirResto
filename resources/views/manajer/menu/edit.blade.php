@extends('manajer.dashboard')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Tambah Menu
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('menu/'.$dt->id.'/update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                                value="{{ $dt->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">* {{ $errors->first('nama') }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                id="exampleFormControlSelect1">
                                <option selected disabled>---Pilih Kategori---</option>
                                <option value="makanan"{{ ($dt->kategori == 'makanan') ? 'selected' : '' }}>makanan</option>
                                <option value="minuman"{{ ($dt->kategori == 'minuman') ? 'selected' : '' }}>minuman</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">* {{ $errors->first('kategori') }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" name="harga" id="harga"
                                class="form-control @error('harga') is-invalid @enderror" autocomplete="off"
                                value="{{ $dt->harga }}">
                            @error('harga')
                                <div class="invalid-feedback">* {{ $errors->first('harga') }}</div>
                            @enderror
                        </div>
                        <label for="exampleInputEmail1">Gambar</label><br>
                        <input type="hidden" name="old_gambar" value="{{ $dt->gambar }}">
                        @if ($dt->gambar)
                            <img src="{{ asset('manajer/menu/' . $dt->gambar) }}"
                                class="img-preview card-img-top col-sm-5 mb-3 " style="width: 100px; heigt:100px;">
                        @else
                            <img class="img-preview card-img-top col-sm-5 mb-3 " style="width: 100px; heigt: 100px;">
                        @endif
                        <div class="form-file">
                            <input type="file" name="gambar"
                                class="form-file-input form-control @error('gambar') is-invalid @enderror" id="image"
                                onchange="previewImage()">
                        </div>
                        @error('gambar')
                            <div class="text-danger mt-3" style="font-size: 14px;">* {{ $errors->first('gambar') }}
                            </div>
                        @enderror
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        {{-- preview img --}}
        <script>
            function previewImage() {
                const image = document.querySelector('#image');
                const imgPreview = document.querySelector('.img-preview');
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);
                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            };
        </script>
    @endpush
@endsection
