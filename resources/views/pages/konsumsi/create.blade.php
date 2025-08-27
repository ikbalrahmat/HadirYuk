{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Formulir Pemesanan Konsumsi</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('konsumsi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_surat_nde" class="form-label">Nomor Surat (NDE)</label>
                            <input type="text" class="form-control" id="nomor_surat_nde" name="nomor_surat_nde" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_anggaran_rapat" class="form-label">Tahun Anggaran Rapat</label>
                            <input type="number" class="form-control" id="tahun_anggaran_rapat" name="tahun_anggaran_rapat" value="{{ date('Y') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="agenda_rapat" class="form-label">Agenda Rapat</label>
                            <input type="text" class="form-control" id="agenda_rapat" name="agenda_rapat" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_rapat" class="form-label">Tanggal Rapat</label>
                            <input type="date" class="form-control" id="tanggal_rapat" name="tanggal_rapat" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_rapat" class="form-label">Jam Rapat</label>
                            <input type="time" class="form-control" id="jam_rapat" name="jam_rapat" required>
                        </div>
                        <div class="mb-3">
                            <label for="unggah_dokumen_nde" class="form-label">Unggah Dokumen NDE</label>
                            <input type="file" class="form-control" id="unggah_dokumen_nde" name="unggah_dokumen_nde">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Menu Konsumsi</label>
                            <div id="menu-konsumsi-container">
                                <div class="row mb-2 menu-item">
                                    <div class="col-4">
                                        <select name="menu_konsumsi[0][menu]" class="form-select" required>
                                            <option value="">Pilih Menu</option>
                                            <option value="Snack (Pagi)">Snack (Pagi)</option>
                                            <option value="Snack (Siang)">Snack (Siang)</option>
                                            <option value="Makan Siang)">Makan Siang</option>
                                            <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                                            <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" name="menu_konsumsi[0][detail]" class="form-control" placeholder="Detail (contoh: Roti dan Teh)">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" name="menu_konsumsi[0][jumlah]" class="form-control" placeholder="Jumlah" required min="1">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger remove-menu-item"><i class="bi bi-x"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" id="add-menu-item">Tambah Menu</button>
                        </div>
                        <div class="mb-3">
                            <label for="distribusi_tujuan" class="form-label">Distribusi</label>
                            <input type="text" class="form-control" id="distribusi_tujuan" name="distribusi_tujuan" placeholder="Contoh: Ruang Rapat A" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_unit_kerja" class="form-label">Lokasi</label>
                            <select class="form-select" id="lokasi_unit_kerja" name="lokasi_unit_kerja" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Karawang">Karawang</option>
                                <option value="Jakarta">Jakarta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan Detail Lokasi</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Pemesanan</button>
                <a href="{{ route('konsumsi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itemIndex = 1;
        const container = document.getElementById('menu-konsumsi-container');

        document.getElementById('add-menu-item').addEventListener('click', function () {
            const newItem = document.createElement('div');
            newItem.className = 'row mb-2 menu-item';
            newItem.innerHTML = `
                <div class="col-4">
                    <select name="menu_konsumsi[${itemIndex}][menu]" class="form-select" required>
                        <option value="">Pilih Menu</option>
                        <option value="Snack (Pagi)">Snack (Pagi)</option>
                        <option value="Snack (Siang)">Snack (Siang)</option>
                        <option value="Makan Siang)">Makan Siang</option>
                        <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                        <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                    </select>
                </div>
                <div class="col-4">
                    <input type="text" name="menu_konsumsi[${itemIndex}][detail]" class="form-control" placeholder="Detail (contoh: Roti dan Teh)">
                </div>
                <div class="col-3">
                    <input type="number" name="menu_konsumsi[${itemIndex}][jumlah]" class="form-control" placeholder="Jumlah" required min="1">
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-danger remove-menu-item"><i class="bi bi-x"></i></button>
                </div>
            `;
            container.appendChild(newItem);
            itemIndex++;
        });

        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-menu-item')) {
                e.target.closest('.menu-item').remove();
            }
        });
    });
</script>
@endsection --}}

{{-- @extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Formulir Pemesanan Konsumsi</h2>
    <div class="card">
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('konsumsi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nomor_surat_nde" class="form-label">Nomor Surat (NDE)</label>
                            <input type="text" class="form-control" id="nomor_surat_nde" name="nomor_surat_nde" value="{{ old('nomor_surat_nde') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="unit_kerja" class="form-label">Unit Kerja</label>
                            <select class="form-select" id="unit_kerja" name="unit_kerja" required>
                                <option value="">Pilih Unit Kerja</option>
                                @foreach ($unitKerjas as $unitKerja)
                                    <option value="{{ $unitKerja }}" {{ old('unit_kerja') == $unitKerja ? 'selected' : '' }}>{{ $unitKerja }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tahun_anggaran_rapat" class="form-label">Tahun Anggaran Rapat</label>
                            <input type="number" class="form-control" id="tahun_anggaran_rapat" name="tahun_anggaran_rapat" value="{{ old('tahun_anggaran_rapat', date('Y')) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="agenda_rapat" class="form-label">Agenda Rapat</label>
                            <input type="text" class="form-control" id="agenda_rapat" name="agenda_rapat" value="{{ old('agenda_rapat') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_rapat" class="form-label">Tanggal Rapat</label>
                            <input type="date" class="form-control" id="tanggal_rapat" name="tanggal_rapat" value="{{ old('tanggal_rapat') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_rapat" class="form-label">Jam Rapat</label>
                            <input type="time" class="form-control" id="jam_rapat" name="jam_rapat" value="{{ old('jam_rapat') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="unggah_dokumen_nde" class="form-label">Unggah Dokumen NDE (PDF)</label>
                            <input type="file" class="form-control" id="unggah_dokumen_nde" name="unggah_dokumen_nde">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Menu Konsumsi</label>
                            <div id="menu-konsumsi-container">
                                <div class="row mb-2 menu-item">
                                    <div class="col-4">
                                        <select name="menu_konsumsi[0][menu]" class="form-select" required>
                                            <option value="">Pilih Menu</option>
                                            <option value="Snack (Pagi)">Snack (Pagi)</option>
                                            <option value="Snack (Siang)">Snack (Siang)</option>
                                            <option value="Makan Siang">Makan Siang</option>
                                            <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                                            <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" name="menu_konsumsi[0][detail]" class="form-control" placeholder="Detail (contoh: Roti dan Teh)">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" name="menu_konsumsi[0][jumlah]" class="form-control" placeholder="Jumlah" required min="1">
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger remove-menu-item"><i class="bi bi-x"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success" id="add-menu-item">Tambah Menu</button>
                        </div>
                        <div class="mb-3">
                            <label for="distribusi_tujuan" class="form-label">Distribusi</label>
                            <input type="text" class="form-control" id="distribusi_tujuan" name="distribusi_tujuan" value="{{ old('distribusi_tujuan') }}" placeholder="Contoh: Ruang Rapat A" required>
                        </div>
                        <div class="mb-3">
                            <label for="lokasi_unit_kerja" class="form-label">Lokasi Rapat</label>
                            <select class="form-select" id="lokasi_unit_kerja" name="lokasi_unit_kerja" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Karawang" {{ old('lokasi_unit_kerja') == 'Karawang' ? 'selected' : '' }}>Karawang</option>
                                <option value="Jakarta" {{ old('lokasi_unit_kerja') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catatan" class="form-label">Catatan Detail Lokasi</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3">{{ old('catatan') }}</textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ajukan Pemesanan</button>
                <a href="{{ route('konsumsi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itemIndex = 1;
        const container = document.getElementById('menu-konsumsi-container');

        document.getElementById('add-menu-item').addEventListener('click', function () {
            const newItem = document.createElement('div');
            newItem.className = 'row mb-2 menu-item';
            newItem.innerHTML = `
                <div class="col-4">
                    <select name="menu_konsumsi[${itemIndex}][menu]" class="form-select" required>
                        <option value="">Pilih Menu</option>
                        <option value="Snack (Pagi)">Snack (Pagi)</option>
                        <option value="Snack (Siang)">Snack (Siang)</option>
                        <option value="Makan Siang">Makan Siang</option>
                        <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                        <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                    </select>
                </div>
                <div class="col-4">
                    <input type="text" name="menu_konsumsi[${itemIndex}][detail]" class="form-control" placeholder="Detail (contoh: Roti dan Teh)">
                </div>
                <div class="col-3">
                    <input type="number" name="menu_konsumsi[${itemIndex}][jumlah]" class="form-control" placeholder="Jumlah" required min="1">
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-danger remove-menu-item"><i class="bi bi-x"></i></button>
                </div>
            `;
            container.appendChild(newItem);
            itemIndex++;
        });

        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-menu-item')) {
                e.target.closest('.menu-item').remove();
            }
        });
    });
</script>
@endsection
 --}}


 @extends('layouts.main')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Formulir Pemesanan Konsumsi</h2>
    <div class="bg-white p-6 rounded-2xl shadow">
        @if(session('error'))
            <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('konsumsi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="grid md:grid-cols-2 gap-6">
                <div class="space-y-4">
                    <div>
                        <label class="block font-medium mb-1">Nomor Surat (NDE)</label>
                        <input type="text" name="nomor_surat_nde" value="{{ old('nomor_surat_nde') }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Unit Kerja</label>
                        <select name="unit_kerja" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Unit Kerja</option>
                            @foreach ($unitKerjas as $unitKerja)
                                <option value="{{ $unitKerja }}" {{ old('unit_kerja') == $unitKerja ? 'selected' : '' }}>
                                    {{ $unitKerja }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Tahun Anggaran Rapat</label>
                        <input type="number" name="tahun_anggaran_rapat" value="{{ old('tahun_anggaran_rapat', date('Y')) }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Agenda Rapat</label>
                        <input type="text" name="agenda_rapat" value="{{ old('agenda_rapat') }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Tanggal Rapat</label>
                        <input type="date" name="tanggal_rapat" value="{{ old('tanggal_rapat') }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Jam Rapat</label>
                        <input type="time" name="jam_rapat" value="{{ old('jam_rapat') }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Unggah Dokumen NDE (PDF)</label>
                        <input type="file" name="unggah_dokumen_nde"
                            class="w-full border rounded-lg px-3 py-2">
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block font-medium mb-2">Menu Konsumsi</label>
                        <div id="menu-konsumsi-container" class="space-y-2">
                            <div class="flex gap-2 items-center menu-item">
                                <select name="menu_konsumsi[0][menu]" required class="w-1/3 border rounded-lg px-2 py-2">
                                    <option value="">Pilih Menu</option>
                                    <option value="Snack (Pagi)">Snack (Pagi)</option>
                                    <option value="Snack (Siang)">Snack (Siang)</option>
                                    <option value="Makan Siang">Makan Siang</option>
                                    <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                                    <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                                </select>
                                <input type="text" name="menu_konsumsi[0][detail]" placeholder="Detail"
                                    class="w-1/3 border rounded-lg px-2 py-2">
                                <input type="number" name="menu_konsumsi[0][jumlah]" placeholder="Jumlah" min="1" required
                                    class="w-1/4 border rounded-lg px-2 py-2">
                                <button type="button" class="remove-menu-item text-red-500 hover:text-red-700">
                                    ✖
                                </button>
                            </div>
                        </div>
                        <button type="button" id="add-menu-item" class="mt-2 px-3 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            + Tambah Menu
                        </button>
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Distribusi</label>
                        <input type="text" name="distribusi_tujuan" value="{{ old('distribusi_tujuan') }}" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Lokasi Rapat</label>
                        <select name="lokasi_unit_kerja" required
                            class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">Pilih Lokasi</option>
                            <option value="Karawang" {{ old('lokasi_unit_kerja') == 'Karawang' ? 'selected' : '' }}>Karawang</option>
                            <option value="Jakarta" {{ old('lokasi_unit_kerja') == 'Jakarta' ? 'selected' : '' }}>Jakarta</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-medium mb-1">Catatan</label>
                        <textarea name="catatan" rows="3" class="w-full border rounded-lg px-3 py-2">{{ old('catatan') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">Ajukan Pemesanan</button>
                <a href="{{ route('konsumsi.index') }}" class="px-5 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Batal</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itemIndex = 1;
        const container = document.getElementById('menu-konsumsi-container');

        document.getElementById('add-menu-item').addEventListener('click', function () {
            const newItem = document.createElement('div');
            newItem.className = 'flex gap-2 items-center menu-item';
            newItem.innerHTML = `
                <select name="menu_konsumsi[${itemIndex}][menu]" required class="w-1/3 border rounded-lg px-2 py-2">
                    <option value="">Pilih Menu</option>
                    <option value="Snack (Pagi)">Snack (Pagi)</option>
                    <option value="Snack (Siang)">Snack (Siang)</option>
                    <option value="Makan Siang">Makan Siang</option>
                    <option value="Minuman Dingin/Lainnya">Minuman Dingin/Lainnya</option>
                    <option value="Air Mineral (per dus)">Air Mineral (per dus)</option>
                </select>
                <input type="text" name="menu_konsumsi[${itemIndex}][detail]" placeholder="Detail"
                    class="w-1/3 border rounded-lg px-2 py-2">
                <input type="number" name="menu_konsumsi[${itemIndex}][jumlah]" placeholder="Jumlah" min="1" required
                    class="w-1/4 border rounded-lg px-2 py-2">
                <button type="button" class="remove-menu-item text-red-500 hover:text-red-700">✖</button>
            `;
            container.appendChild(newItem);
            itemIndex++;
        });

        container.addEventListener('click', function (e) {
            if (e.target.closest('.remove-menu-item')) {
                e.target.closest('.menu-item').remove();
            }
        });
    });
</script>
@endsection
