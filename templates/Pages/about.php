<?php
/**
 * CakePHP home page.
 *
 * @var \App\View\AppView $this
 */
$this->assign('title', 'About Us');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <title><?= $this->fetch('title') ?> - Jims Connect IT Solutions & Recruitment</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Jims Connect, IT Solutions, Recruitment" name="keywords">
    <meta content="Jims Connect provides innovative IT solutions and recruitment services." name="description">

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
            <h1 class="display-2 text-white mb-4">About Us</h1>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Fact Section Start -->
    <div class="container-fluid py-5" style="background-color: #66d4a4;">
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
                        <?= $this->Html->image('about-1.jpg', ['class' => 'img-fluid w-75 rounded', 'alt' => 'About Jims Connect']) ?>
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <?= $this->Html->image('about-2.jpg', ['class' => 'img-fluid w-100 rounded', 'alt' => 'Our Team']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <h5 class="text-primary">About Us</h5>
                    <h1 class="mb-4">Leading IT Solutions & Recruitment Agency</h1>
                    <p>Jims Connect specializes in providing IT solutions and recruitment services for contractors and organizations. Our focus is on delivering digital transformation and connecting businesses with skilled professionals.</p>
                    <p>Partner with us to experience innovative solutions designed to drive growth and efficiency. We are dedicated to making a positive impact in the tech industry through strategic recruitment and cutting-edge IT solutions.</p>
                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'service']) ?>" class="btn btn-secondary rounded-pill px-5 py-3 text-white">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Team Section Start -->
    <div class="container-fluid py-5 my-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h5 class="text-primary">Our Team</h5>
            <h1 class="display-5">Meet the Expert Behind Jims Connect</h1>
            <p>Nathan Jim leads Jims Connect with a commitment to excellence in IT solutions and recruitment, ensuring the highest standards for our clients.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="team-item bg-light rounded p-4">
                    <div class="d-flex align-items-center mb-4">
                        <?= $this->Html->image('team-2.jpg', ['class' => 'img-fluid rounded-circle', 'alt' => 'Nathan Jim, Director and Recruiter', 'style' => 'width: 80px; height: 80px;']) ?>
                        <div class="ps-3">
                            <h5 class="mb-1">Nathan Jim</h5>
                            <span>Director & Recruiter</span>
                        </div>
                    </div>
                    <p>Nathan Jim is the driving force behind Jims Connect, bringing years of experience in IT and recruitment. He is dedicated to connecting businesses with top talent and delivering exceptional IT solutions to meet evolving industry needs.</p>
                    <div class="d-flex">
                        <a class="btn btn-square btn-outline-primary me-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-primary me-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Team Section End -->



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
