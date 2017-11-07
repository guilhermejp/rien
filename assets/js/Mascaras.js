function Mascara(objeto, evt, mask) {
 
var LetrasU = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var LetrasL = 'abcdefghijklmnopqrstuvwxyz';
var Letras  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
var LetrasN  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_';
var Numeros = '0123456789';
var Fixos  = '().-:/ '; 
var Charset = " !\"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_/`abcdefghijklmnopqrstuvwxyz{|}~";

evt = (evt) ? evt : (window.event) ? window.event : "";
var value = objeto.value;
if (evt) {
 var ntecla = (evt.which) ? evt.which : evt.keyCode;
 tecla = Charset.substr(ntecla - 32, 1);
 if (ntecla < 32) return true;

 var tamanho = value.length;
 if (tamanho >= mask.length) return false;

 var pos = mask.substr(tamanho,1); 
 while (Fixos.indexOf(pos) != -1) {
  value += pos;
  tamanho = value.length;
  if (tamanho >= mask.length) return false;
  pos = mask.substr(tamanho,1);
 }

 switch (pos) {
   case '#' : if (Numeros.indexOf(tecla) == -1) return false; break;
   case 'A' : if (LetrasU.indexOf(tecla) == -1) return false; break;
   case 'a' : if (LetrasL.indexOf(tecla) == -1) return false; break;
   case 'Z' : if (Letras.indexOf(tecla) == -1) return false; break;
   case 'W' : if (LetrasN.indexOf(tecla) == -1) return false; break;
   case '*' : objeto.value = value; return true; break;
   default : return false; break;
 }
}
objeto.value = value; 
return true;
}
function MaskCPF(objeto, evt) { 
return Mascara(objeto, evt, '###.###.###-##');
}
function MaskData(objeto, evt) { 
return Mascara(objeto, evt, '##/##/####');
}
function MaskLogin(objeto, evt) { 
return Mascara(objeto, evt, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWW');
}
function MaskHora(objeto, evt) { 
return Mascara(objeto, evt, '##:##');
}
/*-------------------------------------------------------*/
/* CAMPO TELEFONE                                        */
/*-------------------------------------------------------*/
/* Máscaras ER */
function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
    v=v.replace(/\D/g,"");
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;
}
function id( el ){
  return document.getElementById( el );
}