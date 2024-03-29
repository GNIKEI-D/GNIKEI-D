<?php $__env->startSection('title', 'Request History'); ?>

<?php $__env->startSection('content'); ?>


    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
            <?php if(Setting::get('demo_mode', 0) == 1): ?>
        <div class="col-md-12" style="height:50px;color:red;">
                    ** Demo Mode : <?php echo app('translator')->getFromJson('admin.demomode'); ?>
                </div>
                <?php endif; ?>
            <h5 class="card-title">istoria</h5>
        </div>
        <div class="card-body">
            <?php if(count($requests) != 0): ?>
          <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Booking_ID'); ?></th>
                        
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Mode'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($request->id); ?></td>
                        <td><?php echo e($request->booking_id); ?></td>
                        <td><?php echo e($request->os_id? $request->os_id:'N/A'); ?></td>
                        <td>
                            <?php if($request->provider): ?>
                                <?php echo e($request->user?$request->user->first_name:''); ?> <?php echo e($request->user?$request->user->last_name:''); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->provider): ?>
                                <?php echo e($request->provider?$request->provider->first_name:''); ?> <?php echo e($request->provider?$request->provider->last_name:''); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->created_at): ?>
                                <span class="text-muted"><?php echo e($request->created_at->diffForHumans()); ?></span>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->status == "COMPLETED"): ?>
                                <span class="tag tag-success">COMPLETED</span>
                            <?php elseif($request->status == "CANCELLED"): ?>
                                <span class="tag tag-danger">CANCELLED</span>
                            <?php elseif($request->status == "ARRIVED"): ?>
                                <span class="tag tag-info">ARRIVED</span>
                            <?php elseif($request->status == "SEARCHING"): ?>
                                <span class="tag tag-info">SEARCHING</span>
                            <?php elseif($request->status == "ACCEPTED"): ?>
                                <span class="tag tag-info">ACCEPTED</span>
                            <?php elseif($request->status == "STARTED"): ?>
                                <span class="tag tag-info">STARTED</span>
                            <?php elseif($request->status == "DROPPED"): ?>
                                <span class="tag tag-info">DROPPED</span>
                            <?php elseif($request->status == "PICKEDUP"): ?>
                                <span class="tag tag-info">PICKEDUP</span>
                            <?php elseif($request->status == "SCHEDULED"): ?>
                                <span class="tag tag-info">SCHEDULED</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->payment != ""): ?>
                                <?php echo e(currency($request->payment->total)); ?>

                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->payment_mode == "CASH"): ?>
                                DINHEIRO
                            <?php elseif($request->payment_mode == "DEBIT_MACHINE"): ?>
                                DÉBITO MÁQUINA
                            <?php elseif($request->payment_mode == "VOUCHER"): ?>
                                VOUCHER
                            <?php elseif($request->payment_mode == "CARD"): ?>
                                CARTÃO
                            <?php else: ?>
                                $request->payment_mode
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($request->paid): ?>
                                Paid
                            <?php else: ?>
                                Não Paid
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-primary waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a href="<?php echo e(route('admin.requests.show', $request->id)); ?>" class="dropdown-item">
                                        <i class="fa fa-search"></i> More details
                                    </a>
                                    <form action="<?php echo e(route('admin.requests.destroy', $request->id)); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php if( Setting::get('demo_mode', 0) == 0): ?>
                                        <?php echo e(method_field('DELETE')); ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ride-delete')): ?>
                                        <button type="submit" class="dropdown-item">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Booking_ID'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.User_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Provider_Name'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Date_Time'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.amount'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Mode'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.request.Payment_Status'); ?></th>
                        <th><?php echo app('translator')->getFromJson('admin.action'); ?></th>
                    </tr>
                </tfoot>
            </table>
            <?php echo $__env->make('common.pagination', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php else: ?>
            <h6 class="no-result">no results found</h6>
            <?php endif; ?> 
        </div>
    </div>
</div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>