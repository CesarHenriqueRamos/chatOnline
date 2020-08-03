<div class="box-container w100">
    <h2 class="title"><i class="far fa-plus-square"></i> Adicionar Serviço</h2>
    <hr>

    <form action="" method="post" enctype="multipart/form-data" id="editar-usuario">
 
	<?php
        if(isset($_POST['acao'])){
                        
            //Incerção dinamica
           
           /**/   if(Painel::insert($_POST)){
                Painel::alert('sucesso', 'Seviço Cadastrado com Sucesso');
            }else{
                Painel::alert('erro', 'Campos Vazios não São Permitidos');
            }      
	    }
		?>
        <div class="box-form">
            <label for="nome">Serviço:</label>
            <input type="text" name="servico" id="nome">
        </div>
        <div class="box-form">
            <label for="mensagem">Descrição:</label>
            <textarea name="descricao" id="mensagem" cols="30" rows="10"></textarea>
        </div>
        
        <div class="box-form"> 
            <input type="hidden" name="order_id" value="0">        
            <input type="hidden" name="nome_tabela" value="tb_site.servico">        
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>

