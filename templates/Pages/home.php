<?php
/**
 * CakePHP home page.
 *
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Home');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Jims Connect, IT Solutions, Contractor Recruitment, Organization Recruitment" name="keywords">
    <meta content="Jims Connect offers IT solutions and recruits top contractors and organizations to drive digital transformation." name="description">

    <!-- Google Web Fonts -->
    <?= $this->Html->css('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap') ?>

    <!-- Icon Font Stylesheet -->
    <?= $this->Html->css([
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css'
    ]) ?>

    <!-- Libraries Stylesheet -->
    <?= $this->Html->css([
        '/lib/animate/animate.min.css',
        '/lib/owlcarousel/assets/owl.carousel.min.css'
    ]) ?>

    <!-- Customized Bootstrap Stylesheet -->
    <?= $this->Html->css('/css/bootstrap.min.css') ?>

    <!-- Template Stylesheet -->
    <?= $this->Html->css('/css/style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <!-- CSS to Prevent Overflow and Make Buttons Clickable -->
    <style>
        body {
            overflow-x: hidden;
        }

        .carousel-caption,
        button,
        .navbar {
            position: relative;
            z-index: 10;
        }

        .carousel-item img {
            position: relative;
            z-index: 1;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }

        .btn {
            position: relative;
            z-index: 10;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-2 px-0">
        <div class="container d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <small class="text-white-50 me-3"><i class="fas fa-map-marker-alt me-2"></i>23 Ranking Street, Clayton</small>
                <small class="text-white-50"><i class="fas fa-envelope me-2"></i>contact@jimsconnect.com</small>
            </div>
            <div class="d-flex align-items-center">
                <small class="text-secondary me-4">Empowering Digital Solutions & Recruitment</small>

            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <?= $this->Html->image('carousel-1.jpg', ['class' => 'w-100', 'alt' => 'Innovative IT Solutions']) ?>
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h5 class="text-secondary mb-3">Connecting Businesses with Technology & Talent</h5>
                        <h1 class="display-1 text-white mb-4">Your Partner in IT Solutions and Recruitment</h1>
                        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>" class="btn btn-primary px-4 py-2">Learn More</a>
                        <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'addPublic']) ?>" class="btn btn-secondary px-4 py-2 ms-3">Get in Touch</a>
                        </div>
                </div>
                <div class="carousel-item">
                    <?= $this->Html->image('carousel-2.jpg', ['class' => 'w-100', 'alt' => 'Digital Services']) ?>
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h5 class="text-secondary mb-3">Empowering Businesses with Technology & Expertise</h5>
                        <h1 class="display-1 text-white mb-4">Recruitment & IT Solutions to Drive Success</h1>
                        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'service']) ?>" class="btn btn-primary px-4 py-2">Our Services</a>
                        <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'addPublic']) ?>" class="btn btn-secondary px-4 py-2 ms-3">Get in Touch</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Fact Section Start -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-3">
                    <h1 class="text-primary">150+</h1>
                    <h5 class="text-white">Satisfied Clients</h5>
                </div>
                <div class="col-lg-3">
                    <h1 class="text-primary">10 Years</h1>
                    <h5 class="text-white">of Experience</h5>
                </div>
                <div class="col-lg-3">
                    <h1 class="text-primary">500+</h1>
                    <h5 class="text-white">Contractors Recruited</h5>
                </div>
                <div class="col-lg-3">
                    <h1 class="text-primary">100+</h1>
                    <h5 class="text-white">Organizations Supported</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Section End -->

    <!-- About Section Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <div class="position-relative">
                        <?= $this->Html->image('about-1.jpg', ['class' => 'img-fluid w-75 rounded', 'alt' => '', 'style' => 'margin-bottom: 25%;']) ?>
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <?= $this->Html->image('about-2.jpg', ['class' => 'img-fluid w-100 rounded', 'alt' => '']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h5 class="text-primary">About Jims Connect</h5>
                    <h1 class="mb-4">Your IT Partner for Technology and Talent</h1>
                    <p>Jims Connect provides innovative IT solutions while specializing in recruitment services for contractors and organizations. We bridge the gap between businesses and skilled professionals, ensuring our clients have access to the expertise needed to succeed.</p>
                    <p class="mb-4">Whether you're looking to enhance your tech capabilities or recruit top talent, Jims Connect is here to support your growth journey.</p>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']) ?>" class="btn btn-secondary px-5 py-3 text-white">Learn More About Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Services Section Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container text-center">
            <h5 class="text-primary">Our Services</h5>
            <h1>Comprehensive IT & Recruitment Solutions for Your Business</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="bg-light p-4 text-center">
                        <i class="fa fa-code fa-3x text-primary mb-3"></i>
                        <h4>Custom Software Development</h4>
                        <p>We design and develop custom software solutions to streamline business processes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light p-4 text-center">
                        <i class="fa fa-laptop fa-3x text-primary mb-3"></i>
                        <h4>Mobile & Web App Development</h4>
                        <p>Our team creates high-quality mobile and web applications for various industries.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bg-light p-4 text-center">
                        <i class="fa fa-users fa-3x text-primary mb-3"></i>
                        <h4>Recruitment for Contractors & Organizations</h4>
                        <p>We connect businesses with top contractors and organizations, ensuring the best talent for your projects.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Section End -->



    <!-- JavaScript Libraries -->
    <?= $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js',
        '/js/bootstrap.bundle.min.js',
        '/lib/wow/wow.min.js',
        '/lib/easing/easing.min.js',
        '/lib/waypoints/waypoints.min.js',
        '/lib/owlcarousel/owl.carousel.min.js'
    ]) ?>

    <!-- Template Javascript -->
    <?= $this->Html->script('/js/main.js') ?>

    <?= $this->fetch('script') ?>
</body>

</html>
