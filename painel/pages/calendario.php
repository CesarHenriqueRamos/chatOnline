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
    <form action="" method="post" class="atividade">
    <h2 class="atividade"><i class="fas fa-calendar"></i> Adicional Tarefas Para o Dia <?php echo date('d/m/Y',time()) ?></h2>
        <input type="text" name="atividade" id="">
        <input type="hidden" name="data" value="2020-08-10">
        <input type="submit" name="acao" value="Adicionar">
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
                    for($i = 1;$i <=7;$i++){
                 ?>           
                <div class="row2">
                    <div class="colR">
                        <span>Medico</span>
                    </div><!--col-->
                    <div class="colR">
                        <span>12:00</span>
                    </div><!--col-->
                  
                    <div class="clear"></div>
                </div><!--row-->
                <?php 
               }
            ?>
                
            </div><!--tabela-responciva-->
       </div>
</div>