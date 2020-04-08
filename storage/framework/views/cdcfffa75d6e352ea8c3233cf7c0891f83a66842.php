<?php $__env->startSection('title'); ?>
    Activités | La Roulotte De Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumbs'); ?>
    <?php echo e(\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('activités')); ?>

    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center mt-3 ml-0 mr-0">
        <div class="col-md-8">
            <h4 class="text-center mb-3">Les Activités</h4>
            <p>Différentes activités sont proposées pour agrémenter votre séjour.</p>
            <?php $__currentLoopData = $activites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><h5 class="d-inline-block"><?php echo e($activite->title); ?></h5></li>
                <p><?php echo $activite->description; ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <h4 class="text-center mb-3">Sites Touristiques</h4>
            <div class="row justify-content-center">
            <div class="col">
            <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $count = 0;
                        $active = $count==0 ? 'active' :  null;
                    ?>
                </ol>
                <?php
                    $count = 0;
                ?>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($count==0): ?>
                        <div class="carousel-inner" style="max-height: 375px;">
                            <div class="carousel-item active">
                                <a href="/storage/<?php echo e($slider->hash); ?>"><img class="d-block w-100 " src="/storage/<?php echo e($slider->hash); ?>"
                                                                          alt="First slide" style="transform: translateY(-20%);"></a>
                                <?php if($slider->description): ?>
                                    <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
bottom: 20%;
background:
rgba(69,123,157,0.8);">
                                        <p class="text-center" style="color:white;"><?php echo e($slider->description); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php else: ?>
                                <div class="carousel-item">
                                    <a href="/storage/<?php echo e($slider->hash); ?>"><img class="d-block w-100 " src="/storage/<?php echo e($slider->hash); ?>"
                                                                              alt="First slide" style="transform: translateY(-20%);"></a>
                                    <?php if($slider->description): ?>
                                    <div class="wrap-text" style="width: 100%;
position: absolute;
display: block;
<?php if($slider->id==14): ?>

                                        bottom:28%;
<?php else: ?>
bottom: 20%;
                                        <?php endif; ?>
background:
rgba(69,123,157,0.8);">
                                        <p class="text-center" style="color:white;"><?php echo e($slider->description); ?></p>
                                    </div>
                                </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                            <?php
                                $count++;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        </div>
    </div>
    </div>
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/activites.blade.php ENDPATH**/ ?>