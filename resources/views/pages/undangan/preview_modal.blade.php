{{-- <div class="container p-4">
    <div class="card p-4">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Undangan Rapat</h5>
            <div id="undangan-text-content">
                <p>Kepada Yth. <br> <strong>{{ $undangan->kepada }}</strong></p>
                <p>Bersama ini kami mengundang Saudara/i untuk hadir dalam rapat:</p>
                <p>
                    <strong>Pengirim:</strong> {{ $undangan->pengirim }} <br>
                    <strong>Hari, Tanggal, Jam:</strong> {{ $undangan->tanggal }}, {{ $undangan->jam }} <br>
                    <strong>Tempat / Link Rapat:</strong> {{ $undangan->tempat_link }} <br>
                    <strong>Agenda:</strong> {{ $undangan->agenda }} <br>
                </p>
                <p>Demikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.</p>
                <p class="mt-4">Hormat kami,</p>
                @if($undangan->tanda_tangan)
                    <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan" style="max-width: 200px; display: block; margin-top: 10px;">
                @endif
                <p><strong>{{ $undangan->pengirim }}</strong></p>
            </div>

            <div class="d-flex justify-content-between mt-4 flex-wrap">
                <a href="https://wa.me/?text={{ urlencode("Undangan Rapat: \nKepada: {$undangan->kepada}\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: {$undangan->tanggal}, {$undangan->jam}\nTempat/Link: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}") }}" target="_blank" class="btn btn-success me-2 mb-2">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:?subject=Undangan Rapat&body={{ urlencode("Kepada Yth. {$undangan->kepada},\n\nDengan hormat,\n\nBersama ini kami mengundang Saudara/i untuk hadir dalam rapat:\n\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: {$undangan->tanggal}, {$undangan->jam}\nTempat / Link Rapat: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}\n\nDemikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.\n\nHormat kami,\n{$undangan->pengirim}") }}" class="btn btn-primary me-2 mb-2">
                    <i class="bi bi-envelope"></i> Email
                </a>
                <button class="btn btn-secondary me-2 mb-2" onclick="copyToClipboard('undangan-text-content')">
                    <i class="bi bi-clipboard"></i> Salin
                </button>
                <a href="{{ route('undangan.exportPdf', $id) }}" class="btn btn-danger mb-2">
                    <i class="bi bi-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
    </div>
</div> --}}

{{--
<div class="container p-4">
    <div class="card p-4">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Undangan Rapat</h5>
            <div id="undangan-text-content">
                <p>Kepada Yth. <br> <strong>{{ $undangan->kepada }}</strong></p>
                <p>Bersama ini kami mengundang Saudara/i untuk hadir dalam rapat:</p>
                <p>
                    <strong>Pengirim:</strong> {{ $undangan->pengirim }} <br>
                    <strong>Hari, Tanggal, Jam:</strong> {{ date('d F Y', strtotime($undangan->tanggal)) }}, {{ date('H:i', strtotime($undangan->jam)) }} WIB <br>
                    <strong>Tempat / Link Rapat:</strong> {{ $undangan->tempat_link }} <br>
                    <strong>Agenda:</strong> {{ $undangan->agenda }} <br>
                </p>
                <p>Demikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.</p>
                <p class="mt-4">Hormat kami,</p>
                @if($undangan->tanda_tangan)
                    <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan" style="max-width: 200px; display: block; margin-top: 10px;">
                @endif
                <p><strong>{{ $undangan->pengirim }}</strong></p>
            </div>

            <div class="d-flex justify-content-between mt-4 flex-wrap">
                <a href="https://wa.me/?text={{ urlencode("Undangan Rapat: \nKepada: {$undangan->kepada}\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat/Link: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}") }}" target="_blank" class="btn btn-success me-2 mb-2">
                    <i class="bi bi-whatsapp"></i> WhatsApp
                </a>
                <a href="mailto:?subject=Undangan Rapat&body={{ urlencode("Kepada Yth. {$undangan->kepada},\n\nDengan hormat,\n\nBersama ini kami mengundang Saudara/i untuk hadir dalam rapat:\n\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat / Link Rapat: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}\n\nDemikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.\n\nHormat kami,\n{$undangan->pengirim}") }}" class="btn btn-primary me-2 mb-2">
                    <i class="bi bi-envelope"></i> Email
                </a>
                <button class="btn btn-secondary me-2 mb-2" onclick="copyToClipboard('undangan-text-content')">
                    <i class="bi bi-clipboard"></i> Salin
                </button>
                <a href="{{ route('undangan.exportPdf', $undangan->id) }}" class="btn btn-danger mb-2">
                    <i class="bi bi-file-pdf"></i> Export PDF
                </a>
            </div>
        </div>
    </div>
</div> --}}

{{--
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">📄 Undangan Rapat</h2>

        <div id="undangan-text-content" class="space-y-4 text-gray-700 leading-relaxed">

            <p>Kepada Yth.<br>
                <span class="font-semibold text-lg">{{ $undangan->kepada }}</span>
            </p>

            <p>Dengan hormat,</p>

            <p>
                Bersama ini kami mengundang Saudara/i untuk hadir dalam rapat dengan detail sebagai berikut:
            </p>

            <!-- Detail Rapat -->
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <table class="w-full text-sm">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold w-40 bg-gray-50">Pengirim</td>
                            <td class="px-4 py-2">{{ $undangan->pengirim }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-50">Hari, Tanggal, Jam</td>
                            <td class="px-4 py-2">
                                {{ date('l, d F Y', strtotime($undangan->tanggal)) }},
                                {{ date('H:i', strtotime($undangan->jam)) }} WIB
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-50">Tempat / Link Rapat</td>
                            <td class="px-4 py-2">{{ $undangan->tempat_link }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold bg-gray-50">Agenda</td>
                            <td class="px-4 py-2">{{ $undangan->agenda }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>
                Demikian undangan ini kami sampaikan. Atas perhatian dan kehadirannya kami ucapkan terima kasih.
            </p>

            <div class="mt-6">
                <p>Hormat kami,</p>
                @if($undangan->tanda_tangan)
                    <div class="my-3">
                        <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan"
                            class="h-20 object-contain mx-auto">
                    </div>
                @endif
                <p class="font-semibold">{{ $undangan->pengirim }}</p>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="https://wa.me/?text={{ urlencode("Undangan Rapat: \nKepada: {$undangan->kepada}\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat/Link: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}") }}"
                target="_blank"
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 flex items-center gap-2">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>

            <a href="mailto:?subject=Undangan Rapat&body={{ urlencode("Kepada Yth. {$undangan->kepada},\n\nDengan hormat,\n\nBersama ini kami mengundang Saudara/i untuk hadir dalam rapat:\n\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat / Link Rapat: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}\n\nDemikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.\n\nHormat kami,\n{$undangan->pengirim}") }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i class="fa fa-envelope"></i> Email
            </a>

            <button onclick="copyToClipboard('undangan-text-content')"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 flex items-center gap-2">
                <i class="fa fa-clipboard"></i> Salin
            </button>

            <a href="{{ route('undangan.exportPdf', $undangan->id) }}"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center gap-2">
                <i class="fa fa-file-pdf"></i> Export PDF
            </a>
        </div>
    </div>
</div> --}}
{{--
<div class="max-w-3xl mx-auto p-6">
    <div class="bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">📄 Undangan Rapat</h2>

        <!-- Isi Undangan -->
        <div id="undangan-text-content" class="space-y-4 text-gray-700 leading-relaxed">
            <p>Kepada Yth.<br>
                <span class="font-semibold text-lg">{{ $undangan->kepada }}</span>
            </p>

            <p>Dengan hormat,</p>

            <p>
                Bersama ini kami mengundang Saudara/i untuk hadir dalam rapat dengan detail sebagai berikut:
            </p>

            <!-- Detail Rapat -->
            <div class="border border-gray-300 rounded-lg overflow-hidden">
                <table class="w-full text-sm">
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold w-40 bg-gray-50">Pengirim</td>
                            <td class="px-4 py-2">{{ $undangan->pengirim }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-50">Hari, Tanggal, Jam</td>
                            <td class="px-4 py-2">
                                {{ date('l, d F Y', strtotime($undangan->tanggal)) }},
                                {{ date('H:i', strtotime($undangan->jam)) }} WIB
                            </td>
                        </tr>
                        <tr class="border-b">
                            <td class="px-4 py-2 font-semibold bg-gray-50">Tempat / Link Rapat</td>
                            <td class="px-4 py-2">{{ $undangan->tempat_link }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-semibold bg-gray-50">Agenda</td>
                            <td class="px-4 py-2">{{ $undangan->agenda }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>
                Demikian undangan ini kami sampaikan. Atas perhatian dan kehadirannya kami ucapkan terima kasih.
            </p>

            <div class="mt-6 text-center">
                <p>Hormat kami,</p>
                @if($undangan->tanda_tangan)
                    <div class="my-3">
                        <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan"
                             class="h-20 object-contain mx-auto">
                    </div>
                @endif
                <p class="font-semibold">{{ $undangan->pengirim }}</p>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-8 flex flex-wrap gap-3 justify-center">
            <a href="https://wa.me/?text={{ urlencode("Undangan Rapat: \nKepada: {$undangan->kepada}\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat/Link: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}") }}"
                target="_blank"
                class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 flex items-center gap-2">
                <i class="fab fa-whatsapp"></i> WhatsApp
            </a>

            <a href="mailto:?subject=Undangan Rapat&body={{ urlencode("Kepada Yth. {$undangan->kepada},\n\nDengan hormat,\n\nBersama ini kami mengundang Saudara/i untuk hadir dalam rapat:\n\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat / Link Rapat: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}\n\nDemikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.\n\nHormat kami,\n{$undangan->pengirim}") }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i class="fa fa-envelope"></i> Email
            </a>

            <button onclick="copyToClipboard('undangan-text-content')"
                class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 flex items-center gap-2">
                <i class="fa fa-clipboard"></i> Salin
            </button>

            <a href="{{ route('undangan.exportPdf', $undangan->id) }}"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center gap-2">
                <i class="fa fa-file-pdf"></i> Export PDF
            </a>
        </div>
    </div>
</div> --}}

<div class="p-8">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Undangan Rapat</h2>

    <div id="undangan-text-content" class="space-y-4 text-gray-700 leading-relaxed">
        <p>Kepada Yth.<br>
            <span class="font-semibold text-lg">{{ $undangan->kepada }}</span>
        </p>

        <p>Dengan hormat,</p>

        <p>
            Bersama ini kami mengundang Saudara/i untuk hadir dalam rapat dengan detail sebagai berikut:
        </p>

        <div class="border border-gray-300 rounded-lg overflow-hidden">
            <table class="w-full text-sm">
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold w-40 bg-gray-50">Pengirim</td>
                        <td class="px-4 py-2">{{ $undangan->pengirim }}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-50">Hari, Tanggal, Jam</td>
                        <td class="px-4 py-2">
                            {{ date('l, d F Y', strtotime($undangan->tanggal)) }},
                            {{ date('H:i', strtotime($undangan->jam)) }} WIB
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="px-4 py-2 font-semibold bg-gray-50">Tempat / Link Rapat</td>
                        <td class="px-4 py-2">{{ $undangan->tempat_link }}</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2 font-semibold bg-gray-50">Agenda</td>
                        <td class="px-4 py-2">{{ $undangan->agenda }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p>
            Demikian undangan ini kami sampaikan. Atas perhatian dan kehadirannya kami ucapkan terima kasih.
        </p>

        <div class="mt-6 text-center">
            <p>Hormat kami,</p>
            @if($undangan->tanda_tangan)
                <div class="my-3">
                    <img src="{{ $undangan->tanda_tangan }}" alt="Tanda Tangan"
                        class="h-20 object-contain mx-auto">
                </div>
            @endif
            <p class="font-semibold">{{ $undangan->pengirim }}</p>
        </div>
    </div>

    <div class="mt-8 flex flex-wrap gap-3 justify-center">
        <a href="https://wa.me/?text={{ urlencode("Undangan Rapat: \nKepada: {$undangan->kepada}\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat/Link: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}") }}"
            target="_blank"
            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 flex items-center gap-2">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>

        <a href="mailto:?subject=Undangan Rapat&body={{ urlencode("Kepada Yth. {$undangan->kepada},\n\nDengan hormat,\n\nBersama ini kami mengundang Saudara/i untuk hadir dalam rapat:\n\nPengirim: {$undangan->pengirim}\nHari, Tanggal, Jam: " . date('d F Y', strtotime($undangan->tanggal)) . ", " . date('H:i', strtotime($undangan->jam)) . " WIB\nTempat / Link Rapat: {$undangan->tempat_link}\nAgenda: {$undangan->agenda}\n\nDemikian undangan ini kami sampaikan, atas perhatian dan kehadirannya kami ucapkan terima kasih.\n\nHormat kami,\n{$undangan->pengirim}") }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
            <i class="fa fa-envelope"></i> Email
        </a>

        <button onclick="copyToClipboard('undangan-text-content')"
            class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 flex items-center gap-2">
            <i class="fa fa-clipboard"></i> Salin
        </button>

        <a href="{{ route('undangan.exportPdf', $undangan->id) }}"
            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 flex items-center gap-2">
            <i class="fa fa-file-pdf"></i> Export PDF
        </a>
    </div>
</div>
