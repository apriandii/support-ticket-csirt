<!DOCTYPE html>
<html>
<head>
    <title>Pelaporan Insiden CSIRT</title>
</head>
<body>
    <h2>Formulir Pelaporan</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="text" name="phone" placeholder="Nomor HP" required><br>

        <select name="help_topic" required>
            <option value="">-- Pilih Topik Bantuan --</option>
            <option value="Insiden Siber">Insiden Siber</option>
            <option value="Pelaporan Masalah">Pelaporan Masalah</option>
            <option value="Permohonan Pentest">Permohonan Pentest</option>
        </select><br>

        <textarea name="issue_summary" placeholder="Ringkasan Masalah" required></textarea><br>
        <input type="file" name="attachment" accept="image/*"><br>

        <button type="submit">Kirim Laporan</button>
    </form>
</body>
</html>