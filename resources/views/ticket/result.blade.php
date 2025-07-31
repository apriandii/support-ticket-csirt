<!DOCTYPE html>
<html>
<head>
    <title>Hasil Cek Tiket</title>
</head>
<body>
    <h2>Detail Laporan Anda</h2>

    <p><strong>Nomor Tiket:</strong> {{ $report->ticket_number }}</p>
    <p><strong>Nama:</strong> {{ $report->name }}</p>
    <p><strong>Topik:</strong> {{ $report->help_topic }}</p>
    <p><strong>Ringkasan:</strong> {{ $report->issue_summary }}</p>
    <p><strong>Status:</strong> <span style="text-transform: capitalize">{{ $report->status }}</span></p>

    {{-- @if($report->attachment)
        <p><strong>Lampiran:</strong><br>
            <img src="{{ asset('storage/' . $report->attachment) }}" alt="Lampiran" style="max-width:300px">
        </p>
    @endif --}}

    <p><a href="{{ route('ticket.form') }}">← Cek tiket lain</a></p>
</body>
</html>
