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
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/datepicker3.css');?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=1.2');?>" rel="stylesheet">

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

              </div>

              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="data">Data</label>
                    <input type="text" name="date" readonly="readonly" class="form-control input-xlarge focused" value="<?=@$date!=""?$date:date('d/m/Y');?>">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="hospital">Hospital</label>
                    <input type="text" name="hospital" value="<?=@$hospital;?>" id="hospital" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="num">NºM</label>
                    <input type="text" name="nm" value="<?=@$nm;?>" class="form-control input-xlarge focused">
                  </div>
                </div>

              </div>

              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="paciente">Paciente</label>
                    <input type="text" name="patient" value="<?=@$patient;?>" class="form-control input-xlarge focused">
                  </div>  
                </div>              

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="leito">Leito</label>
                    <input type="text" name="bed" value="<?=@$bed;?>" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="tecnico">Técnico</label>
                    <input type="text" name="technician" value="<?=@$technician;?>" id="technician" class="form-control input-xlarge focused">
                  </div>  
                </div>

              </div>
              
              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" name="destination" value="<?=@$destination;?>" class="form-control input-xlarge focused">
                  </div>  
                </div>              

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="input-fim">SUS/AV/ALT/CONS</label>
                    <input type="text" name="sus" value="<?=@$sus;?>" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="proc">Proc.</label>
                    <select class="form-control" name="proc">
                    </select>
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tempo">Tempo</label>
                  <input type="text" name="time" value="<?=@$time;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask">
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="inicio">Início</label>
                  <input id="inicio" type="text" name="start" value="<?=@$start;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask">
                </div>
               </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="fim">Fim</label>
                    <input type="text" name="end" value="<?=@$end;?>" maxlength="5" class="form-control input-xlarge focused validaNumero hora-mask">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-concluido">Acesso</label>
                    <select class="form-control" name="access">
                    <option></option>
                  </select>
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-hoje">Sitio</label>
                    <select class="form-control" name="site">
                    <option></option>
                  </select>                
                </div>
               </div>

              <div class="col-md-4">
               <div class="form-group">
                  <label>Precaução</label>
                  <div class="radio">
                    <label class="radio-inline"><input type="radio" name="precaution" value="1">Sim</label>
                    <label class="radio-inline"><input type="radio" name="precaution" value="0">Não</label>
                  </div>
                </div>
               </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-3">
                <div class="form-group">
                  <label for="maq">Maq.</label>
                  <input type="text" value="" name="maq" value="<?=@$maq;?>" class="form-control input-xlarge focused">
                </div>
               </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="or">OR</label>
                  <input type="text" value="" name="or" value="<?=@$or;?>" class="form-control input-xlarge focused ">
                </div>
               </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="home-choice">HOME CHOICE</label>
                  <input type="text" value="" name="home-choice" value="<?=@$home_choice;?>" class="form-control input-xlarge focused ">
                </div>
               </div>

                <div class="col-md-3">
                 <div class="form-group">
                    <label for="medico">Médico</label>
                    <input type="text" id="medico" name="doctor" value="<?=@$doctor;?>" class="form-control input-xlarge focused">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="convenio">Convênio</label>
                  <input type="text" name="agreement" value="<?=@$agreement;?>" id="agreement" class="form-control input-xlarge focused">
                </div>
               </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label for="observacao">Observação</label>
                  <input type="text" name="note" value="<?=@$note;?>" class="form-control input-xlarge focused">
                </div>
               </div>

              </div>

              <div class="col-md-12 pn">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-lg btn-rien">Salvar atendimento</button>
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
        
        var technicians = [ <?=$technicians?> ];
        $( "#technician" ).autocomplete({source: technicians});
        
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
