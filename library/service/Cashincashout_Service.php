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
            $query ="SELECT *,tb_cashincashout.id as id_cashincashout FROM tb_cashincashout JOIN akun ON tb_cashincashout.id_akun=akun.id order by tgl_cashincashout ASC";
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
           $query ="SELECT *,tb_cashincashout.id as id_cashincashout FROM tb_cashincashout JOIN akun ON tb_cashincashout.id_akun=akun.id where tb_cashincashout.id='$id'";

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
        
        

            $insdata_transaksi= array(
                         "deskripsi" => "",
                         "tgl_transaksi" => $data['tgl_transaksi'],
                         "nominal" => $data['nominal'],
                         "type" => $data['type'],
                         "nama_table" => "tb_cashincashout",
                         "id_table" =>$id_transaksi,
                         "id_table_original" => "",
                         "id_akun" => $data['id_akun']);
                         $jml_revisi_update=array(
                        "no_revisi"=>$data['jml_revisi']+1
                        );


         $insdata = array("tgl_cashincashout" => $data['tgl_transaksi'],
                         "jenis_expense" => $data['id_jenisexpense'],
                         "nominal" => $data['nominal'],
                         "catatan" => $data['catatan'],
                        "id_akun" => $data['id_akun'],
                          "id_transaksi" => $id_transaksi,
                         "status_uang" => $data['type']);
                    
        $db->insert('transaksi',$insdata_transaksi);

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
        
     
         $insdata_transaksi= array(
                         "deskripsi" => "",
                         "tgl_transaksi" => $data['tgl_transaksi'],
                         "nominal" => $data['nominal'],
                         "type" => $data['type'],
                         "nama_table" => "tb_cashincashout",
                         "id_table" =>$id_transaksi,
                         "id_table_original" => "",
                         "id_akun" => $data['id_akun']);
                       


         $insdata = array("tgl_cashincashout" => $data['tgl_transaksi'],
                         "jenis_expense" => $data['id_jenisexpense'],
                         "nominal" => $data['nominal'],
                         "catatan" => $data['catatan'],
                        "id_akun" => $data['id_akun'],
                        
                         "status_uang" => $data['type']);
                         
        $where = "id = '".$id."'";
         $where = "id_transaksi = '".$id_transaksi."'";
                    
        $db->update('tb_cashincashout',$insdata,$where);
        $db->update('tb_cashincashout',$insdata_transaksi,$where_transaksi);
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