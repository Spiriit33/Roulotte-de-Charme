<?php $__env->startSection('title'); ?>
    La Roulotte | La Roulotte De Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('roulotte')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center mb-4">Notre roulotte, située à Saint-Vivien-de-Blaye et à 35 minutes de Bordeaux, dispose de tout le confort nécessaire pour vous permettre de passer d'agréables
            vacances en Gironde et en toutes saisons.</p>
            <h4 class="text-center mb-3">La roulotte "De charme" en images</h4>
            <?php if($sliders->count() > 0): ?>
            <div class="row justify-content-center">
            <div class="col">
            <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $count = 0;
                        $active = $count==0 ? 'active' :  null;
                    ?>
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo e($count); ?>" class="<?php echo e($active); ?>"></li>
                        <?php
                            $count=$count+1;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ol>
                <?php
                $count = 0;
                ?>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php if($count==0): ?>
                <div class="carousel-inner" style="max-height: 350px;">
                    <div class="carousel-item active">
                        <a href="/storage/<?php echo e($slider->hash); ?>"><img class="d-block w-100" src="/storage/<?php echo e($slider->hash); ?>"
                                                                  alt="First slide" style="transform: translateY(-20%);"></a>
                        <?php if($slider->description): ?>
                            <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
bottom: -15px;
background:
rgba(69,123,157,0.8);">
                                <p class="text-center" style="color:white;"><?php echo e($slider->description); ?></p>
                            </div>
                            <?php endif; ?>
                    </div>

                    <?php else: ?>
                    <div class="carousel-item">
                       <a href="storage/<?php echo e($slider->hash); ?>"><img class="d-block w-100 h-100" src="/storage/<?php echo e($slider->hash); ?>"
                                       alt="Second slide" style="transform: translateY(-20%);"></a>
                        <?php if($slider->description): ?>
                            <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
bottom: -15px;
background:
rgba(69,123,157,0.8);">
                                <p class="text-center" style="color:white;"><?php echo e($slider->description); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    <?php
                    $count++;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <div class="overlay" style="background: #003049; padding: 5px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <div class="overlay" style="background: #003049; padding: 5px;">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </div>
                </a>
            </div>
            </div>
            </div>
            <?php endif; ?>
            <h4 class="text-center mb-4">Informations</h4>
            <p>Voici quelques informations à conna&icirc;tre pour le bon déroulement de votre séjour:</p>
            <div class="row ml-0 mr-0 mb-4">
            <div class="col-6">
                <h5>Règles</h5>
                <li>Enfants et animaux non admis : l'environnement n'est malheureusement pas adapté à leur accueil, nous en sommes désolés.</li>
                <li>Stationnement du véhicule : il se fera sur l'emplacement défini le jour de votre arrivée.</li>
            </div>
             <div class="col-6">
                 <h5>Equipements</h5>
                 <li>Literie de qualité h&ocirc;telière</li>
                 <li>Douche et WC</li>
                 <li>Cuisine équipée : plaque électrique, frigo avec freezer, micro-onde, cafetière, grille-pain etc...</li>
                 <li>Terrasse + salon de jardin</li>
                 <li>Coin salon</li>
                 <li>Parking privé et sécurisé</li>
            </div>
            </div>
        </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/roulotte.blade.php ENDPATH**/ ?>