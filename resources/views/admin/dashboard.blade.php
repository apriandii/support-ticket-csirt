@extends('layoutview/layout')
@section('title', 'Report Form - CSIRT Kaltara')
@section('content')

    <head>
        <title>Dashboard Admin CSIRT</title>
    </head>
    <div id="main">

        <body>
            <div class="flex flex-wrap gap-4 justify-left">
            <div class="box-content size-32 rounded-lg border-4 bg-blue-400 p-2 text-white">
                Total Aduan
            </div>
            <div class="box-content size-32 rounded-lg border-4 bg-orange-400 p-2 text-white">Aduan Dalam Proses</div>
            <div class="box-content size-32 rounded-lg border-4 bg-green-400 p-2 text-white">Aduan Selesai</div>
            </div>
            <form method="GET" action="{{ route('admin.dashboard') }}">
                <label>Filter Status:</label>
                <select name="status" onchange="this.form.submit()">
                    <option value="">-- Semua Status --</option>
                    <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </form>

            <table class="table-fixed">
                <thead>
                    <tr>
                        <th>Nomor Tiket</th>
                        <th>Nama</th>
                        <th>Topik</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>{{ $report->ticket_number }}</td>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->help_topic }}</td>
                            <td>{{ ucfirst($report->status) }}</td>
                            <td>{{ $report->created_at->format('d-m-Y H:i') }}</td>
                            <td><a href="{{ route('admin.edit', $report->id) }}">Ubah Status</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada laporan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </body>
    </div>
@endsection
