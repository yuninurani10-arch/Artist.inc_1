<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Artist.Inc</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background-color:white;
        }
        .page{
            width:90%;
            max-width:1100px;
            margin:20px auto;
            background-color:white;
        }
        .navbar {
            height:70px;
            background-color:white;
            display:flex;
            align-items:center;
            justify-content: space-between;
            padding:0 45px;
        }
        .logo img{
            width:120px;
            height:auto;
            display:block;
        }
        .menu{
            display:flex;
            align-items:center;
            gap:35px;
        }
        .menu a{
            text-decoration:none;
            color:#222;
            font-size:13px;
        }
        .menu a:hover{
            color:#7438b5;
        }
        .icons{
            display:flex;
            gap:18px;
            font-size:18px;
        }
        .container{
            width:100%;
        }
       .hero{
        position:relative;
        height:500px;
        overflow:hidden;
       }
        .hero img{
            width:100%;
            height:100%;
            object-fit:cover;
            display:block;
       }
        .hero-text{
            position: absolute;
            top:45px;
            left:30px;
            color:white;
        }
        .hero-text h1{
            font-size:42px;
            line-height:1,1;
            margin:0 0250px 0;
        }
        .hero-button{
            display:inline-block;
            background-color:white;
            color:#222;
            padding:12px 20px;
            text-decoration:none;
            font-size:13px;
        }
        @stack('styles');
    </style>
</head>
<body>
    <div class="page">
    <nav class="navbar">
        <div class="logo">
            <img src="/images/artist-inc-logo2-scaled.webp"alt="Artist.Inc">
            </div>
            <div class="menu">
                <a href="/">Home</a>
                <a href="/products">Produk</a>
                <a href="#">Tentang Kami</a>
            <div class="icons">
                <span>⌕</span>
                <span>♙</span>
                </div>
                </div>
        </nav>
        <main class="container">
            @yield('content')
        </main>
        </div>
        @stack('scripts')
</body>
</html>