$('#formGravar').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#formGravar')[0]);
    formData.append('tabela', $('#formGravar').attr('name'));
    $.ajax({
        url : 'inc/gravar.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function() {
            $('#resposta').html('<div class="spinner-border text-primary mx-auto mb-3" role="status"><span class="sr-only">Carregando...</span></div>');
        }
    })
    .done(function(resp) {
        var obj = JSON.parse(resp);
        if (obj.codigo == 1) {
            $('#resposta').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
            window.location.href = $('#formGravar').attr('name');
        } else {
            $('#resposta').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
        }
    })
    .fail(function(jqXHR, textStatus) {
        $('#resposta').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
    });
});

$('#formEditar').submit(function(event) {
    event.preventDefault();
    var formData = new FormData($('#formEditar')[0]);
    formData.append('tabela', $('#formEditar').attr('name'));
    $.ajax({
        url : 'inc/editar.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend : function() {
            $('#resposta').html('<div class="spinner-border text-primary mx-auto mb-3" role="status"><span class="sr-only">Carregando...</span></div>');
        }
    })
    .done(function(resp) {
        var obj = JSON.parse(resp);
        if (obj.codigo == 1) {
            $('#resposta').html('<p class="alert alert-success text-success">' + obj.mensagem + '</p>');
            location.reload(true);
        } else {
            $('#resposta').html('<p class="alert alert-danger text-danger">' + obj.mensagem + '</p>');
        }
    })
    .fail(function(jqXHR, textStatus) {
        $('#resposta').html('<p class="alert alert-danger text-danger">Ops! Ocorreu um erro, tente novamente mais tarde</p>');
    });
});

function excluir(id) {
    decisao = confirm("Tem certeza que deseja excluir?");
    if (decisao) {
        var formData = new FormData();
        formData.append('id', id);
        formData.append('tabela', $('#tabela').attr('name'));
        $.ajax({
            url : 'inc/excluir.php',
            type : 'post',
            data : formData,
            cache: false,
            contentType: false,
            processData: false,
        })
        .done(function(resp) {
            var obj = JSON.parse(resp);
            if (obj.codigo == 1) {
                alert(obj.mensagem);
                location.reload(true);
            } else {
                alert(obj.mensagem);
            }
        })
        .fail(function(jqXHR, textStatus) {
            alert('Ops! Ocorreu um erro, tente novamente mais tarde');
        });
    }
};

function editar(id) {
    window.location.href = '?editar=' + id;
};

function visualizar(id) {
    window.location.href = '?visualizar=' + id;
};

function aprovar(id) {
    var formData = new FormData();
    formData.append('id', id);
    formData.append('status', 1);
    formData.append('tabela', $('#tabela').attr('name'));
    $.ajax({
        url : 'inc/editar.php',
        type : 'post',
        data : formData,
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(resp) {
        var obj = JSON.parse(resp);
        if (obj.codigo == 1) {
            alert('Aprovado com sucesso!');
        } else {
            alert(obj.mensagem);
        }
    })
    .fail(function(jqXHR, textStatus) {
        alert('Ops! Ocorreu um erro, tente novamente mais tarde');
    });
}

$(document).ready(function () {
    $('#menuLateral').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});