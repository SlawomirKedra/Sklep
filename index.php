<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sklep internetowy - Roleton</title>

    <!-- Bootstrap Core CSS -->
    <link href="html/content/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="html/content/css/shop-homepage.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Roleton</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="html/views/rejestracja.php">Rejestracja</a>
                    </li>
                    <li>
                        <a href="html/views/logowanie.php">Logowanie</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Panel boczny -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Menu:</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Rolety wewnętrzne</a>
                    <a href="#" class="list-group-item">Rolety zewnętrzne</a>                    
                    <a href="#" class="list-group-item">Żaluzje</a>
                    <a href="#" class="list-group-item">Moskitiery</a>
                    <a href="#" class="list-group-item">Markizy</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="html/image/moskitiery.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="html/image/zaluzje.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="html/image/rolety.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="html/image/roletydziennoc1.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Od 36.00 zł</h4>
                                <h4><a href="#">Rolety wewn.</a>
                                </h4>
                                <p>Rolety dzień-noc , mini, standard, z kasetką, sinus, zaciągane od dołu, do okien dachowych, rzymskie</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="html/image/roletyzewnetrzne.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Od 1023.00 zł</h4>
                                <h4><a href="#">Rolety zewn.</a>
                                </h4>
                                <p>Rolety zewnętrzne elewacyjne, naokienne, podtynkowe, bramy rolowane, żaluzje fasadowe</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="html/image/zaluzje1.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Od 32.00 zł</h4>
                                <h4><a href="#">Żaluzje</a>
                                </h4>
                                <p>Żaluzje poziome aluminiowe, poziome drewniane, poziome isotra, pionowe verticale, plisy </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">12 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="html/image/moskitiera.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Od 50.00 zł</h4>
                                <h4><a href="#">Moskitiery</a>
                                </h4>
                                <p>Moskitiery rolowane, drzwi siatkowe, ekrany okienne</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">31 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="html/image/markiza2.jpg" alt="">
                            <div class="caption">
                                <h4 class="pull-right">Od 250.00 zł</h4>
                                <h4><a href="#">Markizy</a>
                                </h4>
                                <p>Markizy tarasowe, balkonowe, veranda, refleksole</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">6 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Roleton 2016</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="html/content/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="html/content/js/bootstrap.min.js"></script>

</body>

</html>
