<!DOCTYPE html>
<html lang="en">
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>
</head>
<center>
    <h3>Laporan Pendapatan</h3>
</center>
<table cellspacing="0" cellpadding="10" border="1" class="center">
    <tr>
        <th>Tanggal</th>
        <th>Pendapatan</th>
    </tr>
    <?php $__currentLoopData = $pendapatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e(Carbon\Carbon::parse($data->day)->locale('id')->isoFormat('dddd, D MMMM, Y')); ?></td>
            <td>Rp. <?php echo e(number_format($data->pendapatan)); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<body>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\ujikom\resources\views/manajer/pendapatan/cetak.blade.php ENDPATH**/ ?>