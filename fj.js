   //console.log(document.getElementById('objinfo23').attributes);
   ////////////////// 
function login_redactor(){
        var tmp = document.getElementById('redactor').innerHTML;
        if(tmp==='redactor'){  document.getElementById('redactor').innerHTML = "logout"; 
           document.getElementById('writes_menu').style.display = "block"; 
           document.getElementById('ugolrb').style.display = "block"; 
           document.getElementById('ugollt').style.display = "block"; 
           document.getElementById('bodydata').style.borderWidth = "1px:";
        
        }
          else{ window.location = "index.php?login=logout"; }
}
////////////////// 
function on_off_menu(){ 
    var tmp= 'none';
    if( document.getElementById('menubutton').innerHTML ==='Меню'){ document.getElementById('menubutton').text='Скрыть';  document.getElementById('writes_menu').style.height="200px"; tmp='block';}
      else{ document.getElementById('menubutton').text = 'Меню';  document.getElementById('writes_menu').style.height="20px";  tmp='none';}
document.getElementById('ugollt').style.display=tmp;
document.getElementById('ugolrb').style.display=tmp;
if(tmp == 'none'){ on_off_objtable('none'); on_off_filemenu('none'); off_objparam(); }		  
}
////////////////// 
function on_off_filemenu(ind){ 
w = document.body.clientWidth;
h = document.body.clientHeight;

if( document.getElementById('file_editor').style.display=='none' || document.getElementById('file_editor').style.display=='' ){
    document.getElementById('file_editor').style.left=(w/2)-300;
    document.getElementById('file_editor').style.top=(h/2)-300;
    document.getElementById('file_editor').style.display='block';
}
else{
    document.getElementById('file_editor').style.display='none';
}

if(ind == 'none'){document.getElementById('file_editor').style.display='none';}
}
//////////////////
function on_off_objtable(vh){
        w = document.body.clientWidth;
        h = document.body.clientHeight;
        
          if( document.getElementById('objtable').style.display=='none' || document.getElementById('objtable').style.display=='' || vh=='block'){
            for(i=1;i<=100;i++){ 
              if(document.getElementById('objinfo'+i).style.display=='block'){ document.getElementById('otl'+i).style.backgroundColor='#fff'; } 
              else{	document.getElementById('otl'+i).style.backgroundColor='#ccc'; }	
           
            }
            document.getElementById('objtable').style.left    = '5px';
            document.getElementById('objtable').style.top     = (h-65)+'px';
            document.getElementById('objtable').style.display ='block';
          }
          else{
              document.getElementById('objtable').style.display='none';
              textdata_show_hide('none');	
              document.getElementById('objparam').style.display='none';
          }
          //console.log(document.getElementById('objtable').style.top)
}
////////////////// 
function textdata_show_hide(sh){
    h = document.body.clientHeight;
      if(sh=='block'){
        if(document.getElementById('textdownbutton').style.display=='block'){
        document.getElementById('textdata').style.left=5;
        document.getElementById('textdata').style.top=h-320;
        document.getElementById('textdata').style.height=250;
        document.getElementById('textdata').style.display='block';
        }
        else{
        document.getElementById('textdata').style.height='20px';
        document.getElementById('textdata').style.top=h-90;
        document.getElementById('textdata').style.display='block';
        }
      }
      else{
        document.getElementById('textdata').style.display='none';
      }
     
}    
    //////////////////
var objx = null;
function getobjinfo(ind){
    if(document.getElementById('objinfo'+ind)){        
    
    textdata_show_hide('block');
    
    for(i=1;i<=100;i++){      
    document.getElementById('otl'+i).style.backgroundColor='#ffffff';
    //document.getElementById('objinfo'+i).style.zIndex=(1000+i);
    //document.getElementById('objinfo'+i).style.borderStyle='none';
     if(document.getElementById('objinfo'+i).style.display=='none'){document.getElementById('otl'+i).style.backgroundColor='#cccccc'; }
     else{document.getElementById('otl'+i).style.backgroundColor='#ffffff';}
     document.getElementById('otl'+i).style.color='#000000';
    }
    
    document.getElementById('otl'+ind).style.backgroundColor='#ff8040';
    document.getElementById('otl'+ind).style.color='#ffffff';
    objx = document.getElementById('objinfo'+ind);
    
    document.getElementById('textareadata').value = objx.innerHTML; 
    
    document.getElementById('labelobjid').innerHTML = ind; 
    
    get_style(ind);
    
    document.getElementById('copy_inf').innerHTML='copy obj-'+ind;
    
    w = document.body.clientWidth;
    h = document.body.clientHeight;
    document.getElementById('objparam').style.left=w-230;
    document.getElementById('objparam').style.top=40;
    document.getElementById('objparam').style.display='block';
    }
    
    return false;
}
////////////////// 
function get_style(ind){ 
    document.getElementById('top_inf').value=document.getElementById('objinfo'+ind).style.top.replace('px',''); 
    document.getElementById('left_inf').value=document.getElementById('objinfo'+ind).style.left.replace('px',''); 
    document.getElementById('height_inf').value=document.getElementById('objinfo'+ind).style.height.replace('px',''); 
    document.getElementById('width_inf').value=document.getElementById('objinfo'+ind).style.width.replace('px',''); 
    document.getElementById('text-align_inf').value=document.getElementById('objinfo'+ind).style.textAlign;
    document.getElementById('text-indent_inf').value=document.getElementById('objinfo'+ind).style.textIndent; 
    document.getElementById('writing-mode_inf').value=document.getElementById('objinfo'+ind).style.writingMode; 
    document.getElementById('line-height_inf').value=document.getElementById('objinfo'+ind).style.lineHeight;
    document.getElementById('z-index_inf').value=document.getElementById('objinfo'+ind).style.zIndex;
    document.getElementById('cursor_inf').value=document.getElementById('objinfo'+ind).style.cursor;
    //
    //перебор свойств в объект для копирования/сохранения
    var attrs = document.getElementById('objinfo'+ind).attributes;
    //$.each(attrs,function(i,elem){
    for(i=0;i<attrs.length;i++){
    if(attrs[i].name != 'id' && attrs[i].name != 'name' && attrs[i].name != 'style'){
            document.getElementById('attribute_inf').value=attrs[i].name+'="'+attrs[i].value+'"'; 
            //console.log(attrs[i].name+' '+attrs[i].value);
        } 
        else{document.getElementById('attribute_inf').value='';}
      }
     
    if(document.getElementById('objinfo'+ind).style.backgroundColor=='transparent' || document.getElementById('objinfo'+ind).style.backgroundColor==''){
        document.getElementById('backgroundColor_inf').value='transparent';
        document.getElementById('myshowcolor1').style.backgroundColor='transparent';
        }
    else{
    var rgb = getComputedStyle(document.getElementById('objinfo'+ind),"").backgroundColor.match(/\d+/g);  
    var str_tmp='';
    if(parseInt(rgb[0]).toString(16).length>1){str_tmp=parseInt(rgb[0]).toString(16);}
    else{str_tmp='0'+parseInt(rgb[0]).toString(16);}
    if(parseInt(rgb[1]).toString(16).length>1){str_tmp=str_tmp+parseInt(rgb[1]).toString(16);}
    else{str_tmp=str_tmp+'0'+parseInt(rgb[1]).toString(16);}
    if(parseInt(rgb[2]).toString(16).length>1){str_tmp=str_tmp+parseInt(rgb[2]).toString(16);}
    else{str_tmp=str_tmp+'0'+parseInt(rgb[2]).toString(16);}
    document.getElementById('backgroundColor_inf').value=str_tmp;
    document.getElementById('myshowcolor1').style.backgroundColor="#"+str_tmp;
    }
    
    var temp_img = document.getElementById('objinfo'+ind).style.backgroundImage;
    //console.log('161 - '+temp_img)
    if(temp_img.length>0){
    temp_img = temp_img.replace('url("img-upload/',''); 
    temp_img = temp_img.replace('")','');
    document.getElementById('bg_image_inf').value=temp_img;
    }
    else{
        temp_img='none';
        document.getElementById('bg_image_inf').value=temp_img;
    
    }
    
    document.getElementById('bg_repeat_inf').value=document.getElementById('objinfo'+ind).style.backgroundRepeat;
    document.getElementById('bg_size_inf').value=document.getElementById('objinfo'+ind).style.backgroundSize;
    document.getElementById('bg_position_inf').value=document.getElementById('objinfo'+ind).style.backgroundPosition;
    
    
    if(document.getElementById('objinfo'+ind).style.borderStyle.length>0){document.getElementById('bor_style_inf').value=document.getElementById('objinfo'+ind).style.borderStyle;}
      else{document.getElementById('bor_style_inf').value='none';} 
    document.getElementById('bor_width_top_inf').value=document.getElementById('objinfo'+ind).style.borderTopWidth;
    document.getElementById('bor_width_left_inf').value=document.getElementById('objinfo'+ind).style.borderLeftWidth;
    document.getElementById('bor_width_right_inf').value=document.getElementById('objinfo'+ind).style.borderRightWidth;
    document.getElementById('bor_width_bottom_inf').value=document.getElementById('objinfo'+ind).style.borderBottomWidth;
    
    document.getElementById('bor_radius_inf').value=document.getElementById('objinfo'+ind).style.borderRadius;
    
    document.getElementById('padd_left_inf').value=objx.style.paddingLeft; 
    document.getElementById('padd_right_inf').value=objx.style.paddingRight; 
    document.getElementById('padd_top_inf').value=objx.style.paddingTop; 
    document.getElementById('padd_bottom_inf').value=objx.style.paddingBottom; 
    
    if(document.getElementById('objinfo'+ind).style.borderColor=='transparent' || document.getElementById('objinfo'+ind).style.borderColor==''){
        document.getElementById('bor_color_inf').value='transparent';
        document.getElementById('myshowcolor2').style.backgroundColor='transparent';
        }
    else{
    //var rgb = getComputedStyle(document.getElementById('objinfo'+ind),"").borderColor.match(/\d+/g); 
    var rgb = document.getElementById('objinfo'+ind).style.borderColor.match(/\d+/g);
    var str_tmp='';
    if(parseInt(rgb[0]).toString(16).length>1){str_tmp=parseInt(rgb[0]).toString(16);}
    else{str_tmp='0'+parseInt(rgb[0]).toString(16);}
    if(parseInt(rgb[1]).toString(16).length>1){str_tmp=str_tmp+parseInt(rgb[1]).toString(16);}
    else{str_tmp=str_tmp+'0'+parseInt(rgb[1]).toString(16);}
    if(parseInt(rgb[2]).toString(16).length>1){str_tmp=str_tmp+parseInt(rgb[2]).toString(16);}
    else{str_tmp=str_tmp+'0'+parseInt(rgb[2]).toString(16);}
    document.getElementById('bor_color_inf').value=str_tmp; 
    document.getElementById('myshowcolor2').style.backgroundColor="#"+str_tmp;
    }
    
    obg_vijn_select();
    
    document.getElementById('overflow-y_inf').value=document.getElementById('objinfo'+ind).style.overflowY;
    document.getElementById('overflow-x_inf').value=document.getElementById('objinfo'+ind).style.overflowX;
     
    document.getElementById('opacity_inf').value=document.getElementById('objinfo'+ind).style.opacity;
    document.getElementById('display_inf').value=document.getElementById('objinfo'+ind).style.display;
    document.getElementById('visibility_inf').value=document.getElementById('objinfo'+ind).style.visibility;
    document.getElementById('textareadata').value = document.getElementById('objinfo'+ind).innerHTML; 
    
    return false;
    }
//////////////////
function obg_vijn_select(){ //alert(document.getElementById('bodydata').style.left);
//document.getElementById('ugollt').style.transform
document.getElementById('ugollt').style.top = Number(objx.style.top.replace('px',''))-25;
document.getElementById('ugollt').style.left = Number(objx.style.left.replace('px',''))-25;
document.getElementById('ugollt').style.display='block';
var t = Number(objx.style.paddingTop.replace('px',''))+Number(objx.style.paddingBottom.replace('px',''))+Number(objx.style.borderTopWidth.replace('px',''))+Number(objx.style.borderBottomWidth.replace('px',''))+Number(objx.style.top.replace('px',''))+Number(objx.style.height.replace('px',''));
document.getElementById('ugolrb').style.top = t;
var l = Number(objx.style.paddingRight.replace('px',''))+Number(objx.style.paddingLeft.replace('px',''))+Number(objx.style.borderRightWidth.replace('px',''))+Number(objx.style.borderLeftWidth.replace('px',''))+Number(objx.style.left.replace('px',''))+Number(objx.style.width.replace('px',''));
document.getElementById('ugolrb').style.left =  l;
document.getElementById('ugolrb').style.display='block';
}
//////////////////
var objx = null;
function getobjinfo(ind){
if(document.getElementById('objinfo'+ind)){        

textdata_show_hide('block');

for(i=1;i<=100;i++){      
document.getElementById('otl'+i).style.backgroundColor='#ffffff';
//document.getElementById('objinfo'+i).style.zIndex=(1000+i);
//document.getElementById('objinfo'+i).style.borderStyle='none';
 if(document.getElementById('objinfo'+i).style.display=='none'){document.getElementById('otl'+i).style.backgroundColor='#cccccc'; }
 else{document.getElementById('otl'+i).style.backgroundColor='#ffffff';}
 document.getElementById('otl'+i).style.color='#000000';
}

document.getElementById('otl'+ind).style.backgroundColor='#ff8040';
document.getElementById('otl'+ind).style.color='#ffffff';
objx = document.getElementById('objinfo'+ind);

document.getElementById('textareadata').value = objx.innerHTML; 

document.getElementById('labelobjid').innerHTML = ind; 

get_style(ind);

document.getElementById('copy_inf').innerHTML='copy obj-'+ind;

w = document.body.clientWidth;
h = document.body.clientHeight;
document.getElementById('objparam').style.left=w-230;
document.getElementById('objparam').style.top=40;
document.getElementById('objparam').style.display='block';
}

return false;
}
////////////////// 
function Savefile(ind){
        //document.getElementById('objinfo0').style.display='none';
        //document.getElementById('objinfo0').style.zIndex=2000;
        document.getElementById('bodydata').style.borderWidth='0px';
        document.getElementById('ugollt').style.display='none';
        document.getElementById('ugolrb').style.display='none';
        
        if(ind ==='shablon'){fndata=document.getElementById('fsaveshablon').innerHTML;}
        else
        if(ind ==='asis'){fndata=document.getElementById('fsaveasis').innerHTML;}
        else
        if(ind ==='copydata'){fndata=document.getElementById('fsavecopydata').innerHTML;}
        var act    = ind;
        var htdata = document.getElementById('fhtml').value;
        var hedata = document.getElementById('fhead').value;
        var jsdata = document.getElementById('fscript').value;
        var bdata  = document.getElementById('bodydata').innerHTML;
        var bwl    = document.getElementById('fwl').value;
        
        document.getElementById('bodydata').style.borderWidth='1px';
        document.getElementById('ugollt').style.display='block';
        document.getElementById('ugolrb').style.display='block';

        sendURLrequest( 'POST', 'writes-page/query.php',  {
            task: 'file_save',
            fact: act,
            fn: fndata, 
            fhtml: htdata,
            fhead: hedata, 
            fjsdata: jsdata,
            fdata: bdata,
            fwl: bwl
          }).then(data => console.log(data))

    on_off_filemenu();
}
////////////////// 
function sendURLrequest(metod, url, body = null){
    return new Promise( ( resolve, reject ) => {
       const xhr = new XMLHttpRequest()
       xhr.open(metod, url)
       xhr.responseType = 'text'
       xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')//
       xhr.onload = () => { 
           if(xhr.status >= 400){ reject(xhr.response) }
           resolve(xhr.response) 
       }
       xhr.onerror = () => { reject(xhr.response) }
       xhr.send(JSON.stringify(body));
       })
   }
////////////////// 
function kyr_test(ind){ 
      var regexp = /^[a-z0-9_\s]+$/i;
      if(!regexp.test( document.getElementById(ind).value && document.getElementById(ind).value.length>0 )) { 
      alert('введите только латинские символы, цыфры или пробелы '+document.getElementById(ind).value );
      return false;
      }else{file_path();}
   } 
////////////////// 
function file_path(){ 
    var tmp = document.getElementById('section').value + '-' + document.getElementById('subsection').value + '-' + document.getElementById('specialities').value +'-' + document.getElementById('flang').value;
    tmp = tmp.replace(/\s/g, '');
    //console.log(tmp);
        document.getElementById('fsaveasis').innerHTML = tmp;
    //document.getElementById('fsavepath').value = tmp;
    //document.getElementById('fsaveshablon').value = 'shablon-' + document.getElementById('flang').value;
    //console.log(document.getElementById('fsaveshablon').value);
}
///////////////
function plus_value(ind){ 
        document.getElementById(ind).value=parseFloat(document.getElementById(ind).value)+1;
        set_css_data(ind);
        return false;
        }
////////////////// 
function minus_value(ind){
        document.getElementById(ind).value=parseFloat(document.getElementById(ind).value)-1;
        set_css_data(ind);
        return false;
}
////////////////// 
function set_css_data(ind){ 
        if(objx){
        objx.style.top=document.getElementById('top_inf').value; 
        objx.style.left=document.getElementById('left_inf').value;
        objx.style.height=document.getElementById('height_inf').value;
        objx.style.width=document.getElementById('width_inf').value;  
        
        objx.style.textAlign=document.getElementById('text-align_inf').value; 
        objx.style.textIndent=document.getElementById('text-indent_inf').value; 
        objx.style.writingMode=document.getElementById('writing-mode_inf').value; 
        objx.style.lineHeight=document.getElementById('line-height_inf').value;
        
        if( document.getElementById('attribute_inf').value.length>0){
        var attrname =  document.getElementById('attribute_inf').value.substr(0, document.getElementById('attribute_inf').value.indexOf('=') );
        var attrdatra = document.getElementById('attribute_inf').value.substr((document.getElementById('attribute_inf').value.indexOf('=')+1), (document.getElementById('attribute_inf').value.length-document.getElementById('attribute_inf').value.indexOf('=')));
        attrdatra = attrdatra.replace(/"/g,'');
        
        document.getElementById(objx.id).setAttribute(attrname, attrdatra); 
        //console.log(attrname +'-'+ attrdatra)
        //console.log(document.getElementById(objx.id).getAttribute(attrname));
        }
        
        objx.style.cursor = document.getElementById('cursor_inf').value;
        
        if(document.getElementById('backgroundColor_inf').value=="transparent"){objx.style.backgroundColor='transparent';}
          else{objx.style.backgroundColor='#'+document.getElementById('backgroundColor_inf').value;}
          
        if( document.getElementById('bg_image_inf').value.indexOf('none') !== 0 && document.getElementById('bg_image_inf').value.length>4 ){ 
            objx.style.backgroundImage='url(img-upload/'+document.getElementById('bg_image_inf').value+')'; 
          }
          else{  
               objx.style.backgroundImage='none';  
               document.getElementById('bg_repeat_inf').value='';
               document.getElementById('bg_size_inf').value='';
               document.getElementById('bg_position_inf').value='';
              }
        //console.log(objx.style.backgroundImage)
              
        objx.style.backgroundRepeat=document.getElementById('bg_repeat_inf').value; 
        objx.style.backgroundSize=document.getElementById('bg_size_inf').value; 
        objx.style.backgroundPosition=document.getElementById('bg_position_inf').value; 
        
        objx.style.overflowY=document.getElementById('overflow-y_inf').value; 
        objx.style.overflowX=document.getElementById('overflow-x_inf').value; 
        
        objx.style.opacity=document.getElementById('opacity_inf').value; 
        objx.style.filter='alpha(Opacity='+(document.getElementById('opacity_inf').value*100)+')'; 
        
        objx.style.zIndex=document.getElementById('z-index_inf').value; 
        
        objx.style.borderStyle=document.getElementById('bor_style_inf').value; 
        
        objx.style.borderLeftWidth=document.getElementById('bor_width_left_inf').value; 
        objx.style.borderRightWidth=document.getElementById('bor_width_right_inf').value; 
        objx.style.borderTopWidth=document.getElementById('bor_width_top_inf').value; 
        objx.style.borderBottomWidth=document.getElementById('bor_width_bottom_inf').value; 
        
        objx.style.paddingLeft=document.getElementById('padd_left_inf').value; 
        objx.style.paddingRight=document.getElementById('padd_right_inf').value; 
        objx.style.paddingTop=document.getElementById('padd_top_inf').value; 
        objx.style.paddingBottom=document.getElementById('padd_bottom_inf').value; 
        
        objx.style.borderRadius=document.getElementById('bor_radius_inf').value; 
        
        if(document.getElementById('bor_color_inf').value.length>3){
        if(document.getElementById('bor_color_inf').value=="transparent"){
             objx.style.borderTopColor='transparent';
             objx.style.borderRightColor='transparent';
             objx.style.borderLeftColor='transparent';
             objx.style.borderBottomColor='transparent';
        }
        else{
             objx.style.borderTopColor='#'+document.getElementById('bor_color_inf').value;
             objx.style.borderRightColor='#'+document.getElementById('bor_color_inf').value;
             objx.style.borderLeftColor='#'+document.getElementById('bor_color_inf').value;
             objx.style.borderBottomColor='#'+document.getElementById('bor_color_inf').value;
        }
        }
        
        objx.innerHTML=document.getElementById('textareadata').value;
        
        objx.style.display=document.getElementById('display_inf').value; 
        
        objx.style.visibility=document.getElementById('visibility_inf').value; 
        
        
        obg_vijn_select();
        }
        
        return false;
}
////////////////// 
function numerick_control(ind){ 
        //var num=0;
        // if(document.getElementById(ind)){ 
        // num=document.getElementById(ind).value.replace('%','');	
        // if(num.length!=0 && isNaN(num)==false){num=num;}else{if(num.length>0){alert('Не является числом '+num);} document.getElementById(ind).value=10;} 
        // }
        //return false;
}
////////////////// 
function off_objparam(){
    document.getElementById('objparam').style.display='none';
    document.getElementById('ugollt').style.display='none';
    document.getElementById('ugolrb').style.display='none';
    textdata_show_hide('none');
}
////////////////// 
function copy_obj(){
      if(objx){
       document.getElementById('objinfo0').innerHTML = objx.innerHTML; 
       document.getElementById('objinfo0').style.cssText = objx.style.cssText;
                var top=parseInt(document.getElementById('objinfo0').style.top.replace('px',''));
                document.getElementById('objinfo0').style.top=parseInt(top+15)+'px';
                var left=parseInt(document.getElementById('objinfo0').style.left.replace('px','')); 
                document.getElementById('objinfo0').style.left=parseInt(left+15)+'px';
       document.getElementById('objinfo0').style.display='none'; 
       document.getElementById('paste_inf').innerHTML = 'paste from '+objx.id.replace('objinfo','');
       document.getElementById('paste_block').style.display='block';
      }
          return false;
}
//////////////
function paste_obj(){
      if(objx){
      objx.innerHTML = document.getElementById('objinfo0').innerHTML; 
      document.getElementById('objinfo0').style.zIndex = objx.style.zIndex;
      objx.style.cssText = document.getElementById('objinfo0').style.cssText;
      objx.style.display='block';
      get_style(objx.id.replace('objinfo',''));
      }
          return false;
}
//////////////
var caretposStart;  caretposStart=0;
var caretposEnd;  caretposEnd=0;
function getCaret(el) { 
  caretposStart=0;
  caretposEnd=0;
  if (el.selectionStart) { 
    caretposStart = el.selectionStart;
    caretposEnd = el.selectionEnd;
  }

}
////////////////// 
function setfont(){
  getCaret(document.getElementById('textareadata'));
  var altext = document.getElementById('textareadata').value;
  var seltext = altext.substring(caretposStart,caretposEnd);
  document.getElementById('textareadata').value = altext.substr(0,caretposStart)+'<font face="'+document.getElementById('fontfamily').value+'" style="font-size:'+document.getElementById('fontsize').value+';color:#'+document.getElementById('fontcolor').value+';font-weight:'+document.getElementById('fontweight').value+';">'+seltext+'</font>'+altext.substr(caretposEnd,altext.length);
  set_css_data('null');
}
////////////////// 
function set_imagefrommenu(ind){
  document.getElementById('bg_image_inf').value=ind.replace('img-upload/','');
  set_css_data('bg_image_inf');
  on_off_imageemenu();
  } 
////////////////// 
function on_off_imageemenu(ind){
  w = document.body.clientWidth;
  h = document.body.clientHeight;
  document.getElementById('imagediv').style.left=(w/2)-300;
  document.getElementById('imagediv').style.top=(h/2)-300;
  document.getElementById('imageclosebutton').style.top=(h/2)-320;
  document.getElementById('imageclosebutton').style.left=(w/2)+305;
  
  if(document.getElementById('imagediv').style.display=='none' || document.getElementById('imagediv').style.display==''){document.getElementById('imagediv').style.display='block';}
  else{document.getElementById('imagediv').style.display='none';}
  } 
////////////////// 
function on_off_text(){
    
    if(document.getElementById('textdownbutton').style.display=='block'){
        document.getElementById('textdownbutton').style.display='none'; document.getElementById('textupbutton').style.display='block';
        }
    else{
        document.getElementById('textdownbutton').style.display='block'; document.getElementById('textupbutton').style.display='none';
        }
    textdata_show_hide('block');	
  }
    ////////////////// 
  function myokfunc(){ set_css_data('all'); }
  //инициализация colorpicker:
  // $(document).ready(
  // function()
  //     {
  //         $.ColorPicker.init();
  //     }
  //  );
  ///////////////
