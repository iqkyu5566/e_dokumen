<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hukdis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Hukdis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/hukdis/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/hukdis/index/';
            $config['first_url'] = base_url() . 'index.php/hukdis/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Hukdis_model->total_rows($q);
        $hukdis = $this->Hukdis_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'hukdis_data' => $hukdis,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','hukdis/tbl_hukdis_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Hukdis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_hukdis' => $row->id_hukdis,
		'nama' => $row->nama,
		'nomor_sk' => $row->nomor_sk,
		'tgl_sk' => $row->tgl_sk,
		'jenis_huk' => $row->jenis_huk,
		'sanksi' => $row->sanksi,
		'tmt_mulai' => $row->tmt_mulai,
		'tmt_akhir' => $row->tmt_akhir,
		'keterangan' => $row->keterangan,
        'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','hukdis/tbl_hukdis_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hukdis'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('hukdis/create_action'),
	    'id_hukdis' => set_value('id_hukdis'),
	    'nama' => set_value('nama'),
	    'nomor_sk' => set_value('nomor_sk'),
	    'tgl_sk' => set_value('tgl_sk'),
	    'jenis_huk' => set_value('jenis_huk'),
	    'sanksi' => set_value('sanksi'),
	    'tmt_mulai' => set_value('tmt_mulai'),
	    'tmt_akhir' => set_value('tmt_akhir'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','hukdis/tbl_hukdis_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $hukdis = $this->upload_filehukdis();
        // echo "<pre>";
        // print_r ($kepskhakim);
        // die;
        // echo "</pre>";

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_sk' => $this->input->post('nomor_sk',TRUE),
		'tgl_sk' => $this->input->post('tgl_sk',TRUE),
		'jenis_huk' => $this->input->post('jenis_huk',TRUE),
		'sanksi' => $this->input->post('sanksi',TRUE),
		'tmt_mulai' => $this->input->post('tmt_mulai',TRUE),
		'tmt_akhir' => $this->input->post('tmt_akhir',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $hukdis['file_name'],
	    );

            $this->Hukdis_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('hukdis'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Hukdis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('hukdis/update_action'),
		'id_hukdis' => set_value('id_hukdis', $row->id_hukdis),
		'nama' => set_value('nama', $row->nama),
		'nomor_sk' => set_value('nomor_sk', $row->nomor_sk),
		'tgl_sk' => set_value('tgl_sk', $row->tgl_sk),
		'jenis_huk' => set_value('jenis_huk', $row->jenis_huk),
		'sanksi' => set_value('sanksi', $row->sanksi),
		'tmt_mulai' => set_value('tmt_mulai', $row->tmt_mulai),
		'tmt_akhir' => set_value('tmt_akhir', $row->tmt_akhir),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','hukdis/tbl_hukdis_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hukdis'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $hukdis = $this->upload_filehukdis();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_hukdis', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nomor_sk' => $this->input->post('nomor_sk',TRUE),
		'tgl_sk' => $this->input->post('tgl_sk',TRUE),
		'jenis_huk' => $this->input->post('jenis_huk',TRUE),
		'sanksi' => $this->input->post('sanksi',TRUE),
		'tmt_mulai' => $this->input->post('tmt_mulai',TRUE),
		'tmt_akhir' => $this->input->post('tmt_akhir',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
        'nama_file'     => $hukdis['file_name'],
	    );

            $this->Hukdis_model->update($this->input->post('id_hukdis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('hukdis'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Hukdis_model->get_by_id($id);

        if ($row) {
            $this->Hukdis_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('hukdis'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('hukdis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nomor_sk', 'nomor sk', 'trim|required');
	$this->form_validation->set_rules('tgl_sk', 'tgl sk', 'trim|required');
	$this->form_validation->set_rules('jenis_huk', 'jenis huk', 'trim|required');
	$this->form_validation->set_rules('sanksi', 'sanksi', 'trim|required');
	$this->form_validation->set_rules('tmt_mulai', 'tmt mulai', 'trim|required');
	$this->form_validation->set_rules('tmt_akhir', 'tmt akhir', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_hukdis', 'id_hukdis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_hukdis.xls";
        $judul = "tbl_hukdis";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Huk");
	xlsWriteLabel($tablehead, $kolomhead++, "Sanksi");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmt Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Tmt Akhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Hukdis_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_sk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_sk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_huk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sanksi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmt_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tmt_akhir);
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
        header("Content-Disposition: attachment;Filename=tbl_hukdis.doc");

        $data = array(
            'tbl_hukdis_data' => $this->Hukdis_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('hukdis/tbl_hukdis_doc',$data);
    }

    function upload_filehukdis(){
        $config['upload_path']          = './assets/file_hukdis';
        $config['allowed_types']        = 'gif|jpg|png|pdf|doc|docx|zip|rar';
        $config['max_size']             = 2000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('nama_file');
        return $this->upload->data();
    }

}

/* End of file Hukdis.php */
/* Location: ./application/controllers/Hukdis.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 11:05:06 */
/* http://harviacode.com */