<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('front/Buku_model');
    }

	public function index(){

		$page_data = array(
			'actionsearching' 				=> site_url('buku/searching'),
			'actionkategori' 				=> site_url('buku/kategori'),
		);

		$page_data['page_name']     = "home/index";
		$this->load->view('dynamic/front/index', $page_data);
	}
}
