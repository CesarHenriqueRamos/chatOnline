$(function(){
    $('form').ajaxForm({
        success: function(data){
            console.log(data)
            $('textarea').val("");
        }
        
    })
    function recuperarMensagem() {
        console.log("recuperando mensagem")
    }
    setInterval(function() {
        recuperarMensagem()
    },3000)
});