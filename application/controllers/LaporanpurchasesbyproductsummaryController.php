<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Laporanpurchasesbyproductsummary_Service.php';
require './../vendor/autoload.php';

class LaporanpurchasesbyproductsummaryController extends Zend_Controller_Action
{

  public function init()
  {
    $registry = Zend_Registry::getInstance();
    $this->auth = Zend_Auth::getInstance();
    $this->Home_Service = Home_Service::getInstance();
    $this->Laporanpurchasesbyproductsummary_Service = Laporanpurchasesbyproductsummary_Service::getInstance();
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
    $this->_helper->layout->setLayout('laporanpurchasesbyproductsummary-layout');
    $this->view->Laporanpurchasesbyproductsummary_Service = $this->Laporanpurchasesbyproductsummary_Service;

    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    // $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProduct();
    $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProductByDate($date1, $date2);
  }

  public function printAction()
  {
    $sessionlogin = new Zend_Session_Namespace('sessionlogin');
    $this->view->permission = $sessionlogin->permission;
    $this->_helper->layout->setLayout('target-column');

    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    // $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProduct();
    $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProductByDate($date1, $date2);

    // $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProduct();
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


    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];

    // $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProduct();
    $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProductByDate($date1, $date2);
    // $this->view->totalPurchases = $this->Laporanpurchasesbyproductsummary_Service->getTotalByProduct();
    //
  }
}
