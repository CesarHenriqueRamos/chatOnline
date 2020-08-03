<?php
    if(isset($_GET['excluir'])){
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar("tb_site.depoimentos",$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimento');
    }else if(isset($_GET['order']) && isset($_GET['id'])){
        Painel::orderItem("tb_site.depoimentos",$_GET['order'],$_GET['id']);

    }
    $pagineAtual = isset($_GET['pagina'])?(int)$_GET['pagina']: 1;
    $porPagina = 5;
    $depoimenstos = Painel::selectAll("tb_site.depoimentos",($pagineAtual -1)*$porPagina,$porPagina);
?>
<div class="box-container w100">
    <h2 class="title"><i class="far fa-list-alt"></i> Listar Depoimentos</h2>
    <hr>
    <div class="scroll">
        <div class="tabela-responciva depoimento">
        
                <div class="row">
                    <div class="col">
                        <span>Nome:</span>
                    </div><!--col-->
                    <div class="col">
                        <span>Depoimento:</span>
                    </div><!--col-->
                    <div class="col1">
                         <span>#</span>
                    </div><!--col-->
                    <div class="col1">
                        <span>#</span>
                    </div><!--col-->
                    <div class="col1">
                         <span>#</span>
                    </div><!--col-->
                    <div class="col1">
                        <span>#</span>
                    </div><!--col-->
                    <div class="clear"></div>
                </div><!--row-->
                <?php foreach($depoimenstos as $key =>$value){?>
                
                <div class="row">
                    <div class="col">
                        <span><?php echo $value['nome'];?></span>
                    </div><!--col-->
                    <div class="col">
                        <span><?php echo $value['depoimento'];?></span>
                    </div><!--col-->
                    <!--botão de editar-->
                        <a href="<?php echo INCLUDE_PATH_PAINEL?>editar-depoimento?id=<?php echo $value['id']; ?>"><div class="col1 editar"><i class="fas fa-pencil-alt"></i></div><!--col--></a> 
                    <!--botão de deletar-->                    
                        <a actionBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimento?excluir=<?php echo $value['id']; ?>"><div class="col1 delete"><i class="fas fa-trash"></i></div><!--col--></a>  
                    <!--fim dos botoes-->
                    <!--botão de editar-->
                    <a href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimento?order=up&id=<?php echo $value['id']; ?>"><div class="col1 local"><i class="fas fa-angle-up"></i></div><!--col--></a> 
                    <!--botão de deletar-->                    
                        <a href="<?php echo INCLUDE_PATH_PAINEL?>listar-depoimento?order=dow&id=<?php echo $value['id']; ?>"><div class="col1 local"><i class="fas fa-angle-down"></i></div><!--col--></a>  
                    <!--fim dos botoes-->
                    <div class="clear"></div>
                </div><!--row-->
                <?php } ?>
                <div class="paginacao">
                <?php
                    $totalPaginas = ceil(count(Painel::selectAll("tb_site.depoimentos"))/$porPagina);
                    for($i =1; $i <= $totalPaginas; $i++){
                        if($i == $pagineAtual)
                            echo  '<a class="pag-select" href="'.INCLUDE_PATH_PAINEL.'listar-depoimento?pagina='.$i.'">'.$i.'</a>';
                        else
                            echo  '<a  href="'.INCLUDE_PATH_PAINEL.'listar-depoimento?pagina='.$i.'">'.$i.'</a>';

                    }
                ?>
                
                </div>
            </div><!--tabela-responciva-->
       </div>
</div>