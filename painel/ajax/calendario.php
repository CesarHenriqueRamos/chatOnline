<?php
 include('../../constante.php');
	if(Painel::logado() == false){
		die("Você não está logado!");
	}
if(isset($_POST['acao']) && $_POST['acao'] == 'inserir'){
    $tarefa = $_POST['tarefa'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $sql = MySql::connect()->prepare("INSERT INTO `tb_admin.agenda` VALUES (null,?,?,?)");
    $sql->execute(array($tarefa,$data,$hora));
        $box = "";
        $box .= '<div class="row2">';
        $box .=  '<div class="colR">';
        $box .=  '<span>'.$tarefa.'</span>';
        $box .=  '</div><!--col-->';
        $box .=   '<div class="colR">';
        $box .=    '<span>'.$hora.'</span>';
        $box .=   '</div><!--col-->';
        $box .=   '<div class="clear"></div>';
        $box .=    '</div><!--row-->';
    echo $box;
    
}else if(isset($_POST['acao']) && $_POST['acao'] == 'puxar'){
    $dataPesquisa = $_POST['data'];
    $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.agenda` WHERE data = '$dataPesquisa' ORDER BY id DESC");
    $sql->execute();
    $dados = $sql->fetchAll();
    $box = "";
    foreach($dados as $key => $value){
        $box .= '<div class="row2">';
        $box .=  '<div class="colR">';
        $box .=  '<span>'.$value['tarefa'].'</span>';
        $box .=  '</div><!--col-->';
        $box .=   '<div class="colR">';
        $box .=    '<span>'.$value['hora'].'</span>';
        $box .=   '</div><!--col-->';
        $box .=   '<div class="clear"></div>';
        $box .=    '</div><!--row-->';
    }
    echo $box;
}

?>