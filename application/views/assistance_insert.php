
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
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/datepicker3.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=1.1')?>" rel="stylesheet">

  </head>

  <body class="main">

    <nav class="navbar main-navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <div class="logo">
            <img src="<?=base_url('assets/images/logo.png')?>">
          </div>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?=base_url('user/logout')?>">Sair do sistema</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      
      <div class="panel panel-default">

        <form role="form" class="form-horizontal" method="post" action="<?=base_url('assistance/save')?>">
          
            <div class="panel-heading"><h3>Cadastro de atendimento</h3></div>
            <div class="panel-body">

              <div class="col-md-12 pn">

                <div class="col-md-5">
                 <div class="form-group">
                    <label for="data">Data</label>
                    <input type="text" data-provide="datepicker" name="data" class="form-control input-xlarge focused data-mask">
                  </div>  
                </div>

                <div class="col-md-5">
                 <div class="form-group">
                    <label for="hospital">Hospital</label>
                    <input type="text" name="hospital" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label for="num">Nº</label>
                    <input type="text" name="num" class="form-control input-xlarge focused">
                  </div>
                </div>

              </div>

              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="paciente">Paciente</label>
                    <input type="text" name="paciente" class="form-control input-xlarge focused">
                  </div>  
                </div>              

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="leito">Leito</label>
                    <input type="text" name="leito" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="tecnico">Técnico</label>
                    <input type="text" name="tecnico" class="form-control input-xlarge focused">
                  </div>  
                </div>

              </div>
              
              <div class="col-md-12 pn">

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" name="destino" class="form-control input-xlarge focused data-mask">
                  </div>  
                </div>              

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="input-fim">SUS/AV/ALT/CONS</label>
                    <input type="text" name="sus-av-alt-cons" class="form-control input-xlarge focused">
                  </div>  
                </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="proc">Proc.</label>
                    <select class="form-control">
                      <option></option>
                    </select>
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="tempo">Tempo</label>
                  <input type="text" name="tempo" maxlength="5" class="form-control input-xlarge focused  validaNumero validaFormato hora-mask">
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="inicio">Início</label>
                  <input id="inicio" type="text" name="inicio" maxlength="5" class="form-control input-xlarge focused validaNumero validaFormato hora-mask">
                </div>
               </div>

                <div class="col-md-4">
                 <div class="form-group">
                    <label for="fim">Fim</label>
                    <input type="text" name="fim" maxlength="5" class="form-control input-xlarge focused validaNumero validaFormato hora-mask">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-concluido">Acesso</label>
                    <select class="form-control">
                    <option></option>
                  </select>
                </div>
               </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="input-perc-hoje">Sitio</label>
                    <select class="form-control">
                    <option></option>
                  </select>                
                </div>
               </div>

              <div class="col-md-4">
               <div class="form-group">
                  <label>Precaução</label>
                  <div class="radio">
                    <label class="radio-inline"><input type="radio" name="sim">Sim</label>
                    <label class="radio-inline"><input type="radio" name="nao">Não</label>
                  </div>
                </div>
               </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-3">
                <div class="form-group">
                  <label for="maq">Maq.</label>
                  <input type="text" value="" name="maq" class="form-control input-xlarge focused">
                </div>
               </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label for="or">OR</label>
                  <input type="text" value="" name="or" class="form-control input-xlarge focused ">
                </div>
               </div>

                <div class="col-md-6">
                 <div class="form-group">
                    <label for="medico">Médico</label>
                    <input type="text" name="medico" class="form-control input-xlarge focused">
                  </div>  
                </div>

              </div>

              <div class="col-md-12 pn">

              <div class="col-md-4">
                <div class="form-group">
                  <label for="convenio">Convênio</label>
                  <input type="text" name="convenio" class="form-control input-xlarge focused">
                </div>
               </div>

              <div class="col-md-8">
                <div class="form-group">
                  <label for="observacao">Observação</label>
                  <input type="text" name="observacao" class="form-control input-xlarge focused">
                </div>
               </div>


              </div>

              <div class="col-md-12 pn">
                <div class="col-md-4">
                    <button type="submit" class="btn btn-lg btn-primary">Salvar atendimento</button>
                    <a class="btn btn-lg btn-cancelar" href="index.html">Cancelar</a>
                </div>
              </div>
            </div>
          </div>

        </form>
      </div>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript -->

    <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('assets/jquery/jquery.maskedinput.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap-datepicker.js')?>"></script>
    <script src="<?=base_url('assets/js/Mascaras.js')?>"></script>
    <script src="<?=base_url('assets/js/Funcoes.js?ver=2')?>"></script>

    <script type="text/javascript">

    </script>

  </body>
</html>
