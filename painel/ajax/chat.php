<?php
    include('../../constante.php');
	$data['sucesso'] = true;
	$data['mensagem'] = "";
    $data['erros'] = "Atenção: Dados Vazio não São Permitidos";
	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	if($_POST['acao']){
        $mensagem = $_POST['mensagem'];
        $id = $_SESSION['id'];
        if($mensagem != ''){
            $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.chat` VALUES(null,?,?)");
            $sql->execute(array($id,$mensagem));
        }
    }


	die(json_encode($data['mensagem']));



?>