<?php
    session_start();
    include("../../php/conexao.php");

    $id_menu = mysqli_real_escape_string($conexao, trim($_POST['id_menu']));
    $produto_menu = mysqli_real_escape_string($conexao, trim($_POST['produto_menu']));
    $descricao_menu = mysqli_real_escape_string($conexao, trim($_POST['descricao_menu']));
    $valor_menu = mysqli_real_escape_string($conexao, trim($_POST['valor_menu']));
    $secao_menu = mysqli_real_escape_string($conexao, trim($_POST['secao_menu']));

    
    $id_empresa = $_SESSION['id_empresa_logada'];

    $result = $valor_menu;
    $valor_formatado = str_replace(',', '.', $result);


    function get_post_action($name)
    {
        $params = func_get_args();

        foreach ($params as $name) {
            if (isset($_POST[$name])) {
                return $name;
            }
        }
    }


    switch (get_post_action('cadastrar', 'excluir', 'salvar')) {
        case 'cadastrar':
            $sql = "INSERT INTO menu (id_menu, id_empresa, produto_menu, descricao_menu, valor_menu, secao_menu) VALUES ('$id_menu', '$id_empresa', '$produto_menu', '$descricao_menu', '$valor_formatado', '$secao_menu')";
            if($conexao->query($sql) === TRUE) {
                $_SESSION['cad_produto_realizado'] = true;
            }else{
                $_SESSION['cad_produto_erro'] = true;
            }

            $conexao->close();

            header('Location:../pages/cadProdutos.php');
            exit;
            break;

        case 'excluir':
            $sql = "DELETE FROM menu WHERE `id_menu`='$id_menu'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['excluir_produto_realizado'] = true;
                    header("Location:../pages/listProdutos.php");
                }
            break;

        case 'salvar':
            $sql = "UPDATE `menu` SET `produto_menu`='$produto_menu', `descricao_menu`='$descricao_menu', `valor_menu`='$valor_formatado', `secao_menu`='$secao_menu'  WHERE  `id_menu`='$id_menu' AND `id_empresa`='$id_empresa'";
            $result = mysqli_query($conexao, $sql);
            
                if(mysqli_affected_rows($conexao)){
                    $_SESSION['edit_produto_realizado'] = true;
                    echo "atualizacao ok";
                    header("Location:../pages/listProdutos.php");
                }
            break;

        default:
            echo "defaut";
    }









?>