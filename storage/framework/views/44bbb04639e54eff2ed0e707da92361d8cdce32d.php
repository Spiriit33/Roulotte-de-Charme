<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <script src="/js/app.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">
    <link href="/css/main.min.css" rel="stylesheet">
</head>
<body>
<?php
$configuration=\App\Configuration::find(1);
?>
<div class="container">
    <div id="app">
        <div class="first-header d-inline-flex w-100">
        <div class="logo" style="width: 130px; margin-top: 20px; margin-bottom: 20px;">
            <?php if(!$configuration->logo): ?>
            <img src="/image/logo.png" class="w-100">
                <?php else: ?>
                <img src="/storage/<?php echo e($configuration->logo); ?>" class="w-100">
                <?php endif; ?>
        </div>
        <div class="float-right" style="width: 87%; margin-top: 40px;">
            <div class="right-text float-right">
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-envelope-open mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i>
                    </div>
                    <div class="text d-inline-block float-right">
                    <p class="mb-0"><b>Pour nous écrire:</b></p>
                    <p class="mb-0 font-weight-light"><?php echo e($configuration->email); ?></p>
                    </div>
                </div>
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-phone mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i></div>
                    <div class="text d-inline-block float-right">
                    <p class="mb-0"><b>Pour nous appeler:</b></p>
                    <p class="mb-0 font-weight-light"><?php echo e($configuration->telephone); ?></p>
                    </div>
                </div>
                <div class="texte d-inline-block mr-5">
                    <div class="float-left" style="float: left;
display: inline-block;
height: auto;
margin-right: 0;
position: relative;
text-align: center;
top: 5px;
width: auto;
line-height: 35px;">
                        <i class="fas fa-swimming-pool mr-2" style="border-radius: 50px;
height: 34px;
line-height: 30px;
text-align: center;
width: 34px;
font-size: 14px;
border: 2px solid #ddd;"></i></div>
                    <div class="text d-inline-block float-right">
                        <p class="mb-0"><b>Pour se baigner :</b></p>
                        <p class="mb-0 font-weight-light">Profitez de la piscine chauffée.</p>
                    </div>
                </div>
                <a href="<?php echo e(route('situer_roulotte')); ?>"><button type="submit" class="btn btn-primary">Situer la roulotte</button></a>
            </div>
        </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    <a class="nav nav-link" href="<?php echo e(route('home')); ?>">Accueil</a>
                        <a class="nav nav-link" href="<?php echo e(route('roulotte')); ?>">La roulotte</a>
                        <a class="nav nav-link" href="<?php echo e(route('tarifs_reservations')); ?>">Tarifs & Réservations</a>
                        <a class="nav nav-link" href="<?php echo e(route('activités')); ?>">Activités</a>
                        <a class="nav nav-link" href="<?php echo e(route('contact')); ?>">Contact</a>
                        <?php if(\Illuminate\Support\Facades\Auth::check()): ?>
                            <a class="nav nav-link" href="<?php echo e(route('administration')); ?>">Administration</a>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>

        <main class="py-4 pt-0" style="">
            <?php echo $__env->yieldContent('carousel'); ?>
            <div class="mt-3">
            <?php echo $__env->yieldContent('breadcrumbs'); ?>
            </div>
            <div class="content" style="padding: 10px;">
            <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php if(auth()->guard()->check()): ?>
                <div class="row ml-0 mr-0">
                    <div class="col-md-3">
                        <?php echo $__env->yieldContent('left-content'); ?>
                    </div>
                    <div class="col-md-9">
                        <?php echo $__env->yieldContent('right-content'); ?>
                    </div>
                </div>
                <?php endif; ?>
        </main>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="color:white;">© <?php echo e(date('Y')); ?> Réalisé par Pierre-Louis Giraud
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>
</body>
</html>
<?php /**PATH /home/alpha02/Location/resources/views/layouts/app.blade.php ENDPATH**/ ?>