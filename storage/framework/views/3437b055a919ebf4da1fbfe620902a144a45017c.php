<?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="<?php echo e(route('admin-dashboard')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">User</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('admin-manajer')); ?>">Manajer</a></li>
                    <li><a href="<?php echo e(route('admin-kasir')); ?>">Kasir</a></li>
                </ul>
            </li>
        </ul>
    </div>
<?php endif; ?>

<?php if(auth()->check() && auth()->user()->hasRole('kasir')): ?>
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="<?php echo e(route('pesanan')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Pesanan</span>
                </a>
            </li>
            <li><a href="<?php echo e(route('kasir-catatan')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Catatan</span>
                </a>
            </li>
        </ul>
    </div>
<?php endif; ?>

<?php if(auth()->check() && auth()->user()->hasRole('manajer')): ?>
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="<?php echo e(route('manajer-dashboard')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Menu</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?php echo e(route('makanan')); ?>">Makanan</a></li>
                    <li><a href="<?php echo e(route('minuman')); ?>">Minuman</a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(route('manajer-catatan')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Catatan</span>
                </a>
            </li>
            <li><a href="<?php echo e(route('manajer-pendapatan')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Pendapatan</span>
                </a>
            </li>
            <li><a href="<?php echo e(route('log-aktifitas')); ?>" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Log Aktifitas</span>
                </a>
            </li>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\ujikom\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>