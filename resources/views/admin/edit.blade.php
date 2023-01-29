<x-home-layout title="Edit Buku Tamu">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 mx-auto">
                <h1 class="h3 mb-4 text-center"> <img src="/img/logo.png" alt="img" width="80px"> Edit Buku Tamu</h1>
                @if (session()->has('flash'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Buku tamu berhasil di <strong> {{ session()->get('flash') }}
                        </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="p-4 bg-white rounded shadow">
                    <form method="post" action="{{ route('buku.update', $buku->id) }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" value="{{ old('nama') ?? $buku->nama }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" style="resize: none" id="alamat" name="alamat">{{ old('alamat') ?? $buku->alamat }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="maksud" class="form-label">Maksud dan Tujuan </label>
                            <textarea class="form-control @error('tujuan') is-invalid @enderror" rows="5" style="resize: none" id="maksud"
                                name="tujuan">{{ old('tujuan') ?? $buku->tujuan }}</textarea>
                            @error('tujuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-home-layout>
