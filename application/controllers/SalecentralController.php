 
 <?php
// require_once 'Zend/Controller/Action.php';
// require_once 'service/Home_Service.php';
// require_once 'service/Salecentral_Service.php';

// class SalecentralController extends Zend_Controller_Action {

//     public function init() {
//         $registry = Zend_Registry::getInstance();
//         $this->auth = Zend_Auth::getInstance();
//         $this->Home_Service = Home_Service::getInstance();
// 		$this->Salecentral_Service = Salecentral_Service::getInstance();
// 	$sessionlogin = new Zend_Session_Namespace('sessionlogin');
// 	$sessionlogin->setExpirationSeconds(9000) ;	
// 	$this->view->email = $sessionlogin->email;
// 	$this->view->nama = $sessionlogin->nama;
// 	$this->view->active = $sessionlogin->active;
// 	$this->view->permission = $sessionlogin->permission;
// 	}

//     public function indexAction() {
// 		$sessionlogin = new Zend_Session_Namespace('sessionlogin');
// 		$this->view->permission = $sessionlogin->permission;
		
//         $this->_helper->layout->setLayout('salecentral-layout');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data = $this->Salecentral_Service->getlistSaleCentral();
// 		$this->view->menu = $this->Salecentral_Service->getmenu();
//     }
	
// 	public function cekdatauserAction(){
// 		$this->_helper->layout->setLayout('target-column');
		
// 		$user_id = '';
// 		$password = '';
		
// 		if(isset($_REQUEST['user_id'])){ $user_id = $_REQUEST['user_id'];}
// 		if(isset($_REQUEST['password'])){ $password = $_REQUEST['password'];}
		
// 		$password=md5($password);
		
// 		$this->view->user = $this->Salecentral_Service->getDataUser($user_id,$password);
// 	}
	
// 	public function tambahdataAction() {
//         $this->_helper->layout->setLayout('target-column');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->customer=$this->Salecentral_Service->getCustomer();
// 		$this->view->warna=$this->Salecentral_Service->getWarna();
// 		$now = date('dmy');
// 		$kode_inv = $now;
// 		$this->view->seq=$this->Salecentral_Service->getNoSeq2($kode_inv);
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	
// 	public function dataatomizerAction(){
// 		$this->_helper->layout->setLayout('target-column');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data = $this->Salecentral_Service->getlistatomizer();
//     }
	
// 	public function dataaksesorisAction(){
// 		$this->_helper->layout->setLayout('target-column');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data = $this->Salecentral_Service->getlistaccessories();
//     }
	
// 	public function datadeviceAction(){
// 		$this->_helper->layout->setLayout('target-column');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data = $this->Salecentral_Service->getlistdevice();
//     }
	
// 	public function dataliquidAction(){
// 		$this->_helper->layout->setLayout('target-column');
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data = $this->Salecentral_Service->getlistliquid();
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	
// 	public function kirimdataAction() { 
// 		$this->_helper->layout->setLayout('salecentral-layout');
		
// 		$no_invoice 	 	= '';
// 		$tgl_invoice	 	= '';
// 		$kode_customer   	= '';
// 		$shipment		 	= '';
// 		$nama_kurir		 	= '';
// 		$total_berat	 	= '';
// 		$total_biaya	 	= '';
// 		$diskon		 	 	= '';
// 		$biaya_kirim 	 	= '';
// 		$net_total	 	 	= '';
// 		$metode_penerimaan	= '';
// 		$jml_penerimaan 	= '';
// 		$metode_penerimaan2	= '';
// 		$jml_penerimaan2 	= '';
// 		$jml_bayar		 	= '';
// 		$sisa_bayar		 	= '';
// 		$nama_penerima	 	= '';
// 		$alamat_penerima 	= '';
// 		$keterangan		 	= '';
// 		$seq		 	 	= ''; 
// 		$termin_hutang		= ''; 
// 		$kode_inv 		 	= date('dmy');
		
// 		$kode_barang	 	= '';
// 		$hj_retail		 	= '';
// 		$qty			 	= '';
// 		$free			 	= '';
// 		$sub_total_berat 	= '';
		
// 		$sub_total_barang = '';
// 		$sub_total		 	= '';
// 		$biaya_lain		 	= '';
// 		$ket_biaya_lain		 	= '';
// 		$deposit		 	= '';
// 		$jenis_diskon		 	= '';
			
// 		$nama_tabel 	 	= '';
// 		$on_hand 		 	= '';
// 		$hj_retail_baru  	= '';
// 		$kode 				= '';
		
// 		if(isset($_POST['no_invoice'])){ $no_invoice = $_POST['no_invoice'];}
// 		if(isset($_POST['tgl_invoice'])){ $tgl_invoice = $_POST['tgl_invoice'];}
// 		if(isset($_POST['kode_customer2'])){ $kode_customer = $_POST['kode_customer2'];}
// 		if(isset($_POST['shipment'])){ $shipment = $_POST['shipment'];}
// 		if(isset($_POST['nama_kurir'])){ $nama_kurir = $_POST['nama_kurir'];}
// 		if(isset($_POST['total_berat'])){ $total_berat = $_POST['total_berat'];}
// 		if(isset($_POST['total_biaya'])){ $total_biaya = $_POST['total_biaya'];}
// 		if(isset($_POST['diskon'])){ $diskon = $_POST['diskon'];}
// 		if(isset($_POST['biaya_kirim'])){ $biaya_kirim = $_POST['biaya_kirim'];}
// 		if(isset($_POST['net_total'])){ $net_total = $_POST['net_total'];}
// 		if(isset($_POST['metode_penerimaan'])){ $metode_penerimaan = $_POST['metode_penerimaan'];}
// 		if(isset($_POST['jml_penerimaan'])){ $jml_penerimaan = $_POST['jml_penerimaan'];}
// 		if(isset($_POST['metode_penerimaan2'])){ $metode_penerimaan2 = $_POST['metode_penerimaan2'];}
// 		if(isset($_POST['jml_penerimaan2'])){ $jml_penerimaan2 = $_POST['jml_penerimaan2'];}
// 		if(isset($_POST['jml_bayar'])){ $jml_bayar = $_POST['jml_bayar'];}
// 		if(isset($_POST['sisa_bayar'])){ $sisa_bayar = $_POST['sisa_bayar'];}
// 		if(isset($_POST['nama_penerima'])){ $nama_penerima = $_POST['nama_penerima'];}
// 		if(isset($_POST['alamat_penerima'])){ $alamat_penerima = $_POST['alamat_penerima'];}
// 		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
// 		if(isset($_POST['seq'])){ $seq = $_POST['seq'];}
// 		if(isset($_POST['termin_hutang'])){ $termin_hutang = $_POST['termin_hutang'];}
		
// 		if(isset($_POST['kode_barang'])){ $kode_barang = $_POST['kode_barang'];}
// 		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
// 		if(isset($_POST['qty'])){ $qty = $_POST['qty'];}
// 		if(isset($_POST['free'])){ $free = $_POST['free'];}
// 		if(isset($_POST['sub_total_berat'])){ $sub_total_berat = $_POST['sub_total_berat'];}
		
// 		if(isset($_POST['sub_total_barang'])){ $sub_total_barang = $_POST['sub_total_barang'];}
// 		if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
// 		if(isset($_POST['jenis_diskon'])){ $jenis_diskon = $_POST['jenis_diskon'];}
// 		if(isset($_POST['biaya_lain'])){ $biaya_lain = $_POST['biaya_lain'];}
// 		if(isset($_POST['ket_biaya_lain'])){ $ket_biaya_lain = $_POST['ket_biaya_lain'];}
// 		if(isset($_POST['deposit'])){ $deposit = $_POST['deposit'];}
		
// 		if(isset($_POST['nama_tabel'])){ $nama_tabel = $_POST['nama_tabel'];}
// 		if(isset($_POST['on_hand'])){ $on_hand = $_POST['on_hand'];}
// 		if(isset($_POST['hj_retail_baru'])){ $hj_retail_baru = $_POST['hj_retail_baru'];}
// 		if(isset($_POST['kode'])){ $kode = $_POST['kode'];}
		
// 		$tgl_invoice = str_replace('/', '-', $tgl_invoice);
// 		$tgl_invoice = date("Y-m-d H:i", strtotime($tgl_invoice));
		
// 		$total_berat= str_replace(".", "", $total_berat);
// 		$total_biaya= str_replace(".", "", $total_biaya);
// 		$biaya_kirim= str_replace(".", "", $biaya_kirim);
// 		$diskon= str_replace(".", "", $diskon);
// 		$net_total= str_replace(".", "", $net_total);
// 		$jml_penerimaan= str_replace(".", "", $jml_penerimaan);
// 		$jml_penerimaan2= str_replace(".", "", $jml_penerimaan2);
// 		$jml_bayar= str_replace(".", "", $jml_bayar);
// 		$sisa_bayar= str_replace(".", "", $sisa_bayar);
// 		$hj_retail= str_replace(".", "", $hj_retail);
// 		$qty= str_replace(".", "", $qty);
// 		$free= str_replace(".", "", $free);
// 		$sub_total= str_replace(".", "", $sub_total);
// 		$biaya_lain= str_replace(".", "", $biaya_lain);
// 		$deposit= str_replace(".", "", $deposit);
// 		$sub_total_berat= str_replace(".", "", $sub_total_berat);
// 		$on_hand= str_replace(".", "", $on_hand);
		
// 		$data = array('no_invoice' => $no_invoice,
// 					  'tgl_invoice' => $tgl_invoice,
// 					  'kode_customer' => $kode_customer,
// 					  'shipment' => $shipment,
// 					  'nama_kurir' => $nama_kurir,
// 					  'total_berat' => $total_berat,
// 					  'total_biaya' => $total_biaya,
// 					  'diskon' => $diskon,
// 					  'biaya_kirim' => $biaya_kirim,
// 					  'net_total' => $net_total,
// 					  'metode_penerimaan' => $metode_penerimaan,
// 					  'jml_penerimaan' => $jml_penerimaan,
// 					  'metode_penerimaan2' => $metode_penerimaan2,
// 					  'jml_penerimaan2' => $jml_penerimaan2,
// 					  'jml_bayar' => $jml_bayar,
// 					  'sisa_bayar' => $sisa_bayar,
// 					  'nama_penerima' => $nama_penerima,
// 					  'alamat_penerima' => $alamat_penerima,
// 					  'keterangan' => $keterangan,
// 					  'seq' => $seq,
// 					  'termin_hutang' => $termin_hutang,
// 					  'kode_inv' => $kode_inv,
// 					  'kode_barang' => $kode_barang,
// 					  'hj_retail' => $hj_retail,
// 					  'qty' => $qty,
// 					  'free' => $free,
// 					  'sub_total_barang' => $sub_total_barang,
// 					  'sub_total' => $sub_total,
// 					  'biaya_lain' => $biaya_lain,
// 					  'ket_biaya_lain' => $ket_biaya_lain,
// 					  'deposit' => $deposit,
// 					  'jenis_diskon' => $jenis_diskon,
// 					  'sub_total_berat' => $sub_total_berat,
// 					  'nama_tabel' => $nama_tabel,
// 					  'on_hand' => $on_hand,
// 					  'hj_retail_baru' => $hj_retail_baru,
// 					  'kode' => $kode);
// 		//var_dump($data);
// 		$this->view->datainsert=$this->Salecentral_Service->insertdata($data);
//    }
   
//    public function hapusdataAction(){
// 		$no_invoice = '';
		
// 		if(isset($_REQUEST['no_invoice'])){ $no_invoice = $_REQUEST['no_invoice'];}
		
// 		$dataInput = array('no_invoice' => $no_invoice);
// 		$hasil = $this->Salecentral_Service->hapusData($dataInput);

// 		if ($hasil == 'sukses') {
// 			$this->view->pesan = 'Data Berhasil Dihapus';
// 		}
// 		/* $this->indexAction();
// 		$this->render('index'); */
// 	}
	
// 	public function editdataAction() {
//         $this->_helper->layout->setLayout('target-column');
		
// 		$no_invoice_data   = $_GET['id'];
// 		$no_invoice_data_original   = $_GET['id_original'];
// 		$this->view->no_invoice_data = $no_invoice_data;
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data=$this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$kode_customer = $temp_salecentral[0]['kode_customer'];
// 		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		
// 		$this->view->data3=$this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);
// 		$this->view->no_invoice_revisi=$this->Salecentral_Service->getDataNoInvoiceRevisi($no_invoice_data,$no_invoice_data_original);
		
// 		$this->view->customer=$this->Salecentral_Service->getCustomer();
// 		$this->view->warna=$this->Salecentral_Service->getWarna();
// 		$this->view->seq=$this->Salecentral_Service->getNoSeq();
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	
// 	public function detailAction() {
//         $this->_helper->layout->setLayout('target-column');
		
// 		$no_invoice_data   = $_GET['id'];
// 		$this->view->no_invoice_data = $no_invoice_data;
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data=$this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$kode_customer = $temp_salecentral[0]['kode_customer'];
// 		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		
// 		$this->view->data3=$this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);
		
// 		$this->view->customer=$this->Salecentral_Service->getCustomer();
// 		$this->view->warna=$this->Salecentral_Service->getWarna();
// 		$this->view->seq=$this->Salecentral_Service->getNoSeq();
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	
// 	public function printsalecentralAction() {
//         $this->_helper->layout->setLayout('target-column');
		
// 		$no_invoice_data   = $_GET['no_invoice'];
// 		$this->view->no_invoice_data = $no_invoice_data;
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data=$this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$kode_customer = $temp_salecentral[0]['kode_customer'];
// 		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		
// 		$this->view->data3=$this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);
		
// 		$this->view->customer=$this->Salecentral_Service->getCustomer();
// 		$this->view->warna=$this->Salecentral_Service->getWarna();
// 		$this->view->seq=$this->Salecentral_Service->getNoSeq();
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	
// 	public function kirimdataeditAction() { 
	
// 		$this->_helper->layout->setLayout('salecentral-layout');
		
// 		$no_invoice 	 	= '';
// 		$tgl_invoice	 	= '';
// 		$kode_customer   	= '';
// 		$shipment		 	= '';
// 		$nama_kurir		 	= '';
// 		$total_berat	 	= '';
// 		$total_biaya	 	= '';
// 		$diskon		 	 	= '';
// 		$biaya_kirim 	 	= '';
// 		$net_total	 	 	= '';
// 		$metode_penerimaan	= '';
// 		$jml_penerimaan 	= '';
// 		$metode_penerimaan2	= '';
// 		$jml_penerimaan2 	= '';
// 		$jml_bayar		 	= '';
// 		$sisa_bayar		 	= '';
// 		$nama_penerima	 	= '';
// 		$alamat_penerima 	= '';
// 		$keterangan		 	= '';
// 		$seq		 	 	= ''; 
// 		$termin_hutang		 	 	= ''; 
// 		$kode_inv 		 	= date('dmy');
		
// 		$kode_barang	 	= '';
// 		$hj_retail		 	= '';
// 		$qty			 	= '';
// 		$free			 	= '';
// 		// $sub_total		 	= '';
// 		$sub_total_berat 	= '';

// 		$sub_total_barang = '';
// 		$sub_total		 	= '';
// 		$biaya_lain		 	= '';
// 		$ket_biaya_lain		 	= '';
// 		$deposit		 	= '';
// 		$jenis_diskon		 	= '';
			
// 		$nama_tabel 	 	= '';
// 		$on_hand 		 	= '';
// 		$hj_retail_baru  	= '';
// 		$kode 				= '';
		
// 		if(isset($_POST['no_invoice'])){ $no_invoice = $_POST['no_invoice'];}
// 		if(isset($_POST['tgl_invoice'])){ $tgl_invoice = $_POST['tgl_invoice'];}
// 		if(isset($_POST['kode_customer2'])){ $kode_customer = $_POST['kode_customer2'];}
// 		if(isset($_POST['shipment'])){ $shipment = $_POST['shipment'];}
// 		if(isset($_POST['nama_kurir'])){ $nama_kurir = $_POST['nama_kurir'];}
// 		if(isset($_POST['total_berat'])){ $total_berat = $_POST['total_berat'];}
// 		if(isset($_POST['total_biaya'])){ $total_biaya = $_POST['total_biaya'];}
// 		if(isset($_POST['diskon'])){ $diskon = $_POST['diskon'];}
// 		if(isset($_POST['biaya_kirim'])){ $biaya_kirim = $_POST['biaya_kirim'];}
// 		if(isset($_POST['net_total'])){ $net_total = $_POST['net_total'];}
// 		if(isset($_POST['metode_penerimaan'])){ $metode_penerimaan = $_POST['metode_penerimaan'];}
// 		if(isset($_POST['jml_penerimaan'])){ $jml_penerimaan = $_POST['jml_penerimaan'];}
// 		if(isset($_POST['metode_penerimaan2'])){ $metode_penerimaan2 = $_POST['metode_penerimaan2'];}
// 		if(isset($_POST['jml_penerimaan2'])){ $jml_penerimaan2 = $_POST['jml_penerimaan2'];}
// 		if(isset($_POST['jml_bayar'])){ $jml_bayar = $_POST['jml_bayar'];}
// 		if(isset($_POST['sisa_bayar'])){ $sisa_bayar = $_POST['sisa_bayar'];}
// 		if(isset($_POST['nama_penerima'])){ $nama_penerima = $_POST['nama_penerima'];}
// 		if(isset($_POST['alamat_penerima'])){ $alamat_penerima = $_POST['alamat_penerima'];}
// 		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
// 		if(isset($_POST['seq'])){ $seq = $_POST['seq'];}
// 		if(isset($_POST['termin_hutang'])){ $termin_hutang = $_POST['termin_hutang'];}
		
// 		if(isset($_POST['kode_barang'])){ $kode_barang = $_POST['kode_barang'];}
// 		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
// 		if(isset($_POST['qty'])){ $qty = $_POST['qty'];}
// 		if(isset($_POST['free'])){ $free = $_POST['free'];}
// 		// if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
// 		if(isset($_POST['sub_total_berat'])){ $sub_total_berat = $_POST['sub_total_berat'];}

// 		if(isset($_POST['sub_total_barang'])){ $sub_total_barang = $_POST['sub_total_barang'];}
// 		if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
// 		if(isset($_POST['jenis_diskon'])){ $jenis_diskon = $_POST['jenis_diskon'];}
// 		if(isset($_POST['biaya_lain'])){ $biaya_lain = $_POST['biaya_lain'];}
// 		if(isset($_POST['ket_biaya_lain'])){ $ket_biaya_lain = $_POST['ket_biaya_lain'];}
// 		if(isset($_POST['deposit'])){ $deposit = $_POST['deposit'];}
		
// 		if(isset($_POST['nama_tabel'])){ $nama_tabel = $_POST['nama_tabel'];}
// 		if(isset($_POST['on_hand'])){ $on_hand = $_POST['on_hand'];}
// 		if(isset($_POST['hj_retail_baru'])){ $hj_retail_baru = $_POST['hj_retail_baru'];}
// 		if(isset($_POST['kode'])){ $kode = $_POST['kode'];}
		
// 		$total_berat= str_replace(".", "", $total_berat);
// 		$total_biaya= str_replace(".", "", $total_biaya);
// 		$biaya_kirim= str_replace(".", "", $biaya_kirim);
// 		$diskon= str_replace(".", "", $diskon);
// 		$net_total= str_replace(".", "", $net_total);
// 		$jml_penerimaan= str_replace(".", "", $jml_penerimaan);
// 		$jml_penerimaan2= str_replace(".", "", $jml_penerimaan2);
// 		$jml_bayar= str_replace(".", "", $jml_bayar);
// 		$sisa_bayar= str_replace(".", "", $sisa_bayar);
// 		$hj_retail= str_replace(".", "", $hj_retail);
// 		$qty= str_replace(".", "", $qty);
// 		$free= str_replace(".", "", $free);
// 		$biaya_lain= str_replace(".", "", $biaya_lain);
// 		$deposit= str_replace(".", "", $deposit);
// 		$sub_total= str_replace(".", "", $sub_total);
// 		$sub_total_berat= str_replace(".", "", $sub_total_berat);
// 		$on_hand= str_replace(".", "", $on_hand);
		
// 		$data = array('no_invoice' => $no_invoice,
// 					  'tgl_invoice' => $tgl_invoice,
// 					  'kode_customer' => $kode_customer,
// 					  'shipment' => $shipment,
// 					  'nama_kurir' => $nama_kurir,
// 					  'total_berat' => $total_berat,
// 					  'total_biaya' => $total_biaya,
// 					  'diskon' => $diskon,
// 					  'biaya_kirim' => $biaya_kirim,
// 					  'net_total' => $net_total,
// 					  'metode_penerimaan' => $metode_penerimaan,
// 					  'jml_penerimaan' => $jml_penerimaan,
// 					  'metode_penerimaan2' => $metode_penerimaan2,
// 					  'jml_penerimaan2' => $jml_penerimaan2,
// 					  'jml_bayar' => $jml_bayar,
// 					  'sisa_bayar' => $sisa_bayar,
// 					  'nama_penerima' => $nama_penerima,
// 					  'alamat_penerima' => $alamat_penerima,
// 					  'keterangan' => $keterangan,
// 					  'seq' => $seq,
// 					  'termin_hutang' => $termin_hutang,
// 					  'kode_inv' => $kode_inv,
// 					  'kode_barang' => $kode_barang,
// 					  'hj_retail' => $hj_retail,
// 					  'qty' => $qty,
// 					  'free' => $free,
// 					  'sub_total_barang' => $sub_total_barang,
// 					  'sub_total' => $sub_total,
// 					  'biaya_lain' => $biaya_lain,
// 					  'ket_biaya_lain' => $ket_biaya_lain,
// 					  'deposit' => $deposit,
// 					  'jenis_diskon' => $jenis_diskon,
// 					  'sub_total_berat' => $sub_total_berat,
// 					  'nama_tabel' => $nama_tabel,
// 					  'on_hand' => $on_hand,
// 					  'hj_retail_baru' => $hj_retail_baru,
// 					  'kode' => $kode);
		
// 		$this->view->datainsert=$this->Salecentral_Service->editdata($data);
//    }

//    	public function kirimdatarevisiAction() { 
	
// 		$this->_helper->layout->setLayout('salecentral-layout');
		
// 		$no_invoice 	 	= '';
// 		$tgl_invoice	 	= '';
// 		$kode_customer   	= '';
// 		$shipment		 	= '';
// 		$nama_kurir		 	= '';
// 		$total_berat	 	= '';
// 		$total_biaya	 	= '';
// 		$diskon		 	 	= '';
// 		$biaya_kirim 	 	= '';
// 		$net_total	 	 	= '';
// 		$metode_penerimaan	= '';
// 		$jml_penerimaan 	= '';
// 		$metode_penerimaan2	= '';
// 		$jml_penerimaan2 	= '';
// 		$jml_bayar		 	= '';
// 		$sisa_bayar		 	= '';
// 		$nama_penerima	 	= '';
// 		$alamat_penerima 	= '';
// 		$keterangan		 	= '';
// 		$seq		 	 	= ''; 
// 		$kode_inv 		 	= date('dmy');
		
// 		$kode_barang	 	= '';
// 		$hj_retail		 	= '';
// 		$qty			 	= '';
// 		$free			 	= '';
// 		$sub_total		 	= '';
// 		$sub_total_berat 	= '';
			
// 		$nama_tabel 	 	= '';
// 		$on_hand 		 	= '';
// 		$hj_retail_baru  	= '';
// 		$kode 				= '';
// 		$no_invoice_revisi  = '';
		
// 		if(isset($_POST['no_invoice_original'])){ $no_invoice = $_POST['no_invoice_original'];}
// 		if(isset($_POST['no_invoice'])){ $no_invoice_revisi = $_POST['no_invoice_revisi'];}
// 		if(isset($_POST['tgl_invoice'])){ $tgl_invoice = $_POST['tgl_invoice'];}
// 		if(isset($_POST['kode_customer2'])){ $kode_customer = $_POST['kode_customer2'];}
// 		if(isset($_POST['shipment'])){ $shipment = $_POST['shipment'];}
// 		if(isset($_POST['nama_kurir'])){ $nama_kurir = $_POST['nama_kurir'];}
// 		if(isset($_POST['total_berat'])){ $total_berat = $_POST['total_berat'];}
// 		if(isset($_POST['total_biaya'])){ $total_biaya = $_POST['total_biaya'];}
// 		if(isset($_POST['diskon'])){ $diskon = $_POST['diskon'];}
// 		if(isset($_POST['biaya_kirim'])){ $biaya_kirim = $_POST['biaya_kirim'];}
// 		if(isset($_POST['net_total'])){ $net_total = $_POST['net_total'];}
// 		if(isset($_POST['metode_penerimaan'])){ $metode_penerimaan = $_POST['metode_penerimaan'];}
// 		if(isset($_POST['jml_penerimaan'])){ $jml_penerimaan = $_POST['jml_penerimaan'];}
// 		if(isset($_POST['metode_penerimaan2'])){ $metode_penerimaan2 = $_POST['metode_penerimaan2'];}
// 		if(isset($_POST['jml_penerimaan2'])){ $jml_penerimaan2 = $_POST['jml_penerimaan2'];}
// 		if(isset($_POST['jml_bayar'])){ $jml_bayar = $_POST['jml_bayar'];}
// 		if(isset($_POST['sisa_bayar'])){ $sisa_bayar = $_POST['sisa_bayar'];}
// 		if(isset($_POST['nama_penerima'])){ $nama_penerima = $_POST['nama_penerima'];}
// 		if(isset($_POST['alamat_penerima'])){ $alamat_penerima = $_POST['alamat_penerima'];}
// 		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
// 		if(isset($_POST['seq'])){ $seq = $_POST['seq'];}
		
// 		if(isset($_POST['kode_barang'])){ $kode_barang = $_POST['kode_barang'];}
// 		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
// 		if(isset($_POST['qty'])){ $qty = $_POST['qty'];}
// 		if(isset($_POST['free'])){ $free = $_POST['free'];}
// 		if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
// 		if(isset($_POST['sub_total_berat'])){ $sub_total_berat = $_POST['sub_total_berat'];}
		
// 		if(isset($_POST['nama_tabel'])){ $nama_tabel = $_POST['nama_tabel'];}
// 		if(isset($_POST['on_hand'])){ $on_hand = $_POST['on_hand'];}
// 		if(isset($_POST['hj_retail_baru'])){ $hj_retail_baru = $_POST['hj_retail_baru'];}
// 		if(isset($_POST['kode'])){ $kode = $_POST['kode'];}
		
// 		$total_berat= str_replace(".", "", $total_berat);
// 		$total_biaya= str_replace(".", "", $total_biaya);
// 		$biaya_kirim= str_replace(".", "", $biaya_kirim);
// 		$diskon= str_replace(".", "", $diskon);
// 		$net_total= str_replace(".", "", $net_total);
// 		$jml_penerimaan= str_replace(".", "", $jml_penerimaan);
// 		$jml_penerimaan2= str_replace(".", "", $jml_penerimaan2);
// 		$jml_bayar= str_replace(".", "", $jml_bayar);
// 		$sisa_bayar= str_replace(".", "", $sisa_bayar);
// 		$hj_retail= str_replace(".", "", $hj_retail);
// 		$qty= str_replace(".", "", $qty);
// 		$free= str_replace(".", "", $free);
// 		$sub_total= str_replace(".", "", $sub_total);
// 		$sub_total_berat= str_replace(".", "", $sub_total_berat);
// 		$on_hand= str_replace(".", "", $on_hand);
		
// 		$data = array('no_invoice_original' => $no_invoice,
// 					  'no_invoice_revisi' => $no_invoice_revisi,
// 					  'tgl_invoice' => $tgl_invoice,
// 					  'kode_customer' => $kode_customer,
// 					  'shipment' => $shipment,
// 					  'nama_kurir' => $nama_kurir,
// 					  'total_berat' => $total_berat,
// 					  'total_biaya' => $total_biaya,
// 					  'diskon' => $diskon,
// 					  'biaya_kirim' => $biaya_kirim,
// 					  'net_total' => $net_total,
// 					  'metode_penerimaan' => $metode_penerimaan,
// 					  'jml_penerimaan' => $jml_penerimaan,
// 					  'metode_penerimaan2' => $metode_penerimaan2,
// 					  'jml_penerimaan2' => $jml_penerimaan2,
// 					  'jml_bayar' => $jml_bayar,
// 					  'sisa_bayar' => $sisa_bayar,
// 					  'nama_penerima' => $nama_penerima,
// 					  'alamat_penerima' => $alamat_penerima,
// 					  'keterangan' => $keterangan,
// 					  'seq' => $seq,
// 					  'kode_inv' => $kode_inv,
// 					  'kode_barang' => $kode_barang,
// 					  'hj_retail' => $hj_retail,
// 					  'qty' => $qty,
// 					  'free' => $free,
// 					  'sub_total' => $sub_total,
// 					  'sub_total_berat' => $sub_total_berat,
// 					  'nama_tabel' => $nama_tabel,
// 					  'on_hand' => $on_hand,
// 					  'hj_retail_baru' => $hj_retail_baru,
// 					  'kode' => $kode);
		
// 		$this->view->datainsert=$this->Salecentral_Service->revisidata($data);
//    }
   
//    public function approvalAction() {
//         $this->_helper->layout->setLayout('target-column');
		
// 		$no_invoice_data   = $_GET['id'];
// 		$no_invoice_data_original   = $_GET['id_original'];
// 		$this->view->no_invoice_data = $no_invoice_data;
		
// 		$this->view->Salecentral_Service = $this->Salecentral_Service;
		
// 		$this->view->data=$this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
// 		$kode_customer = $temp_salecentral[0]['kode_customer'];
// 		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		
// 		$this->view->data3=$this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);
// 		$this->view->no_invoice_revisi=$this->Salecentral_Service->getDataNoInvoiceRevisi($no_invoice_data,$no_invoice_data_original);
		
// 		$this->view->customer=$this->Salecentral_Service->getCustomer();
// 		$this->view->warna=$this->Salecentral_Service->getWarna();
// 		$this->view->seq=$this->Salecentral_Service->getNoSeq();
// 		$this->view->rek=$this->Salecentral_Service->getRekening();
//     }
	

   
//    public function kirimdataapprove2Action() { 
	
// 		$this->_helper->layout->setLayout('salecentral-layout');
		
// 		$no_invoice 	 	= '';
// 		$tgl_invoice	 	= '';
// 		$kode_customer   	= '';
// 		$shipment		 	= '';
// 		$nama_kurir		 	= '';
// 		$total_berat	 	= '';
// 		$total_biaya	 	= '';
// 		$diskon		 	 	= '';
// 		$biaya_kirim 	 	= '';
// 		$net_total	 	 	= '';
// 		$metode_penerimaan	= '';
// 		$jml_penerimaan 	= '';
// 		$metode_penerimaan2	= '';
// 		$jml_penerimaan2 	= '';
// 		$jml_bayar		 	= '';
// 		$sisa_bayar		 	= '';
// 		$nama_penerima	 	= '';
// 		$alamat_penerima 	= '';
// 		$keterangan		 	= '';
// 		$seq		 	 	= ''; 
// 		$kode_inv 		 	= date('dmy');
		
// 		$kode_barang	 	= '';
// 		$hj_retail		 	= '';
// 		$qty			 	= '';
// 		$free			 	= '';
// 		$sub_total		 	= '';
// 		$sub_total_berat 	= '';
// 		$stok_gudang		= '';
			
// 		$nama_tabel 	 	= '';
// 		$on_hand 		 	= '';
// 		$hj_retail_baru  	= '';
// 		$kode 				= '';
		
// 		if(isset($_POST['no_invoice'])){ $no_invoice = $_POST['no_invoice'];}
// 		if(isset($_POST['tgl_invoice'])){ $tgl_invoice = $_POST['tgl_invoice'];}
// 		if(isset($_POST['kode_customer2'])){ $kode_customer = $_POST['kode_customer2'];}
// 		if(isset($_POST['shipment'])){ $shipment = $_POST['shipment'];}
// 		if(isset($_POST['nama_kurir'])){ $nama_kurir = $_POST['nama_kurir'];}
// 		if(isset($_POST['total_berat'])){ $total_berat = $_POST['total_berat'];}
// 		if(isset($_POST['total_biaya'])){ $total_biaya = $_POST['total_biaya'];}
// 		if(isset($_POST['diskon'])){ $diskon = $_POST['diskon'];}
// 		if(isset($_POST['biaya_kirim'])){ $biaya_kirim = $_POST['biaya_kirim'];}
// 		if(isset($_POST['net_total'])){ $net_total = $_POST['net_total'];}
// 		if(isset($_POST['metode_penerimaan'])){ $metode_penerimaan = $_POST['metode_penerimaan'];}
// 		if(isset($_POST['jml_penerimaan'])){ $jml_penerimaan = $_POST['jml_penerimaan'];}
// 		if(isset($_POST['metode_penerimaan2'])){ $metode_penerimaan2 = $_POST['metode_penerimaan2'];}
// 		if(isset($_POST['jml_penerimaan2'])){ $jml_penerimaan2 = $_POST['jml_penerimaan2'];}
// 		if(isset($_POST['jml_bayar'])){ $jml_bayar = $_POST['jml_bayar'];}
// 		if(isset($_POST['sisa_bayar'])){ $sisa_bayar = $_POST['sisa_bayar'];}
// 		if(isset($_POST['nama_penerima'])){ $nama_penerima = $_POST['nama_penerima'];}
// 		if(isset($_POST['alamat_penerima'])){ $alamat_penerima = $_POST['alamat_penerima'];}
// 		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
// 		if(isset($_POST['seq'])){ $seq = $_POST['seq'];}
		
// 		if(isset($_POST['kode_barang'])){ $kode_barang = $_POST['kode_barang'];}
// 		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
// 		if(isset($_POST['qty'])){ $qty = $_POST['qty'];}
// 		if(isset($_POST['free'])){ $free = $_POST['free'];}
// 		if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
// 		if(isset($_POST['sub_total_berat'])){ $sub_total_berat = $_POST['sub_total_berat'];}
// 		if(isset($_POST['stok_gudang'])){ $stok_gudang = $_POST['stok_gudang'];}
		
// 		if(isset($_POST['nama_tabel'])){ $nama_tabel = $_POST['nama_tabel'];}
// 		if(isset($_POST['on_hand'])){ $on_hand = $_POST['on_hand'];}
// 		if(isset($_POST['hj_retail_baru'])){ $hj_retail_baru = $_POST['hj_retail_baru'];}
// 		if(isset($_POST['kode'])){ $kode = $_POST['kode'];}
		
// 		$total_berat= str_replace(".", "", $total_berat);
// 		$total_biaya= str_replace(".", "", $total_biaya);
// 		$biaya_kirim= str_replace(".", "", $biaya_kirim);
// 		$diskon= str_replace(".", "", $diskon);
// 		$net_total= str_replace(".", "", $net_total);
// 		$jml_penerimaan= str_replace(".", "", $jml_penerimaan);
// 		$jml_penerimaan2= str_replace(".", "", $jml_penerimaan2);
// 		$jml_bayar= str_replace(".", "", $jml_bayar);
// 		$sisa_bayar= str_replace(".", "", $sisa_bayar);
// 		$hj_retail= str_replace(".", "", $hj_retail);
// 		$qty= str_replace(".", "", $qty);
// 		$free= str_replace(".", "", $free);
// 		$sub_total= str_replace(".", "", $sub_total);
// 		$sub_total_berat= str_replace(".", "", $sub_total_berat);
// 		$on_hand= str_replace(".", "", $on_hand);
// 		$stok_gudang= str_replace(".", "", $stok_gudang);
		
// 		$data = array('no_invoice' => $no_invoice,
// 					  'tgl_invoice' => $tgl_invoice,
// 					  'kode_customer' => $kode_customer,
// 					  'shipment' => $shipment,
// 					  'nama_kurir' => $nama_kurir,
// 					  'total_berat' => $total_berat,
// 					  'total_biaya' => $total_biaya,
// 					  'diskon' => $diskon,
// 					  'biaya_kirim' => $biaya_kirim,
// 					  'net_total' => $net_total,
// 					  'metode_penerimaan' => $metode_penerimaan,
// 					  'jml_penerimaan' => $jml_penerimaan,
// 					  'metode_penerimaan2' => $metode_penerimaan2,
// 					  'jml_penerimaan2' => $jml_penerimaan2,
// 					  'jml_bayar' => $jml_bayar,
// 					  'sisa_bayar' => $sisa_bayar,
// 					  'nama_penerima' => $nama_penerima,
// 					  'alamat_penerima' => $alamat_penerima,
// 					  'keterangan' => $keterangan,
// 					  'seq' => $seq,
// 					  'kode_inv' => $kode_inv,
// 					  'kode_barang' => $kode_barang,
// 					  'hj_retail' => $hj_retail,
// 					  'qty' => $qty,
// 					  'free' => $free,
// 					  'sub_total' => $sub_total,
// 					  'sub_total_berat' => $sub_total_berat,
// 					  'stok_gudang' => $stok_gudang,
// 					  'nama_tabel' => $nama_tabel,
// 					  'on_hand' => $on_hand,
// 					  'hj_retail_baru' => $hj_retail_baru,
// 					  'kode' => $kode);
		
// 		$this->view->datainsert=$this->Salecentral_Service->approvedata2($data);
//    }
 
// }
// =======
?>
<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Salecentral_Service.php';

class SalecentralController extends Zend_Controller_Action
{

	public function init()
	{
		$registry = Zend_Registry::getInstance();
		$this->auth = Zend_Auth::getInstance();
		$this->Home_Service = Home_Service::getInstance();
		$this->Salecentral_Service = Salecentral_Service::getInstance();
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

		$this->_helper->layout->setLayout('salecentral-layout');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getlistSaleCentral();
		$this->view->menu = $this->Salecentral_Service->getmenu();
	}

	// public function tambahAction()
	// {
	// 	$sessionlogin = new Zend_Session_Namespace('sessionlogin');
	// 	$this->view->permission = $sessionlogin->permission;

	// 	$this->_helper->layout->setLayout('salecentraltambah-layout');

	// 	$this->view->Salecentral_Service = $this->Salecentral_Service;

	// 	$this->view->customer = $this->Salecentral_Service->getCustomer();
	// 	$this->view->warna = $this->Salecentral_Service->getWarna();
	// 	$now = date('dmy');
	// 	$kode_inv = $now;
	// 	$this->view->seq = $this->Salecentral_Service->getNoSeq2($kode_inv);
	// 	$this->view->rek = $this->Salecentral_Service->getRekening();
	// }

	public function cekdatauserAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$user_id = '';
		$password = '';

		if (isset($_REQUEST['user_id'])) {
			$user_id = $_REQUEST['user_id'];
		}
		if (isset($_REQUEST['password'])) {
			$password = $_REQUEST['password'];
		}

		$password = md5($password);

		$this->view->user = $this->Salecentral_Service->getDataUser($user_id, $password);
	}

	public function tambahdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$now = date('dmy');
		$kode_inv = $now;
		$this->view->seq = $this->Salecentral_Service->getNoSeq2($kode_inv);
		$this->view->rek = $this->Salecentral_Service->getRekening();
	}


	public function dataatomizerAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getlistatomizer();
	}

	public function dataaksesorisAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getlistaccessories();
	}

	public function datadeviceAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getlistdevice();
	}

	public function dataliquidAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getlistliquid();
		$this->view->rek = $this->Salecentral_Service->getRekening();
	}

	public function kirimdataAction()
	{
		$this->_helper->layout->setLayout('salecentral-layout');

		$no_invoice 	 	= '';
		$tgl_invoice	 	= '';
		$kode_customer   	= '';
		$shipment		 	= '';
		$nama_kurir		 	= '';
		$total_berat	 	= '';
		$total_biaya	 	= '';
		$diskon		 	 	= '';
		$biaya_kirim 	 	= '';
		$net_total	 	 	= '';
		$metode_penerimaan	= '';
		$jml_penerimaan 	= '';
		$metode_penerimaan2	= '';
		$jml_penerimaan2 	= '';
		$jml_bayar		 	= '';
		$sisa_bayar		 	= '';
		$nama_penerima	 	= '';
		$alamat_penerima 	= '';
		$keterangan		 	= '';
		$seq		 	 	= '';
		$termin_hutang		= '';
		$kode_inv 		 	= date('dmy');

		$kode_barang	 	= '';
		$hj_retail		 	= '';
		$qty			 	= '';
		$free			 	= '';
		$sub_total_berat 	= '';

		$sub_total_barang = '';
		$sub_total		 	= '';
		$biaya_lain		 	= '';
		$ket_biaya_lain		 	= '';
		$deposit		 	= '';
		$jenis_diskon		 	= '';

		$nama_tabel 	 	= '';
		$on_hand 		 	= '';
		$hj_retail_baru  	= '';
		$kode 				= '';

		if (isset($_POST['no_invoice'])) {
			$no_invoice = $_POST['no_invoice'];
		}
		if (isset($_POST['tgl_invoice'])) {
			$tgl_invoice = $_POST['tgl_invoice'];
		}
		if (isset($_POST['kode_customer2'])) {
			$kode_customer = $_POST['kode_customer2'];
		}
		if (isset($_POST['shipment'])) {
			$shipment = $_POST['shipment'];
		}
		if (isset($_POST['nama_kurir'])) {
			$nama_kurir = $_POST['nama_kurir'];
		}
		if (isset($_POST['total_berat'])) {
			$total_berat = $_POST['total_berat'];
		}
		if (isset($_POST['total_biaya'])) {
			$total_biaya = $_POST['total_biaya'];
		}
		if (isset($_POST['diskon'])) {
			$diskon = $_POST['diskon'];
		}
		if (isset($_POST['biaya_kirim'])) {
			$biaya_kirim = $_POST['biaya_kirim'];
		}
		if (isset($_POST['net_total'])) {
			$net_total = $_POST['net_total'];
		}
		if (isset($_POST['metode_penerimaan'])) {
			$metode_penerimaan = $_POST['metode_penerimaan'];
		}
		if (isset($_POST['jml_penerimaan'])) {
			$jml_penerimaan = $_POST['jml_penerimaan'];
		}
		if (isset($_POST['metode_penerimaan2'])) {
			$metode_penerimaan2 = $_POST['metode_penerimaan2'];
		}
		if (isset($_POST['jml_penerimaan2'])) {
			$jml_penerimaan2 = $_POST['jml_penerimaan2'];
		}
		if (isset($_POST['jml_bayar'])) {
			$jml_bayar = $_POST['jml_bayar'];
		}
		if (isset($_POST['sisa_bayar'])) {
			$sisa_bayar = $_POST['sisa_bayar'];
		}
		if (isset($_POST['nama_penerima'])) {
			$nama_penerima = $_POST['nama_penerima'];
		}
		if (isset($_POST['alamat_penerima'])) {
			$alamat_penerima = $_POST['alamat_penerima'];
		}
		if (isset($_POST['keterangan'])) {
			$keterangan = $_POST['keterangan'];
		}
		if (isset($_POST['seq'])) {
			$seq = $_POST['seq'];
		}
		if (isset($_POST['termin_hutang'])) {
			$termin_hutang = $_POST['termin_hutang'];
		}

		if (isset($_POST['kode_barang'])) {
			$kode_barang = $_POST['kode_barang'];
		}
		if (isset($_POST['hj_retail'])) {
			$hj_retail = $_POST['hj_retail'];
		}
		if (isset($_POST['qty'])) {
			$qty = $_POST['qty'];
		}
		if (isset($_POST['free'])) {
			$free = $_POST['free'];
		}
		if (isset($_POST['sub_total_berat'])) {
			$sub_total_berat = $_POST['sub_total_berat'];
		}

		if (isset($_POST['sub_total_barang'])) {
			$sub_total_barang = $_POST['sub_total_barang'];
		}
		if (isset($_POST['sub_total'])) {
			$sub_total = $_POST['sub_total'];
		}
		if (isset($_POST['jenis_diskon'])) {
			$jenis_diskon = $_POST['jenis_diskon'];
		}
		if (isset($_POST['biaya_lain'])) {
			$biaya_lain = $_POST['biaya_lain'];
		}
		if (isset($_POST['ket_biaya_lain'])) {
			$ket_biaya_lain = $_POST['ket_biaya_lain'];
		}
		if (isset($_POST['deposit'])) {
			$deposit = $_POST['deposit'];
		}

		if (isset($_POST['nama_tabel'])) {
			$nama_tabel = $_POST['nama_tabel'];
		}
		if (isset($_POST['on_hand'])) {
			$on_hand = $_POST['on_hand'];
		}
		if (isset($_POST['hj_retail_baru'])) {
			$hj_retail_baru = $_POST['hj_retail_baru'];
		}
		if (isset($_POST['kode'])) {
			$kode = $_POST['kode'];
		}

		$tgl_invoice = str_replace('/', '-', $tgl_invoice);
		$tgl_invoice = date("Y-m-d H:i", strtotime($tgl_invoice));

		$total_berat = str_replace(".", "", $total_berat);
		$total_biaya = str_replace(".", "", $total_biaya);
		$biaya_kirim = str_replace(".", "", $biaya_kirim);
		$diskon = str_replace(".", "", $diskon);
		$net_total = str_replace(".", "", $net_total);
		$jml_penerimaan = str_replace(".", "", $jml_penerimaan);
		$jml_penerimaan2 = str_replace(".", "", $jml_penerimaan2);
		$jml_bayar = str_replace(".", "", $jml_bayar);
		$sisa_bayar = str_replace(".", "", $sisa_bayar);
		$hj_retail = str_replace(".", "", $hj_retail);
		$qty = str_replace(".", "", $qty);
		$free = str_replace(".", "", $free);
		$sub_total = str_replace(".", "", $sub_total);
		$biaya_lain = str_replace(".", "", $biaya_lain);
		$deposit = str_replace(".", "", $deposit);
		$sub_total_berat = str_replace(".", "", $sub_total_berat);
		$on_hand = str_replace(".", "", $on_hand);

		$data = array(
			'no_invoice' => $no_invoice,
			'tgl_invoice' => $tgl_invoice,
			'kode_customer' => $kode_customer,
			'shipment' => $shipment,
			'nama_kurir' => $nama_kurir,
			'total_berat' => $total_berat,
			'total_biaya' => $total_biaya,
			'diskon' => $diskon,
			'biaya_kirim' => $biaya_kirim,
			'net_total' => $net_total,
			'metode_penerimaan' => $metode_penerimaan,
			'jml_penerimaan' => $jml_penerimaan,
			'metode_penerimaan2' => $metode_penerimaan2,
			'jml_penerimaan2' => $jml_penerimaan2,
			'jml_bayar' => $jml_bayar,
			'sisa_bayar' => $sisa_bayar,
			'nama_penerima' => $nama_penerima,
			'alamat_penerima' => $alamat_penerima,
			'keterangan' => $keterangan,
			'seq' => $seq,
			'termin_hutang' => $termin_hutang,
			'kode_inv' => $kode_inv,
			'kode_barang' => $kode_barang,
			'hj_retail' => $hj_retail,
			'qty' => $qty,
			'free' => $free,
			'sub_total_barang' => $sub_total_barang,
			'sub_total' => $sub_total,
			'biaya_lain' => $biaya_lain,
			'ket_biaya_lain' => $ket_biaya_lain,
			'deposit' => $deposit,
			'jenis_diskon' => $jenis_diskon,
			'sub_total_berat' => $sub_total_berat,
			'nama_tabel' => $nama_tabel,
			'on_hand' => $on_hand,
			'hj_retail_baru' => $hj_retail_baru,
			'kode' => $kode
		);
		//var_dump($data);
		$this->view->datainsert = $this->Salecentral_Service->insertdata($data);
	}

	public function hapusdataAction()
	{
		$no_invoice = '';

		if (isset($_REQUEST['no_invoice'])) {
			$no_invoice = $_REQUEST['no_invoice'];
		}

		$dataInput = array('no_invoice' => $no_invoice);
		$hasil = $this->Salecentral_Service->hapusData($dataInput);

		if ($hasil == 'sukses') {
			$this->view->pesan = 'Data Berhasil Dihapus';
		}
		/* $this->indexAction();
		$this->render('index'); */
	}

	public function editdataAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$no_invoice_data   = $_GET['id'];
		$this->view->no_invoice_data = $no_invoice_data;

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$kode_customer = $temp_salecentral[0]['kode_customer'];
		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		$this->view->no_invoice_revisi=$this->Salecentral_Service->getDataNoInvoiceRevisi($no_invoice_data);
		
		$this->view->data3 = $this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$this->view->seq = $this->Salecentral_Service->getNoSeq();
		//$this->view->rek = $this->Salecentral_Service->getRekening();
	}

	public function editAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$no_invoice_data   = $_GET['id'];
		$this->view->no_invoice_data = $no_invoice_data;

		$this->view->Salecentral_Service = $this->Salecentral_Service;
		$this->view->no_invoice_revisi=$this->Salecentral_Service->getDataNoInvoiceRevisi($no_invoice_data);

		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$kode_customer = $temp_salecentral[0]['kode_customer'];
		$this->view->sale = $temp_salecentral;
		$this->view->customersale = $this->Salecentral_Service->getdatacustomerid($kode_customer);
		$tempSubsale = $this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);

		for ($i = 0; $i < count($tempSubsale); $i++) {

			$tempSubsale[$i]['hj_retail'] = $tempSubsale[$i]['harga_jual'];
			$tempSubsale[$i]['subTotal'] = $tempSubsale[$i]['sub_total_barang'];
			$tempSubsale[$i]['nama_tabel'] = $tempSubsale[$i]['jenis_barang'];
			$tempSubsale[$i]['kode'] = $tempSubsale[$i]['kode_jenis_barang'];

			$barang = $this->Salecentral_Service->getdatabarangid($tempSubsale[$i]['kode_barang']);
			$tempSubsale[$i]['nama_barang'] = $barang[0]['nama_barang'];
			$tempSubsale[$i]['berat'] = $barang[0]['berat'];
			$tempSubsale[$i]['on_hand'] = $barang[0]['on_hand'];
			$tempSubsale[$i]['stok_pusat'] = $barang[0]['stok_pusat'];
			// $nama_barang  = $barang[0]['nama_barang'];
			// $berat		  = $barang[0]['berat'];
			// $on_hand	  = $barang[0]['on_hand'];
			// $stok_gudang  = $barang[0]['stok_pusat'];

			// $on_hands 	  = $on_hand - ($qty + $free);
		}

		$this->view->subsale = $tempSubsale;

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		// $this->view->warna = $this->Salecentral_Service->getWarna();
		$this->view->seq = $this->Salecentral_Service->getNoSeq();
		$this->view->rek = $this->Salecentral_Service->getRekening();
		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$now = date('dmy');
		$kode_inv = $now;
		// $this->view->seq = $this->Salecentral_Service->getNoSeq2($kode_inv);
		$this->view->liquids = $this->Salecentral_Service->getlistliquid();
		$this->view->devices = $this->Salecentral_Service->getlistdevice();
		$this->view->accessories = $this->Salecentral_Service->getlistaccessories();
		$this->view->atomizers = $this->Salecentral_Service->getlistatomizer();
	}

	public function tesresponseAction()
	{
		$this->_helper->viewRenderer->setNoRender(true);

		// $data = array(
		//     'no_invoice' => $no_invoice,
		//     'tgl_invoice' => $tgl_invoice,
		//     'kode_customer' => $kode_customer,
		//     'shipment' => $shipment,
		//     'nama_kurir' => $nama_kurir,
		//     'total_berat' => $total_berat,
		//     'total_biaya' => $total_biaya,
		//     'diskon' => $diskon,
		//     'biaya_kirim' => $biaya_kirim,
		//     'net_total' => $net_total,
		//     'metode_penerimaan' => $metode_penerimaan,
		//     'jml_penerimaan' => $jml_penerimaan,
		//     'metode_penerimaan2' => $metode_penerimaan2,
		//     'jml_penerimaan2' => $jml_penerimaan2,
		//     'jml_bayar' => $jml_bayar,
		//     'sisa_bayar' => $sisa_bayar,
		//     'nama_penerima' => $nama_penerima,
		//     'alamat_penerima' => $alamat_penerima,
		//     'keterangan' => $keterangan,
		//     'seq' => $seq,
		//     'termin_hutang' => $termin_hutang,
		//     'kode_inv' => $kode_inv,
		//     'kode_barang' => $kode_barang,
		//     'hj_retail' => $hj_retail,
		//     'qty' => $qty,
		//     'free' => $free,
		//     'sub_total_barang' => $sub_total_barang,
		//     'sub_total' => $sub_total,
		//     'biaya_lain' => $biaya_lain,
		//     'ket_biaya_lain' => $ket_biaya_lain,
		//     'deposit' => $deposit,
		//     'jenis_diskon' => $jenis_diskon,
		//     'sub_total_berat' => $sub_total_berat,
		//     'nama_tabel' => $nama_tabel,
		//     'on_hand' => $on_hand,
		//     'hj_retail_baru' => $hj_retail_baru,
		//     'kode' => $kode
		// );

		// echo json_encode(['status' => 'ok']);
		// $this->getResponse()->setHttpResponseCode(500);
		// $this->getResponse()->setBody('List of Resources');

		// $this->getResponse()->sendResponse();

		// $this->getResponse()->setBody('List of Resources');

		// echo $this->getResponse()->sendResponse();
		$body = json_decode($this->getRequest()->getRawBody());

		// 'kode_barang' => $kode_barang,
		// 'hj_retail' => $hj_retail,
		// 'qty' => $qty,
		// 'free' => $free,
		// 'sub_total_barang' => $sub_total_barang,
		// 'sub_total_berat' => $sub_total_berat,
		// 'nama_tabel' => $nama_tabel, // Jenis brang
		// 'on_hand' => $on_hand,
		// 'hj_retail_baru' => $hj_retail_baru,
		// 'kode' => $kode

		$kode_barang = [];
		$hj_retail = [];
		$qty = [];
		$free = [];
		$sub_total_barang = [];
		$sub_total_berat = [];
		$nama_tabel = [];
		$on_hand = [];
		$hj_retail_baru = [];
		$kode = [];

		if (count($body->keranjang) > 0) {
			foreach ($body->keranjang as $keranjang) {
				array_push($kode_barang, $keranjang->kode_barang);
				array_push($hj_retail, $keranjang->hj_retail);
				array_push($qty, $keranjang->qty);
				array_push($free, $keranjang->free);
				array_push($sub_total_barang, $keranjang->subTotal);
				array_push($sub_total_berat, $keranjang->berat);
				array_push($nama_tabel, $keranjang->nama_tabel);
				array_push($on_hand, $keranjang->on_hand);
				array_push($hj_retail_baru, $keranjang->hj_retail);
				array_push($kode, $keranjang->kode);
			}
		}

		$data = array(
			'no_invoice' => $body->no_invoice,
			'no_invoice_revisi' => $body->no_invoice_revisi,
			'no_invoice_original' => $body->no_invoice_original,
			'tgl_invoice' => date("Y-m-d H:i", strtotime(str_replace('/', '-', $body->tgl_invoice))),
			'kode_customer' => $body->kode_customer,
			'shipment' => $body->shipment,
			'nama_kurir' => $body->nama_kurir,
			'total_berat' => $body->total_berat,
			'total_biaya' => $body->total_biaya,
			'diskon' => $body->diskon,
			'biaya_kirim' => $body->biaya_kirim,
			'net_total' => $body->net_total,
			'metode_penerimaan' => $body->metode_penerimaan,
			'jml_penerimaan' => $body->jml_penerimaan,
			'metode_penerimaan2' => $body->metode_penerimaan2,
			'jml_penerimaan2' => $body->jml_penerimaan2,
			'jml_bayar' => $body->jml_bayar,
			'sisa_bayar' => $body->sisa_bayar,
			'nama_penerima' => $body->nama_penerima,
			'alamat_penerima' => $body->alamat_penerima,
			'keterangan' => $body->keterangan,
			'seq' => $body->seq,
			'termin_hutang' => $body->termin_hutang,
			'kode_inv' => date('dmy'),
			'sub_total' => $body->sub_total,
			'biaya_lain' => $body->biaya_lain,
			'ket_biaya_lain' => $body->ket_biaya_lain,
			'deposit' => $body->deposit,
			'jenis_diskon' => $body->jenis_diskon,
			// PER ITEM
			'kode_barang' => $kode_barang,
			'hj_retail' => $hj_retail,
			'qty' => $qty,
			'free' => $free,
			'sub_total_barang' => $sub_total_barang,
			'sub_total_berat' => $sub_total_berat,
			'nama_tabel' => $nama_tabel, // Jenis brang
			'on_hand' => $on_hand,
			'hj_retail_baru' => $hj_retail_baru,
			'kode' => $kode
		);
		//var_dump($data);

		// $this->getResponse()->setHttpResponseCode(200);
		// $this->_helper->json->sendJson(([
		//     'request' => $nama_tabel,
		//     'status' => 'OK',
		//     'message' => 'Berhasil disimpan',
		//     'status' => 200,
		//     'error' => false
		// ]));

		try {
			//$this->view->result = $this->Salecentral_Service->revisidata($data);
		
			$this->view->result = $this->Salecentral_Service->editdata($data);
			// if ($body->btnSubmit=="edit"){
			// }else{
			// 	$this->view->result = $this->Salecentral_Service->revisidata($data);
			// }
			

			if ($this->view->result == 'sukses') {
				$this->getResponse()->setHttpResponseCode(200);
				$this->_helper->json->sendJson(([
					'status' => 'OK',
					'message' => 'Berhasil disimpan',
					'status' => 200,
					'error' => false
				]));
			} else {
				$this->getResponse()->setHttpResponseCode(500);
				$this->_helper->json->sendJson([
					'status' => 'OK',
					'message' => 'Gagal disimpan',
					'status' => 500,
					'error' => false
				]);
			}
			//code...
		} catch (\Exception $e) {
			//throw $th;
			$this->getResponse()->setHttpResponseCode(500);
			$this->_helper->json->sendJson(json_encode($e));
		}
		// echo json_encode(['status' => 'ok']);
		// echo 'tes';
		// $this->getResponse()->setHttpResponseCode(200);


	} 

	public function tesresponserevisionAction()
	{
		$this->_helper->viewRenderer->setNoRender(true);

		// $data = array(
		//     'no_invoice' => $no_invoice,
		//     'tgl_invoice' => $tgl_invoice,
		//     'kode_customer' => $kode_customer,
		//     'shipment' => $shipment,
		//     'nama_kurir' => $nama_kurir,
		//     'total_berat' => $total_berat,
		//     'total_biaya' => $total_biaya,
		//     'diskon' => $diskon,
		//     'biaya_kirim' => $biaya_kirim,
		//     'net_total' => $net_total,
		//     'metode_penerimaan' => $metode_penerimaan,
		//     'jml_penerimaan' => $jml_penerimaan,
		//     'metode_penerimaan2' => $metode_penerimaan2,
		//     'jml_penerimaan2' => $jml_penerimaan2,
		//     'jml_bayar' => $jml_bayar,
		//     'sisa_bayar' => $sisa_bayar,
		//     'nama_penerima' => $nama_penerima,
		//     'alamat_penerima' => $alamat_penerima,
		//     'keterangan' => $keterangan,
		//     'seq' => $seq,
		//     'termin_hutang' => $termin_hutang,
		//     'kode_inv' => $kode_inv,
		//     'kode_barang' => $kode_barang,
		//     'hj_retail' => $hj_retail,
		//     'qty' => $qty,
		//     'free' => $free,
		//     'sub_total_barang' => $sub_total_barang,
		//     'sub_total' => $sub_total,
		//     'biaya_lain' => $biaya_lain,
		//     'ket_biaya_lain' => $ket_biaya_lain,
		//     'deposit' => $deposit,
		//     'jenis_diskon' => $jenis_diskon,
		//     'sub_total_berat' => $sub_total_berat,
		//     'nama_tabel' => $nama_tabel,
		//     'on_hand' => $on_hand,
		//     'hj_retail_baru' => $hj_retail_baru,
		//     'kode' => $kode
		// );

		// echo json_encode(['status' => 'ok']);
		// $this->getResponse()->setHttpResponseCode(500);
		// $this->getResponse()->setBody('List of Resources');

		// $this->getResponse()->sendResponse();

		// $this->getResponse()->setBody('List of Resources');

		// echo $this->getResponse()->sendResponse();
		$body = json_decode($this->getRequest()->getRawBody());

		// 'kode_barang' => $kode_barang,
		// 'hj_retail' => $hj_retail,
		// 'qty' => $qty,
		// 'free' => $free,
		// 'sub_total_barang' => $sub_total_barang,
		// 'sub_total_berat' => $sub_total_berat,
		// 'nama_tabel' => $nama_tabel, // Jenis brang
		// 'on_hand' => $on_hand,
		// 'hj_retail_baru' => $hj_retail_baru,
		// 'kode' => $kode

		$kode_barang = [];
		$hj_retail = [];
		$qty = [];
		$free = [];
		$sub_total_barang = [];
		$sub_total_berat = [];
		$nama_tabel = [];
		$on_hand = [];
		$hj_retail_baru = [];
		$kode = [];

		if (count($body->keranjang) > 0) {
			foreach ($body->keranjang as $keranjang) {
				array_push($kode_barang, $keranjang->kode_barang);
				array_push($hj_retail, $keranjang->hj_retail);
				array_push($qty, $keranjang->qty);
				array_push($free, $keranjang->free);
				array_push($sub_total_barang, $keranjang->subTotal);
				array_push($sub_total_berat, $keranjang->berat);
				array_push($nama_tabel, $keranjang->nama_tabel);
				array_push($on_hand, $keranjang->on_hand);
				array_push($hj_retail_baru, $keranjang->hj_retail);
				array_push($kode, $keranjang->kode);
			}
		}

		$data = array(
			'no_invoice' => $body->no_invoice,
			'no_invoice_revisi' => $body->no_invoice_revisi,
			'no_invoice_original' => $body->no_invoice_original,
			'tgl_invoice' => date("Y-m-d H:i", strtotime(str_replace('/', '-', $body->tgl_invoice))),
			'kode_customer' => $body->kode_customer,
			'shipment' => $body->shipment,
			'nama_kurir' => $body->nama_kurir,
			'total_berat' => $body->total_berat,
			'total_biaya' => $body->total_biaya,
			'diskon' => $body->diskon,
			'biaya_kirim' => $body->biaya_kirim,
			'net_total' => $body->net_total,
			'metode_penerimaan' => $body->metode_penerimaan,
			'jml_penerimaan' => $body->jml_penerimaan,
			'metode_penerimaan2' => $body->metode_penerimaan2,
			'jml_penerimaan2' => $body->jml_penerimaan2,
			'jml_bayar' => $body->jml_bayar,
			'sisa_bayar' => $body->sisa_bayar,
			'nama_penerima' => $body->nama_penerima,
			'alamat_penerima' => $body->alamat_penerima,
			'keterangan' => $body->keterangan,
			'seq' => $body->seq,
			'termin_hutang' => $body->termin_hutang,
			'kode_inv' => date('dmy'),
			'sub_total' => $body->sub_total,
			'biaya_lain' => $body->biaya_lain,
			'ket_biaya_lain' => $body->ket_biaya_lain,
			'deposit' => $body->deposit,
			'jenis_diskon' => $body->jenis_diskon,
			// PER ITEM
			'kode_barang' => $kode_barang,
			'hj_retail' => $hj_retail,
			'qty' => $qty,
			'free' => $free,
			'sub_total_barang' => $sub_total_barang,
			'sub_total_berat' => $sub_total_berat,
			'nama_tabel' => $nama_tabel, // Jenis brang
			'on_hand' => $on_hand,
			'hj_retail_baru' => $hj_retail_baru,
			'kode' => $kode
		);
		//var_dump($data);

		// $this->getResponse()->setHttpResponseCode(200);
		// $this->_helper->json->sendJson(([
		//     'request' => $nama_tabel,
		//     'status' => 'OK',
		//     'message' => 'Berhasil disimpan',
		//     'status' => 200,
		//     'error' => false
		// ]));

		try {
			//$this->view->result = $this->Salecentral_Service->revisidata($data);
		
			$this->view->result = $this->Salecentral_Service->revisidata($data);
			// if ($body->btnSubmit=="edit"){
			// }else{
			// 	$this->view->result = $this->Salecentral_Service->revisidata($data);
			// }
			

			if ($this->view->result == 'sukses') {
				$this->getResponse()->setHttpResponseCode(200);
				$this->_helper->json->sendJson(([
					'status' => 'OK',
					'message' => 'Berhasil disimpan',
					'status' => 200,
					'error' => false
				]));
			} else {
				$this->getResponse()->setHttpResponseCode(500);
				$this->_helper->json->sendJson([
					'status' => 'OK',
					'message' => 'Gagal disimpan',
					'status' => 500,
					'error' => false
				]);
			}
			//code...
		} catch (\Exception $e) {
			//throw $th;
			$this->getResponse()->setHttpResponseCode(500);
			$this->_helper->json->sendJson(json_encode($e));
		}
		// echo json_encode(['status' => 'ok']);
		// echo 'tes';
		// $this->getResponse()->setHttpResponseCode(200);


	}

	public function detailAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$no_invoice_data   = $_GET['id'];
		$this->view->no_invoice_data = $no_invoice_data;

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$kode_customer = $temp_salecentral[0]['kode_customer'];
		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);

		$this->view->data3 = $this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$this->view->seq = $this->Salecentral_Service->getNoSeq();
		$this->view->rek = $this->Salecentral_Service->getRekening();
	}

	public function printsalecentralAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$no_invoice_data   = $_GET['no_invoice'];
		$this->view->no_invoice_data = $no_invoice_data;

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$kode_customer = $temp_salecentral[0]['kode_customer'];
		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);

		$this->view->data3 = $this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$this->view->seq = $this->Salecentral_Service->getNoSeq();
		$this->view->rek = $this->Salecentral_Service->getRekening();
	}

	public function kirimdataeditAction()
	{

		$this->_helper->layout->setLayout('salecentral-layout');

		$no_invoice 	 	= '';
		$no_invoice_revisi 	= '';
		$no_invoice_original= '';
		$tgl_invoice	 	= '';
		$kode_customer   	= '';
		$shipment		 	= '';
		$nama_kurir		 	= '';
		$total_berat	 	= '';
		$total_biaya	 	= '';
		$diskon		 	 	= '';
		$biaya_kirim 	 	= '';
		$net_total	 	 	= '';
		$metode_penerimaan	= '';
		$jml_penerimaan 	= '';
		$metode_penerimaan2	= '';
		$jml_penerimaan2 	= '';
		$jml_bayar		 	= '';
		$sisa_bayar		 	= '';
		$nama_penerima	 	= '';
		$alamat_penerima 	= '';
		$keterangan		 	= '';
		$seq		 	 	= '';
		$termin_hutang		 	 	= '';
		$kode_inv 		 	= date('dmy');

		$kode_barang	 	= '';
		$hj_retail		 	= '';
		$qty			 	= '';
		$free			 	= '';
		// $sub_total		 	= '';
		$sub_total_berat 	= '';

		$sub_total_barang = '';
		$sub_total		 	= '';
		$biaya_lain		 	= '';
		$ket_biaya_lain		 	= '';
		$deposit		 	= '';
		$jenis_diskon		 	= '';

		$nama_tabel 	 	= '';
		$on_hand 		 	= '';
		$hj_retail_baru  	= '';
		$kode 				= '';

		$btnSubmit          ='';

		if (isset($_POST['no_invoice'])) {
			$no_invoice = $_POST['no_invoice'];
		}
		if (isset($_POST['no_invoice_revisi'])) {
			$no_invoice_revisi = $_POST['no_invoice_revisi'];
		}
		if (isset($_POST['no_invoice_original'])) {
			$no_invoice_original = $_POST['no_invoice_original'];
		}

		if (isset($_POST['tgl_invoice'])) {
			$tgl_invoice = $_POST['tgl_invoice'];
		}
		if (isset($_POST['kode_customer2'])) {
			$kode_customer = $_POST['kode_customer2'];
		}
		if (isset($_POST['shipment'])) {
			$shipment = $_POST['shipment'];
		}
		if (isset($_POST['nama_kurir'])) {
			$nama_kurir = $_POST['nama_kurir'];
		}
		if (isset($_POST['total_berat'])) {
			$total_berat = $_POST['total_berat'];
		}
		if (isset($_POST['total_biaya'])) {
			$total_biaya = $_POST['total_biaya'];
		}
		if (isset($_POST['diskon'])) {
			$diskon = $_POST['diskon'];
		}
		if (isset($_POST['biaya_kirim'])) {
			$biaya_kirim = $_POST['biaya_kirim'];
		}
		if (isset($_POST['net_total'])) {
			$net_total = $_POST['net_total'];
		}
		if (isset($_POST['metode_penerimaan'])) {
			$metode_penerimaan = $_POST['metode_penerimaan'];
		}
		if (isset($_POST['jml_penerimaan'])) {
			$jml_penerimaan = $_POST['jml_penerimaan'];
		}
		if (isset($_POST['metode_penerimaan2'])) {
			$metode_penerimaan2 = $_POST['metode_penerimaan2'];
		}
		if (isset($_POST['jml_penerimaan2'])) {
			$jml_penerimaan2 = $_POST['jml_penerimaan2'];
		}
		if (isset($_POST['jml_bayar'])) {
			$jml_bayar = $_POST['jml_bayar'];
		}
		if (isset($_POST['sisa_bayar'])) {
			$sisa_bayar = $_POST['sisa_bayar'];
		}
		if (isset($_POST['nama_penerima'])) {
			$nama_penerima = $_POST['nama_penerima'];
		}
		if (isset($_POST['alamat_penerima'])) {
			$alamat_penerima = $_POST['alamat_penerima'];
		}
		if (isset($_POST['keterangan'])) {
			$keterangan = $_POST['keterangan'];
		}
		if (isset($_POST['seq'])) {
			$seq = $_POST['seq'];
		}
		if (isset($_POST['termin_hutang'])) {
			$termin_hutang = $_POST['termin_hutang'];
		}

		if (isset($_POST['kode_barang'])) {
			$kode_barang = $_POST['kode_barang'];
		}
		if (isset($_POST['hj_retail'])) {
			$hj_retail = $_POST['hj_retail'];
		}
		if (isset($_POST['qty'])) {
			$qty = $_POST['qty'];
		}
		if (isset($_POST['free'])) {
			$free = $_POST['free'];
		}
		// if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
		if (isset($_POST['sub_total_berat'])) {
			$sub_total_berat = $_POST['sub_total_berat'];
		}

		if (isset($_POST['sub_total_barang'])) {
			$sub_total_barang = $_POST['sub_total_barang'];
		}
		if (isset($_POST['sub_total'])) {
			$sub_total = $_POST['sub_total'];
		}
		if (isset($_POST['jenis_diskon'])) {
			$jenis_diskon = $_POST['jenis_diskon'];
		}
		if (isset($_POST['biaya_lain'])) {
			$biaya_lain = $_POST['biaya_lain'];
		}
		if (isset($_POST['ket_biaya_lain'])) {
			$ket_biaya_lain = $_POST['ket_biaya_lain'];
		}
		if (isset($_POST['deposit'])) {
			$deposit = $_POST['deposit'];
		}

		if (isset($_POST['nama_tabel'])) {
			$nama_tabel = $_POST['nama_tabel'];
		}
		if (isset($_POST['on_hand'])) {
			$on_hand = $_POST['on_hand'];
		}
		if (isset($_POST['hj_retail_baru'])) {
			$hj_retail_baru = $_POST['hj_retail_baru'];
		}
		if (isset($_POST['kode'])) {
			$kode = $_POST['kode'];
		}

		if (isset($_POST['btnSubmit'])) {
			$btnSubmit = $_POST['btnSubmit'];
		}

		$total_berat = str_replace(".", "", $total_berat);
		$total_biaya = str_replace(".", "", $total_biaya);
		$biaya_kirim = str_replace(".", "", $biaya_kirim);
		$diskon = str_replace(".", "", $diskon);
		$net_total = str_replace(".", "", $net_total);
		$jml_penerimaan = str_replace(".", "", $jml_penerimaan);
		$jml_penerimaan2 = str_replace(".", "", $jml_penerimaan2);
		$jml_bayar = str_replace(".", "", $jml_bayar);
		$sisa_bayar = str_replace(".", "", $sisa_bayar);
		$hj_retail = str_replace(".", "", $hj_retail);
		$qty = str_replace(".", "", $qty);
		$free = str_replace(".", "", $free);
		$biaya_lain = str_replace(".", "", $biaya_lain);
		$deposit = str_replace(".", "", $deposit);
		$sub_total = str_replace(".", "", $sub_total);
		$sub_total_berat = str_replace(".", "", $sub_total_berat);
		$on_hand = str_replace(".", "", $on_hand);

		$data = array(
			'no_invoice' => $no_invoice,
			'no_invoice_revisi' => $no_invoice_revisi,
			'no_invoice_original' => $no_invoice_original,
			'tgl_invoice' => date("Y-m-d H:i", strtotime(str_replace('/', '-', $tgl_invoice))),
			'kode_customer' => $kode_customer,
			'shipment' => $shipment,
			'nama_kurir' => $nama_kurir,
			'total_berat' => $total_berat,
			'total_biaya' => $total_biaya,
			'diskon' => $diskon,
			'biaya_kirim' => $biaya_kirim,
			'net_total' => $net_total,
			'metode_penerimaan' => $metode_penerimaan,
			'jml_penerimaan' => $jml_penerimaan,
			'metode_penerimaan2' => $metode_penerimaan2,
			'jml_penerimaan2' => $jml_penerimaan2,
			'jml_bayar' => $jml_bayar,
			'sisa_bayar' => $sisa_bayar,
			'nama_penerima' => $nama_penerima,
			'alamat_penerima' => $alamat_penerima,
			'keterangan' => $keterangan,
			'seq' => $seq,
			'termin_hutang' => $termin_hutang,
			'kode_inv' => $kode_inv,
			'kode_barang' => $kode_barang,
			'hj_retail' => $hj_retail,
			'qty' => $qty,
			'free' => $free,
			'sub_total_barang' => $sub_total_barang,
			'sub_total' => $sub_total,
			'biaya_lain' => $biaya_lain,
			'ket_biaya_lain' => $ket_biaya_lain,
			'deposit' => $deposit,
			'jenis_diskon' => $jenis_diskon,
			'sub_total_berat' => $sub_total_berat,
			'nama_tabel' => $nama_tabel,
			'on_hand' => $on_hand,
			'hj_retail_baru' => $hj_retail_baru,
			'kode' => $kode
		);

		if ($btnSubmit=="edit"){
			$this->view->datainsert = $this->Salecentral_Service->editdata($data);

		}else{
			$this->view->datainsert = $this->Salecentral_Service->revisidata($data);

		}
	
	}

	public function approvalAction()
	{
		$this->_helper->layout->setLayout('target-column');

		$no_invoice_data   = $_GET['id'];
		$this->view->no_invoice_data = $no_invoice_data;

		$this->view->Salecentral_Service = $this->Salecentral_Service;

		$this->view->data = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$temp_salecentral = $this->Salecentral_Service->getDataSaleCentral($no_invoice_data);
		$kode_customer = $temp_salecentral[0]['kode_customer'];
		$this->view->data2 = $this->Salecentral_Service->getdatacustomerid($kode_customer);

		$this->view->data3 = $this->Salecentral_Service->getDataDetailSaleCentral($no_invoice_data);

		$this->view->customer = $this->Salecentral_Service->getCustomer();
		$this->view->warna = $this->Salecentral_Service->getWarna();
		$this->view->seq = $this->Salecentral_Service->getNoSeq();
		$this->view->rek = $this->Salecentral_Service->getRekening();
	}

	public function kirimdataapproveAction() { 
	
		$this->_helper->layout->setLayout('salecentral-layout');
		
		$no_invoice 	 	= '';
		$tgl_invoice	 	= '';
		$kode_customer   	= '';
		$shipment		 	= '';
		$nama_kurir		 	= '';
		$total_berat	 	= '';
		$total_biaya	 	= '';
		$diskon		 	 	= '';
		$biaya_kirim 	 	= '';
		$net_total	 	 	= '';
		$metode_penerimaan	= '';
		$jml_penerimaan 	= '';
		$metode_penerimaan2	= '';
		$jml_penerimaan2 	= '';
		$jml_bayar		 	= '';
		$sisa_bayar		 	= '';
		$nama_penerima	 	= '';
		$alamat_penerima 	= '';
		$keterangan		 	= '';
		$seq		 	 	= ''; 
		$kode_inv 		 	= date('dmy');
		
		$kode_barang	 	= '';
		$hj_retail		 	= '';
		$qty			 	= '';
		$free			 	= '';
		$sub_total		 	= '';
		$sub_total_berat 	= '';
		$stok_gudang		= '';
			
		$nama_tabel 	 	= '';
		$on_hand 		 	= '';
		$hj_retail_baru  	= '';
		$kode 				= '';
		$no_invoice_original = '';
		
		if(isset($_POST['no_invoice_original'])){ $no_invoice_original = $_POST['no_invoice_original'];}

		if(isset($_POST['no_invoice'])){ $no_invoice = $_POST['no_invoice'];}
		if(isset($_POST['tgl_invoice'])){ $tgl_invoice = $_POST['tgl_invoice'];}
		if(isset($_POST['kode_customer2'])){ $kode_customer = $_POST['kode_customer2'];}
		if(isset($_POST['shipment'])){ $shipment = $_POST['shipment'];}
		if(isset($_POST['nama_kurir'])){ $nama_kurir = $_POST['nama_kurir'];}
		if(isset($_POST['total_berat'])){ $total_berat = $_POST['total_berat'];}
		if(isset($_POST['total_biaya'])){ $total_biaya = $_POST['total_biaya'];}
		if(isset($_POST['diskon'])){ $diskon = $_POST['diskon'];}
		if(isset($_POST['biaya_kirim'])){ $biaya_kirim = $_POST['biaya_kirim'];}
		if(isset($_POST['net_total'])){ $net_total = $_POST['net_total'];}
		if(isset($_POST['metode_penerimaan'])){ $metode_penerimaan = $_POST['metode_penerimaan'];}
		if(isset($_POST['jml_penerimaan'])){ $jml_penerimaan = $_POST['jml_penerimaan'];}
		if(isset($_POST['metode_penerimaan2'])){ $metode_penerimaan2 = $_POST['metode_penerimaan2'];}
		if(isset($_POST['jml_penerimaan2'])){ $jml_penerimaan2 = $_POST['jml_penerimaan2'];}
		if(isset($_POST['jml_bayar'])){ $jml_bayar = $_POST['jml_bayar'];}
		if(isset($_POST['sisa_bayar'])){ $sisa_bayar = $_POST['sisa_bayar'];}
		if(isset($_POST['nama_penerima'])){ $nama_penerima = $_POST['nama_penerima'];}
		if(isset($_POST['alamat_penerima'])){ $alamat_penerima = $_POST['alamat_penerima'];}
		if(isset($_POST['keterangan'])){ $keterangan = $_POST['keterangan'];}
		if(isset($_POST['seq'])){ $seq = $_POST['seq'];}
		
		if(isset($_POST['kode_barang'])){ $kode_barang = $_POST['kode_barang'];}
		if(isset($_POST['hj_retail'])){ $hj_retail = $_POST['hj_retail'];}
		if(isset($_POST['qty'])){ $qty = $_POST['qty'];}
		if(isset($_POST['free'])){ $free = $_POST['free'];}
		if(isset($_POST['sub_total'])){ $sub_total = $_POST['sub_total'];}
		if(isset($_POST['sub_total_berat'])){ $sub_total_berat = $_POST['sub_total_berat'];}
		if(isset($_POST['stok_gudang'])){ $stok_gudang = $_POST['stok_gudang'];}
		
		if(isset($_POST['nama_tabel'])){ $nama_tabel = $_POST['nama_tabel'];}
		if(isset($_POST['on_hand'])){ $on_hand = $_POST['on_hand'];}
		if(isset($_POST['hj_retail_baru'])){ $hj_retail_baru = $_POST['hj_retail_baru'];}
		if(isset($_POST['kode'])){ $kode = $_POST['kode'];}
		
		$total_berat= str_replace(".", "", $total_berat);
		$total_biaya= str_replace(".", "", $total_biaya);
		$biaya_kirim= str_replace(".", "", $biaya_kirim);
		$diskon= str_replace(".", "", $diskon);
		$net_total= str_replace(".", "", $net_total);
		$jml_penerimaan= str_replace(".", "", $jml_penerimaan);
		$jml_penerimaan2= str_replace(".", "", $jml_penerimaan2);
		$jml_bayar= str_replace(".", "", $jml_bayar);
		$sisa_bayar= str_replace(".", "", $sisa_bayar);
		$hj_retail= str_replace(".", "", $hj_retail);
		$qty= str_replace(".", "", $qty);
		$free= str_replace(".", "", $free);
		$sub_total= str_replace(".", "", $sub_total);
		$sub_total_berat= str_replace(".", "", $sub_total_berat);
		$on_hand= str_replace(".", "", $on_hand);
		$stok_gudang= str_replace(".", "", $stok_gudang);
		
		$data = array('no_invoice' => $no_invoice,
					  'no_invoice_original' => $no_invoice_original,
					  'tgl_invoice' =>date("Y-m-d H:i", strtotime(str_replace('/', '-', $tgl_invoice))),
					  'kode_customer' => $kode_customer,
					  'shipment' => $shipment,
					  'nama_kurir' => $nama_kurir,
					  'total_berat' => $total_berat,
					  'total_biaya' => $total_biaya,
					  'diskon' => $diskon,
					  'biaya_kirim' => $biaya_kirim,
					  'net_total' => $net_total,
					  'metode_penerimaan' => $metode_penerimaan,
					  'jml_penerimaan' => $jml_penerimaan,
					  'metode_penerimaan2' => $metode_penerimaan2,
					  'jml_penerimaan2' => $jml_penerimaan2,
					  'jml_bayar' => $jml_bayar,
					  'sisa_bayar' => $sisa_bayar,
					  'nama_penerima' => $nama_penerima,
					  'alamat_penerima' => $alamat_penerima,
					  'keterangan' => $keterangan,
					  'seq' => $seq,
					  'kode_inv' => $kode_inv,
					  'kode_barang' => $kode_barang,
					  'hj_retail' => $hj_retail,
					  'qty' => $qty,
					  'free' => $free,
					  'sub_total' => $sub_total,
					  'sub_total_berat' => $sub_total_berat,
					  'stok_gudang' => $stok_gudang,
					  'nama_tabel' => $nama_tabel,
					  'on_hand' => $on_hand,
					  'hj_retail_baru' => $hj_retail_baru,
					  'kode' => $kode);
		
		$this->view->datainsert=$this->Salecentral_Service->approvedata($data);
   }

	public function kirimdataapprove2Action()
	{

		$this->_helper->layout->setLayout('salecentral-layout');

		$no_invoice 	 	= '';
		$tgl_invoice	 	= '';
		$kode_customer   	= '';
		$shipment		 	= '';
		$nama_kurir		 	= '';
		$total_berat	 	= '';
		$total_biaya	 	= '';
		$diskon		 	 	= '';
		$biaya_kirim 	 	= '';
		$net_total	 	 	= '';
		$metode_penerimaan	= '';
		$jml_penerimaan 	= '';
		$metode_penerimaan2	= '';
		$jml_penerimaan2 	= '';
		$jml_bayar		 	= '';
		$sisa_bayar		 	= '';
		$nama_penerima	 	= '';
		$alamat_penerima 	= '';
		$keterangan		 	= '';
		$seq		 	 	= '';
		$kode_inv 		 	= date('dmy');

		$kode_barang	 	= '';
		$hj_retail		 	= '';
		$qty			 	= '';
		$free			 	= '';
		$sub_total		 	= '';
		$sub_total_berat 	= '';
		$stok_gudang		= '';

		$nama_tabel 	 	= '';
		$on_hand 		 	= '';
		$hj_retail_baru  	= '';
		$kode 				= '';

		if (isset($_POST['no_invoice'])) {
			$no_invoice = $_POST['no_invoice'];
		}
		if (isset($_POST['tgl_invoice'])) {
			$tgl_invoice = $_POST['tgl_invoice'];
		}
		if (isset($_POST['kode_customer2'])) {
			$kode_customer = $_POST['kode_customer2'];
		}
		if (isset($_POST['shipment'])) {
			$shipment = $_POST['shipment'];
		}
		if (isset($_POST['nama_kurir'])) {
			$nama_kurir = $_POST['nama_kurir'];
		}
		if (isset($_POST['total_berat'])) {
			$total_berat = $_POST['total_berat'];
		}
		if (isset($_POST['total_biaya'])) {
			$total_biaya = $_POST['total_biaya'];
		}
		if (isset($_POST['diskon'])) {
			$diskon = $_POST['diskon'];
		}
		if (isset($_POST['biaya_kirim'])) {
			$biaya_kirim = $_POST['biaya_kirim'];
		}
		if (isset($_POST['net_total'])) {
			$net_total = $_POST['net_total'];
		}
		if (isset($_POST['metode_penerimaan'])) {
			$metode_penerimaan = $_POST['metode_penerimaan'];
		}
		if (isset($_POST['jml_penerimaan'])) {
			$jml_penerimaan = $_POST['jml_penerimaan'];
		}
		if (isset($_POST['metode_penerimaan2'])) {
			$metode_penerimaan2 = $_POST['metode_penerimaan2'];
		}
		if (isset($_POST['jml_penerimaan2'])) {
			$jml_penerimaan2 = $_POST['jml_penerimaan2'];
		}
		if (isset($_POST['jml_bayar'])) {
			$jml_bayar = $_POST['jml_bayar'];
		}
		if (isset($_POST['sisa_bayar'])) {
			$sisa_bayar = $_POST['sisa_bayar'];
		}
		if (isset($_POST['nama_penerima'])) {
			$nama_penerima = $_POST['nama_penerima'];
		}
		if (isset($_POST['alamat_penerima'])) {
			$alamat_penerima = $_POST['alamat_penerima'];
		}
		if (isset($_POST['keterangan'])) {
			$keterangan = $_POST['keterangan'];
		}
		if (isset($_POST['seq'])) {
			$seq = $_POST['seq'];
		}

		if (isset($_POST['kode_barang'])) {
			$kode_barang = $_POST['kode_barang'];
		}
		if (isset($_POST['hj_retail'])) {
			$hj_retail = $_POST['hj_retail'];
		}
		if (isset($_POST['qty'])) {
			$qty = $_POST['qty'];
		}
		if (isset($_POST['free'])) {
			$free = $_POST['free'];
		}
		if (isset($_POST['sub_total'])) {
			$sub_total = $_POST['sub_total'];
		}
		if (isset($_POST['sub_total_berat'])) {
			$sub_total_berat = $_POST['sub_total_berat'];
		}
		if (isset($_POST['stok_gudang'])) {
			$stok_gudang = $_POST['stok_gudang'];
		}

		if (isset($_POST['nama_tabel'])) {
			$nama_tabel = $_POST['nama_tabel'];
		}
		if (isset($_POST['on_hand'])) {
			$on_hand = $_POST['on_hand'];
		}
		if (isset($_POST['hj_retail_baru'])) {
			$hj_retail_baru = $_POST['hj_retail_baru'];
		}
		if (isset($_POST['kode'])) {
			$kode = $_POST['kode'];
		}

		$total_berat = str_replace(".", "", $total_berat);
		$total_biaya = str_replace(".", "", $total_biaya);
		$biaya_kirim = str_replace(".", "", $biaya_kirim);
		$diskon = str_replace(".", "", $diskon);
		$net_total = str_replace(".", "", $net_total);
		$jml_penerimaan = str_replace(".", "", $jml_penerimaan);
		$jml_penerimaan2 = str_replace(".", "", $jml_penerimaan2);
		$jml_bayar = str_replace(".", "", $jml_bayar);
		$sisa_bayar = str_replace(".", "", $sisa_bayar);
		$hj_retail = str_replace(".", "", $hj_retail);
		$qty = str_replace(".", "", $qty);
		$free = str_replace(".", "", $free);
		$sub_total = str_replace(".", "", $sub_total);
		$sub_total_berat = str_replace(".", "", $sub_total_berat);
		$on_hand = str_replace(".", "", $on_hand);
		$stok_gudang = str_replace(".", "", $stok_gudang);

		$data = array(
			'no_invoice' => $no_invoice,
			'tgl_invoice' => $tgl_invoice,
			'kode_customer' => $kode_customer,
			'shipment' => $shipment,
			'nama_kurir' => $nama_kurir,
			'total_berat' => $total_berat,
			'total_biaya' => $total_biaya,
			'diskon' => $diskon,
			'biaya_kirim' => $biaya_kirim,
			'net_total' => $net_total,
			'metode_penerimaan' => $metode_penerimaan,
			'jml_penerimaan' => $jml_penerimaan,
			'metode_penerimaan2' => $metode_penerimaan2,
			'jml_penerimaan2' => $jml_penerimaan2,
			'jml_bayar' => $jml_bayar,
			'sisa_bayar' => $sisa_bayar,
			'nama_penerima' => $nama_penerima,
			'alamat_penerima' => $alamat_penerima,
			'keterangan' => $keterangan,
			'seq' => $seq,
			'kode_inv' => $kode_inv,
			'kode_barang' => $kode_barang,
			'hj_retail' => $hj_retail,
			'qty' => $qty,
			'free' => $free,
			'sub_total' => $sub_total,
			'sub_total_berat' => $sub_total_berat,
			'stok_gudang' => $stok_gudang,
			'nama_tabel' => $nama_tabel,
			'on_hand' => $on_hand,
			'hj_retail_baru' => $hj_retail_baru,
			'kode' => $kode
		);

		$this->view->datainsert = $this->Salecentral_Service->approvedata2($data);
	}
}
// >>>>>>> 05e1679a2537ded58c20ecac1d29d7d72d0b601d
