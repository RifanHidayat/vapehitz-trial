<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Laporanpurchasesbysupplierdetail_Service.php';
require_once 'service/Laporansalesbyproductdetail_Service.php';
require './../vendor/autoload.php';

class LaporanpurchasesbysupplierdetailController extends Zend_Controller_Action
{

  public function init()
  {
    $registry = Zend_Registry::getInstance();
    $this->auth = Zend_Auth::getInstance();
    $this->Home_Service = Home_Service::getInstance();
    $this->Laporanpurchasesbysupplierdetail_Service = Laporanpurchasesbysupplierdetail_Service::getInstance();
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
    $this->_helper->layout->setLayout('laporanpurchasesbysupplierdetail-layout');
    $this->view->Laporanpurchasesbysupplierdetail_Service = $this->Laporanpurchasesbysupplierdetail_Service;

    $this->view->purchasesDetail = $this->Laporanpurchasesbysupplierdetail_Service->getlistpurchases();
    // $this->view->totalSales = $this->Laporanpurchasesbysupplierdetail_Service->getTotalByCustomer();
    // $salesByLiquid = $this->Laporanpurchasesbysupplierdetail_Service->getlistsales();
  }

  public function printAction()
  {
    $sessionlogin = new Zend_Session_Namespace('sessionlogin');
    $this->view->permission = $sessionlogin->permission;
    $this->_helper->layout->setLayout('target-column');

    $this->view->purchasesDetail = $this->Laporanpurchasesbysupplierdetail_Service->getlistpurchases();
    // $mpdf = new \Mpdf\Mpdf(['debug' => true]);
    // $mpdf->WriteHTML('<h1>Hello world!</h1>');
    // $mpdf->Output();
  }

  public function excelAction()
  {
    // $this->_helper->viewRenderer->setNoRender(true);
    $sessionlogin = new Zend_Session_Namespace('sessionlogin');
    $this->view->permission = $sessionlogin->permission;
    $this->_helper->layout->setLayout('target-column');

    $this->view->purchasesDetail = $this->Laporanpurchasesbysupplierdetail_Service->getlistpurchases();
    // echo 'eds';
  }
}
