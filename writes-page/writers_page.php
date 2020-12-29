<?php
$max_file_size = 5000000;
//echo($_SESSION['GL_LangIndex']);
$writes.='<label id="redactor" style="top:8px;left:30px;position:absolute;cursor:pointer;font-size:18px;color:#ccc;z-index:5001;" OnClick="login_redactor();">redactor</label>';
//-----------------------------------------------------------------------------------------------------------------------------------
$writes.='<div id="writes_menu" class="writes_menu" style="z-index:5001;">
<label id="menubutton" style="top: 3px;left:5px;width:95px;position:absolute;cursor:pointer;font-size:13px;color:#333;font-weight:bold;" OnClick="on_off_menu();">Меню</label>
<label id="filebutton" style="top:30px;left:5px;width:95px;position:absolute;cursor:pointer;font-size:13px;color:#333;display:block;background-color:transparent;" OnClick="on_off_filemenu();">File</label>
<label id="objbutton" style="top:50px;left:5px;width:95px;position:absolute;cursor:pointer;font-size:13px;color:#333;display:block;background-color:transparent;" OnClick="on_off_objtable();">Obj Table</label>

</div>';
//-----------------------------------------------------------------------------------------------------------------------------------
$writes.='<div id="imagediv" class="file_editor" style="overflow-x: hidden;padding:3px;">';
$writes.='<input type=image id="imageclosebutton" name="" value="" src="writes-page/image/close.png" alt="close" style="position:fixed;top:4px;left:570px;" OnClick="on_off_imageemenu();">';
//for($i=1;$i<=100;$i++){$writes.='<label class="objtablel" style="left:5px;top:'.($i*50).'" OnClick="getobjinfo('.$i.'); return false;">'.$i.'</label>';}
$i=1;
foreach (glob("img-upload/*.{jpg,png,gif}", GLOB_BRACE) as $filename){ //left:5px;top:'.($i*50).';
list($width, $height) = getimagesize($filename);
$writes.='<input type=image id="imageinf'.$i.'" name="" value="" src="'.$filename.'" alt="'.$filename.'" style="width:'.($width*0.2).'px;height:'.($height*0.2).'px;" OnClick="set_imagefrommenu(\''.$filename.'\');">';
$i++;
}
//foreach (glob("img-upload/*.png") as $filename){
//$writes.='<input type=image id="imageinf'.$i.'" name="" value="" src="'.$filename.'" alt="'.$filename.'" style="width:30%;height:30%;" OnClick="on_off_imageemenu();">';
//$i++;
//}
$writes.='</div>';
//-----------------------------------------------------------------------------------------------------------------------------------
$writes.='<div id="objtable" class="file_editor" style="top:100px;left:100px;width:800px;height:40px;overflow-y: hidden;">';
for($i=1;$i<=100;$i++){$writes.='<label id="otl'.$i.'" class="objtablel" style="left:'.($i*30-25).'px;" OnClick="getobjinfo('.$i.'); return false;">'.$i.'</label>';}
$writes.='</div>';
//-----------------------------------------------------------------------------------------------------------------------------------
$writes.='<div id="textdata" class="file_editor" style="top:100px;left:100px;width:800px;height:400px;overflow-y: hidden;display:none;">';
$writes.='<label style="top: 3px;left:3px;position:absolute;font-size:12px;color:#333;"><b>Font</b></label>';
$writes.='<label style="top: 22px;left:3px;position:absolute;font-size:11px;color:#333;"><b>font-family</b></label>';
$writes.='<input name="fontfamily" id="fontfamily" class="input_data" type=text value="Noto Sans" style="top:38px;left:3px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" list="dispfamily" OnKeyDown="if(event.keyCode==13){setfont(); return false;}"><datalist id="dispfamily"><option value="Noto Sans"><option value="Play"><option value="Caveat"><option value="Anonymous Pro"></datalist>'; 
$writes.='<label style="top: 22px;left:100px;position:absolute;font-size:11px;color:#333;"><b>font-size</b></label>';
$writes.='<input name="fontsize" id="fontsize" class="input_data" type=text value="1.4em" style="top:38px;left:100px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){setfont(); return false;}">'; 
$writes.='<label style="top: 22px;left:200px;position:absolute;font-size:11px;color:#333;"><b>font-weight</b></label>';
$writes.='<input name="fontweight" id="fontweight" class="input_data" type=text value="normal" style="top:38px;left:200px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" list="dispweight" OnKeyDown="if(event.keyCode==13){setfont(); return false;}"><datalist id="dispweight"><option value="normal"><option value="lighter"><option value="bolder"><option value="bold"><option value="100"><option value="200"><option value="300"><option value="400"><option value="500"><option value="600"><option value="700"><option value="800"><option value="900"></datalist>';
$writes.='<label style="top: 22px;left:300px;position:absolute;font-size:11px;color:#333;"><b>color</b></label>';
$writes.='<input name="fontcolor" id="fontcolor" class="input_data" type=text value="000000" style="top:38px;left:300px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;">'; 
$writes.='
	<div style="position:absolute;left:400px;top:38px;">
		<div style="float:left;">
		     <a href="javascript:void(0);" rel="colorpicker&objcode=fontcolor&objshow=myshowcolor3&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" >
		     <div id="myshowcolor3" style="width:16px;height:16px;border:1px solid black; margin-right: 10px;background-color: #000;">&nbsp;</div>
		     </a>
  	       </div>
	</div>
';

$writes.='<textarea id="textareadata" rows="1" cols="80" style="position:absolute;left:0px;top:60px;width:100%; height:180px;border;0px;" OnBlur="set_css_data(\'textareadata\');"></textarea>';
$writes.='<input type=image id="textdownbutton" name="" value="" src="writes-page/image/bottom.png" alt="close" style="position:absolute;top:4px;left:775px;display:block;height:15px;width:15px;" OnClick="on_off_text();">';
$writes.='<input type=image id="textupbutton" name="" value="" src="writes-page/image/top.png" alt="show" style="position:absolute;top:4px;left:775px;display:none;height:15px;width:15px;" OnClick="on_off_text();">';

$writes.='</div>';
//-----------------------------------------------------------------------------------------------------------------------------------
//$writes.='<input type=image id="ugollt" name="" value="" src="writes-page/image/ugollt.png" alt="close" style="position:absolute;top:25px;left:25px;display:none;z-index:5000;">';
//$writes.='<input type=image id="ugolrb" name="" value="" src="writes-page/image/ugolrb.png" alt="close" style="position:absolute;top:25px;left:25px;display:none;z-index:5000;">';
//-----------------------------------------------------------------------------------------------------------------------------------
if(file_exists($file_info)){}
  else{$file_tmp = '( Файл отсутствует )';}
$writes.='<div id="file_editor" class="file_editor">
<label style="top: 3px;left:15px;position:absolute;cursor:pointer;font-size:14px;color:#333;"><b>Текущая страница - </b> '.$file_info.' '.$file_tmp.'</label>
<label style="top:40px;left:15px;position:absolute;font-size:13px;color:#333;"><b>Контекст</b></label> 
<label style="top:45px;left:100px;position:absolute;font-size:13px;color:#333;">Раздел</label><input class="input_data" type=text id="section" name="section" style="left:150px;top:45px;width:450px;" value="'.$temp_array['section'].'" OnBlur="kyr_test(\'section\');">
<label style="top:70px;left:75px;position:absolute;font-size:13px;color:#333;">Подраздел</label><input class="input_data" type=text id="subsection" name="subsection" style="left:150px;top:70px;width:450px;" value="'.$temp_array['subsection'].'" OnBlur="kyr_test(\'subsection\');">
<label style="top:95px;left:113px;position:absolute;font-size:13px;color:#333;">Тема</label><input class="input_data" type=text id="specialities" name="specialities" style="left:150px;top:95px;width:450px;" value="'.$temp_array['specialities'].'" OnBlur="kyr_test(\'specialities\');">
<label style="top:120px;left:60px;position:absolute;font-size:13px;color:#333;">Локализация</label><input class="input_data" type=text id="flang" name="flang" style="left:150px;top:120px;width:450px;" value="'.$_SESSION['GL_LangIndex'].'" list="lang_list" OnBlur="kyr_test(\'flang\');"> <datalist id="lang_list" ><option>rus</option><option>eng</option></datalist>

<label style="top:145px;left:90px;position:absolute;font-size:13px;color:#333;">Тег html</label><textarea class="textarea_data" rows="1" cols="80" id="fhtml" name="fhtml" style="left:150px;top:145px;width:450px;" >'.$html.'</textarea>
<label style="top:180px;left:85px;position:absolute;font-size:13px;color:#333;">Тег head</label><textarea class="textarea_data" rows="8" cols="80" id="fhead" name="fhead" WRAP="virtual" style="left:150px;top:180px;width:450px;height:100px;">'.$head_data.'</textarea>

<label style="top:300px;left:85px;position:absolute;font-size:13px;color:#333;">script</label><textarea class="textarea_data" rows="8" cols="80" id="fscript" name="fscript" WRAP="virtual" style="left:150px;top:300px;width:450px;height:100px;">'.$script.'</textarea>

<label style="top:420px;left:30px;position:absolute;font-size:13px;color:#333;">Рабочий слой</label><textarea class="textarea_data" rows="4" cols="80" id="fwl" name="fwl"  WRAP="virtual" style="left:150px;top:420px;width:450px;height:45px;" >'.$wl.'</textarea>

<label style="top:490px;left:35px;position:absolute;font-size:15px;color:#333;">Сохранить как</label>
<label style="top:490px;left:150px;position:absolute;cursor:pointer;font-size:14px;color:#0000ff;font-weight: bold;" id="fsaveasis" OnClick="Savefile(\'asis\');">'.$temp_array['section'].'-'.$temp_array['subsection'].'-'.$temp_array['specialities'].'-'.$_SESSION['GL_LangIndex'].'</label>';
/*
$writes.='
<label style="top:525px;left:35px;position:absolute;font-size:15px;color:#333;">Перенести данные на шаблон </label>';
if($_SESSION['GL_LangIndex']==='eng'){
$writes.='<label style="top:525px;left:260px;position:absolute;cursor:pointer;font-size:14px;color:#0000ff;font-weight: bold;" id="fsavecopydata" OnClick="Savefile(\'copydata\');">'.$temp_array['section'].'-'.$temp_array['subsection'].'-'.$temp_array['specialities'].'-rus</label>';
}
else{
$writes.='<label style="top:525px;left:260px;position:absolute;cursor:pointer;font-size:14px;color:#0000ff;font-weight: bold;" id="fsavecopydata" OnClick="Savefile(\'copydata\');">'.$temp_array['section'].'-'.$temp_array['subsection'].'-'.$temp_array['specialities'].'-eng</label>';
}
$writes.='
<label style="top:560px;left:35px;position:absolute;font-size:15px;color:#333;">Сохранить как</label>
<label style="top:560px;left:150px;position:absolute;cursor:pointer;font-size:14px;color:#800000;font-weight: bold;" id="fsaveshablon" OnClick="Savefile(\'shablon\');">shablon-'.$_SESSION['GL_LangIndex'].'.php</label>
<input type=image name="" value="" src="writes-page/image/close.png" alt="close" style="position:absolute;top:4px;left:575px;" OnClick="on_off_filemenu();">';
*/
$writes.='</div>';
//-----------------------------------------------------------------------------------------------------------------------------------
$writes.='<div class="file_editor" id="objparam" style="width:220px;display:none;overflow-y: auto;">';
$writes.='<label style="top:1px;left:5px;position:absolute;"><b>ObjId - </b></label><label style="top:1px;left:70px;position:absolute;font-family:Tahoma;font-weight:bold;color:#ff8040" id="labelobjid"></label>';
$writes.='<input type=image name="" value="" src="writes-page/image/close.png" alt="close" style="position:absolute;top:4px;left:176px;" OnClick="off_objparam();">';

$top=21;
$objid="display_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">display</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="displL"><datalist id="displL"><option value="block"><option value="none"></datalist>';

$top=$top+25;
$objid="visibility_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">visibility</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="visibility" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="visibilitylL"><datalist id="visibilitylL"><option value="visible"><option value="hidden"></datalist>';

$top=$top+25;
$objid="z-index_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">z-index</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}">';

$top=$top+25;
$objid="top_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">top</label>';
$writes.='<img src="writes-page/image/left.png" alt="" height=15 width=15 border=0 style="left:62px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="minus_value(\''.$objid.'\'); return false;">';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:50px;border:1px;border-style:solid;text-align:center;position:absolute;" OnBlur="numerick_control(\''.$objid.'\'); return false;" OnKeyDown="if(event.keyCode==13){numerick_control(\''.$objid.'\'); set_css_data(\''.$objid.'\'); return false;}">';
$writes.='<img src="writes-page/image/right.png" alt="" height=15 width=15 border=0 style="left:135px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="plus_value(\''.$objid.'\'); return false;">';

$top=$top+25;
$objid="left_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">left</label>';
$writes.='<img src="writes-page/image/left.png" alt="" height=15 width=15 border=0 style="left:62px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="minus_value(\''.$objid.'\'); return false;">';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:50px;border:1px;border-style:solid;text-align:center;position:absolute;" OnBlur="numerick_control(\''.$objid.'\'); return false;" OnKeyDown="if(event.keyCode==13){numerick_control(\''.$objid.'\'); set_css_data(\''.$objid.'\'); return false;}">';
$writes.='<img src="writes-page/image/right.png" alt="" height=15 width=15 border=0 style="left:135px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="plus_value(\''.$objid.'\'); return false;">';

$top=$top+25;
$objid="height_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">height</label>';
$writes.='<img src="writes-page/image/left.png" alt="" height=15 width=15 border=0 style="left:62px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="minus_value(\''.$objid.'\'); return false;">';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:50px;border:1px;border-style:solid;text-align:center;position:absolute;" OnBlur="numerick_control(\''.$objid.'\'); return false;" OnKeyDown="if(event.keyCode==13){numerick_control(\''.$objid.'\'); set_css_data(\''.$objid.'\'); return false;}">';
$writes.='<img src="writes-page/image/right.png" alt="" height=15 width=15 border=0 style="left:135px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="plus_value(\''.$objid.'\'); return false;">';

$top=$top+25;
$objid="width_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">width</label>';
$writes.='<img src="writes-page/image/left.png" alt="" height=15 width=15 border=0 style="left:62px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="minus_value(\''.$objid.'\'); return false;">';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:50px;border:1px;border-style:solid;text-align:center;position:absolute;" OnBlur="numerick_control(\''.$objid.'\'); return false;" OnKeyDown="if(event.keyCode==13){numerick_control(\''.$objid.'\'); set_css_data(\''.$objid.'\'); return false;}">';
$writes.='<img src="writes-page/image/right.png" alt="" height=15 width=15 border=0 style="left:135px;top:'.$top.'px;position:absolute;cursor:pointer;" OnClick="plus_value(\''.$objid.'\'); return false;">';

$top=$top+25;
$objid="text-align_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">text-align</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_text-align"><datalist id="list_text-align"><option value="center"><option value="justify"><option value="left"><option value="right"><option value="start"><option value="end"></datalist>';

$top=$top+25;
$objid="text-indent_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">text-indent</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_line-height">';

$top=$top+25;
$objid="writing-mode_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">writing-mode</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_writing-mode"><datalist id="list_writing-mode"><option value="horizontal-tb"><option value="vertical-rl"><option value="vertical-lr"></datalist>'; 

$top=$top+25;
$objid="line-height_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">line-height</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_line-height"><datalist id="list_line-height"><option value="1.5"><option value="0.8em"></datalist>';

$top=$top+25;
$objid="overflow-y_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">overflow-y</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_overflow-y"><datalist id="list_overflow-y"><option value="visible"><option value="hidden"><option value="scroll"><option value="auto"></datalist>';

$top=$top+25;
$objid="overflow-x_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">overflow-x</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:80px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_overflow-x"><datalist id="list_overflow-x"><option value="visible"><option value="hidden"><option value="scroll"><option value="auto"></datalist>';

$top=$top+25;
$objid="opacity_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">opasity</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="opacityL"><datalist id="opacityL">'; for($op=1;$op>0.1;$op=$op-0.1){$writes.='<option value="'.$op.'">';} $writes.='</datalist>';

$top=$top+25;
$objid="cursor_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">cursor</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}">';

$top=$top+25;
$objid="attribute_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">attribut</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="attributL"><datalist id="attributL"><option value=alt="открыть"></datalist>';

$top=$top+30;
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;font-weight:bold;letter-spacing: 2.25px;">background</label>';

$top=$top+25;
$objid="backgroundColor_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">color</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:70px;border:1px;border-style:solid;text-align:center;position:absolute;" OnChange="set_css_data(\''.$objid.'\'); return false;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_bgcolor"><datalist id="list_bgcolor"><option value="transparent"></datalist>';
$writes.='
	<div style="position:absolute;left:140px;top:'.$top.'px;">
		<div style="float:left;">
		     <a href="javascript:void(0);" rel="colorpicker&objcode=backgroundColor_inf&objshow=myshowcolor1&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" >
		     <div id="myshowcolor1" style="width:16px;height:16px;border:1px solid black; margin-right: 10px;">&nbsp;</div>
		     </a>
  	       </div>
	</div>
';

$top=$top+25;
$objid="bg_image_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">image</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:70px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}">';
$writes.='<input type=image name="" value="" src="writes-page/image/on.png" alt="close" style="position:absolute;top:'.($top+2).'px;left:140px;width:15px;height:15px;" OnClick="on_off_imageemenu(\'bg_image_inf\');">';

$top=$top+25;
$objid="bg_repeat_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">repeat</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bg_repeat"><datalist id="bg_repeat"><option value="repeat"><option value="no-repeat"><option value="repeat-x"><option value="repeat-y"></datalist>';

$top=$top+25;
$objid="bg_size_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">size</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bg_size"><datalist id="bg_size"><option value="auto auto"><option value="100px 100px"><option value="100% 100%"><option value="cover"><option value="contain"></datalist>';

$top=$top+25;
$objid="bg_position_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">position</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bg_position"><datalist id="bg_position"><option value="50px 50px"><option value="0% 0%"><option value="0% 100%"><option value="right"><option value="100% 0%"><option value="100% 100%"><option value="calc(100% - 20px) 0"></datalist>';

$top=$top+25;
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;font-weight:bold;letter-spacing: 2.25px;">border</label>';

$top=$top+25;
$objid="bor_style_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">style</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_styleL"><datalist id="bor_styleL"><option value="none"><option value="dotted"><option value="dashed"><option value="solid"><option value="double"><option value="groove"><option value="ridge"><option value="inset"><option value="outset"></datalist>';

$top=$top+22;
$objid="bor_width_top_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">t width</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL"><datalist id="bor_widthL">'; for($op=0;$op<=5;$op++){$writes.='<option value="'.$op.'px">';} $writes.='</datalist>';

$top=$top+22;
$objid="bor_width_left_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">l width</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';//<datalist id="bor_widthL">'; for($op=0;$op<=5;$op++){$writes.='<option value="'.$op.'px">';} $writes.='</datalist>';

$top=$top+22;
$objid="bor_width_right_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">r width</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';//<datalist id="bor_widthL">'; for($op=0;$op<=5;$op++){$writes.='<option value="'.$op.'px">';} $writes.='</datalist>';

$top=$top+22;
$objid="bor_width_bottom_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">b width</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';//<datalist id="bor_widthL">'; for($op=0;$op<=5;$op++){$writes.='<option value="'.$op.'px">';} $writes.='</datalist>';

$top=$top+22;
$objid="bor_color_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">color</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:70px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="list_bgcolor">';
$writes.='
	<div style="position:absolute;left:140px;top:'.($top-1).'px;z-index:5100;">
		<div style="float:left;">
		     <a href="javascript:void(0);" rel="colorpicker&objcode=bor_color_inf&objshow=myshowcolor2&showrgb=1&okfunc=myokfunc" style="text-decoration:none;" >
		     <div id="myshowcolor2" style="width:16px;height:16px;border:1px solid black; margin-right: 10px;">&nbsp;</div>
		     </a>
  	       </div>
	</div>
';

$top=$top+22;
$objid="bor_radius_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">radius</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_radiusL"><datalist id="bor_radiusL"><option value="10px"><option value="40px 10px"><option value="10em/1em"><option value="50px 0 0 50px"></datalist>';

$top=$top+27;
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;font-weight:bold;letter-spacing: 2.25px;">padding</label>';

$top=$top+20;
$objid="padd_top_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">t padd</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';

$top=$top+20;
$objid="padd_left_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">l padd</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';

$top=$top+20;
$objid="padd_right_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">r padd</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';

$top=$top+20;
$objid="padd_bottom_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">t padd</label>';
$writes.='<input name="'.$objid.'" id="'.$objid.'" class="input_data" type=text value="" style="top:'.$top.'px;left:60px;width:90px;border:1px;border-style:solid;text-align:center;position:absolute;" OnKeyDown="if(event.keyCode==13){set_css_data(\''.$objid.'\'); return false;}" list="bor_widthL">';

$top=$top+35;
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;"><b>Copy obj</b></label>';

$top=$top+20;
$objid="copy_inf";
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">Copy</label>';
$writes.='<label name="'.$objid.'" id="'.$objid.'" style="top:'.$top.'px;left:60px;height:15px;width:90px;border:1px;border-style:solid;border-color:#908585;border-radius:6px;text-align:center;color:#000;position:absolute;cursor:pointer;" onMouseOver="this.style.backgroundColor=\'#ff8040\';this.style.color=\'#fff\';" onMouseOut="this.style.backgroundColor=\'#eee\';this.style.color=\'#000\';" OnClick="copy_obj();">copy obj</label>';

$top=$top+24;
$objid="paste_inf";
$writes.='<span id="paste_block" style="display:none;">';
$writes.='<label style="top:'.$top.'px;left:4px;position:absolute;">Paste</label>';
$writes.='<label name="'.$objid.'" id="'.$objid.'" style="top:'.$top.'px;left:60px;height:15px;width:90px;border:1px;border-style:solid;border-color:#908585;border-radius:6px;text-align:center;color:#000;position:absolute;cursor:pointer;"  onMouseOver="this.style.backgroundColor=\'#ff8040\';this.style.color=\'#fff\';" onMouseOut="this.style.backgroundColor=\'#eee\';this.style.color=\'#000\';" OnClick="paste_obj();">paste obj</label>';
$writes.='</span>';

$top=$top+30;
$writes.='<input type=image name="" value="" src="writes-page/image/save.png" alt="save" style="position:absolute;top:'.$top.'px;left:110px;" OnClick="set_css_data(\'null\'); off_objparam();">';

$writes.='</div>';
//-----------------------------------------------------------------------------------------------------------------------------------

//$script.='<script type="text/javascript">  $(document).ready(function(){$.ColorPicker.init();});</script>';

?>