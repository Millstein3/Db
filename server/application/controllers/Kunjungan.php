<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kunjungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->library('form_validation');
        $this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
    }

    public function index()
    {
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunjungan/index.html';
            $config['first_url'] = base_url() . 'kunjungan/index.html';
        }

        $config['per_page'] = 3;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunjungan_model->total_rows($q);
        $kunjungan = $this->Kunjungan_model->get_limit_data($config['per_page'], $start, $q);

        $config['full_tag_open'] ='<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] ='</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] ='<li class="page-item">';
        $config['first_tag_close'] ='</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] ='<li class="page-item">';
        $config['next_tag_close'] ='</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] ='<li class="page-item">';
        $config['prev_tag_close'] ='</li>';

        $config['cur_tag_open'] ='<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] ='</a></li>';

        $config['num_tag_open'] ='<li class="page-item">';
        $config['num_tag_close'] ='</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $pengguna = $this->ion_auth->user()->row();

        $data = array(
            'kunjungan_data' => $kunjungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'Kunjungan/kunjungan_list',
            'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
        );
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('kunjungan/kunjungan_list', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
        //$this->load->view('layouts', $data)
    }

    public function dashboard(){

        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}

        $order = 'DESC';
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunjungan/index.html';
            $config['first_url'] = base_url() . 'kunjungan/index.html';
        }

        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunjungan_model->total_rows($q);
        $kunjungan = $this->Kunjungan_model->get_limit_data_dashboard($config['per_page'], $start, $q, $order);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $pengguna = $this->ion_auth->user()->row();
        
        $data = array(
            'kunjungan_data' => $kunjungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'kunjungan/kunjungan_dashboard',
            'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
        );
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('kunjungan/kunjungan_dashboard', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
        //$this->load->view('layouts', $data)
    }

    public function print(){
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $q = urldecode($this->input->get('q', TRUE));
        $tanggal1 = urldecode($this->input->get('tanggal1', TRUE));
        $tanggal2 = urldecode($this->input->get('tanggal2', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kunjungan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kunjungan/index.html';
            $config['first_url'] = base_url() . 'kunjungan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kunjungan_model->total_rows($q);
        $kunjungan = $this->Kunjungan_model->get_limit_data_tanggal($config['per_page'], $start, $q, $tanggal1, $tanggal2);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        
        $data = array(
            'kunjungan_data' => $kunjungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
            $this->load->view('kunjungan/kunjungan_print', $data);

    }


    public function chart(){
        		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $pengguna = $this->ion_auth->user()->row();
        $data = [
        'content' => $this->load->view('kunjungan/kunjungan_chart', NULL, TRUE),
        'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
        ];
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('kunjungan/kunjungan_chart', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
    //$this->load->view('layouts', $data);
    }

    public function read($id) {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $pengguna = $this->ion_auth->user()->row();
        $row = $this->Kunjungan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tamu' => $row->tamu,
		'jenis_tamu' => $row->jenis_tamu,
		'waktu' => $row->waktu,
		'foto' => $row->foto,
		'penerima_tamu' => $row->penerima_tamu,
		'tujuan_kunjungan' => $row->tujuan_kunjungan,
		'no_hp_tamu' => $row->no_hp_tamu,
		'alamat_tamu' => $row->alamat_tamu,
		'created_at' => $row->created_at,
		'created_by' => $row->created_by,
		'ket_tambahan' => $row->ket_tambahan,
        'content' => 'kunjungan/kunjungan_read',
        'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
    );
    $data_1 = array(
        'data' => $data,
        'content' => $this->load->view('kunjungan/kunjungan_read', $data, TRUE),
        'nama_user' => $data['nama_user'],
    );
    $this->load->view('layouts', $data_1);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kunjungan'));
        }
    }

    public function create() {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $pengguna = $this->ion_auth->user()->row();
        $data = array(
            'button' => 'Buat',
            'action' => site_url('kunjungan/create_action'),
	    'id' => set_value('id'),
	    'tamu' => set_value('tamu'),
	    'jenis_tamu' => set_value('jenis_tamu'),
	    'waktu' => set_value('waktu'),
	    'foto' => "awal.png",
	    'penerima_tamu' => set_value('penerima_tamu'),
	    'tujuan_kunjungan' => set_value('tujuan_kunjungan'),
	    'no_hp_tamu' => set_value('no_hp_tamu'),
	    'alamat_tamu' => set_value('alamat_tamu'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'ket_tambahan' => set_value('ket_tambahan'),
        'content' => 'kunjungan/kunjungan_form',
        'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
    );
    $data_1 = array(
        'data' => $data,
        'content' => $this->load->view('kunjungan/kunjungan_form', $data, TRUE),
        'nama_user' => $data['nama_user'],
    );
    $this->load->view('layouts', $data_1);
    }
    
    public function create_action() {
        $pengguna = $this->ion_auth->user()->row();
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tamu' => $this->input->post('tamu',TRUE),
		'jenis_tamu' => $this->input->post('jenis_tamu',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'foto' => sf_upload('foto_tamu', 'assets/foto_tamu', 'jpeg|jpg|png', 10000000,'foto'),
		'penerima_tamu' => $this->input->post('penerima_tamu',TRUE),
		'tujuan_kunjungan' => $this->input->post('tujuan_kunjungan',TRUE),
		'no_hp_tamu' => $this->input->post('no_hp_tamu',TRUE),
		'alamat_tamu' => $this->input->post('alamat_tamu',TRUE),
		'created_at' => $now,
		'created_by' => $pengguna-> first_name." ".$pengguna->last_name,
		'ket_tambahan' => $this->input->post('ket_tambahan',TRUE),
	    );

            $this->Kunjungan_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil Diinput');
            redirect(site_url('kunjungan'));
        }
    }

    public function create_tamu() {
        $data = array(
            'button' => 'Buat',
            'action' => site_url('kunjungan/create_action_tamu'),
	    'id' => set_value('id'),
	    'tamu' => set_value('tamu'),
	    'jenis_tamu' => set_value('jenis_tamu'),
	    'waktu' => set_value('waktu'),
	    'foto' => "awal.png",
	    'penerima_tamu' => set_value('penerima_tamu'),
	    'tujuan_kunjungan' => set_value('tujuan_kunjungan'),
	    'no_hp_tamu' => set_value('no_hp_tamu'),
	    'alamat_tamu' => set_value('alamat_tamu'),
	    'created_at' => set_value('created_at'),
	    'created_by' => set_value('created_by'),
	    'ket_tambahan' => set_value('ket_tambahan'),
    );
    $this->load->view('kunjungan/kunjungan_form_tamu', $data);
    
    }
    public function create_action_tamu() 
    {
        $pengunjung = 'Pengunjung';
        date_default_timezone_set('Asia/Jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create_tamu();
        } else {
            $data = array(
		'tamu' => $this->input->post('tamu',TRUE),
		'jenis_tamu' => $this->input->post('jenis_tamu',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
		'foto' => sf_upload('foto_tamu', 'assets/foto_tamu', 'jpeg|jpg|png', 10000000,'foto'),
		'penerima_tamu' => $this->input->post('penerima_tamu',TRUE),
		'tujuan_kunjungan' => $this->input->post('tujuan_kunjungan',TRUE),
		'no_hp_tamu' => $this->input->post('no_hp_tamu',TRUE),
		'alamat_tamu' => $this->input->post('alamat_tamu',TRUE),
		'created_at' => $now,
        'created_by' => $pengunjung,
		'ket_tambahan' => $this->input->post('ket_tambahan',TRUE),
	    );

            $this->Kunjungan_model->insert($data);
            $this->session->set_flashdata('message', 'Data Berhasil Diinput');
            redirect(site_url('kunjungan/create_tamu'));
        }
    }
    
    public function update($id) {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $HTML_DATETIME_LOCAL = 'Y-m-d\TH:i';
        $row = $this->Kunjungan_model->get_by_id($id);
        $pengguna = $this->ion_auth->user()->row();
        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('kunjungan/update_action'),
		'id' => set_value('id', $row->id),
		'tamu' => set_value('tamu', $row->tamu),
		'jenis_tamu' => set_value('jenis_tamu', $row->jenis_tamu),
		'waktu' => set_value('waktu', date($HTML_DATETIME_LOCAL,strtotime($row->waktu))),
		'foto' => set_value('foto', $row->foto),
		'penerima_tamu' => set_value('penerima_tamu', $row->penerima_tamu),
		'tujuan_kunjungan' => set_value('tujuan_kunjungan', $row->tujuan_kunjungan),
		'no_hp_tamu' => set_value('no_hp_tamu', $row->no_hp_tamu),
		'alamat_tamu' => set_value('alamat_tamu', $row->alamat_tamu),
		'created_at' => set_value('created_at', date($HTML_DATETIME_LOCAL,strtotime($row->waktu))),
		'created_by' => set_value('created_by', $row->created_by),
		'ket_tambahan' => set_value('ket_tambahan', $row->ket_tambahan),
        'content' => 'kunjungan/kunjungan_form',
        'nama_user' => $pengguna-> first_name." ".$pengguna->last_name
    );
    $data_1 = array(
        'data' => $data,
        'content' => $this->load->view('kunjungan/kunjungan_form', $data, TRUE),
        'nama_user' => $data['nama_user'],
    );
    $this->load->view('layouts', $data_1);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kunjungan'));
        }
    }
    
    public function update_action() 
    {
        
        if(!empty($_FILES['foto']['name'])){
            $foto = sf_upload('foto_tamu', 'assets/foto_tamu', 'jpeg|jpg|png', 10000000, 'foto', $this->input->post('id',TRUE));
        }else{
            $foto = $this->input->post('foto_oldimage');
        }
        $this->_rules();
    
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'tamu' => $this->input->post('tamu',TRUE),
		'jenis_tamu' => $this->input->post('jenis_tamu',TRUE),
		'waktu' => $this->input->post('waktu',TRUE),
        'foto' => $foto,
		'penerima_tamu' => $this->input->post('penerima_tamu',TRUE),
		'tujuan_kunjungan' => $this->input->post('tujuan_kunjungan',TRUE),
		'no_hp_tamu' => $this->input->post('no_hp_tamu',TRUE),
		'alamat_tamu' => $this->input->post('alamat_tamu',TRUE),
		//'created_at' => $this->input->post('created_at',TRUE),
		//'created_by' => $this->input->post('created_by',TRUE),
		'ket_tambahan' => $this->input->post('ket_tambahan',TRUE),
	    );

            $this->Kunjungan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Data Sukses Diupdate');
            redirect(site_url('kunjungan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kunjungan_model->get_by_id($id);

        if ($row) {
            $this->Kunjungan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kunjungan'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('kunjungan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tamu', 'tamu', 'trim|required');
	$this->form_validation->set_rules('jenis_tamu', 'jenis tamu', 'trim|required');
	$this->form_validation->set_rules('waktu', 'waktu', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim');
	$this->form_validation->set_rules('penerima_tamu', 'penemu tamu', 'trim|required');
	$this->form_validation->set_rules('tujuan_kunjungan', 'tujuan kunjungan', 'trim|required');
	$this->form_validation->set_rules('no_hp_tamu', 'no hp tamu', 'trim|required');
	$this->form_validation->set_rules('alamat_tamu', 'alamat tamu', 'trim');
	//$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	//S$this->form_validation->set_rules('created_by', 'created by', 'trim|required');
	$this->form_validation->set_rules('ket_tambahan', 'ket tambahan', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kunjungan.xls";
        $judul = "kunjungan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Waktu");
	xlsWriteLabel($tablehead, $kolomhead++, "Foto");
	xlsWriteLabel($tablehead, $kolomhead++, "Penemu Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Tujuan Kunjungan");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Created By");
	xlsWriteLabel($tablehead, $kolomhead++, "Ket Tambahan");

	foreach ($this->Kunjungan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foto);
	    xlsWriteNumber($tablebody, $kolombody++, $data->penerima_tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tujuan_kunjungan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp_tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_by);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket_tambahan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=kunjungan.doc");

        $data = array(
            'kunjungan_data' => $this->Kunjungan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kunjungan/kunjungan_doc',$data);
    }

}

/* End of file Kunjungan.php */
/* Location: ./application/controllers/Kunjungan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-31 02:49:04 */
/* http://harviacode.com */