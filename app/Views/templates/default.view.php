<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to the WiR3D</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="resources/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Theme CSS -->
    <!-- <link href="resources/css/freelancer.min.css" rel="stylesheet"> -->
    <link href="./resources/css/welcome.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resources/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" style="padding-top: 100px">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom" role="navigation">
        <!--
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>    
        </div>
        -->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav"><li class="logo">WiR3D</li></ul>   
                        
            <ul class="nav navbar-nav navbar-center">
                <li><a id="home" href="index.php">Home</a>
                </li>
                <li><a id="mail" href="https://landscape.wired.dynalias.org" target="blank">Mail</a>
                </li>
                <li><a id="gallery" href="http://gallery.wired.dynalias.org" target="blank">Gallerie</a>
                </li>
                <li><a id="owncloud" href="https://cloud.wired.dynalias.org/owncloud/" target="blank">Cloud</a>
                </li>
                <li><a id="library" href="index.php?p=library">Biblioth&egrave;que</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right"></ul>
                
        </div>
    </nav>

    
    
    
    
    
        <?= $content; ?>
   
    
    


    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="resources/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="resources/vendor/bootstrap/js/bootstrap.min.js"></script>


</body>

</html>