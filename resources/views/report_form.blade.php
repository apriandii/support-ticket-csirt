@extends('layoutview/layout')
@section('title', 'Report Form - CSIRT Kaltara')
@section('content')

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Buat Tiket Laporan - CSIRT Kaltara</title>

        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        @vite('resources/css/app.css')
    </head>

    <body>
        @if (session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif
        <main>
            <div class="form-card">
                <h2>Buat Tiket Laporan</h2>
                <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" type="hidden"
                    name="recaptcha_token" id="recaptcha_token">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input name="name" type="text" id="name" placeholder="Nama lengkap Anda" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="email" id="email" placeholder="contoh@email.com" required />
                    </div>

                    <div class="form-group">
                        <label for="phone">Nomor Telepon</label>
                        <input name="phone" type="text" id="phone" placeholder="08xxxxxxxxxx" required />
                    </div>

                    <div class="form-group">
                        <label for="help_topic">Topik Bantuan</label>
                        <select name="help_topic" id="help_topic" required>
                            <option value="">--Pilih Topik--</option>
                            <option value="Insiden Siber">Insiden Siber</option>
                            <option value="Pelaporan Masalah">Pelaporan Masalah</option>
                            <option value="Permohonan Pentest">Permohonan Pentest</option>
                        </select>
                    </div>
                    @if (isset($reporttt))
                        <div><span class="label">Nomor Tiket</span>: {{ $reporttt->ticket_number }}</div>
                    @endif
                    <div class="form-group">
                        <label for="issue_summary">Deskripsi Laporan</label>
                        <textarea name="issue_summary" id="issue_summary" placeholder="Jelaskan secara singkat kronologi kejadian..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="attachment">Lampiran</label>
                        <input name="attachment" type="file" id="attachment" accept="image/*" />
                    </div>
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

                    @if (session('error'))
                        <p style="color:red">{{ session('error') }}</p>
                    @endif
                    @error('g-recaptcha-response')
                        <div class="mt-10 text-sm text-red-600">{{ 'Captcha Verification Fail!. Please try again.' }}</div>
                    @enderror
                    <button
                        class="w-30 ml-20 mt-5 size-10 rounded-[99px] bg-red-500 text-[15px] text-white hover:bg-red-600"
                        onclick="window.location.href='{{ route('landing.page') }}'" type="reset">
                        Batal
                    </button>

                    <button class="w-30 size-10 rounded-[99px] bg-[#007c91] text-[15px] text-white hover:bg-[#055b6e]"
                        type="submit">Kirim</button>
                </form>


            </div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        </main>
    </body>
@endsection
