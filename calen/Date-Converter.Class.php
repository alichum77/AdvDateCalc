<?
// changed, sep.9.2006

class DateConvertor{
    //var $str_f,$str_e,$str_a,$weekday;
    var $weekdays = array( "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat" );
    var $islamic_weekdays = array("الاحد", "الاثنين", "الثلاثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
    var $persian_weekdays = array("يكشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه");
    
    var $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November',    'December');
    var $month1 = array("محرم", "صفر", "ربيع الاول", "ربيع الثاني", "جمادى الاولى", "جمادي الثانية", "رجب", "شعبان", "رمضان", "شوال", "ذوالقعدة", "ذوالحجة" );
    var $month2 = array("حمل", "ثور", "جوزا", "سرطان", "اسد", "سنبله", "ميزان", "عقرب", "قوس", "جدي", "دلو", "حوت");
    var $monthPashto = array("وری", "غويی", "غبرګولی", "چنګاښ", "زمری ", "وږی", "تله", "لړم", "ليندی ", "مرغومی ", "سلواغه ", "کب ");
    var $gregorian_epoch = 1721425.5;
    var $islamic_epoch = 1948439.5;
    var $persian_epoch = 1948320.5;
                         
    var $persian;
    var $islamic;
    var $gregorian;
    
//    function DateConvertor($year = date ("Y"), $mon = (date ("m")-1), $day = date ("d"), $YearType = 'Gregorian'){
    function DateConvertor($date='', $YearType='Gregorian'){
        if($date=='')
            $date = date('Y-n-j', strtotime("+6 hours +30 min"));
        list($year, $mon, $day) = explode('-', $date);
           
        $hour = $min = $sec = 0;
        //$j = tedade rozha az mabdae tarikh
        if($YearType=='Persian'){
            $j = $this->persian_to_jd($year, $mon, $day) + (($sec + 60 * ($min + 60 * $hour)) / 86400.0);
            $TempCalc = $this->jd_to_islamic( $j );
            $this->islamic = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
            $this->persian = array('y'=>$year, 'm'=>$mon, 'd'=>$day);
            $TempCalc = $this->jd_to_gregorian($j);
            $this->gregorian = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
        }
        if($YearType=='Islamic'){
            $j = $this->islamic_to_jd($year, $mon, $day) + (($sec + 60 * ($min + 60 * $hour)) / 86400.0);
            $this->islamic = array('y'=>$year, 'm'=>$mon, 'd'=>$day);
            $TempCalc = $this->jd_to_persian($j);
            $this->persian = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
            $TempCalc = $this->jd_to_gregorian($j);
            $this->gregorian = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
        }
        if($YearType=='Gregorian'){
            $j = $this->gregorian_to_jd($year, $mon, $day) + (($sec + 60 * ($min + 60 * $hour)) / 86400.0);
            $TempCalc = $this->jd_to_islamic( $j);
            $this->islamic = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
            $TempCalc = $this->jd_to_persian($j);
            $this->persian = array('y'=>$TempCalc[0], 'm'=>$TempCalc[1], 'd'=>$TempCalc[2]);
            $this->gregorian = array('y'=>$year, 'm'=>$mon, 'd'=>$day);
        }
        $this->weekday = $this->jwday($j);
        
        $this->persian['ymd'] = $this->persian['d'].'-'.($this->persian['m']) .'-'.$this->persian['y'];
        
        //echo "test date : ".($this->persian['m']-1) . " <br><br>";
        $this->pashto['ymd'] = $this->persian['d'].'-'.($this->persian['m']).'-'.$this->persian['y'];
        $this->gregorian['ymd'] = $this->gregorian['d'].'-'.($this->gregorian['m']).'-'.$this->gregorian['y'];
        $this->islamic['ymd'] = $this->islamic['d'].'-'.($this->islamic['m']) .'-'.$this->islamic['y'];
    }

    function mod($a, $b)
    {
        return $a - ($b * floor($a / $b));
    }
    function jwday($j)
    {
        return $this->mod(floor(($j + 1.5)), 7);
    }
    function leap_gregorian($year)
    {
         return (($year % 4) == 0) && (!((($year % 100) == 0) && (($year % 400) != 0)));
    }
    function gregorian_to_jd($year, $month, $day)
    {
         return ($this->gregorian_epoch - 1) + (365 * ($year - 1)) + floor(($year - 1) / 4) + (-floor(($year - 1) / 100)) + floor(($year - 1) / 400) + floor((((367 * $month) - 362) / 12) + (($month <= 2) ? 0 : ($this->leap_gregorian($year) ? -1 : -2)) + $day);
    }
    function jd_to_gregorian($jd) {
        $wjd = floor($jd - 0.5) + 0.5;
        $depoch = $wjd - $this->gregorian_epoch;
        $quadricent = floor($depoch / 146097);
        $dqc = $this->mod($depoch, 146097);
        $cent = floor($dqc / 36524);
        $dcent = $this->mod($dqc, 36524);
        $quad = floor($dcent / 1461);
        $dquad = $this->mod($dcent, 1461);
        $yindex = floor($dquad / 365);
        $year = ($quadricent * 400) + ($cent * 100) + ($quad * 4) + $yindex;
        if (!(($cent == 4) || ($yindex == 4))) { $year++; }
        $yearday = $wjd - $this->gregorian_to_jd($year, 1, 1);
        $leapadj = (($wjd < $this->gregorian_to_jd($year, 3, 1)) ? 0 : ($this->leap_gregorian($year) ? 1 : 2) );
        $month = floor(((($yearday + $leapadj) * 12) + 373) / 367);
        $day = ($wjd - $this->gregorian_to_jd($year, $month, 1)) + 1;
        return array($year, $month, $day);
    }
    function leap_islamic($year)
    {
        return ((($year * 11) + 14) % 30) < 11;
    }
    function islamic_to_jd($year, $month, $day)
    {
        return ($day + ceil(29.5 * ($month - 1)) + ($year - 1) * 354 + floor((3 + (11 * $year)) / 30) + $this->islamic_epoch) - 1;
    }
    function jd_to_islamic($jd)
    {
        $jd = floor($jd) + 0.5;
        $year = floor(((30 * ($jd - $this->islamic_epoch)) + 10646) / 10631);
        $month = min(12, ceil(($jd - (29 + $this->islamic_to_jd($year, 1, 1))) / 29.5) + 1);
        $day = ($jd - $this->islamic_to_jd($year, $month, 1)) + 1;
        return array($year, $month, $day);
    }
    function leap_persian($year)
    {
        return (((((($year - (($year > 0) ? 474 : 473)) % 2820) + 474) + 38) * 682) % 2816) < 682;
    }
    function persian_to_jd($year, $month, $day)
    {
        $epbase = $year - (($year >= 0) ? 474 : 473);
        $epyear = 474 + $this->mod($epbase, 2820);
        return $day + (($month <= 7) ? (($month - 1) * 31) : ((($month - 1) * 30) + 6)) + floor((($epyear * 682) - 110) / 2816) + ($epyear - 1) * 365 + floor($epbase / 2820) * 1029983 + ($this->persian_epoch - 1);
    }
    function jd_to_persian($jd)
    {
        $jd = floor($jd) + 0.5;
        $depoch = $jd - $this->persian_to_jd(475, 1, 1);
        $cycle = floor($depoch / 1029983);
        $cyear = $this->mod($depoch, 1029983);
        if ($cyear == 1029982) {
            $ycycle = 2820;
        } else {
            $aux1 = floor($cyear / 366);
            $aux2 = $this->mod($cyear, 366);
            $ycycle = floor(((2134 * $aux1) + (2816 * $aux2) + 2815) / 1028522) + $aux1 + 1;
        }
        $year = $ycycle + (2820 * $cycle) + 474;
        if ($year <= 0) {
            $year--;
        }
        $yday = ($jd - $this->persian_to_jd($year, 1, 1)) + 1;
        $month = ($yday <= 186) ? ceil($yday / 31) : ceil(($yday - 6) / 30);
        $day = ($jd - $this->persian_to_jd($year, $month, 1)) + 1;
        return array($year, $month, $day);
    }
}

function sec2date($mktime){
//    if($_GET['lang']=='en'){
        return date('j M Y', $mktime);
//    }else{
//        $date = new DateConvertor(date('Y-n-j', $mktime));
//        return $date->islamic['ymd'];
//    }
}
$mkTime=mktime(0,0,0,$mo,$day,$ye);
//echo sec2date($mkTime);
?>