<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {


	function __construct()
	{
		parent::__construct();
        $this->load->helper("url");
        $this->load->helper("file");
		$this->load->model('front/Buku_model');
		$this->load->model('front/Kategori_model');
		$this->load->model('front/Keyword_model');
		$this->load->model('front/Klasifikasi_model');
	}


	public function index(){
		$lists = $this->Buku_model->lists();
		$page_data = array(
			'lists'				=> $lists,
			'actionsearching'	=> site_url('buku/searching'),
		);

		$page_data['page_name']     = "buku/index";
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function tambah(){

		$page_data = array(
			'actionsearching' 				=> site_url('buku/searching'),
            'kategori'                      => $this->Kategori_model->lists()
		);

		$page_data['page_name']     = "buku/tambah";
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function edit($id_buku){
        $page_data = array(
            'actionsearching' 				=> site_url('buku/searching'),
            'buku'                          => $this->Buku_model->getById($id_buku),
            'kategori'                      => $this->Kategori_model->lists()
        );

        $page_data['page_name']     = "buku/edit";
        $this->load->view('dynamic/front/index', $page_data);
    }

	public function import($error = NULL){
		$page_data = array(
			'lists'	=> $this->Buku_model->lists(),
			'action' => site_url('buku/actimport'),
			'actionsearching'	=> site_url('buku/searching'),
		);

		$page_data['page_name']     = "buku/import";
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function actimport()
	{
		$imgs 	= $_FILES['file']['name'];

		$upload = move_uploaded_file($_FILES['file']['tmp_name'], 'assets/temp_upload/' . $imgs);

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';        
		$excelreader = new PHPExcel_Reader_Excel2007();    
		$loadexcel = $excelreader->load('./assets/temp_upload/'.$imgs);    
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);    
		$data = array();
		$numrow = 1;   
		foreach($sheet as $row){      
			if($numrow > 1){      
				array_push($data, array(
					'nama_buku'			=>$row['B'],         
					'penerbit'			=>$row['C'],
					'pengarang'			=>$row['D'],     
					'no_kategori'		=>$row['E'],     
					'kategori'			=>$row['F'],     
					'nama_klasifikasi'	=>$row['G'],    
					'no_klas'			=>$row['H'],    
					'sinopsis'			=>$row['I'],     
                ));
			}           
			$numrow++;     
		}    

//		$this->Buku_model->empty_table();
//		$this->Keyword_model->empty_table();
		$this->Buku_model->insert_multiple($data);
//        $this->save_keyword();
		$path_to_file = 'assets/temp_upload/' . $imgs;
		unlink($path_to_file);

		echo "<script>alert('Import Excel Berhasil'); window.location='../buku';</script>";

	}

	public function kategori(){

		$title = $this->input->GET('q', TRUE);
        $lists_kategori = $this->Kategori_model->lists();
		$hasil_perhitungan = $this->knn_vsm_calculation($title);
//        $klasifikasi = $hasil_perhitungan['knn'];
        $klasifikasi = $hasil_perhitungan['vsm'][0]->nama_klasifikasi." (".$hasil_perhitungan['vsm'][0]->no_klas.")";
        $cari = $hasil_perhitungan['vsm'];
        $data_subkategori = $this->Klasifikasi_model->getSubKategoriByNoKlasifikasi($cari[0]->no_klas);
        $no_klasifikasi = explode("-", $data_subkategori->nomorsubkategori);
        $list_klasifikasi = $this->Klasifikasi_model->getByRangeNoKlasifikasi($no_klasifikasi[0], $no_klasifikasi[1]);


        $page_data = array(
			'actionsearching'	=> site_url('buku/searching'),
			'lists_kategori'	=> $lists_kategori,
			'cari'				=> $cari,
			'title'				=> $title,
            'klasifikasi'       => $klasifikasi,
            'subkategori'        => $data_subkategori,
            'kategori'          => $this->Kategori_model->lists(),
            'lists_klasifikasi' => $list_klasifikasi
		);

		$page_data['page_name']     = "buku/output_kategori";
//		var_dump($page_data);
		$this->load->view('dynamic/front/index', $page_data);
	}

	public function nomorklasifikasi(){

		$q = $this->input->GET('q', TRUE);
		$subs = substr($q, 0, 1);

		$lists_kategori = $this->Kategori_model->lists();
		$searchs2 = $this->Buku_model->searchs2();

		

		$page_data = array(
			'actionsearching'	=> site_url('buku/searching'),
			'lists_kategori'	=> $lists_kategori,
			'cari'				=> $searchs2,
			'subs'			    =>$subs

		);

		$page_data['page_name']     = "buku/nomor_klasifikasi";
		$this->load->view('dynamic/front/index', $page_data);
	}


	public function view(){

		$view = $this->Buku_model->view($this->uri->segment('3'));



		$page_data = array(
			'actionsearching'	=> site_url('buku/searching'),
			'view'				=> $view,
		);


		$page_data['page_name']     = "buku/view";
		$this->load->view('dynamic/front/index', $page_data);

	}

	public function searching(){
	    $lists = $this->Buku_model->searchs();
        $page_data = array(
            'lists'				=> $lists,
            'actionsearching'	=> site_url('buku/searching'),
        );
        $page_data['page_name'] = "buku/index";
        $this->load->view('dynamic/front/index', $page_data);
    }

	public function knn_vsm_calculation($search) {
//	    $this->save_keyword();
        ini_set("memory_limit","512M");
        include "Stemming.php";
        $stemming = new Stemming();
        $keywords = $this->Keyword_model->get();
        $total_keyword = count($keywords);

	    $buku = $this->Buku_model->get();

	    //Mengambil Stop Words dari library
        $stopwords_id = json_decode(file_get_contents(site_url("assets/stopwords-id.json")));
        $stopwords_en = json_decode(file_get_contents(site_url("assets/en.json")));

        // Proses Tokenizing
        // Merubah kalimat pencarian menjadi kata-per-kata dan diubah menjadi huruf kecil
	    $word = array();
        $word[0] = str_word_count(strtolower($search), 1);

        // Merubah kalimat judul buku menjadi kata-per-kata dan diubah menjadi huruf kecil
	    for ($i=1; $i<=count($buku); $i++) {
	        $word[$i] = str_word_count(strtolower($buku[$i-1]->nama_buku), 1);
        }

        // Proses Filtering (Menghilangkan Stop Words)
        for ($i=0; $i<count($word); $i++) {
            for ($j=0; $j<count($word[$i]); $j++) {
                if (in_array($word[$i][$j], $stopwords_id) || in_array($word[$i][$j], $stopwords_en)) array_splice($word[$i], $j, 1);
            }
        }

        // Proses Stemming (Menghapus Imbuhan kata)
        for ($i=0; $i<count($word); $i++) {
            for ($j=0; $j<count($word[$i]); $j++) {
                $word[$i][$j] = $stemming->hapuspartikel($word[$i][$j]);
                $word[$i][$j] = $stemming->hapuspp($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusawalan1($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusawalan2($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusakhiran($word[$i][$j]);
            }
        }

        $keywords = $word[0];

        $tf = array();
        $total_w = array();
        $total_similarity = array();
        $total_w_normalisasi = array();
        for ($i=0; $i<count($keywords); $i++) {
            for ($j=0; $j<count($word); $j++) {
                $tf[$i][$j] = 0;
                $total_similarity[$j] = 0;
                $total_w_normalisasi[$j] = 0;
                $total_w[$j] = 0;
//                echo $df[$i][$j]." ";
            }
//            echo "<br>";
        }

        // Menghitung jumlah TF
        for ($i=0; $i<count($word); $i++){
            for ($j=0; $j<count($word[$i]); $j++) {
                foreach ($keywords as $k => $item){
                    if ($item == $word[$i][$j]) {
                        $tf[$k][$i]++;
                        break;
                    }
                }
            }
        }

        //Debugging
//        for ($i=0; $i<count($tf); $i++){
//            for($j=0; $j<count($tf[$i]); $j++){
//                if ($tf[$i][$j] > 0) {
//                    echo $i." ".$tf[$i][$j] . " " . implode(" ",$word[$j]) . "<br>";
//                }
//            }
//        }

        // menghitung TF-IDF
        /* Rumus TF_IDF
         $i = keywords/kata penting
         $j = kata (D)
         $idf = log(total kata/$df)
         $w = $tf*$idf
         $total
         $w_normalisasi  = $w/akar dari $total_similarity
        */
        $df = array();
        $idf = array();
        $w = array();
        for ($i=0; $i<count($keywords); $i++){
            $df[$i] = array_sum($tf[$i]);
//            echo $df[$i]."<br>";
            if ($df[$i] == 0) $idf[$i] = 0;
            else {
                $ndf = (count($word)) / $df[$i];
                $idf[$i] = log($ndf, 10);
            }
            for ($j=0; $j<count($word); $j++) {
                $w[$i][$j] = $tf[$i][$j] * $idf[$i];
                $total_w[$j] = $total_w[$j] + $w[$i][$j];
                $total_similarity[$j] = $total_similarity[$j] + (pow($w[$i][$j],2));
            }
        }

        // Menghitung W Normalisasi
        $w_normalisasi = array();
        for ($i=0; $i<count($keywords); $i++) {
            for ($j=0; $j<count($w[$i]); $j++) {
                $w_normalisasi[$j][$i] = $w[$i][$j] == 0 ? 0 : $w[$i][$j]/(sqrt($total_similarity[$j]));
                $total_w_normalisasi[$j] = $total_w_normalisasi[$j] + (pow($w_normalisasi[$j][$i], 2));
            }
        }

        // menghitung panjang vektor (akar dari total_w_normalisasi)
        $total_panjang_vektor = array();
        for ($i=0; $i<count($total_w_normalisasi); $i++) {
            $total_panjang_vektor[$i] = sqrt($total_w_normalisasi[$i]);
        }

        // menghitung cos similarity
        $cos_similarity = array();
        for ($i=1; $i<count($word); $i++){
            if ($total_panjang_vektor[0] == 0 || $total_panjang_vektor[$i] == 0)
                $cos_similarity[$i-1] = 0;
            else
                $cos_similarity[$i-1] = $total_w[$i]/($total_panjang_vektor[0] * $total_panjang_vektor[$i]);
//            echo $cos_similarity[$i]."<br>";
        }

        // Mengurutkan dan mengambil 100 cos similarity teratas
        $rank_similarity = array();
        $nama_klasifikasi = array();
        $no_klasifikasi = array();
        $temp = $cos_similarity;
        $list_buku = array();
        $isGetClassification = true;
//        echo count($buku)."  ".count($cos_similarity)." ".count($word);
//        var_dump($keywords);
//        var_dump(array_search(max($cos_similarity), $cos_similarity));
//        var_dump($cos_similarity);
        for ($i=0; $i<100; $i++) {
            $rank_similarity[$i] = array_search(max($cos_similarity), $cos_similarity);
//                echo $rank_similarity[$i]."<br>";
//                echo $cos_similarity[$rank_similarity[$i]]."<br>";
            if ($cos_similarity[$rank_similarity[$i]] == 0) {
                if ($i == 0) $isGetClassification = false;
                break;
            }
            $cos_similarity[$rank_similarity[$i]] = -1;
            $list_buku[$i] = $buku[$rank_similarity[$i]];
            $nama_klasifikasi[$i] = $buku[$rank_similarity[$i]]->nama_klasifikasi;
            $no_klasifikasi[$i] = $buku[$rank_similarity[$i]]->no_klas;
        }

        // mencari nama klasifikasi yang paling sering muncul
        if ($isGetClassification) {
            $index_klasifikasi = 0;
            $max_klasifikasi = 0;
            for ($i = 0; $i < count($nama_klasifikasi); $i++) {
                $count_klasifikasi = 0;
                for ($j = 0; $j < count($nama_klasifikasi); $j++) {
                    if ($nama_klasifikasi[$i] == $nama_klasifikasi[$j]) $count_klasifikasi++;
                }
                if ($count_klasifikasi > $max_klasifikasi) {
                    $max_klasifikasi = $count_klasifikasi;
                    $index_klasifikasi = $i;
                }
//            echo $count_klasifikasi." ".$index_klasifikasi."<br>";
            }
        }

        $hasil = array();
//        $hasil['knn'] = $isGetClassification ? "$nama_klasifikasi[$index_klasifikasi] ($no_klasifikasi[$index_klasifikasi])" : "Klasifikasi Tidak Ditemukan";
        $hasil['vsm'] = $isGetClassification ? $list_buku : array();

        return $hasil;
    }

    function save_keyword() {
        include "Stemming.php";
        $stemming = new Stemming();

        $buku = $this->Buku_model->get();
        $stopwords_id = json_decode(file_get_contents(site_url("assets/stopwords-id.json")));
        $stopwords_en = json_decode(file_get_contents(site_url("assets/en.json")));
        $word = array();
        for ($i=0; $i<count($buku); $i++) {
            $word[$i] = str_word_count(strtolower($buku[$i]->nama_buku), 1);
        }
        for ($i=0; $i<count($word); $i++) {
            for ($j=0; $j<count($word[$i]); $j++) {
                if (in_array($word[$i][$j], $stopwords_id) || in_array($word[$i][$j], $stopwords_en)) array_splice($word[$i], $j, 1);
            }
        }
        $k = 0;
        $keywords = array();
        for ($i=0; $i<count($word); $i++) {
            for ($j=0; $j<count($word[$i]); $j++) {
                $word[$i][$j] = $stemming->hapuspartikel($word[$i][$j]);
                $word[$i][$j] = $stemming->hapuspp($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusawalan1($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusawalan2($word[$i][$j]);
                $word[$i][$j] = $stemming->hapusakhiran($word[$i][$j]);
                if (strlen($word[$i][$j]) > 2 && !in_array($word[$i][$j], $keywords)) {
                    $keywords[$k] = $word[$i][$j];
                    $k++;
                }
            }
        }
        $data_keywords = array();
        foreach ($keywords as $i => $item) {
            array_push($data_keywords, array('kata_kunci' => $item));
        }
        $this->Keyword_model->insert_multiple($data_keywords);
    }

    function getKlasifikasi(){
        $no_kategori = $this->input->GET('no_kategori', TRUE);
        $no_klasifikasi = (explode("-",explode(" ", $this->input->GET('no_klasifikasi', TRUE)).get(0)));
        $list_klasifikasi = $this->Klasifikasi_model->getByRangeNoKlasifikasi($no_klasifikasi[0], $no_klasifikasi[1]);

        $result = "";
        foreach ($list_klasifikasi as $klasifikasi) {
            $result .= "<option value='$klasifikasi->no_klasifikasi'>$klasifikasi->no_klasifikasi</option>";
        }
        echo $result;
    }

    function getNamaKlasifikasi(){
	    $no_klasifikasi = $this->input->GET('no_klas', TRUE);
        $klasifikasi = $this->Klasifikasi_model->getbynoklas($no_klasifikasi);
        echo $klasifikasi->nama_klas;
    }

    function addBuku(){
	    $data_kategori = explode(" - ", $this->input->post('kategori'));
        $nama_buku = $this->input->post('nama_buku');
        $penerbit = $this->input->post('penerbit');
        $pengarang = $this->input->post('pengarang');
        $no_kategori = $data_kategori[0];
        $kategori = $data_kategori[1];
        $no_klas = $this->input->post('no_klas');
        $nama_klasifikasi = $this->input->post('nama_klasifikasi');
        $sinopsis = $this->input->post('sinopsis');

        $data = array(
          'nama_buku' => $nama_buku,
          'penerbit' => $penerbit,
          'pengarang' => $pengarang,
          'no_kategori' => $no_kategori,
          'kategori' => $kategori,
          'no_klas' => $no_klas,
          'nama_klasifikasi' => $nama_klasifikasi,
          'sinopsis' => $sinopsis
        );

        $this->Buku_model->simpan($data);
        $this->index();
    }

    function updateBuku($id_buku){
        $nama_buku = $this->input->post('nama_buku');
        $penerbit = $this->input->post('penerbit');
        $pengarang = $this->input->post('pengarang');
        $no_kategori = $this->input->post('kategori');
        $no_klas = $this->input->post('no_klas');
        $nama_klasifikasi = $this->input->post('nama_klasifikasi');
        $sinopsis = $this->input->post('sinopsis');
//        $keyword = $this->input->post('keyword');
//
//        $this->Keyword_model->insert(array('kata_kunci' => $keyword));

        $kategori = $this->Kategori_model->getbyno($no_kategori);

        $data = array(
          'nama_buku' => $nama_buku,
          'penerbit' => $penerbit,
          'pengarang' => $pengarang,
          'no_kategori' => $no_kategori,
          'kategori' => $kategori->nama_kategori,
          'no_klas' => $no_klas,
          'nama_klasifikasi' => $nama_klasifikasi,
          'sinopsis' => $sinopsis
        );

        $this->Buku_model->update($id_buku, $data);
        $this->index();
    }

    public function delete()
    {
        $this->Buku_model->delete($this->uri->segment('3'));

        echo "<script>alert('Data berhasil dihapus'); window.location='../';</script>";
    }
}