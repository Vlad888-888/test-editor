<?php
$input = json_decode(file_get_contents("php://input"), true);

if($input['task'] === 'file_save'){
$file_content .= '<?php'.chr(13).chr(10);
$file_content .= '$html=\''.str_replace('\"', '"',$input['fhtml']).'\';'.chr(13).chr(10);
$file_content .= '$head_data=\''.str_replace('\"', '"',$input['fhead']).'\';'.chr(13).chr(10);
$file_content .= '$script=\''.str_replace('\"', '"',$input['fjsdata']).'\';'.chr(13).chr(10);
$file_content .= '$wl=\''.str_replace('\"', '"',$input['fwl']).'\';'.chr(13).chr(10);
$file_content .= '$page_info=\''.chr(13).chr(10).str_replace('\"', '"',trim($input['fdata'])).'\';'.chr(13).chr(10);
$file_content .= '?>'.chr(13).chr(10);

//$file_name = '../'.$_POST['fn'];
$file_name = $input['fn'];
//сохраняем старый файл
if(file_exists('../'.$file_name.'.php')){
$file_temp = file_get_contents('../'.$file_name.'.php');
$file_name='../save-page/'.date("YmdHis").'_'.$input['fn'].".php";
if (!$filexx0 = fopen($file_name, "w")) {echo("XXXXXXX (".$file_name.")");}
if (fwrite($filexx0, $file_temp) === FALSE) {echo("XXXXXX (".$entering_nom.")");}
    fclose($filexx0);
}

$file_name = $input['fn'];

//if(strpos($file_name, '.php')!==FALSE){}
//  else{$file_name=$file_name.'.php';}
  
//if (!$filexx0 = fopen('../'.$file_name.'.php', "w")) {echo("XXXXXX (".$file_name.")");}
//if (fwrite($filexx0,  iconv('UTF-8', 'WINDOWS-1251', $file_content)) === FALSE) {echo("XXXXXXXX(".$entering_nom.")");}
//    fclose($filexx0);

/*
if($input['fact'] === 'copydata'){
	 if(strpos($file_name, 'eng')!==FALSE){include "../shablon-eng.php";}
	   else{include "../shablon-rus.php";}
	 //include $_POST['fn'];
	 $ftmp = $page_info;
	 $ftmp = split('</div>',$ftmp);
	 
	 include "../".$file_name.".php";
	 $fdata = $page_info;
	 $fdata = split('</div>',$fdata);
	 
	 //foreach($ftmp as $index => $val){
	 for($i=0; $i<count($ftmp); $i++){
	 if(strpos($ftmp[$i], ' block;')!==FALSE && strpos($ftmp[$i],'The page is under construction')==FALSE){
//         if (fwrite($filexx0,  $ftmp[$i]) === FALSE) {echo("XXXXXXXX(".$entering_nom.")");}
		 $fdata[$i] = $ftmp[$i];
	 }
//	 else{
//         if (fwrite($filexx0,  $fdata[$i]) === FALSE) {echo("XXXXXXXX(".$entering_nom.")");}
//	 } 							 
	 }
	 $page_info = "";
	 $file_content="";
	 foreach($fdata as $index => $val){ if(strpos($val, 'objinfo')!==FALSE){$page_info .= trim($val).chr(13).chr(10).'</div>';}else{$page_info .= trim($val).chr(13).chr(10);} }
}
*/
/*
$file_content .= '<?php'.chr(13).chr(10);
$file_content .= '$html=\''.str_replace('\"', '"',$html).'\';'.chr(13).chr(10);
$file_content .= '$head_data=\''.str_replace('\"', '"',$head_data).'\';'.chr(13).chr(10);
$file_content .= '$script=\''.str_replace('\"', '"',$script).'\';'.chr(13).chr(10);
$file_content .= '$wl=\''.str_replace('\"', '"',$wl).'\';'.chr(13).chr(10);
$file_content .= '$page_info=\''.chr(13).chr(10).str_replace('\"', '"',trim($page_info)).'\';'.chr(13).chr(10);
$file_content .= '?>'.chr(13).chr(10);
*/

 if (!$filexx0 = fopen("../".$file_name.".php", "w")) {
	echo( '{"message": "Ошибка записи данных  - '.$file_name.'" }' );
}
  else{ 
	  //fwrite($filexx0, $file_content);  
	  //fclose($filexx0); 
	  echo('{"message": "Данные  - '.$file_name.' записаны" }');
	}

if (!$filexx0 = fopen('xxxxx.php', "w")) {}
else{fwrite($filexx0,  $file_content); fclose($filexx0);}

}
?>