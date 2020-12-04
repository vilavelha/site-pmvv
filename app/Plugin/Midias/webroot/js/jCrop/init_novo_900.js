$(document).ready(function() {

    $('#largura4').val(900);
    $('#altura4').val(500);

    var minWidth = 900;
    //var minHeight = 500;

    var imagem = $('#cropbox4').attr('src');
    var tamanhoImagem = imagem.split('/');

    var xwidth4 = (oldWidth * 500) / oldHeight;
    xwidth4 = Math.round(xwidth4+1);
    console.log(xwidth4);
    
    if (xwidth4 < 900 ) {
        xwidth4 = 900;
    }

    $('#oldw4').val(xwidth4);

    if (typeof tamanhoImagem[tamanhoImagem.length - 2] !== 'string') {
        tamanhoImagem[tamanhoImagem.length - 2] = xwidth4;
        tamanhoImagem[tamanhoImagem.length - 1] = 500;
    }
    else {
        tamanhoImagem[tamanhoImagem.length - 1] = xwidth4;
    }
    var url = '';
    for (var i = 0; i < tamanhoImagem.length; i++) {
        url += tamanhoImagem[i];
        if (i !== tamanhoImagem.length - 1) {
            url += '/';
        }
    }

    $('#trabalho4').html('');
    $('#trabalho4').prepend('<img id="cropbox4" src="' + url + '"/>');

    $("#max4").click(function() {
        var wx = $("#cropbox4").width() + 125;
        //var hx = $("#cropbox4").height() + 200;
        //$("#cropbox4").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox4").css({width: wx});
    });

    $("#min4").click(function() {

        var wx = $("#cropbox4").width() - 125;
        //var hx = $("#cropbox4").height() - 200;

        if (wx < minWidth) {
            alert('Tamanho mínimo.');
            return false;
        }
        //if (hx < minHeight) {
        //alert('Tamanho mínimo');
        //return false;
        //}
        //$("#cropbox4").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox4").css({width: wx});
        posicao($("#cropbox4"), parseInt($("#cropbox4").css('top')), parseInt($("#cropbox4").css('left')), parseInt((500 - $("#cropbox4").height())), parseInt((900 - $("#cropbox4").width())));

    });

    $("#cropbox4").draggable({
        refreshPositions: true,
        cursor: 'move',
        stop: function(event, ui) {
            //acerta posição da imagem para não
            posicao($("#cropbox4"), parseInt($("#cropbox4").css('top')), parseInt($("#cropbox4").css('left')), parseInt((500 - $("#cropbox4").height())), parseInt((900 - $("#cropbox4").width())));
            //posição esquerda
            $('#x4').val(Math.abs(parseInt($("#cropbox4").css('left'))));
            //posição top
            $('#y4').val(Math.abs(parseInt($("#cropbox4").css('top'))));
            //tamanho original
            $('#oldw4').val($("#cropbox4").width());
        }
    });
});