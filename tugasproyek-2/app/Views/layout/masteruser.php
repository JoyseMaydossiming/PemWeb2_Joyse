<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- FontAwesome JS-->
    <script defer src="fontawesome/js/all.min.js"></script>

    <!-- Slider -->
    <link rel="stylesheet" href="plugins/tiny-slider/tiny-slider.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=base_url('userstyle/style.css')?>">

    <title>RENTALMOBIL - Sistem Jasa Penyewaan Mobil</title>
</head>

<body>

    <header class="header fixed-top">
        <div class="branding">
            <div class="container-fluid position-relative">
                <nav class="navbar navbar-expand-lg">
                    <div class="site-logo">
                        <a class="navbar-brand" href="<?=base_url('')?>"> <img class="logo-icon mr-2" src="<?=base_url('img/logo.png')?>" alt="logo">
                            <span class="logo-text muncul">RENTAL<span
                                class="text-alt muncul">MOBIL</span></span>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse py-3 py-lg-0" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link" href="<?=base_url('')?>">Beranda</a>
                            </li>
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link" href="<?=base_url('home/produk')?>">Produk</a>
                            </li>
                            <li class="nav-item mr-lg-4">
                                <a class="nav-link" href="<?=base_url('/about.php')?>">Hubungi Kami</a>
                            </li>
                            <?php if(!session()->get('username')):?>
                                <li class="nav-item mr-lg-0 mt-3 mt-lg-0 login">
                                    <a href="<?=base_url('home/login')?>" class="btn btn-primary text-white">Login</a>
                                </li>
                            <?php endif;?>
                            <?php if(session()->get('username') == "admin"):?>
                                <li class="nav-item mr-lg-0 mt-3 mt-lg-0 login">
                                    <a href="<?=base_url('users')?>" class="nav-link">Menu Admin</a>
                                </li>
                            <?php endif;?>
                            <?php if(session()->get('username')):?>
                                <li class="nav-item">
                                    <a  class="nav-link" href="<?=base_url('home/index')?>" >Hai, <?= session()->get('username') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=base_url('home/logout')?>" class="btn btn-primary text-white">Logout</a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <?= $this->renderSection("content") ?>

    <footer class="footer fixed-bottom">
        <!--//newsletter-section-->
        <div class="footer-bottom text-center pb-3 pt-3">
            <small class="copyright">Copyright &copy; 2022 made with <i class="fas fa-heart" style="color: red;"></i>
            </small>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="<?=base_url('adminLTE/plugins/jquery/jquery.min.js')?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="<?=base_url('userstyle/script.js')?>"></script>
    <script>
        function refreshPage(){
            window.location.reload();
        } 
    </script>
    <?= $this->renderSection("pageScript") ?>
</body>

</html>