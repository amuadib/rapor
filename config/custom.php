<?php

$config = [
    'identitas' => [
        'nama' => 'Madrasah Diniyah Al Miftah',
        'nama_arab' => 'المدرسة الدينية المفتاح',
        'nomor_statistik' => '01235',
        'alamat' => 'Jl. Bunga Seroja RT 002 RW 016 Tanggung Pesantren Makassar'
    ]
];

$local_config = [];
@include storage_path() . '/app/local_config.php';
return array_merge($config, $local_config);
