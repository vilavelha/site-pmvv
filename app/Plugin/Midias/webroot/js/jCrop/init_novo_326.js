$(document).ready(function() {

    $('#largura2').val(326);
    $('#altura2').val(290);

    var minWidth = 326;
    //var minHeight = 290;

    var imagem = $('#cropbox2').attr('src');
    var tamanhoImagem = imagem.split('/');

    var xwidth2 = (oldWidth * 290) / oldHeight;
    xwidth2 = Math.round(xwidth2+1);
    
//    if (oldWidth > xwidth2) {
//        xwidth2 = oldWidth;
//    }

    $('#oldw2').val(xwidth2);

    if (typeof tamanhoImagem[tamanhoImagem.length - 2] !== 'string') {
        tamanhoImagem[tamanhoImagem.length - 2] = xwidth2;
        tamanhoImagem[tamanhoImagem.length - 1] = 290;
    }
    else {
        tamanhoImagem[tamanhoImagem.length - 1] = xwidth2;
    }
    var url = '';
    for (var i = 0; i < tamanhoImagem.length; i++) {
        url += tamanhoImagem[i];
        if (i !== tamanhoImagem.length - 1) {
            url += '/';
        }
    }

    $('#trabalho2').html('');
    $('#trabalho2').prepend('<img id="cropbox2" src="' + url + '"/>');

    $("#max2").click(function() {
        var wx = $("#cropbox2").width() + 125;
        //var hx = $("#cropbox2").height() + 200;
        //$("#cropbox2").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox2").css({width: wx});
    });

    $("#min2").click(function() {

        var wx = $("#cropbox2").width() - 125;
        //var hx = $("#cropbox2").height() - 200;

        if (wx < minWidth) {
            alert('Tamanho mínimo.');
            return false;
        }
        //if (hx < minHeight) {
        //alert('Tamanho mínimo');
        //return false;
        //}
        //$("#cropbox2").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox2").css({width: wx});
        posicao($("#cropbox2"), parseInt($("#cropbox2").css('top')), parseInt($("#cropbox2").css('left')), parseInt((290 - $("#cropbox2").height())), parseInt((326 - $("#cropbox2").width())));

    });

    $("#cropbox2").draggable({
        refreshPositions: true,
        cursor: 'move',
        stop: function(event, ui) {
            //acerta posição da imagem para não
            posicao($("#cropbox2"), parseInt($("#cropbox2").css('top')), parseInt($("#cropbox2").css('left')), parseInt((290 - $("#cropbox2").height())), parseInt((326 - $("#cropbox2").width())));
            //posição esquerda
            $('#x2').val(Math.abs(parseInt($("#cropbox2").css('left'))));
            //posição top
            $('#y2').val(Math.abs(parseInt($("#cropbox2").css('top'))));
            //tamanho original
            $('#oldw2').val($("#cropbox2").width());
        }
    });
});