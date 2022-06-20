<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penerima_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penerima_tamu_model');
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
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penerima_tamu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penerima_tamu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penerima_tamu/index.html';
            $config['first_url'] = base_url() . 'penerima_tamu/index.html';
        }
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
        $config['per_page'] = 5;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penerima_tamu_model->total_rows($q);
        $penerima_tamu = $this->Penerima_tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $pengguna = $this->ion_auth->user()->row();

        $data = array(
            'penerima_tamu_data' => $penerima_tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'penerima_tamu/penerima_tamu_list',
            'nama_user' => $pengguna-> first_name.' '.$pengguna->last_name
        );
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('penerima_tamu/penerima_tamu_list', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
    }

    public function read($id_penerima) 
    {
        $pengguna = $this->ion_auth->user()->row();
        $row = $this->Penerima_tamu_model->get_by_id($id_penerima);
        if ($row) {
            $data = array(
		'id_penerima' => $row->id_penerima,
		'nama' => $row->nama,
		'nip' => $row->nip,
		'no_hp' => $row->no_hp,
		'alamat' => $row->alamat,
		'gender' => $row->gender,
        'content' => 'penerima_tamu/penerima_tamu_read',
        'nama_user' => $pengguna-> first_name.' '.$pengguna->last_name
	    );
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('penerima_tamu/penerima_tamu_read', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerima_tamu'));
        }
    }

    public function tambah() 
    {
        $pengguna = $this->ion_auth->user()->row();
        $data = array(
            'button' => 'Buat',
            'action' => site_url('penerima_tamu/tambah_action'),
	    'id_penerima' => set_value('id_penerima'),
	    'nama' => set_value('nama'),
	    'nip' => set_value('nip'),
	    'no_hp' => set_value('no_hp'),
	    'alamat' => set_value('alamat'),
	    'gender' => set_value('gender'),
        'content' => 'penerima_tamu/penerima_tamu_form',
        'nama_user' => $pengguna-> first_name.' '.$pengguna->last_name
	);
    $data_1 = array(
        'data' => $data,
        'content' => $this->load->view('penerima_tamu/penerima_tamu_form', $data, TRUE),
        'nama_user' => $data['nama_user'],
    );
    $this->load->view('layouts', $data_1);
    }
    
    public function tambah_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'gender' => $this->input->post('gender',TRUE),
	    );

            $this->Penerima_tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penerima_tamu'));
        }
    }
    
    public function update($id_penerima) 
    {
        $pengguna = $this->ion_auth->user()->row();
        $row = $this->Penerima_tamu_model->get_by_id($id_penerima);

        if ($row) {
            $data = array(
                'button' => 'Perbarui',
                'action' => site_url('penerima_tamu/update_action'),
		'id_penerima' => set_value('id_penerima', $row->id_penerima),
		'nama' => set_value('nama', $row->nama),
		'nip' => set_value('nip', $row->nip),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'alamat' => set_value('alamat', $row->alamat),
		'gender' => set_value('gender', $row->gender),
        'content' => 'penerima_tamu/penerima_tamu_form',
        'nama_user' => $pengguna-> first_name.' '.$pengguna->last_name
	    );
        $data_1 = array(
            'data' => $data,
            'content' => $this->load->view('penerima_tamu/penerima_tamu_form', $data, TRUE),
            'nama_user' => $data['nama_user'],
        );
        $this->load->view('layouts', $data_1);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerima_tamu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penerima', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nip' => $this->input->post('nip',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'gender' => $this->input->post('gender',TRUE),
	    );

            $this->Penerima_tamu_model->update($this->input->post('id_penerima', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penerima_tamu'));
        }
    }
    
    public function delete($id_penerima) 
    {
        $row = $this->Penerima_tamu_model->get_by_id($id_penerima);

        if ($row) {
            $this->Penerima_tamu_model->delete($id_penerima);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penerima_tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penerima_tamu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('gender', 'gender', 'trim|required');

	$this->form_validation->set_rules('id_penerima', 'id_penerima', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penerima_tamu.xls";
        $judul = "penerima_tamu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");

	foreach ($this->Penerima_tamu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteNumber($tablebody, $kolombody++, $data->gender);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penerima_tamu.doc");

        $data = array(
            'penerima_tamu_data' => $this->Penerima_tamu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penerima_tamu/penerima_tamu_doc',$data);
    }

}

/* End of file Penerima_tamu.php */
/* Location: ./application/controllers/Penerima_tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-03-31 02:51:56 */
/* http://harviacode.com */