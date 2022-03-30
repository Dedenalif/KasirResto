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
                        Kasir
                    </div>
                    <a href="<?php echo e(route('kasir-add')); ?>" class="btn btn-primary btn-sm">Tambah Kasir</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper table">
                            <table id="example4" class="display dataTable" style="min-width: 845px" role="grid"
                                aria-describedby="example_info">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($dt->name); ?></td>
                                            <td><?php echo e($dt->email); ?></td>
                                            <td><?php echo e($dt->jenis_kelamin); ?></td>
                                            <td><?php echo e($dt->alamat); ?></td>
                                            <td>
                                                <a href="<?php echo e(url('kasir/' . $dt->k_id . '/edit')); ?>"
                                                    class="btn btn-warning btn-sm mb-2"><i class="fa fa-pen"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-danger btn-sm mb-2 delete"
                                                    data-id="<?php echo e($dt->k_id); ?>" data-name="<?php echo e($dt->name); ?>">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
                            window.location.href = "kasir/" + dataId + "/delete"
                        } else {
                            swal("Gagal menghapus data");
                        }
                    });
            });
        </script>
    <?php $__env->stopPush(); ?>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom\resources\views/admin/kasir/index.blade.php ENDPATH**/ ?>