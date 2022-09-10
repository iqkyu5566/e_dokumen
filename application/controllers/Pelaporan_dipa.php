<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelaporan_dipa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
        $this->load->model('Pelaporan_dipa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/pelaporan_dipa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/pelaporan_dipa/index/';
            $config['first_url'] = base_url() . 'index.php/pelaporan_dipa/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Pelaporan_dipa_model->total_rows($q);
        $pelaporan_dipa = $this->Pelaporan_dipa_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pelaporan_dipa_data' => $pelaporan_dipa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pelaporan_dipa/tbl_pelaporan_dipa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pelaporan_dipa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pelaporan' => $row->id_pelaporan,
		'jenis_laporan' => $row->jenis_laporan,
		'jenis_dipa' => $row->jenis_dipa,
		'keterangan' => $row->keterangan,
		'nama_file' => $row->nama_file,
	    );
            $this->template->load('template','pelaporan_dipa/tbl_pelaporan_dipa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelaporan_dipa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pelaporan_dipa/create_action'),
	    'id_pelaporan' => set_value('id_pelaporan'),
	    'jenis_laporan' => set_value('jenis_laporan'),
	    'jenis_dipa' => set_value('jenis_dipa'),
	    'keterangan' => set_value('keterangan'),
	    'nama_file' => set_value('nama_file'),
	);
        $this->template->load('template','pelaporan_dipa/tbl_pelaporan_dipa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_laporan' => $this->input->post('jenis_laporan',TRUE),
		'jenis_dipa' => $this->input->post('jenis_dipa',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
	    );

            $this->Pelaporan_dipa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pelaporan_dipa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pelaporan_dipa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelaporan_dipa/update_action'),
		'id_pelaporan' => set_value('id_pelaporan', $row->id_pelaporan),
		'jenis_laporan' => set_value('jenis_laporan', $row->jenis_laporan),
		'jenis_dipa' => set_value('jenis_dipa', $row->jenis_dipa),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'nama_file' => set_value('nama_file', $row->nama_file),
	    );
            $this->template->load('template','pelaporan_dipa/tbl_pelaporan_dipa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelaporan_dipa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pelaporan', TRUE));
        } else {
            $data = array(
		'jenis_laporan' => $this->input->post('jenis_laporan',TRUE),
		'jenis_dipa' => $this->input->post('jenis_dipa',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
	    );

            $this->Pelaporan_dipa_model->update($this->input->post('id_pelaporan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pelaporan_dipa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pelaporan_dipa_model->get_by_id($id);

        if ($row) {
            $this->Pelaporan_dipa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pelaporan_dipa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelaporan_dipa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_laporan', 'jenis laporan', 'trim|required');
	$this->form_validation->set_rules('jenis_dipa', 'jenis dipa', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');

	$this->form_validation->set_rules('id_pelaporan', 'id_pelaporan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pelaporan_dipa.xls";
        $judul = "tbl_pelaporan_dipa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Laporan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Dipa");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama File");

	foreach ($this->Pelaporan_dipa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_laporan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_dipa);
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
        header("Content-Disposition: attachment;Filename=tbl_pelaporan_dipa.doc");

        $data = array(
            'tbl_pelaporan_dipa_data' => $this->Pelaporan_dipa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pelaporan_dipa/tbl_pelaporan_dipa_doc',$data);
    }

}

/* End of file Pelaporan_dipa.php */
/* Location: ./application/controllers/Pelaporan_dipa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-09-05 10:34:53 */
/* http://harviacode.com */