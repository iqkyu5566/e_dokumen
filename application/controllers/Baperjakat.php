<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baperjakat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Baperjakat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/baperjakat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/baperjakat/index/';
            $config['first_url'] = base_url() . 'index.php/baperjakat/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Baperjakat_model->total_rows($q);
        $baperjakat = $this->Baperjakat_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'baperjakat_data' => $baperjakat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','baperjakat/tbl_baperjakat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Baperjakat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_baperjakat' => $row->id_baperjakat,
		'nama' => $row->nama,
		'nomor_surat' => $row->nomor_surat,
		'tgl_surat' => $row->tgl_surat,
		'satker' => $row->satker,
		'jab_lama' => $row->jab_lama,
		'jab_baru' => $row->jab_baru,
		'keterangan' => $row->keterangan,
        'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','baperjakat/tbl_baperjakat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baperjakat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('baperjakat/create_action'),
	    'id_baperjakat' => set_value('id_baperjakat'),
	    'nama' => set_value('nama'),
	    'nomor_surat' => set_value('nomor_surat'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'satker' => set_value('satker'),
	    'jab_lama' => set_value('jab_lama'),
	    'jab_baru' => set_value('jab_baru'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','baperjakat/tbl_baperjakat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $baperjakat = $this->upload_filebaperjakat();
        // echo "<pre>";
        // print_r ($kepskhakim);
        // die;
        // echo "</pre>";

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'jab_lama' => $this->input->post('jab_lama',TRUE),
		'jab_baru' => $this->input->post('jab_baru',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $baperjakat['file_name'],
	    );

            $this->Baperjakat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('baperjakat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Baperjakat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('baperjakat/update_action'),
		'id_baperjakat' => set_value('id_baperjakat', $row->id_baperjakat),
		'nama' => set_value('nama', $row->nama),
		'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'satker' => set_value('satker', $row->satker),
		'jab_lama' => set_value('jab_lama', $row->jab_lama),
		'jab_baru' => set_value('jab_baru', $row->jab_baru),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','baperjakat/tbl_baperjakat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baperjakat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $baperjakat = $this->upload_filebaperjakat();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_baperjakat', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'jab_lama' => $this->input->post('jab_lama',TRUE),
		'jab_baru' => $this->input->post('jab_baru',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $baperjakat['file_name'],
	    );

            $this->Baperjakat_model->update($this->input->post('id_baperjakat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('baperjakat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Baperjakat_model->get_by_id($id);

        if ($row) {
            $this->Baperjakat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('baperjakat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('baperjakat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	$this->form_validation->set_rules('jab_lama', 'jab lama', 'trim|required');
	$this->form_validation->set_rules('jab_baru', 'jab baru', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_baperjakat', 'id_baperjakat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_baperjakat.xls";
        $judul = "tbl_baperjakat";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Jab Lama");
	xlsWriteLabel($tablehead, $kolomhead++, "Jab Baru");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Baperjakat_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satker);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jab_lama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jab_baru);
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
        header("Content-Disposition: attachment;Filename=tbl_baperjakat.doc");

        $data = array(
            'tbl_baperjakat_data' => $this->Baperjakat_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('baperjakat/tbl_baperjakat_doc',$data);
    }
    function upload_filebaperjakat(){
        $config['upload_path']          = './assets/file_baperjakat';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }

}

/* End of file Baperjakat.php */
/* Location: ./application/controllers/Baperjakat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 09:07:22 */
/* http://harviacode.com */