<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('css'); ?>
        <!-- Datatable -->
        <link href="<?php echo e(asset('template/vendor/datatables/css/jquery.dataTables.min.css')); ?>" rel="stylesheet">
    <?php $__env->stopPush(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Catatan Transaksi
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Pelanggan</th>
                                        <th>Total</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td>
                                                <span class="badge badge-primary"><?php echo e($dt->kode); ?></span>
                                            </td>
                                            <td><?php echo e($dt->nama); ?></td>
                                            <td>Rp. <?php echo e(number_format($dt->total_bayar, 0)); ?></td>
                                            <td>Rp. <?php echo e(number_format($dt->jumlah_pembayaran, 0)); ?></td>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom\resources\views/kasir/catatan/index.blade.php ENDPATH**/ ?>