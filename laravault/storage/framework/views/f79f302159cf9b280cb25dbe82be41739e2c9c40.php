<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content -->
    <div class="container">

        <?php if(auth()->guard()->guest()): ?>

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h1 class="mt-5">Welcome</h1>

                    <p>Plesae, log in</p>

                    <a class="btn btn-primary" href="<?php echo e(route('login')); ?>">Login</a>


                    <p><br>Have no acc?</p>

                    <a class="btn btn-primary" href="<?php echo e(route('register')); ?>">Register</a>

                </div>

            </div>


        <?php else: ?>

            <div class="row">
                <div class="col-lg-12 text-center">

                    <h1 class="mt-5">Welcome, <?php echo e(Auth::user()->name); ?></h1>

                    <a class="btn btn-primary" href="<?php echo e(route('mylaravault')); ?>">MyFiles</a>

                </div>
            </div>

        <?php endif; ?>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>