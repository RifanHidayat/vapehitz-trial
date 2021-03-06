<?php 
require_once 'Zend/View.php';

class ma_date {
  /**
           Fungsi ini berguna untuk menampilkan combo tanggal, bulan dan textbox tahun
	 param $namaTgl adalah untuk mewakili property name combo tanggal String|null
	 param $valueTgl adalah untuk mewakili value default combo tanggal String|null
	 param $namaBln adalah untuk mewakili property name combo bulan String|null
	 param $valueBln adalah untuk mewakili value default combo tanggal String|null
	 param $namaThn adalah untuk mewakili property name textbox tahun String|null
	 param $valueThn adalah untuk mewakili value default textbox tanggal String|null
	 Jika property tersebut diisi null maka property tersebut tidak akan muncul di page html
   */
    public function init() {
 	   $registry = Zend_Registry::getInstance();
	   $this->view->basePath = $registry->get('basepath'); 
	   echo "nilai basepath : ".$this->view->basePath;
	}   
  public function formTanggal_oa($namaTgl,$valueTgl,$namaBln,$valueBln,$namaThn,$valueThn,$tabId=null) {
    $ctrl = new Zend_View();
	//$tglArr = array("#"=>"--","01"=>"1","02"=>"2","03"=>"3","04"=>"4","05"=>"5","06"=>"6","07"=>"7",
	$tglArr = array("#"=>"--","01"=>"01","02"=>"02","03"=>"03","04"=>"04","05"=>"05","06"=>"06","07"=>"07",
					"08"=>"08","09"=>"09","10"=>"10","11"=>"11","12"=>"12","13"=>"13","14"=>"14","15"=>"15",
					"16"=>"16","17"=>"17","18"=>"18","19"=>"19","20"=>"20","21"=>"21","22"=>"22","23"=>"23",
					"24"=>"24","25"=>"25","26"=>"26","27"=>"27","28"=>"28","29"=>"29","30"=>"30","31"=>"31");
	if ($valueTgl == '' || $valueTgl == null) {
	  $valueTgl = '#';
	}
	
	if ($tabId) {
	  $tglAtrib = array("tabindex"=>$tabId);
	} else {
	  $tglAtrib = array();
	}
	
    $tgl = $ctrl->formSelect($namaTgl,$valueTgl, $tglAtrib, $tglArr);
	
	//$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
	$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
					"06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November",
					"12"=>"Desember");
	if ($valueBln == '' || $valueBln == null) {
	  $valueBln = '#';
	}
	
	if ($tabId) {
	  $blnAtrib = array("tabindex"=>$tabId+1);
	} else {
	  $blnAtrib = array();
	}
	
    $bln = $ctrl->formSelect($namaBln,$valueBln, $blnAtrib, $blnArr);
	
	if ($tabId) {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)",
						  "tabindex"=>$tabId+2);
	} else {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)");
	}
	
	if ($valueThn == '' || $valueThn == null) {
	  $valueThn = null;
	}
	$thn = $ctrl->formText($namaThn, $valueThn,$thnAtrib);
	
	if ($namaTgl != null) {
	  $xhtml = $tgl;  
	}
	
	if ($namaBln != null) {
	  if ($namaTgl != null) {
	    $xhtml = $xhtml."&nbsp;".$bln;
	  } else {
	    $xhtml = $bln;
	  }
	}
	
	if ($namaThn != null) {
	  if ($namaTgl != null || $namaBln != null) {
	    $xhtml = $xhtml."&nbsp;".$thn;
	  } else {
	    $xhtml = $thn;
	  }
	}
	
	return $xhtml;
  }
  
 public function formTanggal_oa1($namaTgl,$valueTgl,$namaBln,$valueBln,$namaThn,$valueThn,$tabId=null) 
  {
    $ctrl = new Zend_View();
 	$registry = Zend_Registry::getInstance();
	$this->view->basePath = $registry->get('basepath'); 
	if ($tabId) {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)",
						  "tabindex"=>$tabId+2);
	} else {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)");
	}
	
	if ($valueThn == '' || $valueThn == null) {
	  //$valueThn = null;
	  $valueThn = date("Y");
	}
	$thn = $ctrl->formText($namaThn, $valueThn,$thnAtrib);

	//$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
   $bulanDesc = array("01"=>"Januari",
                      "02"=>"Februari",
                      "03"=>"Maret",
                      "04"=>"April",
                      "05"=>"Mei",
                      "06"=>"Juni",
                      "07"=>"Juli",
                      "08"=>"Agustus",
                      "09"=>"September",
                      "10"=>"Oktober",
                      "11"=>"November",
                      "12"=>"Desember");

	if ($valueBln == '' || $valueBln == null) {
	  $valueBln = '01';
	}
	
	if ($tabId) {
	  $blnAtrib = array("tabindex"=>$tabId+1);
	} else {
	  $blnAtrib = array();
	}
	
    $bln = $ctrl->formSelect($namaBln,$valueBln, $blnAtrib, $bulanDesc);
	
	if ($valueTgl == '' || $valueTgl == null) {
	  //$valueTgl = '#';
	  $valueTgl = date("d");
	}
	
	if ($tabId) {
	  $tglAtrib = array("tabindex"=>$tabId);
	} else {
	  $tglAtrib = array();
	}
	if ((int)$valueTgl<10) $valueTgl = "0".$valueTgl; 
    $tgl = ""; //$ctrl->formSelect($namaTgl,$valueTgl, $tglAtrib, $tglArr);
	$jmlHari = cal_days_in_month(CAL_GREGORIAN, $valueBln, $valueThn);
	$tgl = $tgl ."<select id='".$namaTgl."' name='".$namaTgl."'>";
    for ($i=1; $i<=$jmlHari; $i++)
	{
	    if ((int)$i<10) $i="0".$i;
		if ($i==$valueTgl) $lcTd = "SelecTed"; else $lcTd = "";
	    $tgl = $tgl ."<option value='".$i."' ".$lcTd.">".$i."</option>";
	}
	$tgl = $tgl ."</select>";
	
	if ($namaTgl != null) {
	  $xhtml = "<span id='tdiTanggal".$namaTgl."'>".$tgl."</span>";  
	}
	
	if ($namaBln != null) {
	  if ($namaTgl != null) {
	    $xhtml = $xhtml."&nbsp;".$bln;
	  } else {
	    $xhtml = $bln;
	  }
	}
	
	if ($namaThn != null) {
	  if ($namaTgl != null || $namaBln != null) {
	    $xhtml = $xhtml."&nbsp;".$thn;
	  } else {
	    $xhtml = $thn;
	  }
	}
	$xhtml = $xhtml."<script>
    jQuery('#".$namaBln."').bind('change',funcChangeTgl".$namaTgl.");
    function funcChangeTgl".$namaTgl."()
    {
       var url = '".$this->view->basePath."/util/tampilfoto/listtanggal';
       var ittgl = '".$namaTgl."';
       var ittahun = document.getElementById('".$namaThn."').value;
       var itbulan = document.getElementById('".$namaBln."').value;
       var par = { ittahun:ittahun, itbulan:itbulan, ittgl:ittgl }
       jQuery.get(url, par, function(data) {
	      $('#tdiTanggal".$namaTgl."').html(data);
       });
    }
	</script>";
	
	return $xhtml;
  }
  
  public function formTanggal_oa2($namaTgl,$valueTgl,$namaBln,$valueBln,$namaThn,$valueThn,$tabId=null,$attrib) 
  {
	//echo "attrib=$attrib";
    $ctrl = new Zend_View();
 	$registry = Zend_Registry::getInstance();
	$this->view->basePath = $registry->get('basepath'); 
	
	
	if ($tabId) {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)",
						  "tabindex"=>$tabId+2);
	} else {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)");
	}
	if ($attrib){
		$thnAtrib['disabled'] = true;
	} 
	
	if ($valueThn == '' || $valueThn == null) {
	  //$valueThn = null;
	  $valueThn = date("Y");
	}
	
	$thn = $ctrl->formText($namaThn, $valueThn,$thnAtrib);

	//$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
   $bulanDesc = array("01"=>"Januari",
                      "02"=>"Februari",
                      "03"=>"Maret",
                      "04"=>"April",
                      "05"=>"Mei",
                      "06"=>"Juni",
                      "07"=>"Juli",
                      "08"=>"Agustus",
                      "09"=>"September",
                      "10"=>"Oktober",
                      "11"=>"November",
                      "12"=>"Desember");

	if ($valueBln == '' || $valueBln == null) {
	  $valueBln = '01';
	}
	
	
	if ($tabId) {
	  $blnAtrib = array("tabindex"=>$tabId+1);
	} else {
	  $blnAtrib = array();
	}
	if ($attrib){
		$blnAtrib['disabled'] = true;
	}
    $bln = $ctrl->formSelect($namaBln,$valueBln, $blnAtrib, $bulanDesc);
	
	if ($valueTgl == '' || $valueTgl == null) {
	  //$valueTgl = '#';
	  $valueTgl = date("d");
	}
	
	if ($tabId) {
	  $tglAtrib = array("tabindex"=>$tabId);
	} else {
	  $tglAtrib = array();
	}
	if ((int)$valueTgl<10) $valueTgl = "0".$valueTgl; 
    $tgl = ""; //$ctrl->formSelect($namaTgl,$valueTgl, $tglAtrib, $tglArr);
	$jmlHari = cal_days_in_month(CAL_GREGORIAN, $valueBln, $valueThn);
	
	if ($attrib) {
	  $disabled= " disabled=\"disabled\"";
	} 
	
	$tgl = $tgl ."<select id='".$namaTgl."' name='".$namaTgl."'".$disabled.">";
	
    for ($i=1; $i<=$jmlHari; $i++)
	{
	    if ((int)$i<10) $i="0".$i;
		if ($i==$valueTgl) $lcTd = "SelecTed"; else $lcTd = "";
	    $tgl = $tgl ."<option value='".$i."' ".$lcTd.">".$i."</option>";
	}
	$tgl = $tgl ."</select>";
	
	if ($namaTgl != null) {
	  $xhtml = "<span id='tdiTanggal".$namaTgl."'>".$tgl."</span>";  
	}
	
	if ($namaBln != null) {
	  if ($namaTgl != null) {
	    $xhtml = $xhtml."&nbsp;".$bln;
	  } else {
	    $xhtml = $bln;
	  }
	}
	
	if ($namaThn != null) {
	  if ($namaTgl != null || $namaBln != null) {
	    $xhtml = $xhtml."&nbsp;".$thn;
	  } else {
	    $xhtml = $thn;
	  }
	}
	$xhtml = $xhtml."<script>
    jQuery('#".$namaBln."').bind('change',funcChangeTgl".$namaTgl.");
    function funcChangeTgl".$namaTgl."()
    {
       var url = '".$this->view->basePath."/util/tampilfoto/listtanggal';
       var ittgl = '".$namaTgl."';
       var ittahun = document.getElementById('".$namaThn."').value;
       var itbulan = document.getElementById('".$namaBln."').value;
       var par = { ittahun:ittahun, itbulan:itbulan, ittgl:ittgl }
       jQuery.get(url, par, function(data) {
	      $('#tdiTanggal".$namaTgl."').html(data);
       });
    }
	</script>";
	
	return $xhtml;
  }

 public function xformTanggal_oa($namaTgl,$valueTgl,$namaBln,$valueBln,$namaThn,$valueThn,$tabId=null) 
  {
    $ctrl = new Zend_View();
 	$registry = Zend_Registry::getInstance();
	$this->view->basePath = $registry->get('basepath'); 
	if ($tabId) {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)",
						  "tabindex"=>$tabId+2);
	} else {
		$thnAtrib = array("size"=>"4",
		                  "maxlength"=>"4",
						  "onkeyup"=>"javascript:checkNumber(this)",
						  "onkeypress"=>"javascript:checkNumber(this)");
	}
	
	if ($valueThn == '' || $valueThn == null) {
	  //$valueThn = null;
	  $valueThn = date("Y");
	}
	$thn = $ctrl->formText($namaThn, $valueThn,$thnAtrib);

	//$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
   $bulanDesc = array("01"=>"Januari",
                      "02"=>"Februari",
                      "03"=>"Maret",
                      "04"=>"April",
                      "05"=>"Mei",
                      "06"=>"Juni",
                      "07"=>"Juli",
                      "08"=>"Agustus",
                      "09"=>"September",
                      "10"=>"Oktober",
                      "11"=>"November",
                      "12"=>"Desember");

	if ($valueBln == '' || $valueBln == null) {
	  $valueBln = '01';
	}
	
	if ($tabId) {
	  $blnAtrib = array("tabindex"=>$tabId+1);
	} else {
	  $blnAtrib = array();
	}
	
    $bln = $ctrl->formSelect($namaBln,$valueBln, $blnAtrib, $bulanDesc);
	
	if ($valueTgl == '' || $valueTgl == null) {
	  //$valueTgl = '#';
	  $valueTgl = date("d");
	}
	
	if ($tabId) {
	  $tglAtrib = array("tabindex"=>$tabId);
	} else {
	  $tglAtrib = array();
	}
	if ((int)$valueTgl<10) $valueTgl = "0".$valueTgl; 
    $tgl = ""; //$ctrl->formSelect($namaTgl,$valueTgl, $tglAtrib, $tglArr);
	$jmlHari = cal_days_in_month(CAL_GREGORIAN, $valueBln, $valueThn);
	$tgl = $tgl ."<select id='".$namaTgl."' name='".$namaTgl."'>";
    for ($i=1; $i<=$jmlHari; $i++)
	{
	    if ((int)$i<10) $i="0".$i;
		if ($i==$valueTgl) $lcTd = "SelecTed"; else $lcTd = "";
	    $tgl = $tgl ."<option value='".$i."' ".$lcTd.">".$i."</option>";
	}
	$tgl = $tgl ."</select>";
	
	if ($namaTgl != null) {
	  $xhtml = "<span id='tdiTanggal".$namaTgl."'>".$tgl."</span>";  
	}
	
	if ($namaBln != null) {
	  if ($namaTgl != null) {
	    $xhtml = $xhtml."&nbsp;".$bln;
	  } else {
	    $xhtml = $bln;
	  }
	}
	
	if ($namaThn != null) {
	  if ($namaTgl != null || $namaBln != null) {
	    $xhtml = $xhtml."&nbsp;".$thn;
	  } else {
	    $xhtml = $thn;
	  }
	}
	$xhtml = $xhtml."<script>
    jQuery('#".$namaBln."').bind('change',funcChangeTgl".$namaTgl.");
    function funcChangeTgl".$namaTgl."()
    {
       var url = '".$this->view->basePath."/util/tampilfoto/listtanggal';
       var ittgl = '".$namaTgl."';
       var ittahun = document.getElementById('".$namaThn."').value;
       var itbulan = document.getElementById('".$namaBln."').value;
       var par = { ittahun:ittahun, itbulan:itbulan, ittgl:ittgl }
       jQuery.get(url, par, function(data) {
	      $('#tdiTanggal".$namaTgl."').html(data);
       });
    }
	</script>";
	
	return $xhtml;
  }

  public function formTanggal_oaSearch($namaTgl,$valueTgl,$namaBln,$valueBln,$namaThn,$valueThn) {
    $ctrl = new Zend_View();
	//$tglArr = array("#"=>"--","01"=>"1","02"=>"2","03"=>"3","04"=>"4","05"=>"5","06"=>"6","07"=>"7",
	$tglArr = array("#"=>"--","01"=>"01","02"=>"02","03"=>"03","04"=>"04","05"=>"05","06"=>"06","07"=>"07",
					"08"=>"08","09"=>"09","10"=>"10","11"=>"11","12"=>"12","13"=>"13","14"=>"14","15"=>"15",
					"16"=>"16","17"=>"17","18"=>"18","19"=>"19","20"=>"20","21"=>"21","22"=>"22","23"=>"23",
					"24"=>"24","25"=>"25","26"=>"26","27"=>"27","28"=>"28","29"=>"29","30"=>"30","31"=>"31");
	if ($valueTgl == '' || $valueTgl == null) {
	  $valueTgl = '#';
	}
    $tgl = $ctrl->formSelect($namaTgl,$valueTgl, null, $tglArr);
	
	//$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
	$blnArr = array("#"=>"--","01"=>"Januari","02"=>"Februari","03"=>"Maret","04"=>"April","05"=>"Mei",
					"06"=>"Juni","07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"November",
					"12"=>"Desember");
	if ($valueBln == '' || $valueBln == null) {
	  $valueBln = '#';
	}
    $bln = $ctrl->formSelect($namaBln,$valueBln, null, $blnArr);
	
	$thnAtrib = array("size"=>"4",
	                  "maxlength"=>"4",
					  "onkeyup"=>"javascript:checkNumber(this)",
					  "onkeypress"=>"javascript:checkNumber(this)");
	if ($valueThn == '' || $valueThn == null) {
	  $valueThn = null;
	}
	$thn = $ctrl->formText($namaThn, $valueThn,$thnAtrib);
	
	if ($namaTgl != null) {
	  $xhtml = $tgl;  
	}
	
	if ($namaBln != null) {
	  if ($namaTgl != null) {
	    $xhtml = $xhtml."&nbsp;".$bln;
	  } else {
	    $xhtml = $bln;
	  }
	}
	
	if ($namaThn != null) {
	  if ($namaTgl != null || $namaBln != null) {
	    $xhtml = $xhtml."&nbsp;".$thn;
	  } else {
	    $xhtml = $thn;
	  }
	}
	
	return $xhtml;
  }
  
  /**
         Fungsi untuk konversi tanggal dari format indonesia DD-MM-YYYY menjadi format database YYYY-MM-DD
       */
  public function convertTglHumanToMachine($tglhuman) {
	$tgl = substr($tglhuman, 0, 2);
	//echo "<br>".$tgl;
	$bln = substr($tglhuman, 3, 2);
	//echo "<br>".$bln;
    $thn = substr($tglhuman, 6, 4);
	//echo "<br>".$thn;
	return $thn."-".$bln."-".$tgl;
  }
  
  /**
         Fungsi untuk konversi tanggal dari format database YYYY-MM-DD menjadi format indonesia DD-MM-YYYY
       */
  public function convertTglMachineToHuman($tglmachine) {
	$thn = substr($tglmachine, 0, 4);
	//echo "<br>".$thn;
	$bln = substr($tglmachine, 5, 2);
	//echo "<br>".$bln;
    $tgl = substr($tglmachine, 8, 2);
	//echo "<br>".$tgl;
	return $tgl."-".$bln."-".$thn;
  }
  public function dateToString($tglmachine) {
	$thn = substr($tglmachine, 0, 4);
	//echo "<br>".$thn;
	$bln = substr($tglmachine, 5, 2);
	//echo "<br>".$bln;
    $tgl = substr($tglmachine, 8, 2);
	//echo "<br>".$tgl;
	return $tgl." ".$this->getNamaBulan($bln)." ".$thn;
  }

 /* Candra */
  /**
         Fungsi untuk konversi bulan dari format database MM menjadi format bulan singkat indonesia 
       */
	public function getNamaBulanSingkat($mm){

		$mm = $mm*1;
		$namaBulanArr = array('1' =>'Jan', 'Peb', 'Mar', 'Apr',  'Mei', 'Jun',  'Jul', 'Ags', 'Sep', 'Okt', 'Nop', 'Des');
		$namaBulan = $namaBulanArr[$mm];
		
		return $namaBulan;
	}

	/**
         Fungsi untuk konversi bulan dari format database MM menjadi format bulan indonesia 
       */

	public function getNamaBulan($mm)
	{
		$mm = $mm*1;
		$namaBulanArr = array('1' =>'Januari', 'Pebruari', 'Maret', 'April',  'Mei', 'Juni',  'Juli', 'Agustus', 'September', 'Oktober', 'Nopember', 'Desember');
		$namaBulan = $namaBulanArr[$mm];
	
		return $namaBulan;
	}
	
	/**
         Fungsi untuk konversi tanggal dari format databaseYYYY-MM-DD  menjadi format tanggal indonesia DD-Month-YYYY
       */
	public function formatTglLengkap($tglmachine){
		$convDate = new ma_date();
		
		$thn = substr($tglmachine, 0, 4);
		$bln = $convDate->getNamaBulan(substr($tglmachine, 5, 2));
		$tgl = substr($tglmachine, 8, 2);
	
		return $tgl."-".$bln."-".$thn;
	}
	
	public function formatTglSingkat($tglmachine){
		$convDate = new ma_date();
		
		$thn = substr($tglmachine, 0, 4);
		$thnSingkat = substr($tglmachine, 2, 2);
		$bln = $convDate->getNamaBulanSingkat(substr($tglmachine, 5, 2));
		$tgl = substr($tglmachine, 8, 2);
	
		return $tgl."-".$bln."-".$thnSingkat;
	}
	
	public function formatTglSingkat2($tglmachine){
		$convDate = new ma_date();
		
		$thn = substr($tglmachine, 0, 4);
		$thnSingkat = substr($tglmachine, 2, 2);
		$bln = $convDate->getNamaBulanSingkat(substr($tglmachine, 5, 2));
		$tgl = substr($tglmachine, 8, 2);
	
		return $tgl." ".$bln." ".$thn;
	}
	
	public function formatTglAngka($tglmachine){
		$convDate = new ma_date();
		
		$thn = substr($tglmachine, 0, 4);
		$bln = substr($tglmachine, 5, 2);
		$tgl = substr($tglmachine, 8, 2);
	
		return $tgl."-".$bln."-".$thn;
	}
 /* Akhir Candra */
	public function listtanggalAction()
	{
	   $idTgl = $_REQUEST['ittgl'];
	   $tahun = $_REQUEST['ittahun']; 
	   $bulan = $_REQUEST['itbulan']; 
       $this->_helper->viewRenderer->setNoRender(true);
	   $jmlHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
	   $html = $html ."<select id='".$idTgl."' name='".$idTgl."'>";
       for ($i=1; $i<=$jmlHari; $i++)
	   {
	      if ((int)$i<10) $i="0".$i;
	      $html = $html ."<option value='".$i."'>".$i."</option>";
	   }
	   $html = $html ."</select>";
	   echo $html;
	}
	//akhir bamris
	

	//Awal tambahan Dewi 11052010
	
	// Fungsi ini untuk menambah atau mengurangi hari dari tanggal tertentu	
	function add_days($my_date,$numdays) 
	{
		$date_t = strtotime($my_date.' UTC');
		//return gmdate('Y-m-d',$date_t + ($numdays*86400));
		return gmdate('d-m-Y',$date_t + ($numdays*86400));
	} 
	
	//Akhir tambahan Dewi 11052010
	
}
?>