<?php
require_once 'Zend/Controller/Action.php';
require_once 'service/Home_Service.php';
require_once 'service/Laporansalesbycustomerdetail_Service.php';
require './../vendor/autoload.php';

use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporansalesbycustomerdetailController extends Zend_Controller_Action
{

  public function init()
  {
    $registry = Zend_Registry::getInstance();
    $this->auth = Zend_Auth::getInstance();
    $this->Home_Service = Home_Service::getInstance();
    $this->Laporansalesbycustomerdetail_Service = Laporansalesbycustomerdetail_Service::getInstance();
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
    $this->_helper->layout->setLayout('laporansalesbycustomerdetail-layout');
    $this->view->Laporansalesbycustomerdetail_Service = $this->Laporansalesbycustomerdetail_Service;

    $this->view->salesDetail = $this->Laporansalesbycustomerdetail_Service->getlistsales();
    $this->view->totalSales = $this->Laporansalesbycustomerdetail_Service->getTotalByCustomer();
  }

  public function printAction()
  {
    $sessionlogin = new Zend_Session_Namespace('sessionlogin');
    $this->view->permission = $sessionlogin->permission;
    $this->_helper->layout->setLayout('target-column');

    $this->view->salesDetail = $this->Laporansalesbycustomerdetail_Service->getlistsales();
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

    $this->view->salesDetail = $this->Laporansalesbycustomerdetail_Service->getlistsales();
    // echo 'eds';
  }
}
