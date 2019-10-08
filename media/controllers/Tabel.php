<?php

class Tabel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->helper("file");
        $this->load->model('front/Tabel_model');
    }

    public function index(){
        $nama_tabel = "tabel".$this->input->get('tabel',TRUE);
        $lists = $this->Tabel_model->get($nama_tabel);
        $page_data = array(
            'lists'				=> $lists,
            'actionsearching'	=> site_url('tabel/searching'),
        );

        $page_data['page_name']     = "tabel/index";
        $this->load->view('dynamic/front/index', $page_data);
    }

    public function searching(){
        $lists = $this->Tabel->searchs();
        $page_data = array(
            'lists'				=> $lists,
            'actionsearching'	=> site_url('tabel/searching'),
        );
        $page_data['page_name'] = "tabel/index";
        $this->load->view('dynamic/front/index', $page_data);
    }
}