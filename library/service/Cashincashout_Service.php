<?php
class Cashincashout_Service{
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
    
    public function getmenu() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="SELECT * from menu where source = 'cashincashout' ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    
    public function getNoSeq() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select max(seq) FROM volliquid";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    
    public function getSupplier() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select * FROM supplier Order by kode_supplier Asc";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    
    public function getRasa() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select * FROM rasa_liquid Order by kode_rasa Asc";
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
    
    public function getlistliquid() {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="SELECT *,tb_cashincashout.id as id_cashincashout FROM tb_cashincashout  order by tgl_cashincashout ASC";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getlistjenisexpense(){
         $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="SELECT * from jenisexpense order by id ASC ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }

    }
    public function getlistakun(){
         $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            //$query ="SELECT * from akun where akun.type Not In ('None')  AND akun.id Not In ('23') order by id ASC ";
           
            $query ="SELECT * from akun order by id ASC ";
           
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }

    }
    
    
    public function getDataLiquid($id) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
           $query ="SELECT *,tb_cashincashout.id as id_cashincashout FROM tb_cashincashout  where tb_cashincashout.id='$id'";

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
        $date = new DateTime();
        $id_transaksi=$date->getTimestamp();


        
        

            $insdata_transaksi_in= array(
                "deskripsi" => "Transaksi In Out",
                         "tgl_transaksi" => $data['tgl_transaksi'],
                         "nominal" => $data['nominal'],
                         "type" => "Cash In",
                         "nama_table" => "tb_cashincashout",
                         "id_table" =>$id_transaksi,
                         "id_table_original" => $id_transaksi,
                           "catatan" => $data['catatan'],
                         "id_akun" => $data['id_akun_in']);
                         
                         $insdata_transaksi_out= array(
                            "deskripsi" => "Transaksi In Out",
                         "tgl_transaksi" => $data['tgl_transaksi'],
                         "nominal" => $data['nominal'],
                         "type" => "Cash Out",
                         "nama_table" => "tb_cashincashout",
                         "id_table" =>$id_transaksi,
                         "id_table_original" => $id_transaksi,
                           "catatan" => $data['catatan'],
                         "id_akun" => $data['id_akun_out']);
                         


         $insdata = array("tgl_cashincashout" => $data['tgl_transaksi'],
                         "nominal" => $data['nominal'],
                        "catatan" => $data['catatan'],
                        "akun_in" => $data['id_akun_in'],
                        "akun_out" => $data['id_akun_out'],
                          "id_transaksi" => $id_transaksi,
                                "nama_akun_in"=>$data['nama_akun_in'],
                          "nama_akun_out"=>$data['nama_akun_out']
                          );
                  
         $db->insert('transaksi',$insdata_transaksi_in);
        $db->insert('transaksi',$insdata_transaksi_out);

        $db->insert('tb_cashincashout',$insdata);
        $db->commit();
        return 'sukses';
       } catch (Exception $e) {
         $db->rollBack();
         echo $e->getMessage().'<br>';
         return 'gagal';
       }
    }
    
    public function editdata(array $data){
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
        $db->beginTransaction();
        
        $id = $data['id'];
        $id_transaksi = $data['id_transaksi'];
        
     
        $insdata_transaksi_in= array(
            "deskripsi" => "Transaksi In Out",
            "tgl_transaksi" => $data['tgl_transaksi'],
            "nominal" => $data['nominal'],
            
            "nama_table" => "tb_cashincashout",
           
              "catatan" => $data['catatan'],
            "id_akun" => $data['id_akun_in']);
            
            $insdata_transaksi_out= array(
                "deskripsi" => "Transaksi In Out",
            "tgl_transaksi" => $data['tgl_transaksi'],
            "nominal" => $data['nominal'],
            "deskripsi" => "Transaksi In Out",
            
          
        
              "catatan" => $data['catatan'],
            "id_akun" => $data['id_akun_out']);
            


$insdata = array("tgl_cashincashout" => $data['tgl_transaksi'],
            "nominal" => $data['nominal'],
            "catatan" => $data['catatan'],
            "akun_in" => $data['id_akun_in'],
            "akun_out" => $data['id_akun_out'],
            // "id_transaksi" => $id_transaksi,
            "nama_akun_in"=>$data['nama_akun_in'],
            "nama_akun_out"=>$data['nama_akun_out']
             );
                         
          $where = "id = '".$id."'";
         
          $where_transaksi_in = "id_table = '".$id_transaksi."'AND nama_table='tb_cashincashout' AND type='Cash In'";
         
         $where_transaksi_out = "id_table = '".$id_transaksi."'AND nama_table='tb_cashincashout' AND type='Cash Out'";
         
         $db->update('transaksi',$insdata_transaksi_out,$where_transaksi_out);
         //$db->update('transaksi',$insdata_transaksi_in,$where_transaksi_in);
                    
        $db->update('tb_cashincashout',$insdata,$where);
       
        
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
        
        $id = $dataInput['id'];
        
        $id_transaksi = $dataInput['id_transaksi'];
        
        $where = "id = '".$id."'";
         $where_transaksi = "id_table = '".$id_transaksi."'";
                
        $db->delete('tb_cashincashout', $where);
         $db->delete('transaksi', $where_transaksi);
        $db->commit();
        return 'sukses';
       } catch (Exception $e) {
         $db->rollBack();
         echo $e->getMessage().'<br>';
         return 'gagal';
       }
    }
    
    public function getSeq($id_id_volume) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select max(seq_id_volume) FROM liquid where id_id_volume = '$id_id_volume'";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    
    public function getNamaSupplier($kode_supplier) {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query ="select nama_supplier FROM supplier where kode_supplier = '$kode_supplier'";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    
}
?>