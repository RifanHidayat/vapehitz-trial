<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Laporanpurchasesbysuppliersummary_Service.php';
require_once 'service/Laporansalesbyproductdetail_Service.php';
require './../vendor/autoload.php';

class LaporanpurchasesbysuppliersummaryController extends Zend_Controller_Action
{

  public function init()
  {
    $registry = Zend_Registry::getInstance();
    $this->auth = Zend_Auth::getInstance();
    $this->Home_Service = Home_Service::getInstance();
    $this->Laporanpurchasesbysuppliersummary_Service = Laporanpurchasesbysuppliersummary_Service::getInstance();
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
    $this->_helper->layout->setLayout('laporanpurchasesbysuppliersummary-layout');
    $this->view->Laporanpurchasesbysuppliersummary_Service = $this->Laporanpurchasesbysuppliersummary_Service;

    // $this->view->salesDetail = $this->Laporanpurchasesbysuppliersummary_Service->getlistsales();
    $this->view->totalPurchases = $this->Laporanpurchasesbysuppliersummary_Service->getTotalBySupplier();
    // $salesByLiquid = $this->Laporanpurchasesbysupplierdetail_Service->getlistsales();
  }

  public function printAction()
  {
    $sessionlogin = new Zend_Session_Namespace('sessionlogin');
    $this->view->permission = $sessionlogin->permission;
    $this->_helper->layout->setLayout('target-column');

    $this->view->totalPurchases = $this->Laporanpurchasesbysuppliersummary_Service->getTotalBySupplier();
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

    $this->view->totalPurchases = $this->Laporanpurchasesbysuppliersummary_Service->getTotalBySupplier();
    // echo 'eds';
  }
}
