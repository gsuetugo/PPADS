// $('#contactform').submit(function(event) {
//     event.preventDefault();
//     var formData = new FormData($('#contactform')[0]);
//     $.ajax({
//         url : 'inc/enviarcontato.php',
//         type : 'post',
//         data : formData,
//         cache: false,
//         contentType: false,
//         processData: false,
//         beforeSend : function(){
//             $('#resposta').html('<div class="spinner-border active mx-auto mb-3" role="status"><span class="sr-only">Carregando...</span></div>');
//         }
//     })
//     .done(function(resp){
//         var obj = JSON.parse(resp);
//         if(obj.codigo == 1){
//             $('#resposta').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
//         }else{
//             $('#resposta').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
//         }
//     })
//     .fail(function(jqXHR, textStatus){
//         $('#resposta').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
//     });
// });
// $('#newsform').submit(function(event) {
//     event.preventDefault();
//     var formData = new FormData($('#newsform')[0]);
//     $.ajax({
//         url : 'inc/cadastrarnewsletter.php',
//         type : 'post',
//         data : formData,
//         cache: false,
//         contentType: false,
//         processData: false,
//         beforeSend : function(){
//             $('#respostarodape').html('<div class="spinner-border text-white mx-auto" role="status"><span class="sr-only">Carregando...</span></div>');
//         }
//     })
//     .done(function(resp){
//         var obj = JSON.parse(resp);
//         if(obj.codigo == 1){
//             $('#respostarodape').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
//         }else{
//             $('#respostarodape').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
//         }
//     })
//     .fail(function(jqXHR, textStatus){
//         $('#respostarodape').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
//     });
// });
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