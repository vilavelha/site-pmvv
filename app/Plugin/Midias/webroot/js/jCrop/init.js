$(function(){
    var crop;
    $('#MidiaModuloId').change(function(){
        var tamanho = $(this).val().split('|');
        
        $('#largura').val(tamanho[0]);
        $('#altura').val(tamanho[1]);
        
        var imagem = $('#cropbox').attr('src');
        var tamanhoImagem = imagem.split('/');
        
        var xwidth = (oldWidth * tamanho[1]) / oldHeight;
        xwidth = Math.round(xwidth);
        if(xwidth < tamanho[0]){
            xwidth = tamanho[0];
        }
        
        $('#oldw').val(xwidth);
        
        if(typeof tamanhoImagem[tamanhoImagem.length - 2] != 'string') {
            tamanhoImagem[tamanhoImagem.length - 2] = xwidth;
            tamanhoImagem[tamanhoImagem.length - 1] = tamanho[1];
        }
        else {
            tamanhoImagem[tamanhoImagem.length - 1] = xwidth;
        }
        var url = '';
        for(var i = 0; i < tamanhoImagem.length; i++) {
            url += tamanhoImagem[i];
            if(i != tamanhoImagem.length -1) {
                url +=  '/';
            }
        }        
        $('#trabalho').html('');
        $('#trabalho').prepend('<img id="cropbox" src="'+ url +'"/>');
        setTimeout(function() {
            crop = $.Jcrop('#cropbox', {
                bgColor: '#776600',
                allowSelect: false,
                allowResize: false,
                bgOpacity: .3,
                setSelect: [ 0, 0, 0, 0],
                aspectRatio: 0,
                onChange: updateCoords,
                onSelect: updateCoords
            });                       
        }, 500);
        setTimeout(function() {
            crop.animateTo([0, 0, tamanho[0], tamanho[1]]);
        }, 500);           
        
    });
});

function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
    $('#x2').val(c.x2);
    $('#y2').val(c.y2);
}

function checkCoords() {
    
    if(parseInt($('#w').val()) < parseInt($('#largura').val())){
        alert('Foto menor que o tamanho de corte selecionado.');
        return false;
    }
    
    if(parseInt($('#h').val()) < parseInt($('#altura').val())){
        alert('Foto menor que o tamanho de corte selecionado.');
        return false;
    }
    if (parseInt($('#w').val())) return true;
    alert('Por favor selecione a região');
    return false;
}