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
                        Minuman
                    </div>
                    <a href="<?php echo e(route('menu-add')); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo e(asset('manajer/menu/' . $dt->gambar)); ?>"
                                                    style="width: 200px;">
                                            </td>
                                            <td><?php echo e($dt->nama); ?></td>
                                            <td><?php echo e($dt->kategori); ?></td>
                                            <td>Rp. <?php echo e(number_format($dt->harga, 0)); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('menu/' . $dt->id . '/edit')); ?>"
                                                    class="btn btn-warning btn-sm"><i class="fa fa-pen"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm delete"
                                                    data-id="<?php echo e($dt->id); ?>" data-name="<?php echo e($dt->nama); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </a><br>
                                                <?php if($dt->status == 'tersedia'): ?>
                                                    <a href="<?php echo e(url('status/' . $dt->id . '/edit')); ?>"
                                                        class="btn btn-success btn-sm mt-3">Tersedia
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(url('status/' . $dt->id . '/edit')); ?>"
                                                        class="btn btn-warning btn-sm mt-3">Habis
                                                    </a>
                                                <?php endif; ?>
                                            </td>
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

        
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(".table").on("click", ".delete", function() {
                var dataId = $(this).attr('data-id');
                var dataName = $(this).attr('data-name');
                swal({
                        title: "Yakin ?",
                        text: "Kamu akan menghapus data dengan" + " Nama " + dataName + "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        timer: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = "menu/" + dataId + "/delete"
                        } else {
                            swal("Gagal menghapus data");
                        }
                    });
            });
        </script>
    <?php $__env->stopPush(); ?>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom\resources\views/manajer/menu/minuman.blade.php ENDPATH**/ ?>