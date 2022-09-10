<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengawasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pengawasan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pengawasan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pengawasan/index/';
            $config['first_url'] = base_url() . 'index.php/pengawasan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Pengawasan_model->total_rows($q);
        $pengawasan = $this->Pengawasan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengawasan_data' => $pengawasan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pengawasan/tbl_pengawasan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pengawasan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengawasan' => $row->id_pengawasan,
		'no_dokumen' => $row->no_dokumen,
		'satker' => $row->satker,
		'tim' => $row->tim,
		'tgl_upload' => $row->tgl_upload,
		'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','pengawasan/tbl_pengawasan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengawasan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pengawasan/create_action'),
	    'id_pengawasan' => set_value('id_pengawasan'),
	    'no_dokumen' => set_value('no_dokumen'),
	    'satker' => set_value('satker'),
	    'tim' => set_value('tim'),
	    'tgl_upload' => set_value('tgl_upload'),
	    'nama_file' => set_value('nama_file'),
	);
        $this->template->load('template','pengawasan/tbl_pengawasan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $pengawasan = $this->upload_filepengawasan();
        // echo "<pre>";
        // print_r ($kepskhakim);
        // die;
        // echo "</pre>";

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_dokumen' => $this->input->post('no_dokumen',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'tim' => $this->input->post('tim',TRUE),
		'tgl_upload' => $this->input->post('tgl_upload',TRUE),
		// 'nama_file' => $this->input->post('nama_file',TRUE),
        'nama_file'     => $pengawasan['file_name'],
	    );

            $this->Pengawasan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengawasan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pengawasan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengawasan/update_action'),
		'id_pengawasan' => set_value('id_pengawasan', $row->id_pengawasan),
		'no_dokumen' => set_value('no_dokumen', $row->no_dokumen),
		'satker' => set_value('satker', $row->satker),
		'tim' => set_value('tim', $row->tim),
		'tgl_upload' => set_value('tgl_upload', $row->tgl_upload),
		'nama_file' => set_value('nama_file', $row->nama_file),
	    );
            $this->template->load('template','pengawasan/tbl_pengawasan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengawasan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $pengawasan = $this->upload_filepengawasan();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengawasan', TRUE));
        } else {
            $data = array(
		'no_dokumen' => $this->input->post('no_dokumen',TRUE),
		'satker' => $this->input->post('satker',TRUE),
		'tim' => $this->input->post('tim',TRUE),
		'tgl_upload' => $this->input->post('tgl_upload',TRUE),
		// 'nama_file' => $this->input->post('nama_file',TRUE),
        'nama_file'     => $pengawasan['file_name'],
	    );

            $this->Pengawasan_model->update($this->input->post('id_pengawasan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengawasan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pengawasan_model->get_by_id($id);

        if ($row) {
            $this->Pengawasan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengawasan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengawasan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_dokumen', 'no dokumen', 'trim|required');
	$this->form_validation->set_rules('satker', 'satker', 'trim|required');
	$this->form_validation->set_rules('tim', 'tim', 'trim|required');
	$this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
	// $this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');

	$this->form_validation->set_rules('id_pengawasan', 'id_pengawasan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pengawasan.xls";
        $judul = "tbl_pengawasan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Dokumen");
	xlsWriteLabel($tablehead, $kolomhead++, "Satker");
	xlsWriteLabel($tablehead, $kolomhead++, "Tim");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Upload");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama File");

	foreach ($this->Pengawasan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_dokumen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->satker);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_upload);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_file);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pengawasan.doc");

        $data = array(
            'tbl_pengawasan_data' => $this->Pengawasan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengawasan/tbl_pengawasan_doc',$data);
    }

    function upload_filepengawasan(){
        $config['upload_path']          = './assets/file_pengawasan';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }


}

/* End of file Pengawasan.php */
/* Location: ./application/controllers/Pengawasan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-25 08:57:44 */
/* http://harviacode.com */