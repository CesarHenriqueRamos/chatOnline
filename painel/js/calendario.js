$(function(){
    $('td').click(function(){
        $('td').removeClass('day-select');
        $(this).addClass('day-select');
        var novoDia = $(this).attr('dia').split('-');
        var novoDia = novoDia[2]+'/'+novoDia[1]+'/'+novoDia[0];
        trocarData($(this).attr('dia'),novoDia);
        aplicarEvento($(this).attr('dia'));
    })
    $('[type=submit]').click(function(){
        inserir();
        return false;
    })
      function inserir(){
        var tarefa =$('[name=tarefa]').val();
        var data = $('[name=data]').val();
        var hora = $('[name=hora]').val();
        
		$.ajax({
            url:include_path+'/ajax/calendario.php',
            method:'post',
			data:{'tarefa':tarefa,'data':data,'hora':hora,'acao':'inserir'}			
		}).done(function(data){
			$('div.tabela-responciva').after(data);
        })
            $('form')[0].reset();
      }  
    function trocarData(nFormatado,formatado){
        $('input[name=data]').attr('value',nFormatado);
        $('form h2.atividade').html('Adicional Tarefas Para o Dia '+formatado);
        $('h2.tarefas').html('Tarefas do dia '+formatado);
    }
    function aplicarEvento(data){
        $('.row2').remove();
        $.ajax({
            url:include_path+'ajax/calendario.php',
            method:'post',
            data:{'data':data,'acao':'puxar'}
        }).done(function(data){
            $('div.tabela-responciva').after(data);
        })
    }
})