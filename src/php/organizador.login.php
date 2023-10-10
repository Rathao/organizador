<html>
  <head>
    <meta charset="utf-8" />
    <title>Organizador de Tarefas</title>    
    <link rel="stylesheet"  href="../css/estilo.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">   
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
       Organizador de Tarefas
      </a>
    </nav>
    <?php if( isset($_GET['acao']) && $_GET['acao'] == 'inserir_usuario' ) { ?>
      <div class="bg-success pt-2 text-white d-flex justify-content-center">
        <h5>Usuário cadastrado com sucesso!</h5>
      </div>
    <?php } ?>
    <div class="container">    
      <div class="row  ">
        <div class="card-login">
          <div class="card">	
            <div class="card-header login">
              <h4>Login</h4>
            </div>
            <div class="card-body m-auto">
              <form action="http://localhost/organizador/src/php/validador.php"method="post">
                <div class="form-group">
                  <label>Email:</label>
                  <input name="email" type="email" class="form-control" placeholder="E-mail" >
                  
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                  <input name="senha" type="password" class="form-control" placeholder="Senha">                            
                </div>  
                <?php
                      if (isset($_GET['login']) && $_GET['login'] == 'erro' ) {   ?>   
                         <div class="text-danger"> Usuário e/ou Senha inválido(s)</div>
                         <div class="text-info"><a href="organizador.home.cadastro.php">Cadastre-se</a> </div>
                  <?php    } ?>           
                <button class="btn botao btn-lg btn-block" type="submit">Entrar</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>