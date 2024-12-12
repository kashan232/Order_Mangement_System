<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Comming Soon</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">


    <!-- Font -->

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">


    <link href="soon_assets/common-css/ionicons.css" rel="stylesheet">


    <link rel="stylesheet" href="soon_assets/common-css/jquery.classycountdown.css" />

    <link href="soon_assets/03-comming-soon/css/styles.css" rel="stylesheet">

    <link href="soon_assets/03-comming-soon/css/responsive.css" rel="stylesheet">

</head>

<body>

    <div class="main-area center-text" style="background-image:url(soon_assets/images/soon1.jpg);">

        <div class="display-table">
            <div class="display-table-cell">

                <h1 class="title font-white"><b>Comming Soon</b></h1>
                <p class="desc font-white">We're working hard to bring you a powerful and efficient Order Booker platform. Stay tuned for a seamless experience that will transform the way you manage orders and customer relationships.</p>
                @if (Route::has('login'))
                    @auth
                    <a class="notify-btn" href="{{ url('/home') }}"><b>Dashboard</b></a>
                    @else

                    <a class="notify-btn" href="{{ route('login') }}"><b>Login</b></a>
                    @if (Route::has('register'))
                    <a class="notify-btn" href="{{ route('register') }}"><b>Register</b></a>
                    @endif
                    @endauth
                @endif


            </div><!-- display-table -->
        </div><!-- display-table-cell -->
    </div><!-- main-area -->

</body>

</html>