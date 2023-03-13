<?php
session_start();
include("../classes/class-cardapio.php");
include("../php/verifica_login.php");
$cardapio = new Contas();
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modulo administrador - Meu Cardapio </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="../css/estilos.css" rel="stylesheet" />

  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!--Scrips Pessoais - Funções -->
    <script src="../js/functions.js" ></script>

    <div class="container-fluid">
    <?php include("../componentes/nav-bar-sup.php");?>

    <div class="row mb-5">
          
      <div class="col-sm-4 col-md-2 mb-3">
      
              
                                
              <!--Menu Lateral-->
              <?php $_SESSION['pg'] = "listProdutos"; include("../componentes/nav-lateral.php") ?>
                  
          
          
      </div>
            
      <div class="col-sm-8 col-md-10">
      
              
          <div class="container mt-3">
            <form class="row g-3" action="listProdutos.php" method="GET">
          
              <div class="col-md-3">
                <label for="data-inicial" class="form-label">Nome do Produto</label>
                <input type="text" class="form-control" id="nome" name="nome">
              </div>
              <div class="col-md-4 row justify-content-end mt-5">
                  <div class="col-auto">
                      <button type="submit" class="btn btn-primary">Pesquisar</button>
                  </div>
              </div>
            </form>

              <div class="col-12 row">

              <?php
                  if(isset($_SESSION['edit_produto_realizado'])):
              ?>
                  <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <strong>Feito!</strong> Alteracao realizado com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
                  endif;
                  unset($_SESSION['edit_produto_realizado']);
              ?>
                  <h1>...</h1>
              <!--TABELA-->
          
              <?php

                if(!isset($_GET['nome']) ){
                  $id_empresa_logada = $_SESSION['id_empresa_logada'];
                  $cardapio->listarProdutos("SELECT * FROM menu WHERE id_empresa='$id_empresa_logada'");
                }
              
              
                if (isset($_GET['nome'])) {
                  $id_empresa_logada = $_SESSION['id_empresa_logada'];
                  $nome_produto = $_GET['nome'];
                  $cardapio->listarProdutos("SELECT * FROM menu WHERE produto_menu like '%$nome_produto%' AND id_empresa='$id_empresa_logada'");


                }
                ?>
                  



               
      </div>
                
                </div>
            
            </div>
          </div>

    

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            <button type="button" class="btn btn-primary" onclick=location.href=linkAtual()>Continuar</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(window).on('load',function(){
        //$('#exampleModal').modal('show');
      });
    </script>

  </div><!--Final container-fluid-->
  </body>
</html>