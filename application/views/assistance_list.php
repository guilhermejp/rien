
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
    <link href="<?=base_url('assets/bootstrap/3.3.7/css/bootstrap-table.css');?>" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/datatable/datatables.min.css');?>"/>

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=2');?>" rel="stylesheet">

  </head>

  <body>

  <!-- Alerts -->
  <div class="panel-alert alert alert-success text-center alert-dismissable" id="modal-success">
  </div>
  <div class="panel-alert alert alert-danger text-center alert-dismissable" id="modal-danger">
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
          <span class="current">Atendimentos</span>
        </nav><!-- .breadcrumbs -->
      </div>
    </section>

    <div class="container">
      
      <div class="panel panel-default">

        <form role="form" class="form-horizontal" method="post" action="">
          
            <div class="panel-heading"><h3>Atendimentos</h3></div>
            <div class="panel-body">
              <div class="col-md-12 pn">
                <div class="col-md-3">
                  <a href="<?=base_url('assistance')?>" class="btn btn-lg btn-rien">Cadastrar atendimento</a>
                </div>
                <div class="col-md-7">
                  <div class="col-md-5">
                      <input type="text" data-provide="datepicker" maxlength="10" placeholder="Data de início" name="data_inicio" id="data_inicio" class="form-control search validaNumero data-mask">
                  </div>
                  <div class="col-md-5">
                      <input type="text" data-provide="datepicker" maxlength="10" placeholder="Data de fim" name="data_fim" id="data_fim" class="form-control search validaNumero data-mask">
                  </div>
                  <div class="col-md-1">
                    <div class="col-md-1">
                        <button class="btn-icon btn-pesquisar" id="pesquisar" onclick="javascript: return false;" style="height:42px"></button>
                    </div>
                </div>
                </div>
              </div>
            </div>

            <div class="panel-body">
              <div class="col-md-12 pn">
                <div class="fixed-table-container">
                  <div class="fixed-table-body">
                  <table id="atendimento" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th><div class="th-inner">#</div></th>
                            <th><div class="th-inner">Data</div></th>
                            <th><div class="th-inner">Hospital</div></th>
                            <th><div class="th-inner">Nº Máq.:</div></th>
                            <th><div class="th-inner">Paciente</div></th>
                            <th><div class="th-inner">Leito</div></th>
                            <th><div class="th-inner">Técnico</div></th>
                            <th><div class="th-inner">Técnico 2</div></th>
                            <th><div class="th-inner">Técnico 3</div></th>
                            <th><div class="th-inner">Destino</div></th>
                            <th><div class="th-inner">Evento</div></th>
                            <th><div class="th-inner">Proc.</div></th>
                            <th><div class="th-inner">Tempo</div></th>
                            <th><div class="th-inner">Início</div></th>
                            <th><div class="th-inner">Fim</div></th>
                            <th><div class="th-inner">Acesso</div></th>
                            <th><div class="th-inner">Sitio</div></th>
                            <th><div class="th-inner">Precaução</div></th>
                            <th><div class="th-inner">Máq.</div></th>
                            <th><div class="th-inner">OR</div></th>
                            <th><div class="th-inner">Home Choice</div></th>
                            <th><div class="th-inner">Médico</div></th>
                            <th><div class="th-inner">Convênio</div></th>
                            <th><div class="th-inner">Observação</div></th>
                            <th><div class="th-inner">Situação</div></th>
                        </tr>
                    </thead>
                    <!--<tbody>
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
                    </tbody>-->
                  </table>
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
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap.min.js');?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap-datepicker.js');?>"></script> 

    <script type="text/javascript" src="<?=base_url('assets/datatable/datatables.min.js');?>"></script>

    <!-- Custom page scripts -->
    <script src="<?=base_url('assets/js/Mascaras.js')?>"></script>
    <script src="<?=base_url('assets/js/Funcoes.js?ver=2')?>"></script>

    <script type="text/javascript">
      $(document).ready(function() {

          var table = $('#atendimento').DataTable( {
              "createdRow": function( row, data, dataIndex){
                switch($.trim(data[24])){
                    case "DIALISE EM CURSO":
                        $(row).addClass('yellow_line');
                        break;
                    case "AGENDADA":
                        $(row).addClass('red_line');
                        break;
                    case "CONCLUIDA":
                        $(row).addClass('green_line');
                        break;
                }
              },
            
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
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    customize: function ( doc ) {
                      doc.pageMargins = [5,10];
                    },
                    title: 'RELATÓRIO DE ATENDIMENTOS'
                }              
              ],
              "pageLength": 50,
              "scrollX": true,
              "processing": true,
              "serverSide": true,
               // Load data for the table's content from an Ajax source
              "ajax": {
                "url": "<?=base_url('view_assistance/ajax_list')?>",
                "type": "POST"
              }

          } );
          
          $('#atendimento tbody').on( 'dblclick', 'tr', function () {
                document.location.href = "<?=base_url('assistance/update')?>"+"/"+$(this).children('td:first-child').text();
            } );
            
          $('#data_inicio, #data_fim, #pesquisar').change(function(){
              var data_ini = $('#data_inicio').val().split("/").reverse().join("");
              var data_fim = $('#data_fim').val().split("/").reverse().join("");
              var url_chamada = "<?=base_url('view_assistance/ajax_list')?>"+"/"+data_ini+"/"+data_fim;
              table.ajax.url( url_chamada ).load();
              return false;
           });
    

      });
    </script>

  </body>
</html>
