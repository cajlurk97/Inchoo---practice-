<?php $__env->startSection('title'); ?>
    Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload file</div>

                    <div class="card-body">

                        <form enctype="multipart/form-data" action="<?php echo e(route('fileUpload')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                                <input type="file" class="form-control-file" name="file">
                                <br>
                                <input type="radio" name="privacy" value=1> Public<br><br>
                                <input type="radio" name="privacy" value=0> Private<br><br>
                                <input type="submit" value="Upload">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>