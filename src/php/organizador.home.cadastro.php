<html>
  <head>
    <meta charset="utf-8" />
    <title>Organizador de Tarefas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
    <style>
      
    </style>
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
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header login">
             <h4>Cadastro</h4>
            </div>
            <div class="card-body m-auto">
              <form action="tarefa_controller.php?acao=usuario"method="post">
                <div class="form-group">
                  <label>Nome:</label>
                  <input name="nome" type="text" class="form-control" placeholder="Nome Completo">
                </div> 
                <div class="form-group">
                  <label>Email:</label>
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>

                <div class="form-group">
                  <label>Senha:</label>
                  <input name="senha" type="password" class="form-control" placeholder="Somente números">
                </div>  

          
                <button class="btn botao btn-lg btn-block" type="submit">Cadastre-se</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>