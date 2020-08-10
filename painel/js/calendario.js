$(function(){
    $('td').click(function(){
        $('td').removeClass('day-select');
        $(this).addClass('day-select');
        var novoDia = $(this).attr('dia').split('-');
        var novoDia = novoDia[2]+'/'+novoDia[1]+'/'+novoDia[0];
        trocarData($(this).attr('dia'),novoDia);
    })
    function trocarData(nFormatado,formatado){
        $('input[type=hidden]').attr('value',nFormatado);
        $('form h2.atividade').html('Adicional Tarefas Para o Dia '+formatado);
        $('h2.tarefas').html('Tarefas do dia '+formatado);
    }
})