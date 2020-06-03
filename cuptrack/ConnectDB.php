<?
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// -----------------------------------------------
// secure all input 
// -----------------------------------------------       
function security($value) {
    if(is_array($value)) {
      $value = array_map('security', $value);
    } else {
      if(!get_magic_quotes_gpc()) {
        $value = strip_tags($value);
        $value = htmlspecialchars($value, ENT_QUOTES);
        $value=trim($value);
        $value=addslashes($value); 
        $value = str_replace("UNION","",$value);
        $value = str_replace("SELECT","SELECT.",$value); 
        $value = str_replace("select","select.",$value); 
        $value = str_replace("FROM","FROM.",$value); 
        $value = str_replace("WHERE","WHERE.",$value); 
        $value = str_replace("update","update.",$value); 
        $value = str_replace("delete","delete.",$value); 
        $value = str_replace("drop","drop.",$value);
        $value = str_replace("php","",$value); 
		//$value = str_replace("," , "-" , $value); 
        
        
      } else {
      $value = strip_tags($value);
        $value = htmlspecialchars(stripslashes($value), ENT_QUOTES);
        $value=trim($value); 
        $value=addslashes($value);
        $value = str_replace("UNION","",$value);
        $value = str_replace("SELECT","SELECT.",$value); 
        $value = str_replace("select","select.",$value); 
        $value = str_replace("FROM","FROM.",$value); 
        $value = str_replace("WHERE","WHERE.",$value); 
        $value = str_replace("update","update.",$value); 
        $value = str_replace("delete","delete.",$value); 
        $value = str_replace("drop","drop.",$value);
        $value = str_replace("php","",$value);
		//$value = str_replace("," , "-" , $value); 
		       
       
      }
      $value = str_replace("\\", "\\\\", $value);
    }
    return $value;
} 
$_POST               =security($_POST);
$_GET                =security($_GET);
$_REQUEST            =security($_REQUEST);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////// encrypt function ///////////////////////
$encryption_key="we%$#@fsdghjFGHJHJJGF12345686746TJHSFGJ23$%YJGFNQ#$";
function encrypt($string, $key = '')
    {
    if (!$key)
        {
        global $encryption_key;
        $key=$encryption_key;
        }

    $result='';
    $i     =0;

    while ($i < strlen($string))
        {
        $char   = substr($string, $i, 1);
        $keychar=substr($key, $i % strlen($key) - 1, 1);
        $char   =chr(ord($char) + ord($keychar));
        $result.=$char;
        ++$i;
        }

    return base64_encode($result);
    }

function decrypt($string, $key = '')
    {
    if (!$key)
        {
        global $encryption_key;
        $key=$encryption_key;
        }

    $result='';
    $string=base64_decode($string);
    $i     =0;

    while ($i < strlen($string))
        {
        $char   = substr($string, $i, 1);
        $keychar=substr($key, $i % strlen($key) - 1, 1);
        $char   =chr(ord($char) - ord($keychar));
        $result.=$char;
        ++$i;
        }

    return $result;
    }
///////////////////////////// end of encrypt function ///////////////////////////////////////// 
//////////////////////////// number to text ////////////////////////////////////////////////////
function convert_number($number) 
{ 
    if (($number < 0) || ($number > 999999999)) 
    { 
    throw new Exception("Number is out of range");
    } 

    $Gn = floor($number / 1000000);  /* Millions (giga) */ 
    $number -= $Gn * 1000000; 
    $kn = floor($number / 1000);     /* Thousands (kilo) */ 
    $number -= $kn * 1000; 
    $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
    $number -= $Hn * 100; 
    $Dn = floor($number / 10);       /* Tens (deca) */ 
    $n = $number % 10;               /* Ones */ 

    $res = ""; 

    if ($Gn) 
    { 
        $res .= convert_number($Gn) . " Million"; 
    } 

    if ($kn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($kn) . " Thousand"; 
    } 

    if ($Hn) 
    { 
        $res .= (empty($res) ? "" : " ") . 
            convert_number($Hn) . " Hundred"; 
    } 

    $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", 
        "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", 
        "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", 
        "Nineteen"); 
    $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", 
        "Seventy", "Eigthy", "Ninety"); 

    if ($Dn || $n) 
    { 
        if (!empty($res)) 
        { 
            $res .= " and "; 
        } 

        if ($Dn < 2) 
        { 
            $res .= $ones[$Dn * 10 + $n]; 
        } 
        else 
        { 
            $res .= $tens[$Dn]; 

            if ($n) 
            { 
                $res .= "-" . $ones[$n]; 
            } 
        } 
    } 

    if (empty($res)) 
    { 
        $res = "zero"; 
    } 

    return $res; 
}
/////////////////////////////////////////////////////////////////////////////////////////////////

if($_SERVER['SERVER_NAME']== 'localhost'){
////////////////////////////////////////////////
// write database server        ////////////////
$dbserver="localhost";          ////////////////
// write user of database       ////////////////
$dbuser="root";                 ////////////////
// write password of database   ////////////////
$dbpass="";                 //////////////// 
// write database name          ////////////////
$dbname="cup";              ////////////////
////////////////////////////////////////////////
}else{
////////////////////////////////////////////////
// write database server        ////////////////
$dbserver="localhost";          ////////////////
// write user of database       ////////////////
$dbuser="";                 ////////////////
// write password of database   ////////////////
$dbpass="";                 //////////////// 
// write database name          ////////////////
$dbname="";              ////////////////
////////////////////////////////////////////////
}


///////////////////// don't edit here ///////////////////////////////////////////
$db = mysql_connect($dbserver,$dbuser,$dbpass);
mysql_set_charset('utf8',$db); 
$db_select = mysql_select_db($dbname);

date_default_timezone_set('Africa/Cairo');
error_reporting(E_ALL ^ E_NOTICE);
/////////////////////////////////////////////////////////////////////////////////
?>