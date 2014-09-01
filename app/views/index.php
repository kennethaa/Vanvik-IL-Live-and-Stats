<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vanvik IL Live &amp; Stats">
    <meta name="author" content="Kenneth Aasan">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Vanvik Live">

    <title>Vanvik IL Live &amp; Stats</title>

    <link rel="shortcut icon" href="img/favicon/favicon.png">
    <!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152-precomposed.png">
    <!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144-precomposed.png">
    <!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120-precomposed.png">
    <!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS ≥ 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76-precomposed.png">
    <!-- For the iPad mini and the first- and second-generation iPad on iOS ≤ 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72-precomposed.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="img/favicon/apple-touch-icon-precomposed.png">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom styles for this app -->
    <link rel="stylesheet" href="css/app.css"/>

    <!-- Add 2 Home -->
    <link rel="stylesheet" href="css/addtohomescreen.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    
    <div class="container-fluid">
        <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#!">Vanvik IL Live &amp; Stats</a>
                </div>
                <div class="collapse navbar-collapse" ng-controller="HeaderController">
                    <ul class="nav navbar-nav">
                        <li ng-class="{ active: isActive('/live')}"><a href="#!/live">Live</a></li>
                        <li ng-class="{ active: isActive('/spillerstall')}"><a href="#!/spillerstall">Spillerstall</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div><!--/.container -->
        </div>

    

        <div ng-view></div>

    </div><!-- /.container -->

    <!-- JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.bootstrap-growl.js"></script>

    <script src="js/soundmanager2-nodebug-jsmin.js"></script>
    <script>
        soundManager.setup({
            url: '/swf/',
            flashVersion: 9,
            preferFlash: false,
            onready: function() {
                soundManager.createSound({
                    id: 'pling',
                    url: '/audio/pling.mp3'
                });
            }
        });
    </script>

    <script src="js/angular.min.js"></script>
    <script src="js/angular-route.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/services.js"></script>
    <script src="js/controllers.js"></script>
    <script src="js/filters.js"></script>
    <script src="js/directives.js"></script>

    <!-- Add 2 Home -->
    <script src="js/addtohomescreen.min.js"></script>
    <script>
        addToHomescreen({
            skipFirstVisit: true,
            maxDisplayCount: 1
        });
    </script>


    <!-- GOOGLE ANALYTICS -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-35314538-1', 'vanvikil.no');
        ga('send', 'pageview');
    </script>
    <noscript>Vennligst aktiver JavaScript</noscript>
</body>
</html>
