<?php
    include('../../constante.php');
	$data['sucesso'] = true;
	$data['mensagem'] = "";
    $data['erros'] = "Atenção: Dados Vazio não São Permitidos";
	if(Painel::logado() == false){
		die("Você não está logado!");
	}
	if(isset($_POST['acao']) && $_POST['acao'] == 'inserir_mensagem'){
        $mensagem = $_POST['mensagem'];
        $id = $_SESSION['id'];
        $nome = $_SESSION['nome'];
        if($mensagem != ''){
            $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.chat` VALUES(null,?,?)");
            $sql->execute(array($id,$mensagem));
        }
        echo '
        <div class="mensagem-chat">
        <span>'.$nome.':</span>
        <p>'.$mensagem.'</p>
    </div>';

    $_SESSION['lastIdChat'] = MySql::connect()->lastInsertId();

    }else if(isset($_POST['acao']) && $_POST['acao'] == "pegarMensagens"){
        $lastId = $_SESSION['lastIdChat'];
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.chat` WHERE id > $lastId");
        $sql->execute();
        $mensagens = $sql->fetchAll();
        $mensagens = array_reverse($mensagens);
		foreach($mensagens as $key => $value){
            $nomeUsuario = MySql::connect()->prepare("SELECT nome FROM `tb_admin.usuarios` WHERE id = ?");
            $nomeUsuario->execute(array($value['user_id']));
			$nomeUsuario = $nomeUsuario->fetch()['nome'];
			echo '<div class="mensagem-chat">
				<span>'.$nomeUsuario.':</span>
				<p>'.$value['mensagem'].'</p>
			</div><!--mensagem-chat-->';

			$_SESSION['lastIdChat'] = $value['id'];
		}
    }


	//die(json_encode($data));



?>