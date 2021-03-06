<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Akun_Service.php';

class AkunController extends Zend_Controller_Action
{

	public function init()
	{
		$registry = Zend_Registry::getInstance();
		$this->auth = Zend_Auth::getInstance();
		$this->Home_Service = Home_Service::getInstance();
		$this->Akun_Service = Akun_Service::getInstance();
		$sessionlogin = new Zend_Session_Namespace('sessionlogin');
		$sessionlogin->setExpirationSeconds(9000);
		$this->view->email = $sessionlogin->email;
		$this->view->nama = $sessionlogin->nama;
		$this->view->active = $sessionlogin->active;
		$this->view->permission = $sessionlogin->permission;
	}

	public function indexAction()
	{
		$sessionlogin = new Zend_Session_Namespace('sessionlogin');
		$this->view->permission = $sessionlogin->permission;
		$this->_helper->layout->setLayout('Akun-layout');
		$this->view->Akun_Service = $this->Akun_Service;
		$this->view->data = $this->Akun_Service->getlistliquid();
		$this->view->menu = $this->Akun_Service->getmenu();
		$this->view->seq  = $this->Akun_Service->getNoSeq();
	}

	public function tambahdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Akun_Service = $this->Akun_Service;

		$this->view->supplier = $this->Akun_Service->getSupplier();
		$this->view->rasa = $this->Akun_Service->getRasa();
		$this->view->seq = $this->Akun_Service->getNoSeq();
	}

	public function kirimdataAction()
	{
		$this->_helper->layout->setLayout('akun-layout');

		$nama_akun 	 		 = '';
		$saldo_awal			 = '';
		$no_akun		 	 = '';
		$kode_cabang		 = '';
		$nama_cabang_pembuka = '';
		$type = '';
		$action		 		 = '';
		$id	 		 		 = '';

		if (isset($_POST['id'])) {
			$id = $_POST['id'];
		}
		if (isset($_POST['nama_akun'])) {
			$nama_akun = $_POST['nama_akun'];
		}
		if (isset($_POST['saldo_awal'])) {
			$saldo_awal = $_POST['saldo_awal'];
		}
		// if(isset($_POST['no_akun'])){ $no_akun = $_POST['no_akun'];}
		// if(isset($_POST['kode_cabang'])){ $kode_cabang = $_POST['kode_cabang'];}
		// if(isset($_POST['nama_cabang_pembuka'])){ $nama_cabang_pembuka = $_POST['nama_cabang_pembuka'];}
		if (isset($_POST['type'])) {
			$type = $_POST['type'];
		}
		if (isset($_POST['action'])) {
			$action = $_POST['action'];
		}
		$saldo_awal = str_replace(".", "", $saldo_awal);
		$data = array(
			'id' => $id,
			'nama_akun' => $nama_akun,
			'saldo_awal' => $saldo_awal,
			'no_akun' => "null",
			'kode_cabang' => "null",
			'type' => $type,
			'nama_cabang_pembuka' => "null"
		);
		if ($action == 'tambah') {
			$this->view->datainsert = $this->Akun_Service->insertdata($data);
		} else {
			$this->view->datainsert = $this->Akun_Service->editdata($data);
		}
	}

	public function hapusdataAction()
	{
		$id_volume = '';

		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
		}

		$dataInput = array('id' => $id);
		$hasil = $this->Akun_Service->hapusData($dataInput);

		if ($hasil == 'sukses') {
			$this->view->pesan = 'Data Berhasil Dihapus';
		}
		/* $this->indexAction();
		$this->render('index'); */
	}

	public function editdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$id = '';
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
		}

		$this->view->data = $this->Akun_Service->getDataEdit($id);

		$this->view->Akun_Service = $this->Akun_Service;
	}

	public function kirimdataeditAction()
	{

		$this->_helper->layout->setLayout('akun-layout');

		$kode_supplier 	 = '';
		$volume		     = '';
		$id_volume 	 = '';
		$merk_barang 	 = '';
		$nama_barang 	 = '';
		$kode_rasa	 	 = '';
		$nic		 	 = '';
		$berat 	  		 = '';
		$stok_pusat  	 = '';
		$stok_retail 	 = '';
		$stok_studio 	 = '';
		$bad_stock    	 = '';
		$harga_beli  	 = '';
		$hj_agen 	  	 = '';
		$hj_retail 	  	 = '';
		$hj_whs 		 = '';
		$status 		 = '';

		if (isset($_POST['kode_supplier2'])) {
			$kode_supplier = $_POST['kode_supplier2'];
		}
		if (isset($_POST['volume'])) {
			$volume = $_POST['volume'];
		}
		if (isset($_POST['id_volume'])) {
			$id_volume = $_POST['id_volume'];
		}
		if (isset($_POST['merk_barang'])) {
			$merk_barang = $_POST['merk_barang'];
		}
		if (isset($_POST['nama_barang'])) {
			$nama_barang = $_POST['nama_barang'];
		}
		if (isset($_POST['kode_rasa'])) {
			$kode_rasa = $_POST['kode_rasa'];
		}
		if (isset($_POST['nic'])) {
			$nic = $_POST['nic'];
		}
		if (isset($_POST['berat'])) {
			$berat = $_POST['berat'];
		}
		if (isset($_POST['stok_pusat'])) {
			$stok_pusat = $_POST['stok_pusat'];
		}
		if (isset($_POST['stok_retail'])) {
			$stok_retail = $_POST['stok_retail'];
		}
		if (isset($_POST['stok_studio'])) {
			$stok_studio = $_POST['stok_studio'];
		}
		if (isset($_POST['bad_stock'])) {
			$bad_stock = $_POST['bad_stock'];
		}
		if (isset($_POST['harga_beli'])) {
			$harga_beli = $_POST['harga_beli'];
		}
		if (isset($_POST['hj_agen'])) {
			$hj_agen = $_POST['hj_agen'];
		}
		if (isset($_POST['hj_retail'])) {
			$hj_retail = $_POST['hj_retail'];
		}
		if (isset($_POST['hj_whs'])) {
			$hj_whs = $_POST['hj_whs'];
		}
		if (isset($_POST['status'])) {
			$status = $_POST['status'];
		}


		$harga_beli = str_replace(".", "", $harga_beli);
		$hj_agen 	= str_replace(".", "", $hj_agen);
		$hj_retail 	= str_replace(".", "", $hj_retail);
		$hj_whs 	= str_replace(".", "", $hj_whs);



		$data = array(
			'kode_supplier' => $kode_supplier,
			'volume' => $volume,
			'id_volume' => $id_volume,
			'merk_barang' => $merk_barang,
			'nama_barang' => $nama_barang,
			'kode_rasa' => $kode_rasa,
			'nic' => $nic,
			'berat' => $berat,
			'stok_pusat' => $stok_pusat,
			'stok_retail' => $stok_retail,
			'stok_studio' => $stok_studio,
			'bad_stock' => $bad_stock,
			'harga_beli' => $harga_beli,
			'hj_agen' => $hj_agen,
			'hj_retail' => $hj_retail,
			'hj_whs' => $hj_whs,
			'status' => $status
		);

		$this->view->datainsert = $this->Akun_Service->editdata($data);
	}

	public function cekseqAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$id_id_volume = '';
		if (isset($_REQUEST['id_id_volume'])) {
			$id_id_volume = $_REQUEST['id_id_volume'];
		}

		$this->view->id_id_volume = $this->Akun_Service->getSeq($id_id_volume);
	}

	public function detaildataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$id = '';
		if (isset($_REQUEST['id'])) {
			$id = $_REQUEST['id'];
		}

		$this->view->data = $this->Akun_Service->getDataLiquid($id);
		$this->view->transaksi = $this->Akun_Service->getDataTransaksi($id);
		$this->view->jenis_expense = $this->Akun_Service->getlistjenisexpense();
		$this->view->akun = $this->Akun_Service->getlistakun();
		$this->view->Akun_Service = $this->Akun_Service;
		$this->view->data_nama = $this->Akun_Service->getDaataNamaAkun($id);
	}

	public function getbalanceAction()
	{
		// $this->_helper->layout->setLayout('target-column');

		// $id = '';
		// if (isset($_REQUEST['id'])) {
		// 	$id = $_REQUEST['id'];
		// }

		// $$transaksi = $this->Akun_Service->getDataTransaksi($id);
		$result['hasil'] = "rifan";
		echo json_encode($result);
	}
}
