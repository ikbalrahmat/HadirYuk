{{-- @extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Formulir Edit Undangan Rapat</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('undangan.update', $undangan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="waktu_rapat_tanggal" class="form-label">Tanggal Rapat</label>
                    <input type="date" class="form-control" id="waktu_rapat_tanggal" name="tanggal" value="{{ old('tanggal', date('Y-m-d', strtotime($undangan->tanggal))) }}" required>
                </div>
                 <div class="mb-3">
                    <label for="waktu_rapat_jam" class="form-label">Jam Rapat</label>
                    <input type="time" class="form-control" id="waktu_rapat_jam" name="jam" value="{{ old('jam', str_replace(' WIB', '', $undangan->jam)) }}" required>
                </div>
                <div class="mb-3">
                    <label for="kepada" class="form-label">Kepada</label>
                    <input type="text" class="form-control" id="kepada" name="kepada" placeholder="Contoh: Tim Developer" value="{{ old('kepada', $undangan->kepada) }}" required>
                </div>
                <div class="mb-3">
                    <label for="pengirim" class="form-label">Pengirim</label>
                    <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Contoh: Manajer Proyek" value="{{ old('pengirim', $undangan->pengirim) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_link" class="form-label">Tempat / Link</label>
                    <input type="text" class="form-control" id="tempat_link" name="tempat_link" placeholder="Contoh: Ruang Rapat A / Link Zoom" value="{{ old('tempat_link', $undangan->tempat_link) }}" required>
                </div>
                <div class="mb-3">
                    <label for="agenda" class="form-label">Agenda (ringkas)</label>
                    <textarea class="form-control" id="agenda" name="agenda" rows="3" placeholder="Contoh: Diskusi progres proyek aplikasi." required>{{ old('agenda', $undangan->agenda) }}</textarea>
                </div>


                <div class="mb-3">
                    <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                    @if ($undangan->tanda_tangan)
                        <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan" style="max-width: 200px;">
                        <input type="hidden" name="tanda_tangan_hidden" value="{{ $undangan->tanda_tangan }}">
                        <br>
                        <small class="form-text text-muted">Untuk mengganti tanda tangan, hapus gambar di atas.</small>
                    @else
                        <small class="form-text text-muted">Tanda Tangan belum ada.</small>
                    @endif
                    <div style="border: 1px solid #dee2e6; border-radius: 0.25rem; margin-top: 10px;">
                        <canvas id="signatureCanvas" class="w-100" height="150" style="background-color: #f8f9fa;"></canvas>
                    </div>
                    <small class="form-text text-muted">Silakan tanda tangan di area di atas jika ingin mengganti.</small><br>
                    <button type="button" id="clearSignature" class="btn btn-sm btn-outline-danger mt-2">Hapus Tanda Tangan</button>
                    <input type="hidden" name="tanda_tangan" id="signatureInput">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('undangan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const canvas = document.getElementById('signatureCanvas');
        const signatureInput = document.getElementById('signatureInput');
        const hiddenSignatureInput = document.querySelector('input[name="tanda_tangan_hidden"]');

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        resizeCanvas();
        window.addEventListener("resize", resizeCanvas);

        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(248, 249, 250)'
        });

        document.getElementById('clearSignature').addEventListener('click', function () {
            signaturePad.clear();
            if(hiddenSignatureInput) hiddenSignatureInput.value = ''; // Hapus tanda tangan lama
        });

        document.querySelector('form').addEventListener('submit', function (event) {
            // Jika kanvas kosong, gunakan tanda tangan lama (jika ada)
            if (signaturePad.isEmpty()) {
                if (hiddenSignatureInput && hiddenSignatureInput.value) {
                    signatureInput.value = hiddenSignatureInput.value;
                } else {
                    alert("Harap berikan tanda tangan terlebih dahulu.");
                    event.preventDefault();
                }
            } else {
                signatureInput.value = signaturePad.toDataURL();
            }
        });
    });
</script>
@endsection --}}

{{--
@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Formulir Edit Undangan Rapat</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('undangan.update', $undangan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="waktu_rapat_tanggal" class="form-label">Tanggal Rapat</label>
                    <input type="date" class="form-control" id="waktu_rapat_tanggal" name="tanggal" value="{{ old('tanggal', $undangan->tanggal) }}" required>
                </div>
                <div class="mb-3">
                    <label for="waktu_rapat_jam" class="form-label">Jam Rapat</label>
                    <input type="time" class="form-control" id="waktu_rapat_jam" name="jam" value="{{ old('jam', $undangan->jam) }}" required>
                </div>
                <div class="mb-3">
                    <label for="kepada" class="form-label">Kepada</label>
                    <input type="text" class="form-control" id="kepada" name="kepada" placeholder="Contoh: Tim Developer" value="{{ old('kepada', $undangan->kepada) }}" required>
                </div>
                <div class="mb-3">
                    <label for="pengirim" class="form-label">Pengirim</label>
                    <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Contoh: Manajer Proyek" value="{{ old('pengirim', $undangan->pengirim) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tempat_link" class="form-label">Tempat / Link</label>
                    <input type="text" class="form-control" id="tempat_link" name="tempat_link" placeholder="Contoh: Ruang Rapat A / Link Zoom" value="{{ old('tempat_link', $undangan->tempat_link) }}" required>
                </div>
                <div class="mb-3">
                    <label for="agenda" class="form-label">Agenda (ringkas)</label>
                    <textarea class="form-control" id="agenda" name="agenda" rows="3" placeholder="Contoh: Diskusi progres proyek aplikasi." required>{{ old('agenda', $undangan->agenda) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tanda_tangan" class="form-label">Tanda Tangan</label>
                    @if ($undangan->tanda_tangan)
                        <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan" style="max-width: 200px;">
                        <input type="hidden" name="tanda_tangan_hidden" value="{{ $undangan->tanda_tangan }}">
                        <br>
                        <small class="form-text text-muted">Untuk mengganti tanda tangan, hapus gambar di atas.</small>
                    @else
                        <small class="form-text text-muted">Tanda Tangan belum ada.</small>
                    @endif
                    <div style="border: 1px solid #dee2e6; border-radius: 0.25rem; margin-top: 10px;">
                        <canvas id="signatureCanvas" class="w-100" height="150" style="background-color: #f8f9fa;"></canvas>
                    </div>
                    <small class="form-text text-muted">Silakan tanda tangan di area di atas jika ingin mengganti.</small><br>
                    <button type="button" id="clearSignature" class="btn btn-sm btn-outline-danger mt-2">Hapus Tanda Tangan</button>
                    <input type="hidden" name="tanda_tangan" id="signatureInput">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('undangan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const canvas = document.getElementById('signatureCanvas');
        const signatureInput = document.getElementById('signatureInput');
        const hiddenSignatureInput = document.querySelector('input[name="tanda_tangan_hidden"]');

        function resizeCanvas() {
            const ratio = Math.max(window.devicePixelRatio || 1, 1);
            canvas.width = canvas.offsetWidth * ratio;
            canvas.height = canvas.offsetHeight * ratio;
            canvas.getContext("2d").scale(ratio, ratio);
        }

        resizeCanvas();
        window.addEventListener("resize", resizeCanvas);

        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(248, 249, 250)'
        });

        document.getElementById('clearSignature').addEventListener('click', function () {
            signaturePad.clear();
            if(hiddenSignatureInput) hiddenSignatureInput.value = ''; // Hapus tanda tangan lama
        });

        document.querySelector('form').addEventListener('submit', function (event) {
            // Jika kanvas kosong, gunakan tanda tangan lama (jika ada)
            if (signaturePad.isEmpty()) {
                if (hiddenSignatureInput && hiddenSignatureInput.value) {
                    signatureInput.value = hiddenSignatureInput.value;
                } else {
                    alert("Harap berikan tanda tangan terlebih dahulu.");
                    event.preventDefault();
                }
            } else {
                signatureInput.value = signaturePad.toDataURL();
            }
        });
    });
</script>
@endsection --}}


@extends('layouts.main')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Undangan Rapat</h2>

    <div class="bg-white rounded-2xl shadow p-6">
        <form action="{{ route('undangan.update', $undangan->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method untuk update -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Rapat</label>
                    <input type="date" id="tanggal" name="tanggal" required
                        value="{{ old('tanggal', $undangan->tanggal) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="jam" class="block text-sm font-medium text-gray-700 mb-1">Jam Rapat</label>
                    <input type="time" id="jam" name="jam" required
                        value="{{ old('jam', $undangan->jam) }}"
                        class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div class="mt-4">
                <label for="kepada" class="block text-sm font-medium text-gray-700 mb-1">Kepada</label>
                <input type="text" id="kepada" name="kepada" required
                    value="{{ old('kepada', $undangan->kepada) }}"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mt-4">
                <label for="pengirim" class="block text-sm font-medium text-gray-700 mb-1">Pengirim</label>
                <input type="text" id="pengirim" name="pengirim" required
                    value="{{ old('pengirim', $undangan->pengirim) }}"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mt-4">
                <label for="tempat_link" class="block text-sm font-medium text-gray-700 mb-1">Tempat / Link</label>
                <input type="text" id="tempat_link" name="tempat_link" required
                    value="{{ old('tempat_link', $undangan->tempat_link) }}"
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mt-4">
                <label for="agenda" class="block text-sm font-medium text-gray-700 mb-1">Agenda (ringkas)</label>
                <textarea id="agenda" name="agenda" rows="3" required
                    class="w-full rounded-lg border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('agenda', $undangan->agenda) }}</textarea>
            </div>

            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanda Tangan</label>
                <div class="border border-gray-300 rounded-lg bg-gray-50">
                    <canvas id="signatureCanvas" class="w-full" height="150"></canvas>
                </div>
                <small class="text-gray-500">Silakan tanda tangan di area di atas.</small>
                <button type="button" id="clearSignature"
                    class="mt-2 inline-flex items-center px-3 py-1.5 text-sm border border-red-500 text-red-600 rounded-lg hover:bg-red-50">
                    Hapus Tanda Tangan
                </button>
                <input type="hidden" name="tanda_tangan" id="signatureInput"
                    value="{{ $undangan->tanda_tangan }}">
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <a href="{{ route('undangan.index') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                    Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow">
                    Update Undangan
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('signatureCanvas');
    const signatureInput = document.getElementById('signatureInput');

    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
    }

    resizeCanvas();
    window.addEventListener("resize", resizeCanvas);

    const signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(248, 249, 250)'
    });

    // Jika sudah ada tanda tangan, load ke canvas
    if(signatureInput.value){
        const img = new Image();
        img.src = signatureInput.value;
        img.onload = () => signaturePad.getContext().drawImage(img, 0, 0, canvas.width, canvas.height);
    }

    document.getElementById('clearSignature').addEventListener('click', function () {
        signaturePad.clear();
    });

    document.querySelector('form').addEventListener('submit', function (event) {
        if (signaturePad.isEmpty()) {
            alert("Harap berikan tanda tangan terlebih dahulu.");
            event.preventDefault();
        } else {
            signatureInput.value = signaturePad.toDataURL();
        }
    });
});
</script>
@endsection
