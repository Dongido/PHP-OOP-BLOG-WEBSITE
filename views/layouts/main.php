<?php
    use app\controllers\SiteController;
    $utility = new SiteController();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <title><?php echo $this->title ?></title>

    <link rel="stylesheet" href="/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="/css/aos.css/aos.css" />
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header id="header">
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="navbar-top">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="navbar-top-left-menu">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Advertise</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
                <?php use app\phpmvc\Application;
                if (Application::isGuest()): ?>

                <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link"><i class="mdi mdi-magnify"></i></a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="/register" class="nav-link">Sign in</a>
                    </li> -->
                </ul>
                <?php else: ?>

                <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Welcome <?php echo Application::$app->user->getDisplayName() ?> (Logout)</a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
            </div>
            <div class="navbar-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                <a class="navbar-brand" href="/"
                    ><img src="/assets/images/logo.png" alt="logo"/></a>
                </div>
                <div>
                <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                    <li>
                        <button class="navbar-close"><i class="mdi mdi-close"></i></button>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <?php
                        $cats = $utility->getCategories(5);
                        foreach($cats as $cat){ 
                            echo "
                                <li class='nav-item'>
                                    <a class='nav-link' href='/category/".$cat['id']."'>". $cat['title']. "</a>
                                </li>
                            ";
                        }  
                    ?>
                   
                    </ul>
                </div>
                </div>
                <ul class="social-media">
                <li>
                    <a href="#"><i class="mdi mdi-facebook"></i> </a>
                </li>
                <li>
                    <a href="#"><i class="mdi mdi-youtube"></i> </a>
                </li>
                <li>
                    <a href="#"> <i class="mdi mdi-twitter"></i> </a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
        </div>
    </header>
    <div class="flash-news-banner">
        <div class="container">
        <div class="d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
            <span class="badge badge-dark mr-3">Flash news</span>
            <p class="mb-0">
                <?php
                      $posts = $utility->displayPostByPosition($position = 'flash_news', 1);
                      foreach($posts as $post){ 
                        echo $post['title'];
                      }  
                ?>
            </p>
            </div>
            <div class="d-flex">
            <span class="mr-3 text-danger"><?php echo date("h:i:sa"); ?></span>
            <span class="text-danger">30°C,London</span>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <?php if (Application::$app->session->getFlash('success')): ?>
            <div class="alert alert-success">
                <p><?php echo Application::$app->session->getFlash('success') ?></p>
            </div>
        <?php endif; ?>
        {{content}}
    </div>

    <footer>      
        <div class="footer-bottom">
        <div class="container">
            <div class="row">
            <div class="col-sm-12">
                <div class="d-sm-flex justify-content-between align-items-center">
                <div class="fs-14 font-weight-600">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All Times News. 
                </div>
                <div class="fs-14 font-weight-600">
                    Developed by <a href="https://www.linkedin.com/in/gideon-chimankpa-4bb35a160" target="_blank" class="text-white">Gideon Gideoti</a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>

    <script src="/js/vendor.bundle.base.js"></script>
    <script src="/js/aos.js"></script>
    <script src="/js/demo.js"></script>
    <script src="/js/jquery.easeScroll.js"></script>
</body>
</html>