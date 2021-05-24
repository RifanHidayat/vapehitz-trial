<?php
class Akun_Service
{
    private static $instance;
    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }


    public function getmenu()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from menu where source = 'akun' ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }



    public function getNoSeq()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');


        try {
            $query = "select max(seq) FROM volliquid";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getSupplier()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select * FROM supplier Order by kode_supplier Asc";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getRasa()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select * FROM rasa_liquid Order by kode_rasa Asc";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getdatasupplierid($kode_supplier)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select * FROM supplier where kode_supplier = '$kode_supplier'";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getlistliquid()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from akun ORDER BY id DESC";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getDataLiquid($id)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {

            $query = "SELECT *,transaksi.id as id_transaksi,akun.id as id_akun,transaksi.type as type_transaksi,akun.type as type_akun from transaksi  JOIN akun on akun.id=transaksi.id_akun where transaksi.id_akun = '$id'   order by transaksi.id ASC";
            $result = $db->fetchAll($query);
            //$query = "SELECT * from akun where id = '$id'";
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function insertdata(array $data)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
            $db->beginTransaction();

            $insdata = array(
                "nama_akun" => $data['nama_akun'],
                "saldo_awal" => $data['saldo_awal'],
                "no_akun" => "0",
                "type" => $data['type'],


            );

            $db->insert('akun', $insdata);
            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }

    public function editdata(array $data)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
            $db->beginTransaction();

            $id = $data['id'];

            $insdata = array(
                "nama_akun" => $data['nama_akun'],
                "saldo_awal" => $data['saldo_awal'],
                "type" => $data['type'],
            );


            $where = "id = '" . $id . "'";

            $db->update('akun', $insdata, $where);
            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }

    public function hapusData($dataInput)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
            $db->beginTransaction();

            $id = $dataInput['id'];

            $where = "id = '" . $id . "'";

            $db->delete('akun', $where);
            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }

    public function getSeq($id_id_volume)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select max(seq_id_volume) FROM liquid where id_id_volume = '$id_id_volume'";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getNamaSupplier($kode_supplier)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select nama_supplier FROM supplier where kode_supplier = '$kode_supplier'";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getDataTransaksi($id)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');



        try {
            $count = "select count(*) as jml from transaksi where id_akun='$id'";
            $count1 = $db->fetchAll($count);





            if ($count1[0]['jml'] > 0) {

                $query = "SELECT saldo_awal as opening_balance, SUM(if((transaksi.Type='Cash In'),nominal,0)) as cashin,SUM(if((transaksi.type='Cash out'),nominal,0)) as cashout  from transaksi  JOIN akun on akun.id=transaksi.id_akun where transaksi.id_akun = '$id' ";

                $result = $db->fetchAll($query);
            } else {
                $query = "SELECT saldo_awal as opening_balance ,(saldo_awal-saldo_awal) as cashin,(saldo_awal-saldo_awal) as cashout from akun where id='$id'";

                $result = $db->fetchAll($query);
            }
            // $query = "SELECT saldo_awal as opening_balance ,(saldo_awal-saldo_awal) as cashin,(saldo_awal-saldo_awal) as cashout from akun where id='$id'";
            // $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getDataBalance($id)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');


        try {

            $count = "select count(*) as jml from transaksi where id_akun='$id'";
            $count1 = $db->fetchAll($count);
            if ($count1[0]['jml'] > 0) {
                $query = "SELECT  (saldo_awal +SUM(if((transaksi.Type='Cash In'),nominal,0)) - SUM(if((transaksi.type='Cash out'),nominal,0))) as balance    from transaksi  JOIN akun on akun.id=transaksi.id_akun where transaksi.id_akun = '$id' ";
                $result = $db->fetchAll($query);
            } else {
                $query = "SELECT saldo_awal as balance ,(saldo_awal-saldo_awal) as cashin,(saldo_awal-saldo_awal) as cashout from akun where id='$id'";
                $result = $db->fetchAll($query);
            }
            $result = $db->fetchAll($query);
            $result1 = json_encode($result);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getDaataNamaAkun($id)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from akun where id='$id' ";




            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getlistjenisexpense()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from jenisexpense order by id ASC ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getlistakun()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from akun order by id ASC ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
}
