<?php

function angka_ke_bulan($bulan)
{
    $data = [
        1=>'Januari',
        2=>'Februari',
        3=>'Maret',
        4=>'April',
        5=>'Mei',
        6=>'Juni',
        7=>'Juli',
        8=>'Agustus',
        9=>'September',
        10=>'Oktober',
        11=>'November',
        12=>'Desember',
        ''=>'',
    ][$bulan];

    return $data;
}

function bulan_angka($bulan)
{
    Switch ($bulan)
    {
        case "Januari" : $bulan='01';
        break;
        case "Februari" : $bulan='02';
        break;
        case "Maret" : $bulan='03';
        break;
        case "April" : $bulan='04';
        break;
        case "Mei" : $bulan='05';
        break;
        case "Juni" : $bulan='06';
        break;
        case "Juli" : $bulan= '07';
        break;
        case "Agustus" : $bulan = '08';
        break;
        case "September" : $bulan= '09';
        break;
        case "Oktoober" : $bulan='10';
        break;
        case "November" : $bulan='11';
        break;
        case "Desember" : $bulan='12';
        break;
    }
    return $bulan;
}

function tanggalAkhirBulan($tanggal)
{
    switch($tanggal):
        case 'Januari':
            $tanggal = '31';
        break;

        case 'Februari':
            $tanggal = '28';
        break;

        case 'Maret':
            $tanggal = '31';
        break;

        case 'April':
            $tanggal = '30';
        break;

        case 'Mei':
            $tanggal = '31';
        break;

        case 'Juni':
            $tanggal = '30';
        break;

        case 'Juli':
            $tanggal = '31';
        break;

        case 'Agustus':
            $tanggal = '31';
        break;

        case 'September':
            $tanggal = '30';
        break;

        case 'Oktober':
            $tanggal = '31';
        break;

        case 'November':
            $tanggal = '30';
        break;

        case 'Desember':
            $tanggal = '31';
        break;

    endswitch;

    return $tanggal;
}

function button_delete($url)
{
    $url = "'".$url."'";

    return '<a href="javascript:void(0);" onClick="hapus('.$url.')" class="hapus btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="bi bi-trash"></i></a>';
}

function tombol_delete($id, $url)
{
    $id = "'".$id."'";
    $url = "'".$url."'";

    return '<a href="javascript:void(0);" onClick="hapus('.$id.', '.$url.')" class="hapus btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="bi bi-trash"></i></a>';
}

function button_edit($route, $id)
{
    return '<a href="'.route($route, $id).'" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bi bi-pencil"></i> </a>';
}

function edit_data($route, $id)
{
    return '<a href="'.url($route, $id).'" class="btn btn-primary">Edit</a>';
}

function tombol_general($route, $id, $label, $warna)
{
    return '<a href="'.url($route, $id).'" class="badge badge-sm badge-'.$warna.'">'.$label.'</a><div style="height:10px"></div>';
}

function tomboll_general($route, $id, $label, $warna)
{
    return '<a href="'.route($route, $id).'" class="badge badge-'.$warna.'">'.$label.'</a><div style="height:10px"></div>';
}

function tombol_biasa($label, $warna)
{
    return '<span class="badge badge-'.$warna.' " style="text-align:left">'.$label.'</span> <div style="height:10px"></div>';
}

function tombol_edit($route, $id)
{
    return '<li class="nav-item"><a style="font-size: 11px;" href="'. url($route, $id). '" class="nav-link">Edit</a></li>';
}

function only_number($number)
{
    $data = preg_replace('/[^0-9]/', '', $number);

    return $data;
}

function lihat_foto($path, $foto)
{
    return '<a href="'.url($path.'/'.$foto).'" target="_blank">Lihat Foto</a>';
}

function status_proses($url, $token_applicant)
{
    $aksi = tombol_biasa('Waiting', 'warning');
    $aksi .= '<span style="display:block; height:8px;"></span>';
    $aksi .= tomboll_general($url, $token_applicant, 'Detail Data', 'dark');

    return $aksi;
}

function liat_detail($url, $token_applicant)
{
    $aksi = tomboll_general($url, $token_applicant, 'Detail Data', 'dark');

    return $aksi;
}

function status_done($url, $token_applicant)
{
    $aksi = tombol_biasa('Done', 'success');
    $aksi .= '<span style="display:block; height:8px;"></span>';
    $aksi .= tomboll_general($url, $token_applicant, 'Detail Data', 'dark');
    $aksi .= '<br/>';

    return $aksi;
}

function status_urgent()
{
    $aksi = '<span style="display:block; height:8px;"></span>';
    $aksi .= tombol_biasa('Urgent', 'warning');

    return $aksi;
}

function status_wes()
{
    $aksi = tombol_biasa('Done', 'success');
    $aksi .= '<span style="display:block; height:8px;"></span>';

    return $aksi;
}

function tombol_general_dua_param($route, $param, $label, $warna)
{
    return '<a href="'.route($route, [$param['token_applicant'],$param['aksi']]).'" class="badge badge-'.$warna.'">'.$label.'</a><div style="height:10px"></div>';
}

function tombol_generall_dua_param($route, $param_satu, $param_dua, $label, $warna)
{
    return '<a href="'.url($route, [$param_satu, $param_dua]).'" class="badge badge-'.$warna.'">'.$label.'</a><div style="height:10px"></div>';
}

function status_internal($status, $warna, $url, $token_applicant)
{
    $aksi = tombol_biasa($status, $warna);
    $aksi .= '<span style="display:block; height:8px;"></span>';
    $aksi .= tombol_general($url, $token_applicant, 'Detail Data', 'dark');

    return $aksi;
}

function warna_status($status)
{
    $warna = [
        'Rejected'=>'danger',
        'Updated'=>'info',
        'New Request'=>'secondary',
    ][$status];

    return $warna;
}

function nama_hari($kata)
{
    $hari = [
        'Monday'=>'Senin',
        'Tuesday'=>'Selasa',
        'Wednesday'=>'Rabu',
        'Thursday'=>'Kamis',
        'Friday'=>'Jumat',
        'Saturday'=>'Sabtu',
        'Sunday'=>'Minggu'
    ][$kata];

    return $hari;
}