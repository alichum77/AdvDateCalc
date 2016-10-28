<?php
include("Date-Converter.Class.php");  
$var=new Calen_Converter();//Instance must be created to use this class
 
class Calen_Converter
{
var $yGregorian,$mm,$mdayy;//Meladi year month and day
var $yIslamic,$im,$idayy;//Islamic year month and day
var $yShamsi,$sm,$sdayy;//Shamsi year month and day
var $creatDate;
var $monthIslamic=0;// to find numeric value for selected month
var $monthPersian=0;// to find numeric value for selected month
var $monthGregorian=0;// to find numeric value for selected month
var $dateType="";
var $monthType="";
var $dayType="";
var $gregor="Gregorian";
var $islam="Islamic";
var $persia="Persian";
var $month1 = array("محرم", "صفر", "ربيع الاول", "ربيع الثاني", "جمادى الاولى", "جمادي الثانية", "رجب", "شعبان", "رمضان", "شوال", "ذوالقعدة", "ذوالحجة" );
var $month2 = array("حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "ميزان", "عقرب", "قوس", "جدي", "دلو", "حوت");

function Calen_Converter()
    {
    $g=$this->gregor;
    $i=$this->islam;
    $p=$this->persia; 
    //For storing meladi date values
    $this->yGregorian=$_POST[$g]; 
    $this->mm=$_POST['mmonth']; 
    $this->mdayy=$_POST['mday'];
    //For storing islamic date values
    $this->yIslamic=$_POST[$i];
    $this->im=$_POST['imonth']; 
    $this->idayy=$_POST['iday'];
    //For storing shamsi date values
    $this->yShamsi=$_POST[$p];
    $this->sm=$_POST['smonth']; 
    $this->sdayy=$_POST['sday'];
    //Call month converter
    $this->_monthConverter();
    //Call to User input validator function
    $this->_validateInput();
    ///////////CREATING ARRAYS FOR YEARS MONTHS AND DAYS///////////////////// 
    $yearsArr=array($this->yGregorian,$this->yIslamic,$this->yShamsi);
    $monthsArr=array($this->monthGregorian,$this->monthIslamic,$this->monthPersian);
    $daysArr=array($this->mdayy,$this->idayy,$this->sdayy);
     //print_r($yearsArr);//for testing
    $loop=0;
    while($loop<3){
        if($yearsArr[$loop] > 0){              //to set year type
            switch($loop){
           case 0: $this->dateType=$this->gregor;
           break;
           case 1: $this->dateType=$this->islam;
           break;
           case 2: $this->dateType=$this->persia;
           break;
           default :echo "invalid date type".exit();
           }//end of switch
        }//end of if
        if($monthsArr[$loop] > 0){                  //to set month type
            switch($loop){
           case 0: $this->monthType=$this->gregor;
           break;
           case 1: $this->monthType=$this->islam;
           break;
           case 2: $this->monthType=$this->persia;
           break;
           default :echo "invalid date type".exit();
           }//end of switch
        }
        if($daysArr[$loop] > 0){                       //to set day type entered by user 
            switch($loop){
           case 0: $this->dayType=$this->gregor;
           break;
           case 1:$this->dayType=$this->islam;
           break;
           case 2: $this->dayType=$this->persia;
           break;
           default :echo "invalid date type".exit();
           }//end of switch
        }
        $loop++;   
    }
    ////////////////////////////////////////DATE CALCULATOR OPERATIONS BEGINS///////////////////////////////////
        $one=1;
        $date1['ymd']=$this->creatDate[0]."-".$one."-".$one;
        $obj1=new DateConvertor($date1['ymd'],$this->dateType);
        switch($this->monthType){
            case $this->gregor:if($obj1->gregorian['m']>$this->creatDate[1]) $obj1->gregorian['y']++;
                                $date2['ymd']=$obj1->gregorian['y']."-".$this->creatDate[1]."-".$one;
                                $obj2=new DateConvertor($date2['ymd'],$this->gregor);
                                switch($this->dayType){
                                    case $this->gregor:if($obj2->gregorian['d']>$this->creatDate[2])$obj2->gregorian['m']++;
                                                        $date3['ymd']=$obj2->gregorian['y']."-".$obj2->gregorian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->gregor);                                                          
                                    break;
                                    case $this->islam:if($obj2->islamic['d']>$this->creatDate[2])$obj2->islamic['m']++;
                                                        $date3['ymd']=$obj2->islamic['y']."-".$obj2->islamic['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->islam);                                                        
                                    break;
                                    case $this->persia:if($obj2->persian['d']>$this->creatDate[2])$obj2->persian['m']++;
                                                        $date3['ymd']=$obj2->persian['y']."-".$obj2->persian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->persia);                                                        
                                    break;
                                    default:echo "ERROR";
                                }
            break;
            case $this->islam:if($obj1->islamic['m']>$this->creatDate[1]) $obj1->islamic['y']++;
                                $date2['ymd']=$obj1->islamic['y']."-".$this->creatDate[1]."-".$one;
                                $obj2=new DateConvertor($date2['ymd'],$this->islam);
                                switch($this->dayType){
                                    case $this->gregor:if($obj2->gregorian['d']>$this->creatDate[2])$obj2->gregorian['m']++;
                                                        $date3['ymd']=$obj2->gregorian['y']."-".$obj2->gregorian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->gregor);                                                          
                                    break;
                                    case $this->islam:if($obj2->islamic['d']>$this->creatDate[2])$obj2->islamic['m']++;
                                                        $date3['ymd']=$obj2->islamic['y']."-".$obj2->islamic['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->islam);                                                       
                                    break;
                                    case $this->persia:if($obj2->persian['d']>$this->creatDate[2])$obj2->persian['m']++;
                                                        $date3['ymd']=$obj2->persian['y']."-".$obj2->persian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->persia);                                              
                                    break;
                                    default:echo "ERROR";
                                }
            break;
            case $this->persia:if($obj1->persian['m']>$this->creatDate[1]) $obj1->persian['y']++;
                                $date2=$obj1->persian['y']."-".$this->creatDate[1]."-".$one;
                                $obj2=new DateConvertor($date2,$this->persia);
                                switch($this->dayType){
                                    case $this->gregor:if($obj2->gregorian['d']>$this->creatDate[2])$obj2->gregorian['m']++;
                                                        $date3['ymd']=$obj2->gregorian['y']."-".$obj2->gregorian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->gregor);                                                         
                                    break;
                                    case $this->islam:if($obj2->islamic['d']>$this->creatDate[2])$obj2->islamic['m']++;
                                                        $date3['ymd']=$obj2->islamic['y']."-".$obj2->islamic['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->islam);
                                    break;
                                    case $this->persia:if($obj2->persian['d']>$this->creatDate[2])$obj2->persian['m']++;
                                                        $date3['ymd']=$obj2->persian['y']."-".$obj2->persian['m']."-".$this->creatDate[2];
                                                        $objFinal=new DateConvertor($date3['ymd'],$this->persia);                       
                                    break;
                                    default:echo "ERROR";
                                }
            break;
            default: echo "ERROR";
        }
    ////////////////////////////////////////DATE CALCULATOR OPERATIONS ENDS//////////////////////////////////////
   $yCorrect=false;
   $mCorrect=false;
   $dCorrect=false;
   switch ($this->dateType){
      case $this->gregor :if($objFinal->gregorian['y']==$this->creatDate[0]) $yCorrect=true;
      break;
      case $this->islam :if($objFinal->islamic['y']==$this->creatDate[0]) $yCorrect=true;
      break;
      case $this->persia :if($objFinal->persian['y']==$this->creatDate[0]) $yCorrect=true;
      break;
      default:echo "error";
   }
   switch ($this->monthType){
      case $this->gregor :if($objFinal->gregorian['m']==$this->creatDate[1]) $mCorrect=true;
      break;
      case $this->islam :if($objFinal->islamic['m']==$this->creatDate[1]) $mCorrect=true;
      break;
      case $this->persia :if($objFinal->persian['m']==$this->creatDate[1]) $mCorrect=true;
      break;
      default:echo "error";
   }
   switch ($this->dayType){
      case $this->gregor :if($objFinal->gregorian['d']==$this->creatDate[2]) $dCorrect=true;
      break;
      case $this->islam :if($objFinal->islamic['d']==$this->creatDate[2]) $dCorrect=true;
      break;
      case $this->persia :if($objFinal->persian['d']==$this->creatDate[2]) $dCorrect=true;
      break;
      default:echo "error";
   }
   
   if($yCorrect and $mCorrect and $dCorrect){
       //echo "Gre ".$objFinal->gregorian['ymd']."<br>";
       //echo "Isl ".$objFinal->islamic['ymd']."<br>";
       //echo "Per ".$objFinal->persian['ymd']."<br>";
       
       /*
       
       echo'

<table class=rounded-box rules=rows  cellpadding=2 cellspacing=3 width=380px>

<tr>
<th colspan=4 >Result</th>
</tr>
<tr>
<td>&nbsp;</td>
<td>Year</td>
<td>Month</td>
<td>Day</td>
</tr>

<tr>     
<td>Gregorian</td>
<td>'.$objFinal->gregorian['y'].'</td>
<td>'.$objFinal->gregorian['m'].'</td>
<td>'.$objFinal->gregorian['d'].'</td>
</tr>

<tr>
<td>Islamic</td>
<td>'.$objFinal->islamic['y'].'</td>
<td>'.$objFinal->islamic['m'].'</td>
<td>'.$objFinal->islamic['d'].'</td>
</tr>

<tr>
<td>Persian</td>
<td>'.$objFinal->persian['y'].'</td>
<td>'.$objFinal->persian['m'].'</td>
<td>'.$objFinal->persian['d'].'</td>
</tr>

</table>';


*/


 $month1 = array("محرم", "صفر", "ربيع الاول", "ربيع الثاني", "جمادى الاولى", "جمادي الثانية", "رجب", "شعبان", "رمضان", "شوال", "ذوالقعدة", "ذوالحجة" );
 $month2 = array("حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "ميزان", "عقرب", "قوس", "جدي", "دلو", "حوت");
 $month3 = array("January","February","March","April","May","June","July","August","September","October","November","December");


?>


                        <div class="accordion-group span5" align="center" style="padding-left:400px;">
                            <div class="accordion-heading">
                                <a href="#collapseTable1" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle btn btn-info" style="text-align: left;text-decoration: none">
                                    <i class="icon-list-alt"></i> Result <i class="icon-minus pull-right"></i>
                                </a>
                            </div>
                            <div class="accordion-body in collapse" id="collapseTable1" style="height: auto;">
                                <div style="background-color: #ffffff;" class="accordion-inner">
                                    <form action="" name="frm" id="frm" method="POST" >
									<table class="rounded-box table">
									<thead>
									
									<tr><td></td><td>Year</td><td>Month</td><td>Day</td></tr></thead>
									<tbody>
										<tr>
											<td>Gregorian</td>
											<td><?=$objFinal->gregorian['y']?></td>
											<td><?=$month3[$objFinal->gregorian['m']-1]?></td>
											<td><?=$objFinal->gregorian['d']?></td>
										</tr>
										<tr>
											<td>Islamic</td>
											<td><?=$objFinal->islamic['y']?> </td>
											<td><?=$month1[$objFinal->islamic['m']-1]?></td>
											<td><?=$objFinal->islamic['d']?></td>
											</tr>
										<tr>
											<td>Shamsi</td>
											<td><?=$objFinal->persian['y']?></td>
											<td><?=$month2[$objFinal->persian['m']-1]?></td>
											<td><?=$objFinal->persian['d']?>
											</td>
										</tr>
										
										
									</tbody>                                                         
									</table>
									</form>
                                </div>
                            </div>
                        </div>



<?php
   }
   else echo "Wrong date";
    }//End of cunstructor function
    
    
    
    
      ///////////////////////////////////////////////////////////////////////////////////////
     //////////////FROM THIS POINT THE SUB FUNCTIONS BEGIN//////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////
    
    
    function _monthConverter(){
    $mo=strtotime($this->mm);
    if($mo > 0)//don't know why i have to do this not what for because it sets the meladi month to 12 in order to avoid that
    $this->monthGregorian=date('n',$mo);
     for($loop=0;$loop<12;$loop++){
         if($this->im == $this->month1[$loop]){//mathches user input qamari month with the value in the array
         $qamariPosition = $loop+1;//to assing a numeric value for the month
         }
         if($this->sm == $this->month2[$loop]){
         $shamsiPosition=$loop+1;
         } 
     }
     $this->monthIslamic=$qamariPosition;
     $this->monthPersian=$shamsiPosition;//works perfect
     ///end of  qamari and shamsi months conversion
    }
    function  _validateInput(){
    //Storing all input into arrays
    $yearArray=array($this->yGregorian,$this->yIslamic,$this->yShamsi);
    $monthArray=array($this->monthGregorian,$this->monthIslamic,$this->monthPersian);
    $dayArray=array($this->mdayy,$this->idayy,$this->sdayy);
    //*initialization is required
    $i=0;
    $countY=0;
    $countM=0;
    $countD=0;
    $createDate=array();//This is differ from class variable decleared inside the class(THAT ONE DOESN'T HAVE e)
     
    while($i<3){  //WHILE LOOP USED TO STORE STORE VALIDE USER INPUT
       if($yearArray[$i]!=null or ($yearArray[$i]+0)>0) {
       $createDate[0]=$yearArray[$i];
       ++$countY;
       }       
       if(($monthArray[$i]!=null and $monthArray[$i]>0) and $monthArray[$i]<13){ 
       $createDate[1]=$monthArray[$i];
       ++$countM;
       }
       if(($dayArray[$i]!=null and ($dayArray[$i]+0)>0)and ($dayArray[$i]+0)<32){
       $createDate[2]=$dayArray[$i];
       ++$countD;
       }
       $i++;
    }
    //print_r($createDate);    //for testing
    if(($countY != 1) or ($countM != 1) or ($countD != 1)){    
    echo "Error:Enter only one (valid) value for year month and day<br>";//.$countD."day".$countM."month".$countY;
    echo "Note :You are not required to fill either the year month or day field of more than one calender Type";
    exit();
    }   
    $this->creatDate = $createDate;
  }//End of _validateInput function
}
