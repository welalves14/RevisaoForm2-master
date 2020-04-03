<?php

// Limpar dados para evitar possíveis scripts
function __e($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
function limparVetor($varPost) {
    $arrayLimpo = [];
    foreach ($varPost as $indice => $valor) {
        $arrayLimpo[$indice] = __e($valor);
    }
    return $arrayLimpo;
}

// Verificar se o formulário foi enviado
function formEnviado($postArray) {
    global $dados;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Limpar post
        $dados = limparVetor($postArray);
        return true;
    } else {
        header('Location: ../index.php');
        die();
    }
}

// Criar mensagem de erro
function gerarMensagensErro($postArray) {
    global $mensagem_erro;
    if ($postArray["prato_principal"] == '') {
        $mensagem_erro["prato_principal_vazio"] = "Informe um prato principal";
    }

    if(!isset($postArray['acompanhamento'])) {
        $mensagem_erro["acompanhamento_vazio"] = "Informe o acompanhamento";
    }

    if(!isset($postArray['agree'])) {
        $mensagem_erro["agree_vazio"] = "Confirme seu pedido";
    }
    
    if($postArray['nome'] == '') {
        $mensagem_erro["nome_vazio"] = "Informe seu nome";
    }
    if($postArray['address'] == '') {
        $mensagem_erro["address_vazio"] = "informe o endereço";
    }
    if($postArray['phonenumber'] == '') {
        $mensagem_erro["phonenumber_vazio"] = "informe o telefone";
    }
}
