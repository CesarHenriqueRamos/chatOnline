<?php
    $mes = isset($_GET['mes']) ? (int)$_GET['mes'] : date('m', time());
    $ano = isset($_GET['ano']) ? (int)$_GET['mes'] : date('Y', time());
    if($mes > 12){ $mes = 12;}
    if($mes < 1){ $mes = 1;}
    $numeroDias = cal_days_in_month(CAL_GREGORIAN,$mes,$ano);
    $diaInicialMes = date('N',strtotime("$ano-$mes-01"));
    $diaAtual = date('d',time());
    $meses = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
    $nomeMes = $meses[$mes-1];
    $DataAtual = "$ano-$mes-$diaAtual";;
?>
<div class="box-container w100">
    <h2 class="title"><i class="fas fa-calendar"></i> Calendario <?php echo $nomeMes.'|'.$ano?></h2>
    <hr>
    <table>
        <tr class="title">
            <td>Domingo</td>
            <td>Segunda-Feira</td>
            <td>Terça-Feira</td>
            <td>Quarta-Feira</td>
            <td>Quinta-Feira</td>
            <td>Sexta-Feira</td>
            <td>Sabado</td>
        </tr>
        <tr>
            <?php 
            $n = 1; 
            $z = 0;
            $numeroDias += $diaInicialMes;
            while($n <= $numeroDias){
                if($diaInicialMes == 7 && $z != $diaInicialMes){
                    $z = 7;
                    $n = 8;
                }
                if($n % 7 == 1){
                    echo "<tr>";
                }
                if($z >= $diaInicialMes){
                    $dia = $n - $diaInicialMes;
                    $atual = "$ano-$mes-$dia";
                    if($dia == $diaAtual){
                        echo "<td class='day-select' dia=\"$atual\">{$dia}</td>";
                    }else{
                    echo "<td dia=\"$atual\">{$dia}</td>";
                    }
                }else{
                    echo "<td></td>";
                    $z++;
                }
                if($n % 7 == 0){
                    echo "</tr>";
                }
                $n++;
           }
           ?>
        </tr>
    </table> 
    <form action="<?php INCLUDE_PATH_PAINEL ?>ajax/calendario.php" method="post" class="atividade">
    <h2 class="atividade"><i class="fas fa-calendar"></i> Adicional Tarefas Para o Dia <?php echo date('d/m/Y',time()) ?></h2>
        <input type="text" name="tarefa" id="">
        <input type="time" name="hora" id="">
        <input type="hidden" name="data" value="<?php echo date('Y-m-d') ?>">
        <input type="hidden" name="acao" value="inserir">
        <input type="submit"  value="Adicionar">
    </form>
</div>
<div class="box-container w100">
    <h2 class="title tarefas"><i class="far fa-list-alt"></i> Tarefas do dia <?php echo date('d/m/Y',time()) ?></h2>
    <hr>
    <div class="scroll">
        <div class="tabela-responciva depoimento">
        
                <div class="row1">
                    <div class="colR">
                        <span>Lembrete:</span>
                    </div><!--col-->
                    <div class="colR">
                        <span>Hora:</span>
                    </div>
                    <div class="clear"></div>
                </div><!--row-->  
                <?php 
                    $sql = MySql::connect()->prepare("SELECT * FROM `tb_admin.agenda` WHERE data = '$DataAtual'");
                    $sql->execute();
                    $dados = $sql->fetchAll();
                    foreach($dados as $key => $value){
                 ?> 
                       
                    <div class="row2">
                        <div class="colR">
                            <span><?php echo $value['tarefa'];?></span>
                        </div><!--col-->
                        <div class="colR">
                            <span><?php echo $value['hora'];?></span>
                        </div><!--col-->
                    
                        <div class="clear"></div>
                    </div><!--row-->
                
                <?php 
               }
            ?>
                
            </div><!--tabela-responciva-->
       </div>
</div>