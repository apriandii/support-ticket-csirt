<header background-color="#f1f5f9" color="black" padding="1rem 2rem" display="flex" align-items="center"
    justify-content="space-between">
    <div class="brand">
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()">

            <img src="{{ 'storage/images/logo_ttis.png' }}" width="100" height="200" alt="Logo" />
        </span>
        <a href="{{ route('landing.page') }}">
            <h1>Layanan Aduan<br>Insiden Siber</h1>
        </a>
    </div>
    <a href="{{ route('admin.dashboard') }}" class="login-link">login</a>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="#">Kelola Aduan</a>
    </div>


    <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
    {{-- <div id="main">
        
    </div> --}}
</header>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
