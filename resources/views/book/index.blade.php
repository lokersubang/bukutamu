<x-home-layout title="Buku Tamu">
    <!-- Page Heading -->
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 mx-auto">
                <h1 class="h3 mb-4 text-center"> <img src="/img/logo.png" alt="img" width="80px"> Buku Tamu</h1>
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
                    <form method="post" action="{{ route('home.store') }}" id="myform">
                        @csrf
                        <div class="mb-3">
                            <div id="myCamera" class="img-fluid mx-auto"></div>
                            <input type=button class="btn btn-dark btn-block" value="Ambil Foto"
                                onClick="take_snapshot()">
                            <input id="mydata" type="hidden" name="mydata" value="" />
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" name="nama" value="{{ old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" style="resize: none" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan Kepada</label>
                            <select name="tujuan" id="tujuan" class="form-control">
                                <option value="">Kepala Kantor</option>
                                <option value="">TU</option>
                                <option value="">Pengukuran</option>
                                <option value="">Pengadaan</option>
                                <option value="">Arsip</option>
                                <option value="">PPSKP</option>
                            </select>
                            @error('tujuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label for="maksud" class="form-label">Keperluan </label>
                            <textarea class="form-control @error('tujuan') is-invalid @enderror" rows="5" style="resize: none" id="maksud"
                                name="tujuan">{{ old('tujuan') }}</textarea>
                            @error('tujuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-home-layout>


<script language="JavaScript">
    Webcam.set({
        width: 250,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#myCamera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".mydata").val(data_uri);
            document.getElementById('myCamera').innerHTML = '<img src="' + data_uri + '"/>';
        });


    }
</script>

<script type="text/javascript">
    // jalankan aksi saat tombol register disubmit
    $("#simpan").click(function() {
        event.preventDefault();
        //memasukkan data gambar ke dalam variabel image
        Webcam.snap(function(data_uri) {
            var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
            document.getElementById('mydata').value = raw_image_data;
            document.getElementById('myform').submit();
        });


    });
</script>
