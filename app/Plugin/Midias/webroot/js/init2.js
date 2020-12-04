var idList = null;

var defaults = {
    idLista : 'lista',
    classDiv : 'itemImagem',
    midiasLink : 'midiasLink'
}

var Html = {
    input: function(id, numero, midia) {
        return '<option id="option' + id + numero + '" selected="selected" value="' + numero + '">' + midia + '</option>';
    },
    img : function(id, numero, midia) {
        return '<img id="imagem' + id + numero + '" src="'+ webroot + 'midia/'+ midia +'" width="150"/>';
    },
    a : function(id, numero) {
        return '<a id="link' + id + numero + '" href="javascript:Html.excluirItem(\''  + id +'\', ' + numero + ')">Excluir</a>';
    },
    div : function(id, numero, midia) {
        return '<div class="'+ defaults.classDiv +'" id="'+ id + numero +'">' + Html.img(id, numero, midia) + Html.a(id, numero) + '</div>';
    },
    excluirItem : function (id, numero) {
        var retorno = $('#' + defaults.idLista + id, window.parent.document).val();
        if(retorno) {
            var lista = $.evalJSON(retorno);
            for(var i = 0; i < lista.length; i++) {
                if(parseInt(lista[i].id) == numero) {
                    lista.splice(i, 1);
                    break;
                }
            }
            $('#' + defaults.idLista + id, window.parent.document).val($.toJSON(lista));
        }
        $('#' + id + numero).remove();
        $('#option' + id + numero).remove();
    }
};

$(document).ready(function(){
    //    $('.midiasLista').each(function(){
    //        if($(this).size() == 0) {
    //            $(this).after('<input name="lista" type="hidden"/>');
    //            $(this).after('<div class="imagens"></div>');
    //        }
    //    });      
        
    $('.midiasLink').each(function(){
        var lista = [];
        var id = $(this).attr('id');
        $('#input' + id + ' option:selected').each(function(){
            var itemId = $(this).val();
            var midia = $(this).html();
            $('#div' + id).append(Html.div(id, itemId, midia));
            lista.push({
                id: itemId,
                midia: midia
            });
        });
        $('#' + defaults.idLista + id).val($.toJSON(lista));
    });
        
    $('.' + defaults.midiasLink).click(function(event){
        event.preventDefault();
        var tipo = $(this).attr('rel');
        var id = $(this).attr('id');
        $.window({
            title: 'Selecione suas mídias',
            url: webroot+ 'admin/midias/midias/galeria/iframe:1/tipo:multiplo',
            width: 900,
            height: 500,
            onOpen : function() {
                idList = id;
            },
            onClose : function(){
                $('#input'  + id + ' option').remove();
                $('#div' + id + ' .' + defaults.classDiv).remove();
                var retorno = $('#' + defaults.idLista + id).val();
                if(retorno) {
                    var lista = $.evalJSON(retorno);
                    for(var i = 0; i < lista.length; i++) {
                        if(lista[i].id != 'checkAll') {
                            $('#input'  + id).append(Html.input(id, lista[i].id, lista[i].midia));
                            $('#div' + id).append(Html.div(id, lista[i].id, lista[i].midia));
                        }
                    }
                }
            }
        });
    });    
   
});