<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepsurattugaskep extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Kepsurattugaskep_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/kepsurattugaskep/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/kepsurattugaskep/index/';
            $config['first_url'] = base_url() . 'index.php/kepsurattugaskep/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Kepsurattugaskep_model->total_rows($q);
        $kepsurattugaskep = $this->Kepsurattugaskep_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kepsurattugaskep_data' => $kepsurattugaskep,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','kepsurattugaskep/tbl_kepsurattugas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kepsurattugaskep_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_surattugas' => $row->id_surattugas,
		'nomor_st' => $row->nomor_st,
		'tanggal_st' => $row->tanggal_st,
		'perihal' => $row->perihal,
		'nama' => $row->nama,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','kepsurattugaskep/tbl_kepsurattugas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsurattugaskep'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kepsurattugaskep/create_action'),
	    'id_surattugas' => set_value('id_surattugas'),
	    'nomor_st' => set_value('nomor_st'),
	    'tanggal_st' => set_value('tanggal_st'),
	    'perihal' => set_value('perihal'),
	    'nama' => set_value('nama'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','kepsurattugaskep/tbl_kepsurattugas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_st' => $this->input->post('nomor_st',TRUE),
		'tanggal_st' => $this->input->post('tanggal_st',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Kepsurattugaskep_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kepsurattugaskep'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kepsurattugaskep_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kepsurattugaskep/update_action'),
		'id_surattugas' => set_value('id_surattugas', $row->id_surattugas),
		'nomor_st' => set_value('nomor_st', $row->nomor_st),
		'tanggal_st' => set_value('tanggal_st', $row->tanggal_st),
		'perihal' => set_value('perihal', $row->perihal),
		'nama' => set_value('nama', $row->nama),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','kepsurattugaskep/tbl_kepsurattugas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsurattugaskep'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_surattugas', TRUE));
        } else {
            $data = array(
		'nomor_st' => $this->input->post('nomor_st',TRUE),
		'tanggal_st' => $this->input->post('tanggal_st',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Kepsurattugaskep_model->update($this->input->post('id_surattugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kepsurattugaskep'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kepsurattugaskep_model->get_by_id($id);

        if ($row) {
            $this->Kepsurattugaskep_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kepsurattugaskep'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepsurattugaskep'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_st', 'nomor st', 'trim|required');
	$this->form_validation->set_rules('tanggal_st', 'tanggal st', 'trim|required');
	$this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_surattugas', 'id_surattugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kepsurattugas.xls";
        $judul = "tbl_kepsurattugas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor St");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal St");
	xlsWriteLabel($tablehead, $kolomhead++, "Perihal");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Kepsurattugaskep_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_st);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_st);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perihal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
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
        header("Content-Disposition: attachment;Filename=tbl_kepsurattugas.doc");

        $data = array(
            'tbl_kepsurattugas_data' => $this->Kepsurattugaskep_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kepsurattugaskep/tbl_kepsurattugas_doc',$data);
    }

}

/* End of file Kepsurattugaskep.php */
/* Location: ./application/controllers/Kepsurattugaskep.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-26 11:12:54 */
/* http://harviacode.com */