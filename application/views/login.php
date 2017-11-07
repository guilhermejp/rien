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

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/main.css?ver=1.5');?>" rel="stylesheet">

  </head>

  <body class="main">

    <div class="container">

            <div class="panel-login form-signin">
                <div class="row">
                    <div class="col-md-12 logo">
                        <img src="<?=base_url('assets/images/logo.png')?>">
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Acesso ao sistema</h4></div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?=base_url('user/logon')?>">
                            <fieldset>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input-email">Usuário</label>
                                        <input class="form-control" id="input-email" name="username" placeholder="seu usuário" type="text" autocomplete="off" autofocus="" value="<?=@$username?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="input-senha">Senha</label>
                                        <input class="form-control" id="input-senha" name="password" placeholder="sua senha" type="password" autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="col-md-12 txt-center" align="center">
                                    <button type="submit" class="btn btn-lg btn-login">Acessar</button>
                                </div>
                                <div class="col-md-12 txt-center" align="center">
                                    <br>
                                    <p style="color: red"><?=@$message?></p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript -->

    <script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('assets/bootstrap/3.3.7/js/bootstrap-datepicker.js')?>"></script>


  </body>
</html>