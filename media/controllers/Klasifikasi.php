<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('front/Kategori_model');
		$this->load->model('front/Buku_model');
		$this->load->model('front/Klasifikasi_model');
	}


	public function index(){
		$lists = $this->Klasifikasi_model->lists();
		$page_data = array(
			'lists'				=> $lists,
			'actionsearching'	=> site_url('buku/searching'),
		);

		$page_data['page_name']	= "kategori/klasifikasi";
		$this->load->view('dynamic/front/kategori/klasifikasi', $page_data);
	}

	public function sub($no_kategori){
		$lists = $this->Kategori_model->getByNoKategori($no_kategori);
		$page_data = array(
			'lists'				=> $lists,
			'actionsearching'	=> site_url('buku/searching'),
		);

		$page_data['page_name']	= "kategori/subkategori";
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function klasifikasi($no_klas){
	    $data_klas = explode("-",$no_klas);
	    if ($data_klas[0] == "2X0") $data_klas[0] = 2;
	    if ($data_klas[1] == "2X9") $data_klas[1] = 2;
		$lists = $this->Klasifikasi_model->getByRangeNoKlasifikasi($data_klas[0],$data_klas[1]);
		$page_data = array(
			'lists'				=> $lists,
			'actionsearching'	=> site_url('buku/searching'),
		);

		$page_data['page_name']	= "kategori/klasifikasi";
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function simpan(){

		$data['actionsearching']	= site_url('buku/searching');
		$data = array(
			'no_klasifikasi'	=> $this->input->post('no_klasifikasi'),
			'nama_klas'		=> $this->input->post('nama_klas'),

		);

		$this->Klasifikasi_model->simpan($data);

		echo "<script>alert('Data berhasil disimpan'); window.location='../klasifikasi';</script>";
	}

	public function hapus() 
	{
		$this->Klasifikasi_model->hapus($this->uri->segment('3'));

		echo "<script>alert('Data berhasil dihapus'); window.location='../';</script>";
	}

	public function ubahklasifikasi(){

		$page_data = array(
			'actionsearching'	=> site_url('buku/searching'),
			'getbyid'			=> $this->Klasifikasi_model->getbyid($this->uri->segment('3')),
		);

		$page_data['page_name']	= "klasifikasi/ubahklasifikasi";
		$this->load->view('dynamic/front/kategori/klasifikasi', $page_data);
	}

	public function updateklasifikasi()
	{
		$id = $this->input->post('id');

		$data = array(
			'no_klasifikasi'	=> $this->input->post('no_klasifikasi'),
			'nama_klas' 	=> $this->input->post('nama_klas'),
		);

		$this->Klasifikasi_model->update($id, $data);

		echo "<script>alert('Data berhasil diubah'); window.location='../klasifikasi';</script>";

	}

	
}