<?php $__env->startSection('title', __('admin.notification.update')); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('asset/css/bootstrap-datetimepicker.min.css')); ?>">	

    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="card-title"><?php echo app('translator')->getFromJson('admin.notification.update'); ?></h5>
              <a href="<?php echo e(URL::previous()); ?>" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i> <?php echo app('translator')->getFromJson('admin.back'); ?></a>
            </div>
            <div class="card-body">

            <form class="form-horizontal" action="<?php echo e(route('admin.notification.update', $notification->id )); ?>" method="POST" enctype="multipart/form-data" role="form">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="PATCH">				

                <div class="form-group">
                    <label for="notify_type" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.notification.notify_type'); ?></label>
                    <div class="col-xs-10">
                        <select name="notify_type" class="form-control">
                            <option value="all">ყველასთვის</option>
                            <option value="user">მომხმარებლებისთვის</option>
                            <option value="provider">მძღოლებისთვის</option>
                        </select>
                    </div>
                </div>

                <div class="input-group row">
                    <label for="picture" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.notification.notify_image'); ?></label>
                    <div class="col-xs-10">
                        <?php if(isset($notification->image)): ?>
                        <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="<?php echo e($notification->image); ?>">
                        <?php endif; ?>
                        <input type="file" accept="image/*" name="image" class="dropify form-control-file" id="picture" aria-describedby="fileHelp">
                    </div>
                </div>

                <div class="form-group">
                    <label for="notify_desc" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.notification.notify_desc'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control" autocomplete="off"  type="text" value="<?php echo e($notification->description); ?>" name="description" required id="description" placehold="<?php echo app('translator')->getFromJson('admin.notification.notify_desc'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="expiry_date" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.notification.notify_expiry'); ?></label>
                    <div class="col-xs-10">
                        <input class="form-control datetimepicker" autocomplete="off"  type="text" value="<?php echo e($notification->expiry_date); ?>" name="expiry_date" required id="expiry_date" placehold="<?php echo app('translator')->getFromJson('admin.notification.notify_expiry'); ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="notify_status" class="bmd-label-floating"><?php echo app('translator')->getFromJson('admin.notification.notify_status'); ?></label>
                    <div class="col-xs-10">
                        <select name="status" class="form-control">
                            <option value="active">აქტიური</option>
                            <option value="inactive">არა აქტიური</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="bmd-label-floating"></label>
                    <div class="col-xs-10">
                        <button type="submit" class="btn btn-primary"><?php echo app('translator')->getFromJson('admin.notification.update'); ?></button>
                        <a href="<?php echo e(route('admin.notification.index')); ?>" class="btn btn-default"><?php echo app('translator')->getFromJson('admin.cancel'); ?></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('asset/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('asset/js/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    //your code here
    $(function () {
        $('.datetimepicker').datetimepicker({defaultDate: moment(), minDate: moment(), format: 'YYYY-MM-DD HH:mm'});
    });
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>