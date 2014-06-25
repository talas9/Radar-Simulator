<?php
/**
 * @FileName "class.math.php"
 * @FilePath "./includes/"
 * @Author "Mohammed Talas"
 * @Email "Talas9@gmail.com"
 * @Copyright "2013"
 */
(!defined('STS')?header('location: ../'):Null);
class math{
    public function html_decoder($html_encoded){
        $output = str_replace("&lt;","<",$html_encoded);//Decode
        $output = str_replace("&gt;",">",$output);//Decode
        $output = str_replace("\\\"","\"",$output);//Decode
        $output = str_replace("\'","'",$output);//Decode
        return $output;
    }
    public function html_encoder($html_code){
        $output = str_replace("<","&lt;",$html_code);//Encode
        $output = str_replace(">","&gt;",$output);//Encode
        $output = str_replace("\"","\\\"",$output);//Encode
        $output = str_replace("'","\'",$output);//Encode
        return $output;
    }
    public function addZero($n,$zc = 1){
        $n = intval($n);
        if(is_int($n)) {
            if($zc == 1){
                if($n >= 0 && $n <= 9)
                    $n = strval("0" . $n);
            }elseif($zc == 2){
                if($n >= 0 && $n <= 9)
                    $n = strval("00" . $n);
                elseif($n >= 10 && $n <= 99)
                    $n = strval("0" . $n);
            }
        }
        return $n;
    }
    public function periodCalc($a,$b,$p=false){
        $c = strval($b) - strval($a);
        function mi($i){return floor($i/60);}
        function hour($i){return floor($i/3600);}
        function day($i){return floor($i/86400);}
        function month($i){return floor($i/2592000);}
        function year($i){return floor($i/31536000);}
        $i = $c;
        $v = '';
        if($i >= 31536000)
            $start = 'y';
        elseif($i >= 2592000)
            $start = 'm';
        elseif($i >= 86400)
            $start = 'd';
        elseif($i >= 3600)
            $start = 'h';
        elseif($i >= 60)
            $start = 'mi';
        elseif($i >= 0)
            $start = 's';
        while ($i >= 0){
            if($i >= 31536000){
                $y = year($i);
                if($start == 'y')
                    $v .= "(".$y.") Year".($y>1?'s':'');
                $i -= $y*31536000;
            }elseif($i >= 2592000){
                $m = month($i);
                if($start == 'y' || $start == 'm')
                    $v .=(strlen($v)>2?', ':Null)."(".$m.") Month".($m>1?'s':'');
                $i -= $m*2592000;
            }elseif($i >= 86400){
                $d = day($i);
                if($start == 'y' || $start == 'm' || $start == 'd')
                    $v .=(strlen($v)>2?', ':Null)."(".$d.") Day".($d>1?'s':'');
                $i -= $d*86400;
            }elseif($i >= 3600){
                $h = hour($i);
                if($start == 'm' || $start == 'd' || $start == 'h')
                    $v .=(strlen($v)>2?', ':Null)."(".$h.") Hour".($h>1?'s':'');
                $i -= $h*3600;
            }elseif($i >= 60){
                $mi = mi($i);
                if($start == 'd' || $start == 'h' || $start == 'mi')
                    $v .=(strlen($v)>2?', ':Null)."(".$mi.") Minute".($mi>1?'s':'');
                $i -= $mi*60;
            }elseif($i >= 0){
               $s = $i;
               if($start == 'h' || $start == 'mi' || $start == 's')
               $v .=(strlen($v)>2?', ':Null)."(".$s.") Second".($s>1?'s':'');
               $i -= ($s+1);  
            }
        }
        $l = Strripos($v, ',');
        $v = (substr($v, 0, $l)?substr($v, 0, $l)." and".substr($v,$l+1,strlen($v)-$l):null);
        return ($p?$c:$v);
    }
    public function fullTimeAgo($oldTime, $newTime) {
        $timeCalc = strtotime($newTime) - strtotime($oldTime);
        if ($timeCalc > (60*60*24)) {$timeCalc = round($timeCalc/60/60/24) . " days ago";}
        else if ($timeCalc > (60*60)) {$timeCalc = round($timeCalc/60/60) . " hours ago";}
        else if ($timeCalc > 60) {$timeCalc = round($timeCalc/60) . " minutes ago";}
        else if ($timeCalc > 0) {$timeCalc .= " seconds ago";}
        return $timeCalc;
    }
    public function secondsTimeAgo($timeCalc) {
        if ($timeCalc > (60*60*24)) {$timeCalc = round($timeCalc/60/60/24) . " days ago";}
        else if ($timeCalc > (60*60)) {$timeCalc = round($timeCalc/60/60) . " hours ago";}
        else if ($timeCalc > 60) {$timeCalc = round($timeCalc/60) . " minutes ago";}
        else if ($timeCalc > 0) {$timeCalc .= " seconds ago";}
        return $timeCalc;
    }
    public function money($number, $decemals = 2, $thousands = true){
        $det = ($thousands?',':Null);
        $number1 = number_format($number, $decemals,'.', $det);
        return $number1;
    }
    public function now($type = "timestamp"){
        date_default_timezone_set("UTC"); 
        $t = time();
        if($type == "date")
            $t = $this->timestamptodate($t);
        elseif($type == "datetime")
            $t = $this->timestamptofulldate($t);
        return $t;
    }
    public function timeCalc($t,$v){
        $a = $this->fulldatetotimestamp($t);
        $b = intval($a) + intval($v);
        return $this->timestamptofulldate($b);
    }
    public function datetotimestamp($date){
        date_default_timezone_set("UTC"); 
        $t = explode("-", $date);
        return mktime(0, 0, 0, $t[1], $t[2], $t[0]);
    }
    public function fulldatetotimestamp($date){
        date_default_timezone_set("UTC"); 
        $date = explode(" ", $date);
        $d = explode("-", $date[0]);
        $t = explode(":", $date[1]);
        return mktime($t[0], $t[1], $t[2], $d[1], $d[2], $d[0]);
    }
    public function timestamptofulldate($timestamp){
        date_default_timezone_set("UTC"); 
        $a = getdate($timestamp);
        $d = "-";
        $s = " ";
        $c = ":";
        $x = $a["year"] . $d . $this->addZero($a["mon"]) . $d . $this->addZero($a["mday"]) . $s .
            $this->addZero($a["hours"]) . $c . $this->addZero($a["minutes"]) . $c . $this->addZero($a["seconds"]);
        return $x;
    }
    public function timestamptodate($timestamp){
        date_default_timezone_set("UTC"); 
        $a = getdate($timestamp);
        return $a["year"] . "-" . $this->addZero($a["mon"]) . "-" . $this->addZero($a["mday"]);
    }
    public function randomPassword(){
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
    }
    public function randomSalt() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
    public function unique_number($length = 32) {
        $a = trim(str_replace(array("."," "),null,microtime()));
        $aLen = strlen($a);
        $bLen = $length - $aLen;
        $bStart = str_repeat("1",32);
        $bEnd = str_repeat("9",32);
        $b = rand($bStart,$bEnd);
        $c = $b.$a;
        return $c;
    }
    public function unique() {
        return md5(microtime());
    }
    public function timestamptofulldateArray($timestamp){
        $a = getdate($timestamp);
        $x = array(
            0 => $a["year"],
            1 => $this->addZero($a["mon"]),
            2 => $this->addZero($a["mday"]),
            3 => $this->addZero($a["hours"]),
            4 => $this->addZero($a["minutes"]),
            5 => $this->addZero($a["seconds"]),
            "year" => $a["year"],
            "month" => $this->addZero($a["mon"]),
            "day" => $this->addZero($a["mday"]),
            "hours" => $this->addZero($a["hours"]),
            "minutes" => $this->addZero($a["minutes"]),
            "seconds" => $this->addZero($a["seconds"]));
        return $x;
    }
    public function formatSizes($bytes, $precision = 2) { 
        $units = array('B', 'KB', 'MB', 'GB', 'TB'); 
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
         $bytes /= pow(1024, $pow);
        // $bytes /= (1 << (10 * $pow)); 
        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }
    public function convertResult($rs, $type, $jsonmain=""){
        $jsonArray = array();
        $csvString = "";
        $csvcolumns = "";
        $count = 0;
        while($r = $rs->fetch_row()) {
            for($k = 0; $k < count($r); $k++) {
                $rs->field_seek($k);
                $finfo = $rs->fetch_field();
                $jsonArray[$count][$finfo->name] = $r[$k];
                $csvString.=",\"".$r[$k]."\"";
                if (!$count) $csvcolumns.=($csvcolumns?",":"").$finfo->name;
            }
            $csvString.="\n";
            $count++;
        }
        $jsondata = "{\"$jsonmain\":".json_encode($jsonArray)."}";
        $csvdata = str_replace("\n,","\n",$csvcolumns."\n".$csvString);
        return (strtolower($type)=="csv"?$csvdata:$jsondata);
    }
}
?>
