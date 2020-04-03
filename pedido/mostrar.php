<?php

    // Importar funcoes e variaveis
    require_once ( "../validar/variaveis.php" );
    require_once ( "../validar/funcoes.php" );

    // Validar se o usuário chegou a página via formulário
    // e limpar post

    if(formEnviado($_POST)){

        gerarMensagensErro($dados);

        if(empty($mensagem_erro)) {      //Determina se uma variável é considerada vazia. Uma variável é considerada vazia se não existir ou seu valor é igual FALSE. A função empty() não gera um aviso se a variável não existir.
            echo '<h1>DADOS DA REFEIÇÃO:</h1>';

            echo 'Acompanhamento: ' . $_POST['acompanhamento'] . '<br><br>';

            echo 'Prato principal: ' . $_POST['prato_principal'] . '<br><br>';
            //=============================================================
            echo 'Adicionais:<br>';
                if(isset($_POST['Batata-frita'])) {
                    echo 'Batata-frita<br>';
                }
                if(isset($_POST['Batata-palha'])) {
                    echo 'Batata-palha<br>';
                }
                if(isset($_POST['Oregano'])) {
                    echo 'Oregano<br>';
                }
                if(isset($_POST['Vinagrete'])) {
                    echo 'Vinagrete<br>';
                }
                if(isset($_POST['Tomate'])) {
                    echo 'tomate<br>';
                }
                if(isset($_POST['Cebola'])) {
                    echo 'cebola<br>';
                }
            //=============================================================
            echo '<br>Informações do cliente:<br>';
            echo 'Nome: ' . $_POST['nome'] . '<br>';
            echo 'Endereço: ' . $_POST['address'] . '<br>';
            echo 'Telefone: ' . $_POST['phonenumber'] . '<br>';
        }else{
            foreach($mensagem_erro as $value) {
                echo "$value <br>";
            }
           
        }
        //var_dump( $dados );
        //var_dump( $mensagem_erro );
    }
?>    