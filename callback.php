<?php
if (!$filexx0 = fopen("fn.txt", "w")) {echo("XXXXXX (".$file_name.")");}
if (fwrite($filexx0,  $_POST['task']) === FALSE) {echo("XXXXXXXX(".$entering_nom.")");}
    fclose($filexx0);

if($_POST['task']=='get_callback'){
/*
$file_content .= '<?php'.chr(13).chr(10);
$file_content .= '$html=\''.str_replace('\"', '"',$_POST['fhtml']).'\';'.chr(13).chr(10);
$file_content .= '$head_data=\''.str_replace('\"', '"',$_POST['fhead']).'\';'.chr(13).chr(10);
$file_content .= '$script=\''.str_replace('\"', '"',$_POST['fjsdata']).'\';'.chr(13).chr(10);
$file_content .= '$wl=\''.str_replace('\"', '"',$_POST['fwl']).'\';'.chr(13).chr(10);
$file_content .= '$page_info=\''.chr(13).chr(10).str_replace('\"', '"',trim($_POST['fdata'])).'\';'.chr(13).chr(10);
$file_content .= '?>'.chr(13).chr(10);

$file_name = '../'.$_POST['fn'];
if(file_exists($file_name)){
$file_temp = file_get_contents($file_name);
$file_name='../save-page/'.date("YmdHis").'_'.$_POST['fn'].'.php';
if (!$filexx0 = fopen($file_name, "w")) {echo("XXXXXXX (".$file_name.")");}
if (fwrite($filexx0, $file_temp) === FALSE) {echo("XXXXXX (".$entering_nom.")");}
    fclose($filexx0);
}

$file_name = '../'.$_POST['fn'];
if (!$filexx0 = fopen($file_name, "w")) {echo("XXXXXX (".$file_name.")");}
if (fwrite($filexx0,  iconv('UTF-8', 'WINDOWS-1251', $file_content)) === FALSE) {echo("XXXXXXXX(".$entering_nom.")");}
    fclose($filexx0);
*/
echo('CallBack rez');
}
echo 'CallBXXXXXXXXXXXXXXXXXXXXXXxxack rez';
?>