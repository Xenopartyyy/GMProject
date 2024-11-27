<!DOCTYPE html>
<html class="bg-slate-200">

<head>
  <meta charset="utf-8">
  <title>MyGMCommerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href= {{ asset('css/style.css') }}>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ca4cafcf9e.js" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ca4cafcf9e.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite('resources/css/app.css')
  <!-- Font Awesome Link for Icons -->
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
          var wa_btnSetting = {"btnColor":"#16BE45","ctaText":"WhatsApp Kami","cornerRadius":40,"marginBottom":20,"marginLeft":20,"marginRight":20,"btnPosition":"right","whatsAppNumber":"6285215321818","welcomeMessage":"Halo, ada yang bisa kami bantu?","zIndex":999999,"btnColorScheme":"light"};
          window.onload = () => {
            _waEmbed(wa_btnSetting);
          };
        </script>
      
</head>

<body class="bg-white overflow-x-hidden" style="overflow-x: hidden; font-family:Poppins">
    
    @include('partial.navbar')


    @yield('konten')


    @include('partial.footer')



<script src= {{ asset('js/script.js') }}> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script> AOS.init(); </script>


</body>

</html>