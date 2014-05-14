<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BetaUp</title>

        <!-- Bootstrap core CSS -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

        <link href="{{{ URL::asset('packages/belar/betaup/assets/css/magister.css') }}}" rel="stylesheet">

        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Wire+One' rel='stylesheet' type='text/css'>
    </head>

    @if( \Config::get('betaup::config.dark_theme') == 'true' )
    <body class="theme-invert">
        @else
        <body>
            @endif
            <div class="container">

                @if(Session::has('global_error'))
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div id="flash_notice">{{{ Session::get('global_error') }}}</div>
                </div>
                @endif

                @if(Session::has('global_success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <div id="flash_notice">{{{ Session::get('global_success') }}}</div>
                </div>
                @endif		
            </div>

            <nav class="mainmenu">
                <div class="container">
                    <div class="dropdown">
                        <button type="button" class="navbar-toggle" data-toggle="dropdown"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <!-- <a data-toggle="dropdown" href="#">Dropdown trigger</a> -->
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="/betaup" class="active">BetaUp</a></li>
                            <li><a href="http://github.com/Belar/BetaUp" target="_blank">BetaUp on GitHub</a></li>
                            <li><a href="http://www.gettemplate.com/" target="_blank">Default theme by Get Template</a></li>
                            <li class="divider"></li>
                            <li><a href="betaup/massmail">Mass Mail option</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="section" id="head">
                @yield('content')
            </section>



            <!-- Bootstrap core JavaScript
================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>  
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

            <script>
                $('.alert').delay({{{\Config::get('betaup::config.alert_timeout')}}}).fadeOut(1000);

                @if( $main_background_image = \Config::get('betaup::config.main_background_image') )

                $('html').css('background-image', 'url(' + '{{{ \Config::get('betaup::config.main_background_image') }}}' + ')' );

                @endif
            </script>

        </body>
    </html>
