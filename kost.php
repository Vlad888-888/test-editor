<?php
error_reporting(0);
$debag=0;
//foreach($_SERVER as $index => $val){echo($index.' '.$val.'<br>');}
if($debag==1){foreach($HTTP_SESSION_VARS as $sesind => $sesval){echo($sesind.' '.$sesval.'<br>');}}
$debag=0; 
foreach($_GET as $index => $val){$val = str_replace('"', '``',$val); $temp_array[$index] = htmlspecialchars($val); if($debag==1){ echo($index.' - '.$temp_array[$index].'<br>');}}
foreach($_POST as $index => $val){$val = str_replace('"', '``',$val); $temp_array[$index] = htmlspecialchars($val); if($debag==1){ echo($index.' = '.$temp_array[$index].'<br>');}}
///////////////// установка языка
if(strlen($_SESSION['GL_LangIndex'])<3){$_SESSION['GL_LangIndex'] = 'rus';}
if(strlen($_GET['LangIndex'])>0){$_SESSION['GL_LangIndex'] = $_GET['LangIndex'];}
///////////////// 
//echo($_SERVER['REQUEST_URI']);
if($_GET['login'] === 'login' && $_SESSION['GL_writer'] === "user"){ if($_POST['passw']=='111'){$_SESSION['GL_writer']='login'; $file_info=$_SERVER['REQUEST_URI'];}else{$file_info='login.php'; }}
else
if($_GET['login'] === 'logout'  && $_SESSION['GL_writer'] === "login"){unset($_SESSION['GL_writer']); $_SESSION['GL_writer']='user'; $file_info='index.php';}
else
if(strlen($_GET['login'])===0 && strlen($_SESSION['GL_writer']) === 0 ){$_SESSION['GL_writer']='user'; $file_info=$_SERVER['REQUEST_URI'];}
else{ $file_info=$_SERVER['REQUEST_URI'];}

if(strlen($file_info)<2 || strpos($file_info,"index.php")!==FALSE){$file_info='---'.$_SESSION['GL_LangIndex'].'.php';}
//echo('<br>!'.$file_info.' '.$_SERVER['REQUEST_URI']);
/////////////////


if(strpos($file_info,'-')!=FALSE){
  $tmp = split('-',$file_info);
  $temp_array['section']		=	$tmp[0];
  $temp_array['subsection']	=	$tmp[1];
  $temp_array['specialities'] =	$tmp[2];
  $file_info=$temp_array['section'].'-'.$temp_array['subsection'].'-'.$temp_array['specialities'].'-'.$_SESSION['GL_LangIndex'].'.php';
  //if(strlen($_GET['LangIndex'])>0){$_SESSION['GL_LangIndex']=$_GET['LangIndex'];}
  //else{
  //   if(strlen(substr($tmp[3],0, strpos($tmp[3],'.')))>1){$temp_array['LangIndex']	=	substr($tmp[3],0, strpos($tmp[3],'.')); $_SESSION['GL_LangIndex']=$temp_array['LangIndex'];}
  //  else{$_SESSION['GL_LangIndex']='rus';}
  //}
  }
  /*
  else{
  if(strlen($_GET['LangIndex'])>0){}
   else{$_SESSION['GL_LangIndex']='rus';}
  }
  */
//echo('<br>>>>>>('.$file_info.')');

if(file_exists($file_info)){include $file_info;}
  else{  //echo("shablon-".$_SESSION['GL_LangIndex'].".php");
      if(file_exists("shablon-".$_SESSION['GL_LangIndex'].".php")){include "shablon-".$_SESSION['GL_LangIndex'].".php";} // .htaccess
	    else{include "writes-page/new.php";}
	  }	

//<html	  
$content = $html;
//<head>';
$content.=$head_data;
  
$content.='<div id="docscreen" name="docscreen" class="docscreen"  align="center">';
$content.='<div id="bodydata" name="bodydata"'.$wl.'>'.chr(13).chr(10);


$content.=str_replace('background-image: url(&quot;img-upload/none&quot;)', 'background-image: none', $page_info);
$content.='</div>'.chr(13).chr(10);

if($_SESSION['GL_writer']==='login'){ //echo('GL_writer-'.$_SESSION['GL_writer']);
include "writes-page/writers_page.php";
$content.=$writes;
$script.='<script src="writes-page/js/jquery/jquery.js"  type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="writes-page/js/jquery/ifx.js"     type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="writes-page/js/jquery/idrop.js"   type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="writes-page/js/jquery/idrag.js"   type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="writes-page/js/jquery/iutil.js"   type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="writes-page/js/jquery/islider.js" type="text/javascript"></script>'.chr(13).chr(10);

$script.='<script src="writes-page/js/jquery/color_picker/color_picker.js" type="text/javascript"></script>'.chr(13).chr(10);
$script.='<link  href="writes-page/js/jquery/color_picker/color_picker.css" rel="stylesheet" type="text/css">'.chr(13).chr(10);
$script.='<script type="text/javascript"> $(document).ready(function(){$.ColorPicker.init();}); </script>'.chr(13).chr(10);
}

$script.='<script src="js.js" type="text/javascript"></script>'.chr(13).chr(10);
$script.='<script src="fj.js" type="text/javascript"></script>'.chr(13).chr(10);

$content.='</div>';
$content.=chr(13).chr(10).$script.chr(13).chr(10);
$content.='</body>'.chr(13).chr(10).'</html>';
echo($content);
?>