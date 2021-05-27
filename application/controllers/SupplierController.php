<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Master_Service.php';

class SupplierController extends Zend_Controller_Action
{

	public function init()
	{
		$registry = Zend_Registry::getInstance();
		$this->auth = Zend_Auth::getInstance();
		$this->Home_Service = Home_Service::getInstance();
		$this->Master_Service = Master_Service::getInstance();
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

		$this->_helper->layout->setLayout('supplier-layout');

		$this->view->Master_Service = $this->Master_Service;

		$this->view->data = $this->Master_Service->getlistsupplier();
		$this->view->menu = $this->Master_Service->getmenusupplier();
	}

	public function dataxlsAction()
	{
		$this->_helper->layout->setLayout('target-column');
		$proses = 'xls';
		$sessionlogin = new Zend_Session_Namespace('sessionlogin');
		$this->view->permission = $sessionlogin->permission;

		$this->view->data = $this->Master_Service->getlistsupplier();
		$this->view->menu = $this->Master_Service->getmenusupplier();

		$this->render('dataxls');
	}

	public function tambahdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->seq = $this->Master_Service->getNoSeq();
	}

	public function kirimdataAction()
	{

		$this->_helper->layout->setLayout('supplier-layout');

		$kode_supplier 	 = $_POST['kode_supplier'];
		$nama_supplier 	 = $_POST['nama_supplier'];
		$alamat_supplier = $_POST['alamat_supplier'];
		$no_tlp 		 = $_POST['no_tlp'];
		$no_hp 			 = $_POST['no_hp'];
		$email 			 = $_POST['email'];
		$tipe 			 = $_POST['tipe'];
		$status 		 = $_POST['status'];

		$data = array(
			'kode_supplier' => $kode_supplier,
			'nama_supplier' => $nama_supplier,
			'alamat_supplier' => $alamat_supplier,
			'no_tlp' => $no_tlp,
			'no_hp' => $no_hp,
			'email' => $email,
			'tipe' => $tipe,
			'status' => $status
		);

		$insert = $this->view->datainsert = $this->Master_Service->insertdata($data);
		if ($insert) {
			echo "berhasil";
		} else {
			echo "gagal";
		}
	}

	public function hapusdataAction()
	{
		$kode_supplier = '';

		if (isset($_REQUEST['kode_supplier'])) {
			$kode_supplier = $_REQUEST['kode_supplier'];
		}

		$dataInput = array('kode_supplier' => $kode_supplier);
		$hasil = $this->Master_Service->hapusData($dataInput);

		if ($hasil == 'sukses') {
			$this->view->pesan = 'Data Berhasil Dihapus';
		}
		/* $this->indexAction();
		$this->render('index'); */
	}

	public function editdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$kode_supplier_data   = $_GET['id'];
		$this->view->kode_supplier_data = $kode_supplier_data;

		$this->view->data = $this->Master_Service->getDataSupplier($kode_supplier_data);
	}

	public function kirimdataeditAction()
	{

		$this->_helper->layout->setLayout('supplier-layout');

		$kode_supplier 	 = $_POST['kode_supplier'];
		$nama_supplier 	 = $_POST['nama_supplier'];
		$alamat_supplier = $_POST['alamat_supplier'];
		$no_tlp 		 = $_POST['no_tlp'];
		$no_hp 			 = $_POST['no_hp'];
		$email 			 = $_POST['email'];
		$tipe 			 = $_POST['tipe'];
		$status 		 = $_POST['status'];

		$data = array(
			'kode_supplier' => $kode_supplier,
			'nama_supplier' => $nama_supplier,
			'alamat_supplier' => $alamat_supplier,
			'no_tlp' => $no_tlp,
			'no_hp' => $no_hp,
			'email' => $email,
			'tipe' => $tipe,
			'status' => $status
		);

		$this->view->datainsert = $this->Master_Service->editdata($data);
	}
	public function detaildataAction()
	{
		$this->_helper->layout->setLayout('target-column');


		$kode_suplier = '';
		if (isset($_REQUEST['kode_supplier'])) {
			$kode_suplier = $_REQUEST['kode_supplier'];
		}
		//$this->view->data=$this->Customer_Service->getDataLiquid($kode_customer);
		//$//this->view->data=$this->Customer_Service->getDataLiquid($kode_customer);
		//$this->view->menu = $this->Master_Service->getmenu();

		$this->view->Master_Service = $this->Master_Service;
		$this->view->data = $this->Master_Service->getlistOrderCentral($kode_suplier);
		$this->view->payment = $this->Master_Service->getDataPayment($kode_suplier);;
		$this->view->nama_supplier = $this->Master_Service->getDataNamaSupplier($kode_suplier);
		$this->view->rek = $this->Master_Service->getRekening();
		$this->view->cash = $this->Master_Service->getCash();
	}

	public function bayarAction()
	{
		$no_order = '';
		$tgl_pembayaran = '';
		$sisa_bayar = '';
		$jml_bayar = '';
		$akun = '';
		$akun_rek = '';
		$catatan = '';
		$akun_cash = '';
		$akun = '';
		$metode_bayar = '';
		$pembayaran = '';

		if (isset($_REQUEST['no_order'])) {
			$no_order = $_REQUEST['no_order'];
		}
		if (isset($_REQUEST['tgl_pembayaran'])) {
			$tgl_pembayaran = $_REQUEST['tgl_pembayaran'];
		}
		if (isset($_REQUEST['sisa_bayar'])) {
			$sisa_bayar = $_REQUEST['sisa_bayar'];
		}
		if (isset($_REQUEST['jml_bayar'])) {
			$jml_bayar = $_REQUEST['jml_bayar'];
		}
		if (isset($_REQUEST['akun'])) {
			$akun = $_REQUEST['akun'];
		}
		if (isset($_REQUEST['catatan'])) {
			$catatan = $_REQUEST['catatan'];
		}

		if (isset($_REQUEST['akun_cash'])) {
			$akun_cash = $_REQUEST['akun_cash'];
		}
		if (isset($_REQUEST['akun_rek'])) {
			$akun_rek = $_REQUEST['akun_rek'];
		}
		if (isset($_REQUEST['metode_bayar'])) {
			$metode_bayar = $_REQUEST['metode_bayar'];
		}
		if (isset($_REQUEST['pembayaran'])) {
			$pembayaran = $_REQUEST['pembayaran'];
		}

		if (($akun_rek == '0') || ($akun_rek == '')) {
			$akun = $akun_cash;
		} else {
			$akun = $akun_rek;
		}



		$hasil = $this->Master_Service->bayar($no_order, $tgl_pembayaran, $sisa_bayar, $jml_bayar, $catatan, $akun, $metode_bayar, $pembayaran);

		if ($hasil == 'sukses') {

			$this->view->pesan = 'Data Berhasil disimpan';
		}
		/* $this->indexAction();
	$this->render('index'); */
	}
}
