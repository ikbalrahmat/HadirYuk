{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Survey: {{ $survey->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Isi Survey: {{ $survey->judul }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('survey.public.store', $survey->id) }}" method="POST">
        @csrf

        @foreach($survey->questions as $question)
            <div class="mb-4">
                <label class="form-label d-block">{{ $loop->iteration }}. {{ $question->pertanyaan }}</label>

                @for($i = 1; $i <= 5; $i++)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"
                               name="jawaban_{{ $question->id }}"
                               id="q{{ $question->id }}_{{ $i }}" value="{{ $i }}" required>
                        <label class="form-check-label" for="q{{ $question->id }}_{{ $i }}">
                            @if($i == 1) 1. Sangat Kurang
                            @elseif($i == 2) 2. Kurang
                            @elseif($i == 3) 3. Cukup
                            @elseif($i == 4) 4. Baik
                            @elseif($i == 5) 5. Sangat Baik
                            @endif
                        </label>
                    </div>
                @endfor
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Kirim Jawaban</button>
    </form>
</div>
</body>
</html> --}}


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Survey: {{ $survey->judul }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
        Survey: {{ $survey->judul }}
    </h2>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('survey.public.store', $survey->id) }}" method="POST" class="space-y-6">
        @csrf

        @foreach($survey->questions as $question)
            <div class="bg-white rounded-xl shadow-md p-6">
                <label class="block text-lg font-medium text-gray-700 mb-4">
                    {{ $loop->iteration }}. {{ $question->pertanyaan }}
                </label>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @for($i = 1; $i <= 5; $i++)
                        <label class="flex items-center p-3 border rounded-lg cursor-pointer hover:bg-gray-50">
                            <input class="form-radio text-blue-600 h-5 w-5"
                                   type="radio"
                                   name="jawaban_{{ $question->id }}"
                                   value="{{ $i }}"
                                   required>
                            <span class="ml-3 text-gray-700">
                                @if($i == 1) 1. Sangat Kurang
                                @elseif($i == 2) 2. Kurang
                                @elseif($i == 3) 3. Cukup
                                @elseif($i == 4) 4. Baik
                                @elseif($i == 5) 5. Sangat Baik
                                @endif
                            </span>
                        </label>
                    @endfor
                </div>
            </div>
        @endforeach

        <div class="text-center">
            <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition">
                Kirim Jawaban
            </button>
        </div>
    </form>
</div>
</body>
</html>
