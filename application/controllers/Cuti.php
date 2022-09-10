<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Cuti_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/cuti/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/cuti/index/';
            $config['first_url'] = base_url() . 'index.php/cuti/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Cuti_model->total_rows($q);
        $cuti = $this->Cuti_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'cuti_data' => $cuti,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','cuti/tbl_cuti_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Cuti_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_cuti' => $row->id_cuti,
		'nama' => $row->nama,
		'nomor_surat' => $row->nomor_surat,
		'tgl_surat' => $row->tgl_surat,
		'jenis_cuti' => $row->jenis_cuti,
		'lama_cuti' => $row->lama_cuti,
		'tgl_cuti' => $row->tgl_cuti,
        'nama_file' => $row->nama_file,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','cuti/tbl_cuti_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('cuti/create_action'),
	    'id_cuti' => set_value('id_cuti'),
	    'nama' => set_value('nama'),
	    'nomor_surat' => set_value('nomor_surat'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'jenis_cuti' => set_value('jenis_cuti'),
	    'lama_cuti' => set_value('lama_cuti'),
	    'tgl_cuti' => set_value('tgl_cuti'),
        'nama_file' => set_value('nama_file'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','cuti/tbl_cuti_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $cuti = $this->upload_filecuti();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'jenis_cuti' => $this->input->post('jenis_cuti',TRUE),
		'lama_cuti' => $this->input->post('lama_cuti',TRUE),
		'tgl_cuti' => $this->input->post('tgl_cuti',TRUE),
        'nama_file'     => $cuti['file_name'],
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Cuti_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('cuti'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Cuti_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('cuti/update_action'),
		'id_cuti' => set_value('id_cuti', $row->id_cuti),
		'nama' => set_value('nama', $row->nama),
		'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'jenis_cuti' => set_value('jenis_cuti', $row->jenis_cuti),
		'lama_cuti' => set_value('lama_cuti', $row->lama_cuti),
		'tgl_cuti' => set_value('tgl_cuti', $row->tgl_cuti),
        'nama_file' => set_value('nama_file', $row->nama_file),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','cuti/tbl_cuti_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $cuti = $this->upload_filecuti();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cuti', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'jenis_cuti' => $this->input->post('jenis_cuti',TRUE),
		'lama_cuti' => $this->input->post('lama_cuti',TRUE),
		'tgl_cuti' => $this->input->post('tgl_cuti',TRUE),
        'nama_file'     => $cuti['file_name'],
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Cuti_model->update($this->input->post('id_cuti', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cuti'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Cuti_model->get_by_id($id);

        if ($row) {
            $this->Cuti_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cuti'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('jenis_cuti', 'jenis cuti', 'trim|required');
	$this->form_validation->set_rules('lama_cuti', 'lama cuti', 'trim|required');
	$this->form_validation->set_rules('tgl_cuti', 'tgl cuti', 'trim|required');
    // $this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_cuti', 'id_cuti', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_cuti.xls";
        $judul = "tbl_cuti";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Cuti");
	xlsWriteLabel($tablehead, $kolomhead++, "Lama Cuti");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Cuti");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama File");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Cuti_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_cuti);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lama_cuti);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_cuti);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_file);
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
        header("Content-Disposition: attachment;Filename=tbl_cuti.doc");

        $data = array(
            'tbl_cuti_data' => $this->Cuti_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('cuti/tbl_cuti_doc',$data);
    }

    function upload_filecuti(){
        $config['upload_path']          = './assets/file_cuti';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }

}

/* End of file Cuti.php */
/* Location: ./application/controllers/Cuti.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 08:23:14 */
/* http://harviacode.com */