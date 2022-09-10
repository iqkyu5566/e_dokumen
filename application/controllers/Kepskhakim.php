<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kepskhakim extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kepskhakim_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/kepskhakim/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/kepskhakim/index/';
            $config['first_url'] = base_url() . 'index.php/kepskhakim/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Kepskhakim_model->total_rows($q);
        $kepskhakim = $this->Kepskhakim_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kepskhakim_data' => $kepskhakim,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','kepskhakim/tbl_kepskhakim_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kepskhakim_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_skketua' => $row->id_skketua,
		'nomor_sk' => $row->nomor_sk,
		'tanggal_sk' => $row->tanggal_sk,
		'perihal' => $row->perihal,
		'keterangan' => $row->keterangan,
        'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','kepskhakim/tbl_kepskhakim_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepskhakim'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kepskhakim/create_action'),
	    'id_skketua' => set_value('id_skketua'),
	    'nomor_sk' => set_value('nomor_sk'),
	    'tanggal_sk' => set_value('tanggal_sk'),
	    'perihal' => set_value('perihal'),
	    'keterangan' => set_value('keterangan'),
        'nama_file' => set_value('nama_file'),
	);
        $this->template->load('template','kepskhakim/tbl_kepskhakim_form', $data);
    }

    
    
    public function create_action() 
    {
        
        
        
        $this->_rules();
        $kepskhakim = $this->upload_fileskhakim();
        // echo "<pre>";
        // print_r ($kepskhakim);
        // die;
        // echo "</pre>";
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_sk' => $this->input->post('nomor_sk',TRUE),
		'tanggal_sk' => $this->input->post('tanggal_sk',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $kepskhakim['file_name'],
        // 'nama_file' => $this->input->post('nama_file',TRUE),
	    );

            $this->Kepskhakim_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('kepskhakim'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kepskhakim_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kepskhakim/update_action'),
		'id_skketua' => set_value('id_skketua', $row->id_skketua),
		'nomor_sk' => set_value('nomor_sk', $row->nomor_sk),
		'tanggal_sk' => set_value('tanggal_sk', $row->tanggal_sk),
		'perihal' => set_value('perihal', $row->perihal),
		'keterangan' => set_value('keterangan', $row->keterangan),
        'nama_file' => set_value('nama_file', $row->nama_file),
	    );
            $this->template->load('template','kepskhakim/tbl_kepskhakim_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepskhakim'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $kepskhakim = $this->upload_fileskhakim();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_skketua', TRUE));
        } else {
            $data = array(
		'nomor_sk' => $this->input->post('nomor_sk',TRUE),
		'tanggal_sk' => $this->input->post('tanggal_sk',TRUE),
		'perihal' => $this->input->post('perihal',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        // 'nama_file' => $this->input->post('nama_file',TRUE),
        'nama_file'     => $kepskhakim['file_name'],
	    );

            $this->Kepskhakim_model->update($this->input->post('id_skketua', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kepskhakim'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kepskhakim_model->get_by_id($id);

        if ($row) {
            $this->Kepskhakim_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kepskhakim'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kepskhakim'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_sk', 'nomor sk', 'trim|required');
	$this->form_validation->set_rules('tanggal_sk', 'tanggal sk', 'trim|required');
	$this->form_validation->set_rules('perihal', 'perihal', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
    // $this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');

	$this->form_validation->set_rules('id_skketua', 'id_skketua', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kepskhakim.xls";
        $judul = "tbl_kepskhakim";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "Perihal");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama File");

	foreach ($this->Kepskhakim_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_sk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_sk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->perihal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
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
        header("Content-Disposition: attachment;Filename=tbl_kepskhakim.doc");

        $data = array(
            'tbl_kepskhakim_data' => $this->Kepskhakim_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kepskhakim/tbl_kepskhakim_doc',$data);
    }

    function upload_fileskhakim(){
        $config['upload_path']          = './assets/file_skhakim';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }

}



/* End of file Kepskhakim.php */
/* Location: ./application/controllers/Kepskhakim.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-26 10:57:01 */
/* http://harviacode.com */