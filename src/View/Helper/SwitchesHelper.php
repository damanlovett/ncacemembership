<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Switches helper
 */
class SwitchesHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

   public function onOff($value, $on = 'Yes', $off = 'No') {
        if ($value == 1) {
            return $on;
        }else{
            return $off;
             }
        }

    public function access_allow($type){
        switch ($type) {
    case "super":
        $this->Auth->allow('*');
        break;
    case "admin":
        $this->Auth->allow('*');
        break;
    case "employer":
        $this->Auth->allow('view','index','add','edit');
        break;
    case "candidate":
        $this->Auth->allow('view','index','add','edit');
        break;
}

    }
   public function menu($type) {
      switch ($type) {
      case "1":
         $this->element('Usermgmt.dashboard');
      case "2":
         $this->element('Usermgmt.stu_dashboard');
      case "4":
         $this->element('Usermgmt.dashboard');
      case "5":
         $this->element('Usermgmt.dashboard');
         break;
      }
   }

      public function student_type($type){
        switch ($type) {
    case "5":
       return('Level 5 :: Full-Time Student');
        break;
    case "6":
       return('Level 6 :: Part-Time Student');
        break;
}
   }

   public function option($num) {
      $max = $num + 1;
      for ($i = 1; $i < $max; ++$i) {
         $myArray[] = $i;
      }
      return $myArray;
   }

   public function membershipYear() {
   			$i = (date("Y"));
			$myArray = array($i + 1=>$i + 1, $i => $i);
			 return $myArray;
      }
 
   public function currentYear() {
   			$i = (date("Y"));
			$myArray = array($i + 1 => $i +1, $i + 1 => $i +1);
			 return $myArray;
      }
        
	public function membershipOptions($area){
	        switch ($area) {
	    case "renew":
	       return array('New'=>'New','Renewal'=>'Renewal');
	        break;
	    case "otype":
	       return array('College/University'=>'College/University','Employer/Company'=>'Employer/Company','other'=>'other');
	        break;
	    case "ostatus":
	       return array('For Profit'=>'For Profit','Government'=>'Government','Non-Profit'=>'Non-Profit','2-Year'=>'2-Year','4-Year'=>'4-Year');
	        break;
	    case "mtype":
	       return array('Regular'=>'Regular','Retired'=>'Retired','Lifetime'=>'Lifetime','Student'=>'Student','Affiliate'=>'Affiliate','Group'=>'Group');
	        break;
	    case "payment":
	       return array('Check'=>'Check','Credit Card'=>'Credit Card','Other'=>'Other');
	        break;
	    case "6":
	       return array('XXXX'=>'XXXX','XXXX'=>'XXXX');
	        break;
	}
	    }
   
    public function alpha_section($num){
        switch ($num) {
    case "1":
       return('One');
        break;
    case "2":
       return('Two');
        break;
    case "3":
       return('Three');
        break;
    case "4":
       return('Four');
        break;
    case "5":
       return('Five');
        break;
    case "6":
       return('Six');
        break;
}
    }

    public function dropDown($option){
        switch ($option) {
    case "type":
      $options = array('Cover Sheet' => 'Cover Sheet','Support Document' => 'Support Document', 'Accreditation Packet' => 'Accreditation Packet');
      return $options;
      break;
    case "groupName":
      $options = array('2016 - 2017 Accreditation'=>'2016 - 2017 Accreditation','2017 - 2018 Accreditation'=>'2017 - 2018  Accreditation','2018 - 2019 Accreditation'=>'2018 - 2019 Accreditation','2019 - 2020 Accreditation'=>'2019 - 2020 Accreditation','2020 - 2021 Accreditation'=>'2020 - 2021 Accreditation','2021 - 2022 Accreditation'=>'2021 - 2022 Accreditation');
      return $options;
      break;
    case "typeBenchmark":
      $options = array(''=>'N/A','Benchmark'=>'Benchmark','General Scoring'=>'General Scoring');
      return $options;
      break;
    case "typeScore":
      $options = array(''=>'N/A','Benchmark'=>'Benchmark','General Scoring'=>'General Scoring');
      return $options;
      break;
    case "scoreSection":
      $options = array(''=>'N/A','A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','P'=>'P');
      return $options;
      break;
    case "finalGrades":
      $options = array(''=>'N/A','A'=>'A','B'=>'B','C'=>'C','D'=>'D','F'=>'F','P'=>'P');
      return $options;
      break;
    case "competence":
      $options = array('One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five');
      return $options;
      break;
    case "section":
      $options = array('Academic Achievement'=>'Academic Achievement','Citizenship and Social Responsibility'=>'Citizenship and Social Responsibility','Member Development'=>'Member Development','Philanthropy and Service'=>'Philanthropy and Service','Other'=>'Other',' '=>'N/A');
      return $options;
      break;
    case "5":
      $options = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5');
      return $options;
      break;
    case "7":
      $options = array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7');
      return $options;
      break;
    case "7benchmark":
      $options = array('#1'=>'1','#2'=>'2','#3'=>'3','#4'=>'4','#5'=>'5','#6'=>'6','#7'=>'7');
      return $options;
      break;
    case "6words":
      $options = array('One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five','Six'=>'Six');
      return $options;
      break;
    case "10words":
      $options = array('One'=>'One','Two'=>'Two','Three'=>'Three','Four'=>'Four','Five'=>'Five','Six'=>'Six','Seven'=>'Seven','Eight'=>'Eight','Nine'=>'Nine','Ten'=>'Ten');
      return $options;
      break;
    case "yes":
      $options = array('1'=>'Yes','0'=>'No');
      return $options;
      break;
   }
   }

}
