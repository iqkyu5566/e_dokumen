<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Skhakim extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Skhakim_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/skhakim/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/skhakim/index/';
            $config['first_url'] = base_url() . 'index.php/skhakim/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Skhakim_model->total_rows($q);
        $skhakim = $this->Skhakim_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'skhakim_data' => $skhakim,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','skhakim/id_skhakim_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Skhakim_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_skhakim' => $row->id_skhakim,
		'nomor_surat' => $row->nomor_surat,
		'tgl_surat' => $row->tgl_surat,
		'perihal' => $row->perihal,
		'jenis_sk' => $row->jenis_sk,
		'keterangan' => $row->keterangan,
        'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','skhakim/id_skhakim_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skhakim'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('skhakim/create_action'),
	    'id_skhakim' => set_value('id_skhakim'),
	    'nomor_surat' => set_value('nomor_surat'),
	    'tgl_surat' => set_value('tgl_surat'),
	    'perihal' => set_value('perihal'),
	    'jenis_sk' => set_value('jenis_sk'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','skhakim/id_skhakim_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $skhakimkhusus = $this->upload_fileskhakimkhusus();
        // echo "<pre>";
        // print_r ($kepskhakim);
        // die;
        // echo "</pre>";
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'jenis_sk' => $this->input->post('jenis_sk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $skhakimkhusus['file_name'],
	    );

            $this->Skhakim_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('skhakim'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Skhakim_model->get_by_id($id);
        
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('skhakim/update_action'),
		'id_skhakim' => set_value('id_skhakim', $row->id_skhakim),
		'nomor_surat' => set_value('nomor_surat', $row->nomor_surat),
		'tgl_surat' => set_value('tgl_surat', $row->tgl_surat),
		'perihal' => set_value('perihal', $row->perihal),
		'jenis_sk' => set_value('jenis_sk', $row->jenis_sk),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','skhakim/id_skhakim_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skhakim'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $skhakimkhusus = $this->upload_fileskhakimkhusus();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_skhakim', TRUE));
        } else {
            $data = array(
		'nomor_surat' => $this->input->post('nomor_surat',TRUE),
		'tgl_surat' => $this->input->post('tgl_surat',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'jenis_sk' => $this->input->post('jenis_sk',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $skhakimkhusus['file_name'],
	    );

            $this->Skhakim_model->update($this->input->post('id_skhakim', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('skhakim'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Skhakim_model->get_by_id($id);

        if ($row) {
            $this->Skhakim_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('skhakim'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('skhakim'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_surat', 'nomor surat', 'trim|required');
	$this->form_validation->set_rules('tgl_surat', 'tgl surat', 'trim|required');
	$this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
	$this->form_validation->set_rules('jenis_sk', 'jenis sk', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_skhakim', 'id_skhakim', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "id_skhakim.xls";
        $judul = "id_skhakim";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Surat");
	xlsWriteLabel($tablehead, $kolomhead++, "Perihal");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Skhakim_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_surat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perihal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_sk);
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
        header("Content-Disposition: attachment;Filename=id_skhakim.doc");

        $data = array(
            'id_skhakim_data' => $this->Skhakim_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('skhakim/id_skhakim_doc',$data);
    }

    function upload_fileskhakimkhusus(){
        $config['upload_path']          = './assets/file_skhakimkhusus';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }

}

/* End of file Skhakim.php */
/* Location: ./application/controllers/Skhakim.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 11:13:32 */
/* http://harviacode.com */