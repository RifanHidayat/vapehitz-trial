<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Jenisexpense_Service.php';

class JenisexpenseController extends Zend_Controller_Action {

    public function init() {
        $registry = Zend_Registry::getInstance();
        $this->auth = Zend_Auth::getInstance();
        $this->Home_Service = Home_Service::getInstance();
		$this->Jenisexpense_Service = Jenisexpense_Service::getInstance();
	$sessionlogin = new Zend_Session_Namespace('sessionlogin');
	$sessionlogin->setExpirationSeconds(9000) ;	
	$this->view->email = $sessionlogin->email;
	$this->view->nama = $sessionlogin->nama;
	$this->view->active = $sessionlogin->active;
	$this->view->permission = $sessionlogin->permission;
	}

    public function indexAction() {
		$sessionlogin = new Zend_Session_Namespace('sessionlogin');
		$this->view->permission = $sessionlogin->permission;
		
        $this->_helper->layout->setLayout('jenisexpense-layout');
		
		$this->view->jenisexpense_Service = $this->jenisexpense_Service;
		
		$this->view->data = $this->Jenisexpense_Service->getlistliquid();
		$this->view->menu = $this->Jenisexpense_Service->getmenu();
    }
	
	public function kirimdataAction() { 
		$this->_helper->layout->setLayout('jenisexpense-layout');
		
		
		$keterangan	 = '';
		$status		 = '';
		$action		 = '';
		$id 		 = '';
		
		if(isset($_POST['id'])){ $id = $_POST['id'];}
		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
		if(isset($_POST['status'])){ $status = $_POST['status'];}
		if(isset($_POST['action'])){ $action = $_POST['action'];}
		
		$no_warna = str_replace(".", "", $no_warna);
		
		$data = array('id' => $id,
					   'keterangan' => $keterangan,
					  'status' => $status); 
		if($action == 'tambah'){
			$this->view->datainsert=$this->Jenisexpense_Service->insertdata($data);
		} else {
			$this->view->datainsert=$this->Jenisexpense_Service->editdata($data);
		}
			
   }
   
   public function hapusdataAction(){
		$id = '';
		
		if(isset($_REQUEST['id'])){ $id = $_REQUEST['id'];}
		
		$dataInput = array('id' => $id);
		$hasil = $this->Jenisexpense_Service->hapusData($dataInput);

		if ($hasil == 'sukses') {
			$this->view->pesan = 'Data Berhasil Dihapus';
		}
		/* $this->indexAction();
		$this->render('index'); */
	}
	
	public function editdataAction() {
		$this->_helper->layout->setLayout('target-column');
		
        $id = '';
		if(isset($_REQUEST['id'])){ $id = $_REQUEST['id'];}
		
		$this->view->data=$this->Jenisexpense_Service->getDataLiquid($id);
		
		$this->view->Jenisexpense_Service = $this->Jenisexpense_Service;
    }
	
	public function kirimdataeditAction() { 
	
		$this->_helper->layout->setLayout('jenisexpense-layout');
		
		$kode_supplier 	 = '';
		$no_warna	 = '';
		$kode_warna 	 		 = '';
		$merk_barang 	 = '';
		$nama_barang 	 = '';
		$kode_warna	 	 = '';
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
		
		if(isset($_POST['kode_supplier2'])){ $kode_supplier = $_POST['kode_supplier2'];}
		if(isset($_POST['no_warna'])){ $no_warna = $_POST['no_warna'];}
		if(isset($_POST['kode_warna'])){ $kode_warna = $_POST['kode_warna'];}
		if(isset($_POST['merk_barang'])){ $merk_barang = $_POST['merk_barang'];}
		if(isset($_POST['nama_barang'])){ $nama_barang = $_POST['nama_barang'];}
		if(isset($_POST['kode_warna'])){ $kode_warna = $_POST['kode_warna'];}
		if(isset($_POST['nic'])){ $nic = $_POST['nic'];}
		if(isset($_POST['berat'])){ $berat = $_POST['berat'];}
		if(isset($_POST['stok_pusat'])){ $stok_pusat = $_POST['stok_pusat'];}
		if(isset($_POST['stok_retail'])){ $stok_retail = $_POST['stok_retail'];}
		if(isset($_POST['stok_studio'])){ $stok_studio = $_POST['stok_studio'];}
		if(isset($_POST['bad_stock'])){ $bad_stock = $_POST['bad_stock'];}
		if(isset($_POST['harga_beli'])){ $harga_beli = $_POST['harga_beli'];}
		if(isset($_POST['hj_agen'])){ $hj_agen = $_POST['hj_agen'];}
		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
		if(isset($_POST['hj_whs'])){ $hj_whs = $_POST['hj_whs'];}
		if(isset($_POST['status'])){ $status = $_POST['status'];}
		
		$harga_beli = str_replace(".", "", $harga_beli);
		$hj_agen 	= str_replace(".", "", $hj_agen);
		$hj_retail 	= str_replace(".", "", $hj_retail);
		$hj_whs 	= str_replace(".", "", $hj_whs);
		
		$data = array('kode_supplier' => $kode_supplier,
					  'no_warna' => $no_warna,
					  'kode_warna' => $kode_warna,
					  'merk_barang' => $merk_barang,
					  'nama_barang' => $nama_barang,
					  'kode_warna' => $kode_warna,
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
					  'status' => $status); 
		
		$this->view->datainsert=$this->Warna_Service->editdata($data);
   }
 
}