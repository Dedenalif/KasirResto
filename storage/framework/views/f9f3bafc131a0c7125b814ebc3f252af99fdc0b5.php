<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if($pesanan->count() != ''): ?>
            <div class="col-lg-8 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Detail Pesanan</span>
                                <span class="badge badge-primary badge-pill"><?php echo e($total->sum('qty')); ?></span>
                            </h4>
                            <ul class="list-group mb-3">
                                <?php $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div class="col-sm-4">
                                            <div>
                                                <h4 class="my-0"><?php echo e($ps->nama); ?></h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <span class="text-muted">Rp. <?php echo e(number_format($ps->sub_total)); ?></span>
                                        </div>
                                        <form action="<?php echo e(url('pesanan/' . $ps->ps_id . '/update')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($ps->id); ?>" name="id_order">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <button type="submit" class="btn btn-warning btn-xs"><i
                                                            class="fa fa-pen"></i>
                                                    </button>
                                                    <input type="number" name="qty" class="form-control"
                                                        value="<?php echo e($ps->qty); ?>">
                                                    <a href="<?php echo e(url('pesanan/' . $ps->ps_id . '/delete')); ?>"
                                                        class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($pesanan->links()); ?>

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total</span>
                                    <strong id="total" data-total="<?php echo e($total->sum('sub_total')); ?>">Rp.
                                        <?php echo e(number_format($total->sum('sub_total', 0))); ?></strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted"><b>Transaksi</b></span>
                        </h4>
                        <form action="<?php echo e(route('transaksi-store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <input type="hidden" name="total_bayar" value="<?php echo e($total->sum('sub_total')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pelanggan : </label>
                                <input type="text" name="nama" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    autocomplete="off">
                                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback">* <?php echo e($errors->first('nama')); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <label class="required">Jumlah Pembayaran : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="jumlah_pembayaran"
                                    class="form-control <?php $__errorArgs = ['jumlah_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="jumlah_pembayaran" autocomplete="off">
                                <?php $__errorArgs = ['jumlah_pembayaran'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class=" invalid-feedback">* <?php echo e($errors->first('jumlah_pembayaran')); ?>

                                    </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <label class="required">Kembalian : </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="text" name="kembalian" class="form-control" id="kembalian" autocomplete="off"
                                    readonly>
                            </div>
                            <button class="btn btn-primary btn-sm btn-block" type="submit">
                                Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!--Makanan-->
        <?php if($makanan->isNotEmpty()): ?>
            <h2><b>Makanan</b></h2>
            <?php $__currentLoopData = $makanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="<?php echo e(asset('manajer/menu/' . $mk->gambar)); ?>"
                                        style="width: 200px;">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4><?php echo e($mk->nama); ?></h4>
                                    <span class="price">Rp. <?php echo e(number_format($mk->harga, 0)); ?></span>
                                </div>
                            </div>
                        </div>
                        <center>
                            <form action="<?php echo e(route('pesanan-store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" name="kasir_id" class="form-control"
                                        value="<?php echo e($kasir->id); ?>">
                                    <input type="hidden" name="menu_id" class="form-control" value="<?php echo e($mk->id); ?>">
                                    <input type="hidden" name="harga" class="form-control" value="<?php echo e($mk->harga); ?>">
                                    <input type="hidden" name="qty" class="form-control" value="1">
                                </div>
                                <?php if($pesanan->where('menu_id', $mk->id)->count() == 1): ?>
                                    <span>
                                        <i class="fas fa-sync fa-spin mb-4"></i>
                                        <h5 class="mb-4">Sedang dipesan</h5>
                                    </span>
                                <?php elseif($mk->status == 'tersedia'): ?>
                                    <div class="shopping-cart mb-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-basket"></i></button>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </center>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($makanan->links()); ?>

        <?php endif; ?>

        <!--Minuman-->
        <?php if($minuman->isNotEmpty()): ?>
            <h2><b>Minuman</b></h2>
            <?php $__currentLoopData = $minuman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="new-arrival-product">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="<?php echo e(asset('manajer/menu/' . $mm->gambar)); ?>"
                                        style="width: 200px;">
                                </div>
                                <div class="new-arrival-content text-center mt-3">
                                    <h4><?php echo e($mm->nama); ?></h4>
                                    <span class="price">Rp. <?php echo e(number_format($mm->harga, 0)); ?></span>
                                </div>
                            </div>
                        </div>
                        <center>
                            <form action="<?php echo e(route('pesanan-store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="hidden" name="kasir_id" class="form-control"
                                        value="<?php echo e($kasir->id); ?>">
                                    <input type="hidden" name="menu_id" class="form-control" value="<?php echo e($mm->id); ?>">
                                    <input type="hidden" name="harga" class="form-control" value="<?php echo e($mm->harga); ?>">
                                    <input type="hidden" name="qty" class="form-control" value="1">
                                </div>
                                <?php if($pesanan->where('menu_id', $mm->id)->count() == 1): ?>
                                    <span>
                                        <i class="fas fa-sync fa-spin mb-4"></i>
                                        <h5 class="mb-4">Sedang dipesan</h5>
                                    </span>
                                <?php elseif($mm->status == 'tersedia'): ?>
                                    <div class="shopping-cart mb-3">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-shopping-basket"></i></button>
                                    </div>
                                <?php endif; ?>
                            </form>
                        </center>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($minuman->links()); ?>

        <?php endif; ?>
    </div>

    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startPush('js'); ?>
        <script>
            $(document).ready(function() {
                $('#jumlah_pembayaran').keyup(function(e) {
                    var total = parseInt($('#total').attr('data-total'));
                    var nominal = parseFloat($('#jumlah_pembayaran').val().replace(/,/g, ""));
                    var kembali = total - nominal;
                    if (total < nominal) {
                        var noNegative = Math.abs(kembali)
                        $('#kembalian').val(noNegative);
                    } else {
                        $('#kembalian').val(0);
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ujikom\resources\views/kasir/pesanan/index.blade.php ENDPATH**/ ?>