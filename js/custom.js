$('#formContratante').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#formContratante')[0]);
    $.ajax({
        url : 'inc/cadastrarcontratante.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            $('#respostacontratante').html('<p class="alert alert-success text-success">Carregando...</p>');
        }
    })
    .done(function(resp){
        var obj = JSON.parse(resp);
        if(obj.codigo == 1){
            $('#respostacontratante').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
        }else{
            $('#respostacontratante').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
        }
    })
    .fail(function(jqXHR, textStatus){
        $('#respostacontratante').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
    });
});

$('#formContratado').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#formContratado')[0]);
    $.ajax({
        url : 'inc/cadastrarcontratado.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            $('#respostacontratado').html('<p class="alert alert-success text-success">Carregando...</p>');
        }
    })
    .done(function(resp){
        var obj = JSON.parse(resp);
        if(obj.codigo == 1){
            $('#respostacontratado').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
        }else{
            $('#respostacontratado').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
        }
    })
    .fail(function(jqXHR, textStatus){
        $('#respostacontratado').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
    });
});

$('#formLogin').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#formLogin')[0]);
    $.ajax({
        url : 'inc/autenticar.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function(){
            $('#respostalogin').html('<p class="alert alert-success text-success">Carregando...</p>');
        }
    })
    .done(function(resp){
        var obj = JSON.parse(resp);
        if(obj.codigo == 1){
            $('#respostalogin').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
        }else{
            $('#respostalogin').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
        }
    })
    .fail(function(jqXHR, textStatus){
        $('#respostalogin').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
    });
});