<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Customer_Service.php';

class CustomerController extends Zend_Controller_Action {

    public function init() {
        $registry = Zend_Registry::getInstance();
        $this->auth = Zend_Auth::getInstance();
        $this->Home_Service = Home_Service::getInstance();
		$this->Customer_Service = Customer_Service::getInstance();
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
		
        $this->_helper->layout->setLayout('customer-layout');
		$this->view->data = $this->Customer_Service->getlistcustomer();
		$this->view->menu = $this->Customer_Service->getmenu();
		$this->view->permission = $sessionlogin->permission;
    }
	
	public function tambahdataAction() {
        $this->_helper->layout->setLayout('target-column');
		
		$this->view->seq=$this->Customer_Service->getNoSeq();
		
		 
    }
	
	public function kirimdataAction() { 
	
		$this->_helper->layout->setLayout('customer-layout');
		
		$kode_customer 	 = $_POST['kode_customer'];
		$nama_customer 	 = $_POST['nama_customer'];
		$alamat_customer = $_POST['alamat_customer'];
		$no_tlp 		 = $_POST['no_tlp'];
		$no_hp 			 = $_POST['no_hp'];
		$email 			 = $_POST['email'];
		$status 		 = $_POST['status'];
		
		$data = array('kode_customer' => $kode_customer,
					  'nama_customer' => $nama_customer,
					  'alamat_customer' => $alamat_customer,
					  'no_tlp' => $no_tlp,
					  'no_hp' => $no_hp,
					  'email' => $email,
					  'status' => $status); 
		
		$this->view->datainsert=$this->Customer_Service->insertdata($data);
		$this->view->permission = $sessionlogin->permission;
   }
   
   public function hapusdataAction(){
		$kode_customer = '';
		
		if(isset($_REQUEST['kode_customer'])){ $kode_customer = $_REQUEST['kode_customer'];}
		
		$dataInput = array('kode_customer' => $kode_customer);
		$hasil = $this->Customer_Service->hapusData($dataInput);

		if ($hasil == 'sukses') {
			$this->view->pesan = 'Data Berhasil Dihapus';
		}
		/* $this->indexAction();
		$this->render('index'); */
		$this->view->permission = $sessionlogin->permission;
	}
	
	public function editdataAction() {
        $this->_helper->layout->setLayout('target-column');
		
		$kode_customer_data   = $_GET['id'];
		$this->view->kode_customer_data = $kode_customer_data;
		
		$this->view->data=$this->Customer_Service->getDataCustomer($kode_customer_data);
		
    }
	
	public function kirimdataeditAction() { 
	
		$this->_helper->layout->setLayout('customer-layout');
		
		$kode_customer 	 = $_POST['kode_customer'];
		$nama_customer 	 = $_POST['nama_customer'];
		$alamat_customer = $_POST['alamat_customer'];
		$no_tlp 		 = $_POST['no_tlp'];
		$no_hp 			 = $_POST['no_hp'];
		$email 			 = $_POST['email'];
		$status 		 = $_POST['status'];
		
		$data = array('kode_customer' => $kode_customer,
					  'nama_customer' => $nama_customer,
					  'alamat_customer' => $alamat_customer,
					  'no_tlp' => $no_tlp,
					  'no_hp' => $no_hp,
					  'email' => $email,
					  'status' => $status); 
		
		$this->view->datainsert=$this->Customer_Service->editdata($data);
   }

   public function detaildataAction() {
	$this->_helper->layout->setLayout('target-column');
 
	
	//$kode_customer= '';
	if(isset($_REQUEST['kode_customer'])){ $kode_customer = $_REQUEST['kode_customer'];}
	//$this->view->data=$this->Customer_Service->getDataLiquid($kode_customer);
	//$//this->view->data=$this->Customer_Service->getDataLiquid($kode_customer);
	$this->view->menu = $this->Customer_Service ->getmenu();

	$this->view->Customer_Service = $this->Customer_Service;
	$this->view->data=$this->Customer_Service->getlistSaleCentral($kode_customer);
	$this->view->payment=$this->Customer_Service->getDataPayment($kode_customer);
	$this->view->nama_customer=$this->Customer_Service->getDataNamaCustomer($kode_customer);
	$this->view->rek=$this->Customer_Service->getRekening();
	$this->view->cash=$this->Customer_Service->getCash();


}
public function bayarAction(){
	$no_invoice = '';
	$tgl_invoice = '';
	$sisa_bayar = '';
	$jml_bayar = '';
	$akun_rek='';
	$catatan='';
	$akun_cash='';
	$akun='';
	$metode_bayar='';
	
	if(isset($_REQUEST['no_invoice'])){ $no_invoice = $_REQUEST['no_invoice'];}
	if(isset($_REQUEST['tgl_invoice'])){ $tgl_invoice = $_REQUEST['tgl_invoice'];}
	if(isset($_REQUEST['sisa_bayar'])){ $sisa_bayar = $_REQUEST['sisa_bayar'];}
	if(isset($_REQUEST['jml_bayar'])){ $jml_bayar = $_REQUEST['jml_bayar'];}
	if(isset($_REQUEST['catatan'])){ $catatan = $_REQUEST['catatan'];}
	if(isset($_REQUEST['akun_cash'])){ $akun_cash = $_REQUEST['akun_cash'];}
	if(isset($_REQUEST['akun_rek'])){ $akun_rek = $_REQUEST['akun_rek'];}
	if(isset($_REQUEST['metode_bayar'])){ $metode_bayar = $_REQUEST['metode_bayar'];}
	
	if (($akun_rek=='0') || ($akun_rek=='')){
		$akun=$akun_cash;


	}else{
		$akun=$akun_rek;

	}


	$hasil = $this->Customer_Service->bayar($no_invoice,$tgl_invoice,$sisa_bayar,$jml_bayar,$catatan,$akun,$metode_bayar);

	if ($hasil == 'sukses') {
		$this->view->pesan = 'Data Berhasil Dihapus';
	}
	/* $this->indexAction();
	$this->render('index'); */
}

}
