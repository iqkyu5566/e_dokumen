<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '.php/c_url/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/tbl_kategori/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/tbl_kategori/index/';
            $config['first_url'] = base_url() . 'index.php/tbl_kategori/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Tbl_kategori_model->total_rows($q);
        $tbl_kategori = $this->Tbl_kategori_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_kategori_data' => $tbl_kategori,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_kategori/tbl_kategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'nama_kategori' => $row->nama_kategori,
	    );
            $this->template->load('template','tbl_kategori/tbl_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_kategori/create_action'),
	    'id_kategori' => set_value('id_kategori'),
	    'nama_kategori' => set_value('nama_kategori'),
	);
        $this->template->load('template','tbl_kategori/tbl_kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Tbl_kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_kategori/update_action'),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	    );
            $this->template->load('template','tbl_kategori/tbl_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Tbl_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_kategori_model->get_by_id($id);

        if ($row) {
            $this->Tbl_kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_kategori.xls";
        $judul = "tbl_kategori";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");

	foreach ($this->Tbl_kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_kategori.doc");

        $data = array(
            'tbl_kategori_data' => $this->Tbl_kategori_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_kategori/tbl_kategori_doc',$data);
    }

}

/* End of file Tbl_kategori.php */
/* Location: ./application/controllers/Tbl_kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2022-07-19 05:21:14 */
/* http://harviacode.com */