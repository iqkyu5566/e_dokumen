<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lapkegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //is_login();
        $this->load->model('Lapkegiatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/lapkegiatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/lapkegiatan/index/';
            $config['first_url'] = base_url() . 'index.php/lapkegiatan/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Lapkegiatan_model->total_rows($q);
        $lapkegiatan = $this->Lapkegiatan_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'lapkegiatan_data' => $lapkegiatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','lapkegiatan/tbl_lapkegiatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Lapkegiatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_lapkegiatan' => $row->id_lapkegiatan,
		'nama_kegiatan' => $row->nama_kegiatan,
		'tgl_pelaksanaan' => $row->tgl_pelaksanaan,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','lapkegiatan/tbl_lapkegiatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lapkegiatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('lapkegiatan/create_action'),
	    'id_lapkegiatan' => set_value('id_lapkegiatan'),
	    'nama_kegiatan' => set_value('nama_kegiatan'),
	    'tgl_pelaksanaan' => set_value('tgl_pelaksanaan'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','lapkegiatan/tbl_lapkegiatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
		'tgl_pelaksanaan' => $this->input->post('tgl_pelaksanaan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Lapkegiatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('lapkegiatan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Lapkegiatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('lapkegiatan/update_action'),
		'id_lapkegiatan' => set_value('id_lapkegiatan', $row->id_lapkegiatan),
		'nama_kegiatan' => set_value('nama_kegiatan', $row->nama_kegiatan),
		'tgl_pelaksanaan' => set_value('tgl_pelaksanaan', $row->tgl_pelaksanaan),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','lapkegiatan/tbl_lapkegiatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lapkegiatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lapkegiatan', TRUE));
        } else {
            $data = array(
		'nama_kegiatan' => $this->input->post('nama_kegiatan',TRUE),
		'tgl_pelaksanaan' => $this->input->post('tgl_pelaksanaan',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Lapkegiatan_model->update($this->input->post('id_lapkegiatan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('lapkegiatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Lapkegiatan_model->get_by_id($id);

        if ($row) {
            $this->Lapkegiatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('lapkegiatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('lapkegiatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kegiatan', 'nama kegiatan', 'trim|required');
	$this->form_validation->set_rules('tgl_pelaksanaan', 'tgl pelaksanaan', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_lapkegiatan', 'id_lapkegiatan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_lapkegiatan.xls";
        $judul = "tbl_lapkegiatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kegiatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Pelaksanaan");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Lapkegiatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kegiatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_pelaksanaan);
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
        header("Content-Disposition: attachment;Filename=tbl_lapkegiatan.doc");

        $data = array(
            'tbl_lapkegiatan_data' => $this->Lapkegiatan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('lapkegiatan/tbl_lapkegiatan_doc',$data);
    }

}

/* End of file Lapkegiatan.php */
/* Location: ./application/controllers/Lapkegiatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-27 09:07:02 */
/* http://harviacode.com */