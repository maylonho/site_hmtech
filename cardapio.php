<!doctype html>
<?php
session_start();
include("./php/conexao.php");
?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="./imgs/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="./css/estilo.css">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    
    <title>Meu Cardapio - Cajati</title>
  </head>
  <body>


    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
        <div class="container">
        <a class="navbar-brand" href="#"><img src="./imgs/logo_grande_cardapio.png" style="width: 30px; margin: 0; padding: 0;"/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">PÁGINA INICIAL <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="empresa.html">A EMPRESA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produtos.html">PRODUTOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="servicos.html">SERVIÇOS</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSocial" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  NOSSAS REDES
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownSocial">
                  <a class="dropdown-item" href="#">Facebook</a>
                  <a class="dropdown-item" href="#">Twitter</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Instagram</a>
                </div>
              </li>
          </ul>
        </div>
        </div>
      </nav>

      <?php
      $url_empresa = $_GET['url'];
      $sql = "SELECT * FROM empresa WHERE url_empresa='$url_empresa'";
      $result = mysqli_query($conexao, $sql);
      $info_empresa = mysqli_fetch_assoc($result);

      $id_empresa = $info_empresa['id_empresa'];
      $nome_empresa = $info_empresa['nome_empresa'];
      $telefone_empresa = $info_empresa['telefone_empresa'];
      $cnpj_empresa = $info_empresa['cnpj_empresa'];
      $email_empresa = $info_empresa['email_empresa'];
      $senha_empresa = $info_empresa['senha_empresa'];
      $url_empresa = $info_empresa['url_empresa'];
      $imagem_empresa = $info_empresa['imagem_empresa'];

      ?>
      

          
      <div class="zap" onclick="location.href='https://api.whatsapp.com/send?phone=<?php echo $info_empresa['telefone_empresa']; ?>';">
        <img src="imgs/zap.png" alt="Fale conosco">
      </div>  

      
      <!--NOME E IMAGEM DA LOJA-->
      <div class="container">
        <div class="row">
            <div class="apres_titulo col-12 text-center my-5">
              <div class="row">
                <div class="col-sm-6 d-flex justify-content-sm-end justify-content-center">
                  <img src="imgs/clientes/<?php echo $imagem_empresa; ?>" alt="" class=" rounded">
                </div>
                <div class="col-sm-6 d-flex align-items-sm-start align-items-center flex-column">
                  <h1><?php echo $info_empresa['nome_empresa']; ?></h1>
                  <h5 class="text-muted">Meu Cardápio Online</h5>
                </div>
              </div>
            </div>
        </div>


        <!--Inicio dos cards-->
        <div class="row justify-content-sm-center">
            
        <?php


          $secoes = array(
            array("nome" => "Lanches","img" => "./imgs/secao_lanches.png"),
            array("nome" => "Pratos","img" => "./imgs/secao_pratos.png"),
            array("nome" => "Bebidas","img" => "./imgs/secao_bebidas.png"),
            array("nome" => "Porcoes","img" => "./imgs/secao_porcoes.png"),
          );


          foreach($secoes as $secoes){
            
            $sql = "SELECT * FROM menu WHERE secao_menu='$secoes[nome]' AND id_empresa='$id_empresa' order by id_menu asc";
            $result = mysqli_query($conexao, $sql);
            $secao__qtd=mysqli_num_rows($result);
            
            if($secao__qtd>=1){
              echo "";
              ?>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    
                    <div class="card border-0 mb-5">
                        <img class="card-img-top" src=" <?php echo $secoes['img']; ?>">
                        <div class="card-body">


                        <?php
                          while($row = mysqli_fetch_assoc($result)){
                            $id_menu = $row['id_menu'];
                            $produto_menu = $row['produto_menu'];
                            echo 
                            ""
                        ?>

                          <div class="row d-flex justify-content-between">
                            <h5 class="card-title mb-0 pb-0"><?php echo $row['id_menu'];?> - <?php echo $row['produto_menu'];?></h5><h5 class="card-title mb-0 pb-0">R$ <?php echo number_format($row['valor_menu'],2,",","."); ?></h5>
                          </div>
                          <div class="row">
                            <p class="card-text mb-2 text-muted text-left"><?php echo $row['descricao_menu'];?></p>
                          </div>

                          <?php

                          "";
                          }
                          ?>

                        </div>              
                    </div>   
                              
                </div>
              <?php
            }
          
          }

        ?>
              

        </div><!--Fechamento da linha que contem os cards-->
      </div><!--Fechamento do container-->

    <!--Inicio do rodape-->

    <div class="col-12 bg-light py-5 text-dark">
              
      <blockquote class="blockquote text-center">
      
          <p class="mb-0">O sucesso não é garantido, mas o fracasso é certo se você não estiver emocionalmente envolvido em seu trabalho.</p>
          <footer class="blockquote-footer">Biz Stone <cite title="Titulo">Fundador do Twiter</cite></footer>
      </blockquote>

      
      
      <div class="row mt-5 mb-2">

        <div class="col-sm-4 text-center mt-0">
          <img src="./imgs/logo_grande_cardapio.png" alt="" style="width: 30%;">
        </div>

        <div class="col-sm-4 mb-5 pl-5">
          <h5 class="text-dark">Links</h5>
          <a href="#"><h6 class="text-dark">Página Inicial</h6></a>
          <a href="./explorar.html"><h6 class="text-dark">Explorar</h6></a>
          <a href="./sobre.html"><h6 class="text-dark">Sobre</h6></a>
          <a href="./contato.html"><h6 class="text-dark">Contato</h6></a>
        </div>


        <div class="col-sm-4 mb-5 mt-3">
            <h6 class=" text-center"><i class="fa fa-phone"></i> (13) 99648-7963 / (13) 99713-1714</h6>
            <h6 class=" text-center"><i class="fa fa-envelope"></i> meucardapiocajati@outlook.com</h6>
        </div>
 
        <div class="col-12 border-top pt-3">
          <blockquote class="blockquote text-right mb-0">
            <footer class="blockquote-footer text-center">
              Meu Cardapio Online - Site Desenvolvido por MHO Systens.
            </footer>
          </blockquote>
        </div>
      </div>

  
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  </body>
</html>