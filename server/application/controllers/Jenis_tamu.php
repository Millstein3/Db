<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis_tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_tamu_model');
        $this->load->library('form_validation');
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
            $config['base_url'] = base_url() . 'jenis_tamu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'jenis_tamu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'jenis_tamu/index.html';
            $config['first_url'] = base_url() . 'jenis_tamu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Jenis_tamu_model->total_rows($q);
        $jenis_tamu = $this->Jenis_tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'jenis_tamu_data' => $jenis_tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('jenis_tamu/jenis_tamu_list', $data);
    }

    public function read($id) 
    {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $row = $this->Jenis_tamu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenis_tamu' => $row->id_jenis_tamu,
		'jenis_tm' => $row->jenis_tm,
	    );
            $this->load->view('jenis_tamu/jenis_tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_tamu'));
        }
    }

    public function create() 
    {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenis_tamu/create_action'),
	    'id_jenis_tamu' => set_value('id_jenis_tamu'),
	    'jenis_tm' => set_value('jenis_tm'),
	);
        $this->load->view('jenis_tamu/jenis_tamu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_jenis_tamu' => $this->input->post('id_jenis_tamu',TRUE),
		'jenis_tm' => $this->input->post('jenis_tm',TRUE),
	    );

            $this->Jenis_tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('jenis_tamu'));
        }
    }
    
    public function update($id) 
    {
        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
        $row = $this->Jenis_tamu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenis_tamu/update_action'),
		'id_jenis_tamu' => set_value('id_jenis_tamu', $row->id_jenis_tamu),
		'jenis_tm' => set_value('jenis_tm', $row->jenis_tm),
	    );
            $this->load->view('jenis_tamu/jenis_tamu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_tamu'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_jenis_tamu' => $this->input->post('id_jenis_tamu',TRUE),
		'jenis_tm' => $this->input->post('jenis_tm',TRUE),
	    );

            $this->Jenis_tamu_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenis_tamu'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Jenis_tamu_model->get_by_id($id);

        if ($row) {
            $this->Jenis_tamu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenis_tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenis_tamu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_jenis_tamu', 'id jenis tamu', 'trim|required');
	$this->form_validation->set_rules('jenis_tm', 'jenis tm', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jenis_tamu.xls";
        $judul = "jenis_tamu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Tamu");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Tm");

	foreach ($this->Jenis_tamu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_tamu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_tm);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jenis_tamu.doc");

        $data = array(
            'jenis_tamu_data' => $this->Jenis_tamu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenis_tamu/jenis_tamu_doc',$data);
    }

}

/* End of file Jenis_tamu.php */
/* Location: ./application/controllers/Jenis_tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-04-22 03:28:30 */
/* http://harviacode.com */