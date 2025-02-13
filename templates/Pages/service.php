<?php
/**
 * CakePHP home page.
 *
 * @var \App\View\AppView $this
 */
$this->assign('title', 'Services');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?> - Jims Connect IT Solutions & Recruitment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Jims Connect, IT Solutions, Recruitment Services" name="keywords">
    <meta content="Jims Connect offers comprehensive IT solutions and recruitment services." name="description">

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

    <?= $this->fetch('css') ?>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Our Services</h1>
        </div>
    </div>
    <!-- Page Header End -->

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

    <div class="container-fluid py-5">
    <div class="container text-center">
        <h5 class="text-primary">Our Services</h5>
        <h1 class="display-5 mb-5">Comprehensive IT & Recruitment Solutions</h1>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-code fa-3x text-primary mb-3"></i>
                    <h4>Custom IT Solutions</h4>
                    <p>We deliver tailored IT solutions to streamline operations and drive digital transformation for businesses of all sizes.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-users fa-3x text-primary mb-3"></i>
                    <h4>Recruitment for Contractors</h4>
                    <p>Connecting businesses with skilled contractors to ensure that every project has the right talent for success.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-building fa-3x text-primary mb-3"></i>
                    <h4>Organizational Support</h4>
                    <p>Providing recruitment and consulting services to organizations looking to expand and enhance their workforce.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-database fa-3x text-primary mb-3"></i>
                    <h4>Data Analytics</h4>
                    <p>Transforming data into actionable insights to support data-driven decision-making for your business.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-cloud fa-3x text-primary mb-3"></i>
                    <h4>Cloud Solutions</h4>
                    <p>Offering secure, scalable cloud solutions to support your business’s growth and flexibility needs.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-item bg-light rounded p-4">
                    <i class="fa fa-network-wired fa-3x text-primary mb-3"></i>
                    <h4>IT Infrastructure</h4>
                    <p>Building robust and secure IT infrastructure tailored to meet specific business requirements.</p>
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- Services Section End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

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
