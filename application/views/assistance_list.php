
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
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/bootstrap-table.css')?>" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/DataTable/datatables.css')?>">
    <link href="<?=base_url('assets/DataTable/DataTables-1.10.16/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=1.7')?>" rel="stylesheet">

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
            <li><a href="/logout">Sair do sistema</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      
      <div class="panel panel-default">

        <form role="form" class="form-horizontal" method="post" action="<?=base_url('ajax_list')?>">
          
            <div class="panel-heading"><h3>Atendimentos</h3></div>
            <div class="panel-body">
              <div class="col-md-12 pn">
                <div class="col-md-3">
                  <a href="<?=base_url('assistance/')?>" class="btn btn-lg btn-success">Cadastrar atendimento</a>
                </div>
              </div>
            </div>

            <div class="panel-body">
              <div class="col-md-12 pn">
                <div class="fixed-table-container">
                  <div class="fixed-table-body">
                  <table id="example" class="display" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><div class="th-inner">Data</div></th>
                            <th><div class="th-inner">Hospital</div></th>
                            <th><div class="th-inner">Nº.:</div></th>
                            <th><div class="th-inner">Paciente</div></th>
                            <th><div class="th-inner">Leito</div></th>
                            <th><div class="th-inner">Técnico</div></th>
                            <th><div class="th-inner">Destino</div></th>
                            <th><div class="th-inner">SUS/AV/ALT/CONS</div></th>
                            <th><div class="th-inner">Proc.</div></th>
                            <th><div class="th-inner">Tempo</div></th>
                            <th><div class="th-inner">Início</div></th>
                            <th><div class="th-inner">Fim</div></th>
                            <th><div class="th-inner">Acesso</div></th>
                            <th><div class="th-inner">Sitio</div></th>
                            <th><div class="th-inner">Preparação</div></th>
                            <th><div class="th-inner">Máq.</div></th>
                            <th><div class="th-inner">OR</div></th>
                            <th><div class="th-inner">Médico</div></th>
                            <th><div class="th-inner">Convênio</div></th>
                            <th><div class="th-inner">Observação</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row-content">
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                            <td><div class="ellipsis item-ellipsis-large">Tiger Nixon</div></td>
                        </tr>
                    </tbody>
                  </table>
                  </div>
                </div>

              </div>
            </div>

        </form>
      </div>
        
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript -->

    <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap-datepicker.js')?>"></script> 
    <script src="<?=base_url('assets/DataTable/datatables.js')?>"></script>
    <script src="<?=base_url('assets/DataTable/DataTables-1.10.16/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=base_url('assets/DataTable/DataTables-1.10.16/js/dataTables.bootstrap.min.js')?>"></script>

    <!-- Custom page scripts -->

    <script type="text/javascript">
      $(document).ready(function() {
          $('#example').DataTable( {
              "language": {
                  "sEmptyTable": "Nenhum registro encontrado",
                  "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                  "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                  "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                  "sInfoPostFix": "",
                  "sInfoThousands": ".",
                  "sLengthMenu": "_MENU_ resultados por página",
                  "sLoadingRecords": "Carregando...",
                  "sProcessing": "Processando...",
                  "sZeroRecords": "Nenhum registro encontrado",
                  "sSearch": "Pesquisar",
                  "oPaginate": {
                      "sNext": "Próximo",
                      "sPrevious": "Anterior",
                      "sFirst": "Primeiro",
                      "sLast": "Último"
                  },
                  "oAria": {
                      "sSortAscending": ": Ordenar colunas de forma ascendente",
                      "sSortDescending": ": Ordenar colunas de forma descendente"
                  }
                },
              dom: 'Bfrtip',
              buttons: [
                  'excel', 'pdf', 'print'
              ]
          } );
      });
    </script>
  </body>
</html>
