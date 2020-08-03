<div class="box-container w100">
    <h2 class="title"><i class="far fa-plus-square"></i> Adicionar Depoimento</h2>
    <hr>

    <form action="" method="post" enctype="multipart/form-data" id="editar-usuario">
 
	<?php
        if(isset($_POST['acao'])){
            //enviado o formulario
            $nome = $_POST['nome'];
            $mensagem = $_POST['mensagem'];
            
            //Incerção dinamica
           
            if(Painel::insert($_POST)){
                Painel::alert('sucesso', 'Depoimento Cadastrado com Sucesso');
            }else{
                Painel::alert('erro', 'Campos Vazios não São Permitidos');
            }        
	    }
		?>
        <div class="box-form">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="box-form">
            <label for="mensagem">Mensagem:</label>
            <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
        </div>
        
        <div class="box-form"> 
            <input type="hidden" name="order_id" value="0">      
            <input type="hidden" name="nome_tabela" value="tb_site.depoimentos">        
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>

