<!DOCTYPE html>
<html>

<head>
    <title>Pelaporan Insiden CSIRT</title>
</head>

<body>
    <h2>Formulir Pelaporan</h2>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data" type="hidden"
        name="recaptcha_token" id="recaptcha_token">
        @csrf
        Email Address: <br>
        <input type="email" name="email" placeholder="Email Address" required><br>
        Full Name: <br>
        <input type="text" name="name" placeholder="Full Name" required><br>
        Phone Number: <br>
        <input type="text" name="phone" placeholder="Phone Number" required><br>
        Help Topic: <br>
        <select name="help_topic" required>
            <option value="">-- Select a Help Topic --</option>
            <option value="Insiden Siber">Insiden Siber</option>
            <option value="Pelaporan Masalah">Pelaporan Masalah</option>
            <option value="Permohonan Pentest">Permohonan Pentest</option>
        </select><br>
        Issue Summary: <br>
        <textarea name="issue_summary" placeholder="Issue Summary" required></textarea><br>
        <input type="file" name="attachment" accept="image/*"><br>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

        @if (session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif

@error('g-recaptcha-response')
    <div class="text-red-600 text-sm mt-1">{{ "Captcha Verification Fail!. Please try again." }}</div>
@enderror

        <button type="submit">Create a Ticket</button>
    </form>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
