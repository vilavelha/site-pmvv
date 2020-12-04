$(document).ready(function() {

    $('#largura3').val(146);
    $('#altura3').val(160);

    var minWidth = 146;
    //var minHeight = 160;

    var imagem = $('#cropbox3').attr('src');
    var tamanhoImagem = imagem.split('/');

    var xwidth3 = (oldWidth * 160) / oldHeight;
    xwidth3 = Math.round(xwidth3+1);

//    if (oldWidth > xwidth3) {
//        xwidth3 = oldWidth;
//    }

    $('#oldw3').val(xwidth3);

    if (typeof tamanhoImagem[tamanhoImagem.length - 2] !== 'string') {
        tamanhoImagem[tamanhoImagem.length - 2] = xwidth3;
        tamanhoImagem[tamanhoImagem.length - 1] = 160;
    }
    else {
        tamanhoImagem[tamanhoImagem.length - 1] = xwidth3;
    }
    var url = '';
    for (var i = 0; i < tamanhoImagem.length; i++) {
        url += tamanhoImagem[i];
        if (i !== tamanhoImagem.length - 1) {
            url += '/';
        }
    }

    $('#trabalho3').html('');
    $('#trabalho3').prepend('<img id="cropbox3" src="' + url + '"/>');

    $("#max3").click(function() {
        var wx = $("#cropbox3").width() + 50;
        //var hx = $("#cropbox3").height() + 200;
        //$("#cropbox3").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox3").css({width: wx});
    });

    $("#min3").click(function() {

        var wx = $("#cropbox3").width() - 50;
        //var hx = $("#cropbox3").height() - 200;

        if (wx < minWidth) {
            alert('Tamanho mínimo.');
            return false;
        }
        //if (hx < minHeight) {
        //alert('Tamanho mínimo');
        //return false;
        //}
        //$("#cropbox3").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox3").css({width: wx});
        posicao($("#cropbox3"), parseInt($("#cropbox3").css('top')), parseInt($("#cropbox3").css('left')), parseInt((160 - $("#cropbox3").height())), parseInt((146 - $("#cropbox3").width())));

    });

    $("#cropbox3").draggable({
        refreshPositions: true,
        cursor: 'move',
        stop: function(event, ui) {
            //acerta posição da imagem para não
            posicao($("#cropbox3"), parseInt($("#cropbox3").css('top')), parseInt($("#cropbox3").css('left')), parseInt((160 - $("#cropbox3").height())), parseInt((146 - $("#cropbox3").width())));
            //posição esquerda
            $('#x3').val(Math.abs(parseInt($("#cropbox3").css('left'))));
            //posição top
            $('#y3').val(Math.abs(parseInt($("#cropbox3").css('top'))));
            //tamanho original
            $('#oldw3').val($("#cropbox3").width());
        }
    });
});