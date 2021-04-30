<?php
class Master_Service {
    private static $instance;
    private function __construct() {
    }

    public static function getInstance() {
       if (!isset(self::$instance)) {
           $c = __CLASS__;
           self::$instance = new $c;
       }

       return self::$instance;
    }
    
    public function getlistsupplier() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
		
        try {
			
            $query ="SELECT * from supplier order by kode_supplier ASC ";
			
			$result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
	
	public function getmenusupplier() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="SELECT * from menu where source = 'supplier' ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
	
	public function getDataSupplier($kode_supplier_data) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="SELECT * from supplier where kode_supplier = '$kode_supplier_data'";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
	
	public function insertdata(array $data){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
	    $db->beginTransaction();
		
	    $insdata = array("kode_supplier" => $data['kode_supplier'],
						 "nama_supplier" => $data['nama_supplier'],
						 "alamat_supplier" => $data['alamat_supplier'],
						 "no_tlp" => $data['no_tlp'],
						 "no_hp" => $data['no_hp'],
						 "email" => $data['email'],
						 "tipe" => $data['tipe'],
						 "status" => $data['status']);
					
		$db->insert('supplier',$insdata);
		$db->commit();
	    return 'sukses';
	   } catch (Exception $e) {
         $db->rollBack();
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}
	
	public function hapusData($dataInput){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
	    $db->beginTransaction();
		
		$kode_supplier = $dataInput['kode_supplier'];
		
	    $where = "kode_supplier = '".$kode_supplier."'";
				
		$db->delete('supplier', $where);
		$db->commit();
	    return 'sukses';
	   } catch (Exception $e) {
         $db->rollBack();
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}
	
	public function getNoSeq() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select kode_supplier FROM supplier Order by kode_supplier Desc";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
	
	public function editdata(array $data){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
	    $db->beginTransaction();
		
		$kode_supplier = $data['kode_supplier'];
		
	    $insdata = array("nama_supplier" => $data['nama_supplier'],
						 "alamat_supplier" => $data['alamat_supplier'],
						 "no_tlp" => $data['no_tlp'],
						 "no_hp" => $data['no_hp'],
						 "email" => $data['email'],
						 "tipe" => $data['tipe'],
						 "status" => $data['status']);
						 
		$where = "kode_supplier = '".$kode_supplier."'";
					
		$db->update('supplier',$insdata,$where);
		$db->commit();
	    return 'sukses';
	   } catch (Exception $e) {
         $db->rollBack();
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}

        //payment un-finish
        public function getDataPayment($kode_supplier) {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
    
            try {
                $query ="SELECT SUM(sisa_bayar) AS total_sisabayar FROM ordercentral where kode_supplier='$kode_supplier' AND jml_bayar_dp!=net_total";
            
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }
        }

        public function getlistOrderCentral($kode_supplier) {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
    
            try {
                $query ="SELECT * from ordercentral where kode_supplier='$kode_supplier' order by case when sisa_bayar<=0 then 1 ELSE 0 END , tgl_order ASC  ";
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }

            
        }
        public function getdatasupplierid($kode_supplier) {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
    
            try {
                $query ="select * FROM supplier where kode_supplier = '$kode_supplier'";
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }

     
            
        }
        public function getDataNamaSupplier($kode_supplier) {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
    
            try {
                $query ="SELECT * FROM supplier where kode_supplier='$kode_supplier'";
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }
        }

     
        public function bayar(array $no_order, array $tgl_pembayaran,array $sisa_bayar,array $jml_bayar,array $catatan,$akun,$metode_bayar){
 
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
            try {
            $db->beginTransaction();
            $i = 0;
 

            foreach ($no_order as $row) 
            {

                //data update
                $dataupdate = array(
                    "jml_bayar_dp" => $jml_bayar[$i]+$sisa_bayar[$i],
                    "sisa_bayar" => "0");
                
                 
                $where = "no_order = '".$no_order[$i]."'";
                $tgl_pembayaran1	= date_create($tgl_pembayaran[$i]);
                $tgl_pembayaran2	= date_format($tgl_pembayaran1,"y-m-d");
            

                //insert data piutan
                $insdata_piutang = array("no_order" => $no_order[$i],
                "tgl_pembayaran" => $tgl_pembayaran2,
                "jumlah_pembayaran" => $jml_bayar[$i]+$sisa_bayar[$i],
                "sisa_pembayaran" => "0",
                "metode_pembayaran" => $metode_bayar,
                "catatan" => $catatan[$i],
                "tgl_entry"=> "0000-00-00 00:00:00",
                "no_rekening" => $akun);

            // insert data transaksi
            $insdata_transaksi= array(
                "deskripsi" => "Transaksi pembayaran supplier  \n".$no_order[$i],
                "tgl_transaksi" => $tgl_pembayaran2,
                "nominal" => $sisa_bayar[$i],
                "type" => "Cash Out",
                "catatan" => $catatan[$i],
                "nama_table" => "pembayaransupplier",
                "id_table" => $no_order[$i],
                "id_table_original"=>$no_order[$i],
                "id_akun" => $akun);

                $db->update('ordercentral',$dataupdate,$where);
                 $db->insert('hutang',$insdata_piutang);
                 $db->insert('transaksi',$insdata_transaksi);
            }
              
            
                        
           
            $db->commit();
            return 'sukses';
           } catch (Exception $e) {
             $db->rollBack();
             echo $e->getMessage().'<br>';
             return 'gagal';
           }
        } 
        
        public function getRekening() {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
     
    
            try {
                $query ="select * FROM akun where akun.type='Transfer' AND akun.type Not In ('None')  AND akun.id Not In ('23') Order by id Asc ";
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }
        }
        public function getCash() {
            $registry = Zend_Registry::getInstance();
            $db = $registry->get('db');
     
    
            try {
                $query ="select * FROM akun where akun.type='Cash' AND akun.type Not In ('None')  AND akun.id Not In ('23') Order by id Asc ";
                $result = $db->fetchAll($query);
                return $result;
            } catch (Exception $e) {
                echo $e->getMessage() . '<br>';
                return $e->getMessage(); //'Data tidak ada <br>';
            }
        }
        
}
?>