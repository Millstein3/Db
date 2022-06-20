<?php

function get_siswaa($mdl){
    $ci = &get_instance();
    $data = $ci->db->where('for_modul', $mdl) -> get("kategori")->result();
    foreach ($data as $k => $v) {
        $res[$v->Id_cat] = $v->cat_name;
    }
    return $res;
}

function is_logged()
{
    $ci = &get_instance();
    if ($ci->session->userdata('logged') != true) {
        redirect('Frontend', 'refresh');
    }
}

// pastikan untuk menggunakan sf_upload, di controller._rules field jangan di required
function sf_upload($nama_gambar, $lokasi_gambar, $tipe_gambar, $ukuran_gambar, $name_file_form) {
    $CI                    = &get_instance();
    $nmfile                = $nama_gambar . "_" . time();
    $config['upload_path'] = './' . $lokasi_gambar;
    //tambahi skrip disini is_dir exist
    $config['allowed_types'] = $tipe_gambar;
    $config['max_size']      = $ukuran_gambar;
    $config['file_name']     = $nmfile;
    $CI->load->library('upload', $config);
    $CI->upload->do_upload($name_file_form);
    // die($CI->upload->display_errors());
    $result1 = $CI->upload->data();
    $result  = ['foto_pendaftar' => $result1];
    $dfile   = $result['foto_pendaftar']['file_name'];

    return $dfile;
}

function get_combo($tbl,$id_penerima,$nm)
{

    $ci = &get_instance();
    $data = $ci->db->get($tbl)->result_array();
    $res = array();
    foreach ($data as $v) {
        $res[$v[$id_penerima]] = $v[$nm];
    }
    return $res;

}

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('format_indo')) {
  function format_indo($date){
    date_default_timezone_set('Asia/Jakarta');
    // array hari dan bulan
    $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
    // pemisahan tahun, bulan, hari, dan waktu
    $tahun = substr($date,0,4);
    $bulan = substr($date,5,2);
    $tgl = substr($date,8,2);
    $waktu = substr($date,11,5);
    $hari = date("w",strtotime($date));
    $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    return $result;
  }
}