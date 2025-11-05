@extends('layoutview/layout')
@section('title', 'Report Form - CSIRT Kaltara')
@section('content')

    <head>
        <title>Cek Status Laporan</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        @if (session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif
        <main>
            <form method="POST" action="{{ route('ticket.check') }}" type="hidden" name="recaptcha_token" id="recaptcha_token">
                @csrf
                <div class="form-card">
                    <h2>Status Laporan</h2>

                    <p class="subjudul">Nomor Tiket</p>

                    <input type="text" name="ticket_number" placeholder="Masukkan Nomor Tiket Anda" class="mb-5" />

                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                    <button
                        class="w-30 ml-6 mt-5 size-10 rounded-[99px] bg-red-500 text-[15px] text-white hover:bg-red-600"
                        onclick="window.location.href='{{ route('landing.page') }}'" type="reset">
                        Batal
                    </button>
                    <button class="w-30 size-10 rounded-[99px] bg-[#007c91] text-[15px] text-white hover:bg-[#055b6e]"
                        type="submit">Cek</button>

                    <script src="//unpkg.com/alpinejs" defer></script>

                    @if (isset($report))
                        <div x-data="{ open: true }" x-show="open" x-transition>
                            <div class="status-info">
                                <div><span class="label">Nomor</span>: {{ $report->ticket_number }}</div>
                                <div><span class="label">Nama Lengkap</span>: {{ $report->name }} </div>
                                <div><span class="label">Email</span>: {{ $report->email }}</div>
                                <div><span class="label">Nomor Telepon</span>:{{ $report->phone }} </div>
                                <div><span class="label">Topik Bantuan</span>: {{ $report->help_topic }} </div>
                                @if ($report->status === 'baru')
                                    <div><span class="label">Status</span>: <span
                                            class="baru">{{ $report->status }}</span> </div>
                                @elseif ($report->status === 'diproses')
                                    <div><span class="label">Status</span>: <span
                                            class="diproses">{{ $report->status }}</span> </div>
                                @else
                                    <div><span class="label">Status</span>: <span
                                            class="selesai">{{ $report->status }}</span> </div>
                                @endif
                                <button @click="open = false"
                                    class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    @endif

                    @if (session('not_found'))
                        <div class="mt-3 text-red-600">
                            {{ session('not_found') }}
                        </div>
                    @endif
                </div>
            </form>

        </main>
    </body>
@endsection
