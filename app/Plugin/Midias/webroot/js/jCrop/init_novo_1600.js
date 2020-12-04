//$(function() {
//    var crop;
//    $('#MidiaModuloId').change(function() {
//        var tamanho = $(this).val().split('|');
//
//        $('#largura').val(tamanho[0]);
//        $('#altura').val(tamanho[1]);
//
//        var imagem = $('#cropbox').attr('src');
//        var tamanhoImagem = imagem.split('/');
//
//        var xwidth = (oldWidth * tamanho[1]) / oldHeight;
//        xwidth = Math.round(xwidth);
//        if (xwidth < tamanho[0]) {
//            xwidth = tamanho[0];
//        }
//
//        $('#oldw').val(xwidth);
//
//        if (typeof tamanhoImagem[tamanhoImagem.length - 2] != 'string') {
//            tamanhoImagem[tamanhoImagem.length - 2] = xwidth;
//            tamanhoImagem[tamanhoImagem.length - 1] = tamanho[1];
//        }
//        else {
//            tamanhoImagem[tamanhoImagem.length - 1] = xwidth;
//        }
//        var url = '';
//        for (var i = 0; i < tamanhoImagem.length; i++) {
//            url += tamanhoImagem[i];
//            if (i != tamanhoImagem.length - 1) {
//                url += '/';
//            }
//        }
//        $('#trabalho').html('');
//        $('#trabalho').prepend('<img id="cropbox" src="' + url + '"/>');
//        setTimeout(function() {
//            crop = $.Jcrop('#cropbox', {
//                bgColor: '#776600',
//                allowSelect: false,
//                allowResize: false,
//                bgOpacity: .3,
//                setSelect: [0, 0, 0, 0],
//                aspectRatio: 0,
//                onChange: updateCoords,
//                onSelect: updateCoords
//            });
//        }, 500);
//        setTimeout(function() {
//            crop.animateTo([0, 0, tamanho[0], tamanho[1]]);
//        }, 500);
//
//    });
//});
//
//function updateCoords(c) {
//    $('#x').val(c.x);
//    $('#y').val(c.y);
//    $('#w').val(c.w);
//    $('#h').val(c.h);
//    $('#x2').val(c.x2);
//    $('#y2').val(c.y2);
//}
//
//function checkCoords() {
//
//    if (parseInt($('#w').val()) < parseInt($('#largura').val())) {
//        alert('Foto menor que o tamanho de corte selecionado.');
//        return false;
//    }
//
//    if (parseInt($('#h').val()) < parseInt($('#altura').val())) {
//        alert('Foto menor que o tamanho de corte selecionado.');
//        return false;
//    }
//    if (parseInt($('#w').val()))
//        return true;
//    alert('Por favor selecione a região');
//    return false;
//}

$(document).ready(function() {

    $('#largura').val(1600);
    $('#altura').val(514);

    var minWidth = 1600;
    //var minHeight = 514;

    var imagem = $('#cropbox').attr('src');
    var tamanhoImagem = imagem.split('/');

    var xwidth = (oldWidth * 514) / oldHeight;
    xwidth = Math.round(xwidth);

    if (oldWidth > xwidth) {
        xwidth = oldWidth;
    }

    $('#oldw').val(xwidth);

    if (typeof tamanhoImagem[tamanhoImagem.length - 2] !== 'string') {
        tamanhoImagem[tamanhoImagem.length - 2] = xwidth;
        tamanhoImagem[tamanhoImagem.length - 1] = 514;
    }
    else {
        tamanhoImagem[tamanhoImagem.length - 1] = xwidth;
    }
    var url = '';
    for (var i = 0; i < tamanhoImagem.length; i++) {
        url += tamanhoImagem[i];
        if (i !== tamanhoImagem.length - 1) {
            url += '/';
        }
    }

    $('#trabalho').html('');
    $('#trabalho').prepend('<img id="cropbox" src="' + url + '"/>');

    $("#max").click(function() {
        var wx = $("#cropbox").width() + 350;
        //var hx = $("#cropbox").height() + 200;
        //$("#cropbox").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox").css({width: wx});
    });

    $("#min").click(function() {

        var wx = $("#cropbox").width() - 350;
        //var hx = $("#cropbox").height() - 200;

        if (wx < minWidth) {
            alert('Tamanho mínimo.');
            return false;
        }
        //if (hx < minHeight) {
        //alert('Tamanho mínimo');
        //return false;
        //}
        //$("#cropbox").animate({width: wx, height: hx}, 1000).css({width: wx, height: hx});
        $("#cropbox").css({width: wx});
        posicao($("#cropbox"), parseInt($("#cropbox").css('top')), parseInt($("#cropbox").css('left')), parseInt((514 - $("#cropbox").height())), parseInt((1600 - $("#cropbox").width())));


    });

    $("#cropbox").draggable({
        refreshPositions: true,
        cursor: 'move',
        stop: function(event, ui) {
            //acerta posição da imagem para não
            posicao($("#cropbox"), parseInt($("#cropbox").css('top')), parseInt($("#cropbox").css('left')), parseInt((514 - $("#cropbox").height())), parseInt((1600 - $("#cropbox").width())));
            //posição esquerda
            $('#x').val(Math.abs(parseInt($("#cropbox").css('left'))));
            //posição top
            $('#y').val(Math.abs(parseInt($("#cropbox").css('top'))));
            //tamanho original
            $('#oldw').val($("#cropbox").width());
        }
    });
});


function posicao(container, top, left, bottom, right)
{
    if (top > 0) {
        container.css({top: 0});
    }
    if (left > 0) {
        container.css({left: 0});
    }
    if (top < bottom) {
        container.css({top: bottom});
    }
    if (left < right) {
        container.css({left: right});
    }
}