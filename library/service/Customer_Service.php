<?php
class Customer_Service
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
            $query = "SELECT * from menu where source = 'customer' ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getlistcustomer()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from customer order by kode_customer ASC ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getDataCustomer($kode_customer_data)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from customer where kode_customer = '$kode_customer_data'";
            $result = $db->fetchAll($query);
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
                "kode_customer" => $data['kode_customer'],
                "nama_customer" => $data['nama_customer'],
                "alamat_customer" => $data['alamat_customer'],
                "no_tlp" => $data['no_tlp'],
                "no_hp" => $data['no_hp'],
                "email" => $data['email'],
                "status" => $data['status']
            );

            $db->insert('customer', $insdata);
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

            $kode_customer = $dataInput['kode_customer'];

            $where = "kode_customer = '" . $kode_customer . "'";

            $db->delete('customer', $where);
            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }

    public function getNoSeq()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select kode_customer FROM customer Order by kode_customer Desc";
            $result = $db->fetchOne($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function editdata(array $data)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
            $db->beginTransaction();

            $kode_customer = $data['kode_customer'];

            $insdata = array(
                "nama_customer" => $data['nama_customer'],
                "alamat_customer" => $data['alamat_customer'],
                "no_tlp" => $data['no_tlp'],
                "no_hp" => $data['no_hp'],
                "email" => $data['email'],
                "status" => $data['status']
            );

            $where = "kode_customer = '" . $kode_customer . "'";

            $db->update('customer', $insdata, $where);
            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }
    public function getlistSaleCentral($kode_customer)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * from salecentral where status = 'Approve' AND kode_customer='$kode_customer' order by case when sisa_bayar<=0 then 1 ELSE 0 END ,tgl_invoice ASC ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }


    public function getdatacustomerid($kode_customer)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select * FROM customer where kode_customer = '$kode_customer'";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getdatasalesid($kode_sales)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "select * FROM sales where kode_sales = '$kode_sales'";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    //payment un-finish
    public function getDataPayment($kode_customer)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT SUM(sisa_bayar) AS total_sisabayar FROM salecentral where kode_customer='$kode_customer' AND sisa_bayar >=0";




            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function getDataNamaCustomer($kode_customer)
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');

        try {
            $query = "SELECT * FROM customer where kode_customer='$kode_customer'";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getRekening()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');


        try {
            $query = "select * FROM akun where akun.type='Transfer' AND akun.type Not In ('None')  AND akun.id Not In ('23') Order by id Asc ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }
    public function getCash()
    {
        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');


        try {
            $query = "select * FROM akun where akun.type='Cash' AND akun.type Not In ('None')  AND akun.id Not In ('23') Order by id Asc ";
            $result = $db->fetchAll($query);
            return $result;
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            return $e->getMessage(); //'Data tidak ada <br>';
        }
    }

    public function bayar(array $no_invoice, $tgl_invoice, array $sisa_bayar, array $jml_bayar, array $catatan, $akun, $metode_bayar, $pembayaran)
    {

        $registry = Zend_Registry::getInstance();
        $db = $registry->get('db');
        try {
            $db->beginTransaction();
            $i = 0;


            $jml_bayar1 = 0;
            $sisa_bayar1 = 0;
            $jml_bayar_transaksi = 0;

            $jml_pembayaran_sekarang = $pembayaran;
            foreach ($no_invoice as $row) {
                if ($jml_pembayaran_sekarang > 0) {

                    $jml_pembayaran_sekarang = $jml_pembayaran_sekarang - $sisa_bayar[$i];

                    if ($jml_pembayaran_sekarang > 0) {
                        $jml_bayar1 = $sisa_bayar[$i] + $jml_bayar[$i];
                        $jml_bayar_transaksi = $sisa_bayar[$i];
                        $sisa_bayar1 = "0";
                    } else {
                        $jml_bayar1 = $sisa_bayar[$i] + $jml_pembayaran_sekarang + $jml_bayar[$i];
                        $jml_bayar_transaksi = $sisa_bayar[$i] + $jml_pembayaran_sekarang;
                        $sisa_bayar1 = $jml_pembayaran_sekarang * -1;
                    }


                    //data update
                    $dataupdate = array(
                        "jml_bayar" => $jml_bayar1,
                        "sisa_bayar" => $sisa_bayar1
                    );

                    $where = "no_invoice = '" . $no_invoice[$i] . "'";
                    $tgl_invoice1    = date_create($tgl_invoice);
                    $tgl_invoice2    = date_format($tgl_invoice1, "y-m-d");


                    //insert data piutang
                    $insdata_piutang = array(
                        "no_invoice" => $no_invoice[$i],
                        "tgl_pembayaran" => $tgl_invoice2,
                        "jumlah_pembayaran" => $jml_bayar1,
                        "sisa_pembayaran" => "0",
                        "metode_pembayaran" => $metode_bayar,
                        "catatan" => $catatan[$i],
                        "tgl_entry" => "0000-00-00 00:00:00",
                        "no_rekening" => $akun
                    );

                    // insert data transaksi
                    $insdata_transaksi = array(
                        "deskripsi" => "Transaksi pembayaran pelanggan  \n" . $no_invoice[$i],
                        "tgl_transaksi" => $tgl_invoice2,
                        "nominal" => $jml_bayar_transaksi,
                        "type" => "Cash In",
                        "catatan" => $catatan[$i],
                        "nama_table" => "piutang",
                        "id_table" => $no_invoice[$i],
                        "id_table_original" => $no_invoice[$i],
                        "id_akun" => $akun,
                        "url" => "open_url_to_div('/pembayarancustomer/detail?id=" . $no_invoice[$i] . "')"
                    );
                    $insdata_transaksi_piutang = array(
                        "deskripsi" => "Transaksi pembayaran piutang  \n" . $no_invoice[$i],
                        "tgl_transaksi" => $tgl_invoice2,
                        "nominal" => $jml_bayar_transaksi,
                        "type" => "Cash In",
                        "catatan" => $catatan[$i],
                        "nama_table" => "piutang",
                        "id_table" => $no_invoice[$i],
                        "id_table_original" => $no_invoice[$i],
                        "id_akun" => "90",
                        "url" => "open_url_to_div('/pembayarancustomer/detail?id=" . $no_invoice[$i] . "')"
                    );

                    $db->update('salecentral', $dataupdate, $where);

                    $db->insert('piutang', $insdata_piutang);
                    $db->insert('transaksi', $insdata_transaksi);
                    $db->insert('transaksi', $insdata_transaksi_piutang);
                }
                $i = $i + 1;
            }







            $db->commit();
            return 'sukses';
        } catch (Exception $e) {
            $db->rollBack();
            echo $e->getMessage() . '<br>';
            return 'gagal';
        }
    }
}
