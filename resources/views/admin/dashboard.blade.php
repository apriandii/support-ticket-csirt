<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin CSIRT</title>
</head>
<body>
    <h1>Dashboard Admin</h1>

    {{-- @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif --}}

    <form method="GET" action="{{ route('admin.dashboard') }}">
        <label>Filter Status:</label>
        <select name="status" onchange="this.form.submit()">
            <option value="">-- Semua Status --</option>
            <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
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
</html>
<!DOCTYPE html>
<html lang="en">