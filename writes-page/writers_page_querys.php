<?php
session_start();
$input = json_decode(file_get_contents("php://input"), true);
$var = $input['var'];
#############################################################################
if($var=='copy_page'){
$fname='editable_pages/';
$fname .= str_replace('_'.get_heap('lang',$query_str).'.php', '_'.get_heap('inaf_lang',$query_str).'.php', get_heap('file_name',$query_str));

$file_content= file_get_contents('editable_pages/'.get_heap('file_name',$query_str));
$file_content= str_replace("'", "`", $file_content);
$file_content= str_replace("$info=`", "$info='", $file_content);
$file_content= str_replace("`;
?>", "';
?>", $file_content);

if (!$filexx0 = fopen($fname, "w")) {echo("Не могу открыть файл (schedule_.xml)");}
if (fwrite($filexx0,$file_content ) === FALSE) {echo("Не могу произвести запись в файл (schedule_.xml)");}
fclose($filexx0);
//$alert=$fname;
}
#############################################################################
if($var=='paste_obj'){
if(file_exists("copy_data.php")){include "copy_data.php";}
$body=$value;
$help=$css;
//if (!$filexx0 = fopen("copy_data.php", "w")) {echo("Не могу открыть файл (schedule_.xml)");}
//if (fwrite($filexx0,$str ) === FALSE) {echo("Не могу произвести запись в файл (schedule_.xml)");}
//fclose($filexx0);
// $alert.=$value;
}
#############################################################################
if($var=='copy_info'){
$str="";	
if(strpos($query_str,'<script')!==FALSE){
$alert='документ содержит JS';
}
else{
$str ='<?php'.chr(13).chr(10);
$str.='$css=\''.get_heap('css',$query_str).'\';'.chr(13).chr(10);
$str=str_replace('background-image: url("upload/none");','background-image: none;',$str);
$str=str_replace('z-index: 3000;','',$str);

$str.='$value=\''.get_heap('body',$query_str).'\';'.chr(13).chr(10);
$str.='?>';
 
if (!$filexx0 = fopen("copy_data.php", "w")) {echo("Не могу открыть файл (sch_.xml)");}
if (fwrite($filexx0,$str ) === FALSE) {echo("Не могу произвести запись в файл (sch_.xml)");}
fclose($filexx0);

$body='ok';
}
 //$alert.=$subvar;
}
#############################################################################
if($var=='save_info'){
if(strpos($query_str,'<script')!==FALSE){
$alert='документ содержит JS';
}
else{
$query_str = str_replace("'", "`",$query_str);
$query_str='<?php'.chr(13).chr(10).'$info=\''.chr(13).chr(10).$query_str.'\';'.chr(13).chr(10).'?>';
$subvar = 'editable_pages/'.$subvar;
if (!$filexx0 = fopen($subvar, "w")) {echo("Не могу открыть файл (schedule_.xml)");}
if (fwrite($filexx0,$query_str ) === FALSE) {echo("Не могу произвести запись в файл (schedule_.xml)");}
fclose($filexx0);
}
 //$alert.=$subvar;
}
#############################################################################
//$GLOBALS['_RESULT']['query_body']=$body;
//$GLOBALS['_RESULT']['query_alert']=$alert;//.$var.' '.$subvar;
//$GLOBALS['_RESULT']['query_help']=$help;

//------------------------------------------------------------------------------ 
function put_heap($heap_name,$heap,$put){
$tmp="";
$str = get_heap($heap_name,$heap);
$tmp = str_replace($heap_name."=".$str.chr(13).chr(10), "", $heap);
$str = str_replace("'","",$put);
$str = str_replace('"','',$str);
$tmp = $tmp.$heap_name."=".htmlspecialchars($str).chr(13).chr(10);
return $tmp;
}
//------------------------------------------------------------------------------ 
function get_heap($heap_name,$heap){
 $str = "";
 if(strlen($heap)==0){$heap="\r\n";}
 $heap_name.='=';
 if(strpos($heap, $heap_name)!==FALSE){
 $str = substr($heap,strpos($heap, $heap_name)+strlen($heap_name),8000);
 $str = substr($str,0, strpos($str,chr(13).chr(10)));
 }
 else{$str = "";}
 return $str;
}
//------------------------------------------------------------------------------ 

/*
require_once "jshttprequest.php";
$JsHttpRequest =& new JsHttpRequest("windows-1251");

$var = $_REQUEST['query_var'];
$subvar = $_REQUEST['query_subvar'];
$query_str = $_REQUEST['query_str'];
$query_str = str_replace(chr(13).chr(10),'\r\n',$query_str);
$query_str = str_replace('|',chr(13).chr(10),$query_str);

$body='';
$help='';
$alert='';
*/

?>