<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?> - Jims Connect Solution</title>
    <?= $this->Html->meta('icon', '/business-icon.ico') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'public_pages.css', 'dropdown.css']) ?>
    <!-- Include Bootstrap CSS -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') ?>

    <!-- Your Custom CSS -->
    <?= $this->Html->css(['fonts', 'cake', 'public_pages.css']) ?>

    <!-- Include Choices.js CSS (if still needed) -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
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
    <!-- Flex Container to Push Footer to Bottom -->
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar Start -->
        <div class="container-fluid bg-primary px-0">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark py-3 px-0">
                    <?php if ($this->Identity->isLoggedIn()): ?>
                        <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>" class="navbar-brand">
                            <h1 class="text-white fw-bold">Jims<span class="text-secondary">Connect</span></h1>
                        </a>
                    <?php else: ?>
                        <a href="<?= $this->Url->build('/') ?>" class="navbar-brand">
                            <h1 class="text-white fw-bold">Jims<span class="text-secondary">Connect</span></h1>
                        </a>
                    <?php endif; ?>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto">
                            <?php if ($this->Identity->isLoggedIn()): ?>
                                <!-- Links for Logged-in Users -->
                                <a href="<?= $this->Url->build(['controller' => 'Contractors', 'action' => 'index']) ?>" class="nav-item nav-link">Contractors</a>
                                <a href="<?= $this->Url->build(['controller' => 'Organisations', 'action' => 'index']) ?>" class="nav-item nav-link">Organisations</a>
                                <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>" class="nav-item nav-link">Projects</a>
                                <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'index']) ?>" class="nav-item nav-link">Contacts</a>
                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" class="nav-item nav-link">Log Out</a>
                            <?php else: ?>
                                <!-- Public Links -->
                                <a href="<?= $this->Url->build('/') ?>" class="nav-item nav-link">Home</a>
                                <a href="<?= $this->Url->build('/pages/about') ?>" class="nav-item nav-link">About</a>
                                <a href="<?= $this->Url->build('/pages/service') ?>" class="nav-item nav-link">Services</a>
                                <a href="<?= $this->Url->build(['controller' => 'Contacts', 'action' => 'addPublic']) ?>" class="nav-item nav-link">Contact</a>
                                <a href="<?= $this->Url->build('/users/login') ?>" class="nav-item nav-link">Login</a>
                                <!-- Dropdown Menu -->
                                <div class="dropdown">
                                    <button class="dropbtn">Get Started</button>
                                    <div class="dropdown-content">
                                        <?= $this->Html->link('Contractor Registration', ['controller' => 'Contractors', 'action' => 'add_public'], ['class' => 'dropdown-item']) ?>
                                        <?= $this->Html->link('Organisation Registration', ['controller' => 'Organisations', 'action' => 'add_public'], ['class' => 'dropdown-item']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        <!-- Main Content Wrapper to Grow and Push Footer Down -->
        <main class="flex-grow-1">
            <div class="container-fluid p-0">
                <?= $this->Flash->render() ?>
                
                <?= $this->fetch('content') ?>
            </div>
        </main>

        <!-- Footer Start -->
        <footer class="container-fluid bg-dark text-light footer py-3 mt-auto">
            <div class="container">
                <p class="text-center mb-0">&copy; 2024 Jims Connect. All rights reserved.</p>
            </div>
        </footer>
        <!-- Footer End -->
    </div>

    <!-- Include jQuery if not already included -->
    <?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>

    <!-- Include Bootstrap JS -->
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') ?>

    <!-- Include Choices.js script (if still needed) -->
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js') ?>

    <!-- Your Custom JS (if any) -->
    <?= $this->Html->script('multiselect') ?>

    <?= $this->fetch('script') ?>
</body>
</html>
