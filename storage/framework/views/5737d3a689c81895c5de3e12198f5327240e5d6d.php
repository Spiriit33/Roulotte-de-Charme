<?php $__env->startSection('title'); ?>
    Acceuil | La Roulotte De Charme
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('carousel'); ?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
                $count = 0;
            $active = $count==0 ? 'active' :  null;
            ?>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-target="#carouselExampleIndicators" class="<?php echo e($active); ?>" data-slide-to="<?php echo e($count); ?>"></li>
                <?php
                $count++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ol>
        <div class="carousel-inner" style="max-height: 500px;">
            <?php
                $count=0;
            ?>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($count==0): ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="transform: translateY(-23%)" src="/storage/<?php echo e($slider->hash); ?>" alt="First slide">
                    </div>
                <?php else: ?>
                    <div class="carousel-item">
                        <img class="d-block w-100" style="transform: translateY(-23%)" src="/storage/<?php echo e($slider->hash); ?>" alt="Second slide">
                    </div>
                <?php endif; ?>
                <?php
                    $count++;
                ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <div class="overlay" style="background: #003049; padding: 15px;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </div>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <div class="overlay" style="background: #003049; padding: 15px;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </div>
        </a>
    </div>
    <div class="overlay" style="height: 100%;
width: 100%; background: #457b9d; padding: 20px; margin-top: 0px;">
        <div class="row mb-0">
            <div class="col-md-9">
                <h5 style="color:white;"><?php echo e($configuration->msg_home); ?></h5>
            </div>
            <div class="col-md-3 float-right col-sm-5">
                <a href="<?php echo e(route('tarifs_reservations')); ?>"><button type="submit" class="btn btn-primary float-right">Reservez vos vacances</button></a>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
          <h3 style="color: #003049;" class="mb-3">Vous recherchez une location de vacances, venez partager des moments chaleureux et profiter de la grande tranquilité du coin.</h3>
    <p>Située à Saint-Vivien-de-Blaye, dans la région Aquitaine, la Roulotte de charme propose un hébergement avec un parking privé gratuit. Les hotes peuvent savourer un petit-déjeuner continental. Notre Roulotte de charme possède une terrasse et un jardin et n'est située qu'a 30 km de Bordeaux et 35 km de Saint-Emilion. L'aéroport le plus proche, Bordeaux-Merignac, se trouve à 34 km.</p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alpha02/Location/resources/views/home.blade.php ENDPATH**/ ?>