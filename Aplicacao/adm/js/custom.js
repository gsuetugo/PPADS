$(document).ready(function(){
    $('#formLogin').submit(function(event){
        event.preventDefault();
        $.ajax({
            url : 'autentic.php',
            type : 'post',
            data : {
                email : $('#inputEmail').val(),
                senha : $('#inputSenha').val()
            },
            beforeSend : function(){
                $('#resposta').html('<div class="spinner-border text-primary mx-auto mb-3" role="status"><span class="sr-only">Carregando...</span></div>');
            }
        })
        .done(function(resp){
            $('#resposta').html(resp);
            var obj = JSON.parse(resp);
            if(obj.codigo == 1){
                $('#resposta').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
                window.location.href = 'painel';
            }else{
                $('#resposta').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
            }
        })
        .fail(function(jqXHR, textStatus){
            $('#resposta').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
        });
    });
});