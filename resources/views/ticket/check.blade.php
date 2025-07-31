<!DOCTYPE html>
<html>

<head>
    <title>Cek Status Laporan</title>
</head>

<body>
    <h2>Cek Status Laporan Anda</h2>

    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('ticket.check') }}" method="POST" type="hidden"
        name="recaptcha_token" id="recaptcha_token">
        @csrf
        <input type="text" name="ticket_number" placeholder="Masukkan Nomor Tiket" required>

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>

        <button type="submit">Cek Status</button>

        {{-- @error('g-recaptcha-response')
            <div class="text-red-600 text-sm mt-1">{{ 'Captcha Verification Fail!. Please try again.' }}</div>
        @enderror --}}
    </form>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
