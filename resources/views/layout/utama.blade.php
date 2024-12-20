<!DOCTYPE html>
<html class="bg-slate-200">

<head>
    <meta charset="utf-8">
    <title>MyGMCommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/ca4cafcf9e.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ca4cafcf9e.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <!-- Font Awesome Link for Icons -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
    <script>
        var wa_btnSetting = {
            "btnColor": "#16BE45",
            "ctaText": "WhatsApp Kami",
            "cornerRadius": 40,
            "marginBottom": 20,
            "marginLeft": 20,
            "marginRight": 20,
            "btnPosition": "right",
            "whatsAppNumber": "62895359515260",
            "welcomeMessage": "Halo, Saya mau pesan barang dari GM!",
            "zIndex": 999999,
            "btnColorScheme": "light"
        };
        window.onload = () => {
            _waEmbed(wa_btnSetting);
        };
    </script>
    <link rel="apple-touch-icon" sizes="180x180" href={{ asset('favicon_io/apple-touch-icon.png') }}>
    <link rel="icon" type="image/png" sizes="32x32" href={{ asset('favicon_io/favicon-32x32.png') }}>
    <link rel="icon" type="image/png" sizes="16x16" href={{ asset('favicon_io/favicon-16x16.png') }}>
    <link rel="manifest" href="/site.webmanifest">

</head>


<body class="bg-white overflow-x-hidden" style="overflow-x: hidden; font-family:Poppins">

    @include('partial.navbar')


    @yield('konten')


    @include('partial.footer')


    <script src={{ asset('js/script.js') }}></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>