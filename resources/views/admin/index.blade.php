<x-home-layout title="Data Buku Tamu">
    <meta http-equiv="refresh" content="120" />
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">

                <h2>Data Buku Tamu</h2>
                <div class="p-3 rounded bg-white shadow-sm">
                    <form method="post" action="{{ route('buku.index') }}"
                        class="d-none d-sm-inline-block form-inline mr-auto  my-2 my-md-0 mw-100 navbar-search">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-light border-0 small" name="cari"
                                placeholder="Cari...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (session()->has('flash'))
                        <div class="alert alert-warning col-md-6 alert-dismissible fade show" role="alert">
                            Buku tamu berhasil di <strong> {{ session()->get('flash') }}
                            </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered " id="dataTable">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Foto</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($books as $key => $book)
                                    <tr>
                                        <td>{{ $books->firstItem() + $key }}</td>
                                        <td>{{ $book->nama }}</td>
                                        <td>{{ $book->alamat }}</td>
                                        <td>{{ $book->tujuan }}</td>
                                        <td>{{ $book->created_at->toDateTimeString() }} WIB</td>
                                        <td>
                                            <span
                                                class="badge {{ $book->status == 'Diterima' ? 'bg-success' : ($book->status == 'Ditolak' ? 'bg-danger' : 'bg-dark') }} text-white">{{ $book->status ?? 'Belum Dikonfirmasi' }}</span>
                                        </td>
                                        <td><a href="/storage/image/{{ $book->foto }}"><img
                                                    src="/storage/image/{{ $book->foto }}" alt="{{ $book->nama }}"
                                                    class="img-fluid" width="80"></a></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    Opsi
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <form method="post"
                                                        action="{{ route('buku.diterima', $book->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="status">
                                                        <button class="dropdown-item" type="submit"
                                                            onclick="return confirm('Yakin mau diterima?')">Diterima</button>
                                                    </form>
                                                    <form method="post"
                                                        action="{{ route('buku.ditolak', $book->id) }}">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="status">
                                                        <button class="dropdown-item" type="submit"
                                                            onclick="return confirm('Yakin mau ditolak?')">Ditolak</button>
                                                    </form>

                                                    <a class="dropdown-item"
                                                        href="{{ route('buku.edit', $book->id) }}">Edit</a>
                                                    <form method="post"
                                                        action="{{ route('buku.destroy', $book->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item" type="submit"
                                                            onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="mt-1">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
