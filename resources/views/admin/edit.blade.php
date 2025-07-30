<!DOCTYPE html>
<html>
<head>
    <title>Ubah Status Tiket</title>
</head>
<body>
    <h2>Ubah Status Tiket: {{ $report->ticket_number }}</h2>

    <form action="{{ route('admin.update', $report->id) }}" method="POST">
        @csrf
        <label>Status:</label>
        <select name="status" required>
            <option value="baru" {{ $report->status == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="diproses" {{ $report->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $report->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
        <br><br>
        <button type="submit">Simpan</button>
    </form>

    <p><a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a></p>
</body>
</html>
