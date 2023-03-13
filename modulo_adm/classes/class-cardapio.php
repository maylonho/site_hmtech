<?php

class Contas {

    public function listarProdutos($consulta){
        include("../../php/conexao.php");
        $sql = $consulta;
        $result = mysqli_query($conexao, $sql);
        echo "
        <table class='table'>
            <thead>
            <tr>
                <th scope='col'>ID</th>
                <th scope='col'>Produto</th>
                <th scope='col'>Valor</th>
                <th scope='col'>Info</th>
                <th scope='col'>Tipo</th>
            </tr>
            </thead>
            <tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $id_menu = $row['id_menu'];
            $id_empresa = $row['id_empresa'];
            $produto_menu = $row['produto_menu'];
            $descricao_menu = $row['descricao_menu'];
            $valor_menu = $row['valor_menu'];
            $secao_menu = $row['secao_menu'];

            
            $linkedit ="id_menu=" . str_replace(' ', '+', $id_menu) . "&";
            $linkedit .="produto_menu=" . str_replace(' ', '+', $produto_menu) . "&";
            $linkedit .= "descricao_menu=" . str_replace(' ', '+', $descricao_menu) . "&";
            $linkedit .= "valor_menu=" . str_replace(' ', '+', $valor_menu) . "&";
            $linkedit .= "secao_menu=" . str_replace(' ', '+', $secao_menu) . "&";
            $linkedit .= "modo=editar";
            
            echo 
            "
                <tr onmouseover=setAttribute('id','linhaTabelaon') onmouseout=setAttribute('id','linhaTabelaoff') onclick=location.href='cadProdutos.php?$linkedit' style='cursor:pointer'>
                    <th scope='row'>".$row['id_menu']."</th>
                    <td>".$produto_menu."</td>
                    <td>"."R$ ".number_format($row['valor_menu'], 2, ',', '.')."</td>
                    <td>".$descricao_menu."</td>
                    <td>".$secao_menu."</td>
                </tr>
            
            ";
        }
        echo "</tbody>
        </table>";
    }

    

    
    


}

?>