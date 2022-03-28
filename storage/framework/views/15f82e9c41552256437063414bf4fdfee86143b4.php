<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('css'); ?>
        <!-- Datatable -->
        <link href="<?php echo e(asset('template/vendor/datatables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
    <?php $__env->stopPush(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <form action="<?php echo e(route('filter-catatan')); ?>" method="GET">
                        <h4 class="card-title mb-5">Filter Transaksi</h4>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Dari tanngal</label>
                                <input type="date" name="dari_tgl" class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label>Sampai tanggal</label>
                                <input type="date" name="sampai_tgl" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary mt-4">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kasir</th>
                                        <th>Pelanggan</th>
                                        <th>Total</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($dt->k_nama); ?></td>
                                            <td><?php echo e($dt->p_nama); ?></td>
                                            <td>Rp. <?php echo e(number_format($dt->total_bayar, 0)); ?></td>
                                            <td><?php echo e($dt->tgl_transaksi); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('js'); ?>
        <!-- Datatable -->
        <script src="<?php echo e(asset('template/vendor/datatables/js/jquery.dataTables.min.js')); ?>"></script>
        <script src="<?php echo e(asset('template/js/plugins-init/datatables.init.js')); ?>"></script>
    <?php $__env->stopPush(); ?>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom\resources\views/manajer/catatan/index.blade.php ENDPATH**/ ?>