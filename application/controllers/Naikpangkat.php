<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Naikpangkat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Naikpangkat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/naikpangkat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/naikpangkat/index/';
            $config['first_url'] = base_url() . 'index.php/naikpangkat/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Naikpangkat_model->total_rows($q);
        $naikpangkat = $this->Naikpangkat_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'naikpangkat_data' => $naikpangkat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','naikpangkat/tbl_naikpangkat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Naikpangkat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_naikpangkat' => $row->id_naikpangkat,
		'periode' => $row->periode,
		'tahun' => $row->tahun,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','naikpangkat/tbl_naikpangkat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('naikpangkat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('naikpangkat/create_action'),
	    'id_naikpangkat' => set_value('id_naikpangkat'),
	    'periode' => set_value('periode'),
	    'tahun' => set_value('tahun'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','naikpangkat/tbl_naikpangkat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'periode' => $this->input->post('periode',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Naikpangkat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('naikpangkat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Naikpangkat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('naikpangkat/update_action'),
		'id_naikpangkat' => set_value('id_naikpangkat', $row->id_naikpangkat),
		'periode' => set_value('periode', $row->periode),
		'tahun' => set_value('tahun', $row->tahun),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','naikpangkat/tbl_naikpangkat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('naikpangkat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_naikpangkat', TRUE));
        } else {
            $data = array(
		'periode' => $this->input->post('periode',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Naikpangkat_model->update($this->input->post('id_naikpangkat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('naikpangkat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Naikpangkat_model->get_by_id($id);

        if ($row) {
            $this->Naikpangkat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('naikpangkat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('naikpangkat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('periode', 'periode', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_naikpangkat', 'id_naikpangkat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_naikpangkat.xls";
        $judul = "tbl_naikpangkat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Periode");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Naikpangkat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_naikpangkat.doc");

        $data = array(
            'tbl_naikpangkat_data' => $this->Naikpangkat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('naikpangkat/tbl_naikpangkat_doc',$data);
    }

}

/* End of file Naikpangkat.php */
/* Location: ./application/controllers/Naikpangkat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 11:03:09 */
/* http://harviacode.com */