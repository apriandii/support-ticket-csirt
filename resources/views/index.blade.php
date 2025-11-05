@extends('layoutview/layout')
@section('title', 'Report Form - CSIRT Kaltara')
@section('content')

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>Layanan Aduan Insiden Siber</title>
    </head>

    <body>
        <main display="flex" align-items="center" justify-content="center" padding="2rem" min-height="calc(80vh - 100px)">
            <div class="form-card">
                <img src="./Layanan Aduan Insiden Siber_files/189655.png" alt="Icon Keamanan">
                <p>
                    Laporkan serangan siber, phishing, peretasan, atau gangguan keamanan lainnya secara cepat dan aman
                    melalui CSIRT Provinsi Kalimantan Utara.
                </p>
                <div class="actions">
                    <a href="{{ route('report.ticket') }}">Laporkan</a>
                    <a href="{{ route('ticket.form') }}">Cek Status</a>
                </div>
            </div>
        </main>
    </body>
@endsection
