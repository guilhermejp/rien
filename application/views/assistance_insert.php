<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rien</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/bootstrap.min.css');?>?v=2" rel="stylesheet">
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/datepicker3.css');?>?v=3" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=1.3');?>" rel="stylesheet">

  </head>

  <body>

  <!-- Alerts -->
  <div class="panel-alert alert alert-success text-center alert-dismissable" id="modal-success">
  </div>
  <div class="panel-alert alert alert-danger text-center alert-dismissable" id="modal-danger">
      <?=@validation_errors();?>
  </div>

  <div class="main">
    <nav class="navbar main-navbar">
      <div class="container">
        <div class="navbar-header">
          <div class="logo">
            <img src="<?=base_url('assets/images/logo.png')?>">
          </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a class="btn btn-rien" href="<?=base_url('user/login')?>">Sair do sistema</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <section class="page-title">
      <div class="container clearfix">
        <h1>Área Interna Rien</h1>
        <nav class="bread-crumbs">
          <a href="<?=base_url('assistance/dash')?>" rel="v:url" property="v:title">Voltar para atendimentos</a> » <span class="current">Cadastro de atendimento</span>
        </nav><!-- .breadcrumbs -->
      </div>
    </section>
    <div class="container">
      
      <div class="panel panel-default">

        <form role="form" class="form-horizontal" method="post" action="<?=base_url('assistance/save')?>">
          
            <div class="panel-heading"><h3>Cadastro de atendimento</h3></div>
            <div class="panel-body">
              
              <div class="col-md-12 pn">

                <div class="col-md-2">
                 <div class="form-group">
                    <label for="data">#ID</label>
                    <input type="text" id="id" name="id" value="<?=@$id;?>" readonly="readonly" class="form-control input-xlarge focused validaFormato validaNumero">
                  </div>  
                </div>
                
                  <div class="col-md-5">
                    <div class="form-group">
                        <br>
                        <div class="btn-group" data-toggle="buttons">
                          <label class="btn btn-outline btn-warning sit1 <?=(@$situation=='DIALISE EM CURSO')?'active':'' ?>">
                            <input type="radio" id="sit1" name="situation" autocomplete="off" value="DIALISE EM CURSO" <?=(@$situation=='DIALISE EM CURSO')?'checked':'' ?>>DIÁLISE EM CURSO
                          </label>
                          <label class="btn btn-outline btn-danger sit2 <?=(@$situation=='AGENDADA')?'active':'' ?>">
                            <input type="radio" id="sit2" name="situation" autocomplete="off" value="AGENDADA" <?=(@$situation=='AGENDADA')?'checked':'' ?>>AGENDADA
                          </label>
                          <label class="btn btn-outline btn-success sit3 <?=(@$situation=='CONCLUIDA')?'active':'' ?>">
                            <input type="radio" id="sit3" name="situation" autocomplete="off" value="CONCLUIDA" <?=(@$situation=='CONCLUIDA')?'checked':'' ?>>CONCLUÍDA
                          </label>
                        </div>
                    </div>
                </div>
                  
              </div>

              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="data">Data</label>
                    <input type="text" name="date" id="date" data-provide="datepicker" maxlength="10" class="form-control input-xlarge focused search validaNumero data-mask" value="<?=@$date!=""?$date:date('d/m/Y');?>">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="hospital">Hospital</label>
                    <input type="text" name="hospital" value="<?=@$hospital;?>" id="hospital" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="num">Número de Máquinas</label>
                    <input type="text" name="nm" value="<?=@$nm;?>" class="form-control input-xlarge focused" autocomplete="off">
                  </div>
                </div>

              </div>

              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="patient">Paciente</label>
                    <input type="text" id="patient" name="patient" value="<?=@$patient;?>" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="leito">Leito</label>
                    <input type="text" name="bed" value="<?=@$bed;?>" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="tecnico">Técnico</label>
                    <input type="text" name="technician" value="<?=@$technician;?>" id="technician" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

              </div>
                
              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="technician2">Técnico 2</label>
                    <input type="text" name="technician2" value="<?=@$technician2;?>" id="technician2" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>
                  
                <div class="col-md-4">
                 <div class="form-group">
                    <label for="technician3">Técnico 3</label>
                    <input type="text" name="technician3" value="<?=@$technician3;?>" id="technician3" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

              </div>
              
              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="destino">Destino</label>
                    <select class="form-control" name="destination" id="destination">
                        <option value=""></option>
                        <option value="Alta">Alta</option>
                        <option value="Alta encaminhado para o programa">Alta encaminhado para o programa</option>
                        <option value="Transferência">Transferência</option>
                        <option value="Óbito">Óbito</option>
                    </select>
                  </div>  
                </div>              

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="input-fim">Evento</label>
                    <select class="form-control" name="sus" id="sus">
                        <option value=""></option>
                        <option value="Suspenso">Suspenso</option>
                        <option value="em Avaliação">em Avaliação</option>
                        <option value="Dias Alternados">Dias Alternados</option>
                        <option value="Conservador">Conservador</option>
                    </select>
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="proc">Procedimentos</label>
                    <select class="form-control" name="proc" id="proc">
                        <option value=""></option>
                        <option value="HDI">HDI</option>
                        <option value="HDIP (pedriatria)">HDIP (pedriatria)</option>
                        <option value="HDP">HDP</option>
                        <option value="HDPP (pedriatria)">HDPP (pedriatria)</option>
                        <option value="HDC">HDC</option>
                        <option value="HDCP (pedriatria)">HDCP (pedriatria)</option>
                        <option value="DPA">DPA</option>
                        <option value="DPAP (pedriatria)">DPAP (pedriatria)</option>
                        <option value="DPAC">DPAC</option>
                        <option value="DPI">DPI</option>
                        <option value="PLASM">PLASM</option>
                    </select>
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tempo">Tempo</label>
                  <input type="text" name="time" value="<?=@$time;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask" autocomplete="off">
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="inicio">Início</label>
                  <input id="inicio" type="text" name="start" value="<?=@$start;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask" autocomplete="off">
                </div>
               </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="fim">Fim</label>
                    <input type="text" name="end" value="<?=@$end;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask" autocomplete="off">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-concluido">Acesso</label>
                    <select class="form-control" name="access" id="access">
                        <option value=""></option>
                        <option value="CDL">CDL</option>
                        <option value="FAV">FAV</option>
                        <option value="TENCKHOFF">TENCKHOFF</option>
                        <option value="PERMCATH">PERMCATH</option>
                        <option value="CDL-T (troca)">CDL-T troca</option>
                  </select>
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-hoje">Sitio</label>
                    <select class="form-control" name="site" id="site">
                        <option value=""></option>
                        <option value="VJID (veia jugular interna direita)">VJID (veia jugular interna direita)</option>
                        <option value="VJIE (veia jugular interna esquerda)">VJIE (veia jugular interna esquerda)</option>
                        <option value="VSCD (veia subclavia central direita)">VSCD (veia subclavia central direita)</option>
                        <option value="VSCE (veia subclavia central esquerda)">VSCE (veia subclavia central esquerda)</option>
                        <option value="VFD (veia femural direita)">VFD (veia femural direita)</option>
                        <option value="VFE (veia femural esquerda)">VFE (veia femural esquerda)</option>
                  </select>                
                </div>
               </div>

              <div class="col-md-4">
               <div class="form-group">
                  <label>Precaução</label>
                  <div class="radio">
                    <label class="radio-inline"><input type="radio" name="precaution" value="1" <?=(@$precaution=='1')?'checked':'' ?>>Sim</label>
                    <label class="radio-inline"><input type="radio" name="precaution" value="0" <?=(@$precaution=='0')?'checked':'' ?>>Não</label>
                  </div>
                </div>
               </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-3">
                <div class="form-group">
                  <label for="maq">Maq.</label>
                  <input type="text" name="maq" value="<?=@$maq;?>" class="form-control input-xlarge focused" autocomplete="off">
                </div>
               </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="or">OR</label>
                  <input type="text" name="or" value="<?=@$or;?>" class="form-control input-xlarge focused" autocomplete="off">
                </div>
               </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="home-choice">HOME CHOICE</label>
                  <input type="text" name="home_choice" value="<?=@$home_choice;?>" class="form-control input-xlarge focused" autocomplete="off">
                </div>
               </div>

                <div class="col-md-3">
                 <div class="form-group">
                    <label for="doctor">Médico</label>
                    <input type="text" id="doctor" name="doctor" value="<?=@$doctor;?>" class="form-control input-xlarge focused" autocomplete="off">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="convenio">Convênio</label>
                  <input type="text" name="agreement" value="<?=@$agreement;?>" id="agreement" class="form-control input-xlarge focused" autocomplete="off">
                </div>
               </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label for="observacao">Observação</label>
                  <input type="text" name="note" value="<?=@$note;?>" class="form-control input-xlarge focused" autocomplete="off">
                </div>
               </div>

              </div>

              <div class="col-md-12 pn">
                <div class="col-md-4">
                    <button id="submit" type="submit" class="btn btn-lg btn-rien">Salvar atendimento</button>
                    <a class="btn btn-lg btn-cancel" href="<?=base_url('assistance/dash')?>">Cancelar</a>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div><!-- /.container -->
    </div><!-- /.main -->

    <!-- Bootstrap core JavaScript -->

    <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js');?>"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="<?=base_url('assets/jquery/jquery.maskedinput.min.js');?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap-datepicker.js');?>"></script>
    <script src="<?=base_url('assets/js/Mascaras.js');?>"></script>
    <script src="<?=base_url('assets/js/Funcoes.js?ver=2');?>"></script>

    <script type="text/javascript">
      $(document).ready(function() {
          
        $('#sus').val("<?=@$sus?>");
        $('#destination').val("<?=@$destination?>");
        $('#proc').val("<?=@$proc?>");
        $('#access').val("<?=@$access?>");
        $('#site').val("<?=@$site?>");
        
        $('.sit1').click(function(){
            $('#sit1').attr('checked','checked');
            if($('#id').val() != ""){
                $('#submit').trigger('click');
            }
        });
        
        $('.sit2').click(function(){
            $('#sit2').attr('checked','checked');
            if($('#id').val() != ""){
                $('#submit').trigger('click');
            }
        });
        
        $('.sit3').click(function(){
            $('#sit3').attr('checked','checked');
            if($('#id').val() != ""){
                $('#submit').trigger('click');
            }
        });
        
        var message = "<?=@$message?>";
        if(message != ""){
            modal_alert(message, true);
        }
        if($.trim($('#modal-danger').text()) != ""){
            modal_alert($('#modal-danger').text(), false);
        }
        
        var hospitals = [ <?=$hospitals?> ];
        $( "#hospital" ).autocomplete({source: hospitals});
        
        var doctors = [ <?=$doctors?> ];
        $( "#doctor" ).autocomplete({source: doctors});
        
        var patients = [ <?=$patients?> ];
        $( "#patient" ).autocomplete({source: patients});
        
        var technicians = [ <?=$technicians?> ];
        $( "#technician" ).autocomplete({source: technicians});
        $( "#technician2" ).autocomplete({source: technicians});
        $( "#technician3" ).autocomplete({source: technicians});
        
        var agreements = [ <?=$agreements?> ];
        $( "#agreement" ).autocomplete({source: agreements});

        /*-------------------------------------------------------*/
        /* modals                                                */
        /*-------------------------------------------------------*/
        $.fn.datepicker.defaults.format = "dd/mm/yyyy";
            $('#calendar').datepicker({
        });
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

      });
      
    </script>

  </body>
</html>
