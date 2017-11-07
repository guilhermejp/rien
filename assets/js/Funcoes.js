/*-------------------------------------------------------*/
/* FUNÇÕES DE FORMATACAO                                 */
/*-------------------------------------------------------*/
//formatacao de campos de numeros
function Formata(campo,tammax,teclapres,decimal)
{
    decimal = Number(decimal);
    if(!decimal){ decimal = 2; }
    var tecla = teclapres.keyCode;
    vr = Limpar(campo.value,"0123456789");
    tam = vr.length;
    dec=decimal
    
    if (tam < tammax && tecla != 8){ tam = vr.length + 1 ; }
    if (tecla == 8 ) { tam = tam - 1 ; }
    if ( tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105 )
        {
            if ( tam <= dec ){ campo.value = vr ; }
            if ( (tam > dec) && (tam <= 7) ){campo.value = vr.substr( 0, tam - dec ) + "," + vr.substr( tam - dec, tam ) ; }
            if ( (tam >= 8) && (tam <= 12) ){campo.value = vr.substr( 0, tam - dec ) + "," + vr.substr( tam - dec, tam ) ; }
        }
}
//somente numeros
 function soNums(e,args) 
    {         
    // Função que permite apenas teclas numéricas e  
    // todos os caracteres que estiverem na lista 
    // de argumentos. 
    // Deve ser chamada no evento onKeyPress desta forma 
    //  onKeyPress ="return (soNums(event,'(/){,}.'));" 
    // caso queira apenas permitir caracters 

        if (document.all){var evt=event.keyCode;} // caso seja IE 
        else{var evt = e.charCode;}    // do contrário deve ser Mozilla 
        var chr= String.fromCharCode(evt);    // pegando a tecla digitada 
        // Se o código for menor que 20 é porque deve ser caracteres de controle 
        // ex.: <ENTER>, <TAB>, <BACKSPACE> portanto devemos permitir 
        // as teclas numéricas vão de 48 a 57 
        if (evt <20 || (evt >47 && evt<58) || (args.indexOf(chr)>-1 ) ){return true;} 
        return false; 
    } 

function Limpar(valor, validos)
    { // retira caracteres invalidos da string 
        var result = ""; 
        var aux; 
        for (var i=0; i < valor.length; i++)
            {   aux = validos.indexOf(valor.substring(i, i+1)); 
                if (aux>=0) 
                    {   result += aux; } 
            } 
        return result; 
    } 

//VALIDAÇÕES 
$('.validaNumero').on('keypress', function(event) {
    return (soNums(event,''));
});
$('.validaFormato').on('keydown', function(event) {
    Formata(this,20,event,2);
});
$('.validaCasas').on('keydown', function(event) {
    Formata(this,20,event,$("#casas").val());
});
$('.data-mask').on('keypress', function(event) {
    return MaskData(this, event),(soNums(event,''));
});
$('.hora-mask').on('keypress', function(event) {
    return MaskHora(this, event),(soNums(event,''));
});
$('.validaFormatoTel').on('keypress', function(event) {
    return (mascara( this, mtel ));
});
/*-------------------------------------------------------*/
/* datepicker                                            */
/*-------------------------------------------------------*/
$.fn.datepicker.defaults.format = "dd/mm/yyyy";
    $('#calendar').datepicker({
});

$( function() {
    $( "#datepicker" ).datepicker();
} );

$( function modal_success(message, bool){
    if(bool){
        $("#modal-success").html("");
        $("#modal-success").html(message);
        $("#modal-success").alert();
        $("#modal-success").fadeTo(2000, 500).slideUp(500, function(){
            $("#modal-success").slideUp(500);
        });
    }else{
        $("#modal-danger").html("");
        $("#modal-danger").html(message);
        $("#modal-danger").alert();
        $("#modal-danger").fadeTo(2000, 500).slideUp(500, function(){
            $("#modal-danger").slideUp(500);
        });
    }
});