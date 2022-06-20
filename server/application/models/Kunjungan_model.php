<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kunjungan_model extends CI_Model
{

    public $table = 'kunjungan';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('tamu', $q);
	$this->db->or_like('jenis_tamu', $q);
	$this->db->or_like('waktu', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('penerima_tamu', $q);
	$this->db->or_like('tujuan_kunjungan', $q);
	$this->db->or_like('no_hp_tamu', $q);
	$this->db->or_like('alamat_tamu', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('ket_tambahan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('tamu', $q);
	$this->db->or_like('jenis_tamu', $q);
	$this->db->or_like('waktu', $q);
	$this->db->or_like('foto', $q);
	$this->db->or_like('penerima_tamu', $q);
	$this->db->or_like('tujuan_kunjungan', $q);
	$this->db->or_like('no_hp_tamu', $q);
	$this->db->or_like('alamat_tamu', $q);
	$this->db->or_like('created_at', $q);
	$this->db->or_like('created_by', $q);
	$this->db->or_like('ket_tambahan', $q);
	$this->db->limit($limit, $start);
    $this->db->join('penerima_tamu', 'penerima_tamu=id_penerima', 'left');
    $this->db->join('jenis_tamu', 'jenis_tamu=id_jenis_tamu', 'left');
        return $this->db->get($this->table." aa")->result();
    }

        // get data with limit and search
        function get_limit_data_dashboard($limit, $start = 0, $q = NULL, $order = 'ASC') {
            $this->db->order_by('created_at', $order);
            $this->db->like('id', $q);
        $this->db->or_like('tamu', $q);
        $this->db->or_like('jenis_tamu', $q);
        $this->db->or_like('waktu', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('penerima_tamu', $q);
        $this->db->or_like('tujuan_kunjungan', $q);
        $this->db->or_like('no_hp_tamu', $q);
        $this->db->or_like('alamat_tamu', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('ket_tambahan', $q);
        $this->db->limit($limit, $start);
        $this->db->join('penerima_tamu', 'penerima_tamu=id_penerima', 'left');
        $this->db->join('jenis_tamu', 'jenis_tamu=id_jenis_tamu', 'left');
            return $this->db->get($this->table." aa")->result();
        }

        // get data with limit and search
        function get_limit_data_tanggal($limit, $start = 0, $q = NULL, $tanggal1 = NULL, $tanggal2 = NULL) {
            $this->db->order_by($this->id, $this->order);
            $this->db->group_start();
            $this->db->where("DATE_FORMAT(waktu,'%Y-%m-%d') >=", $tanggal1);
            $this->db->where("DATE_FORMAT(waktu,'%Y-%m-%d') <=", $tanggal2);
            $this->db->group_end();
            $this->db->group_start();
            $this->db->like('id', $q);
        $this->db->or_like('tamu', $q);
        $this->db->or_like('jenis_tamu', $q);
        $this->db->or_like('waktu', $q);
        $this->db->or_like('foto', $q);
        $this->db->or_like('penerima_tamu', $q);
        $this->db->or_like('tujuan_kunjungan', $q);
        $this->db->or_like('no_hp_tamu', $q);
        $this->db->or_like('alamat_tamu', $q);
        $this->db->or_like('created_at', $q);
        $this->db->or_like('created_by', $q);
        $this->db->or_like('ket_tambahan', $q);
        $this->db->limit($limit, $start);
        $this->db->join('penerima_tamu', 'penerima_tamu=id_penerima', 'left');
        $this->db->join('jenis_tamu', 'jenis_tamu=id_jenis_tamu', 'left');
        $this->db->group_end();
            return $this->db->get($this->table." aa")->result();
        }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function gettahun(){
        $query = $this->db->query("SELECT YEAR(waktu) AS tahun FROM kunjungan GROUB BY YEAR(waktu) ORDER BY YEAR(waktu) ASC");
        return $query->result();
    }

    function filterbytanggal($waktuawal,$waktuakhir){
        $query = $this->db->query("SELECT * from kunjungan WHERE waktu BETWEEN '$waktuawal' and '$waktuakhir' ORDER BY waktu ASC");
        return $query->result();
    }

    function filterbybulan($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * from kunjungan WHERE waktu YEAR(waktu) = '$tahun1' and MONTH(waktu) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY waktu ASC");
        return $query->result();
    }

    function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * from kunjungan WHERE waktu YEAR(waktu) = '$tahun2' and MONTH(waktu) ORDER BY waktu ASC");
        return $query->result();
    }
}

/* End of file Kunjungan_model.php */
/* Location: ./application/models/Kunjungan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-31 02:49:04 */
/* http://harviacode.com */