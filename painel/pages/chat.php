<div class="box-container w100">
    <h2 class="title"><i class="fas fa-comments"></i> Chat Online</h2>
    <hr>    
    <div class="box-chat-online">
        <?php 
        $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.chat` ORDER BY id  DESC LIMIT 10");
        $sql->execute();
        $mensagens = $sql->fetchAll();
        $mensagens = array_reverse($mensagens);
        foreach($mensagens as $key => $value){
            $lastId = $value['id'];
            $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE id = ?");
            $sql->execute(array($value['user_id']));
            $user = $sql->fetch();
            ?>
        <div class="mensagem-chat">
            <span><?php echo $user['nome'];?>:</span>
            <p><?php echo $value['mensagem'];?></p>
        </div>
        <?php 
    $_SESSION['lastIdChat'] = $lastId;
    } ?>
    </div>
    <form action="<?php INCLUDE_PATH_PAINEL ?>ajax/chat.php" method="post">
        <textarea name="mensagem" id="" cols="30" rows="5"></textarea>
        <input type="submit" value="Enviar" name="acao">
    </form>
</div>