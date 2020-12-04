(function($){
    var defaults = {
        checkBox        : 'input[type=checkbox]',
        checkAll        : '#checkAll',
        checkWithoutAll : 'input[type=checkbox]:not(#checkAll)',
        radioBox        : 'input[type=radio]',
        selecionados    : function() {
            var cont = 0;
            $(defaults.checkWithoutAll).each(function(){
                if(this.checked) {
                    cont++;
                }
            });
            return cont;
        },
        itemImagem: function(id) {
            var novoId = $(id).attr('rel');
            var novaMidia = $(id).val();
            return {
                id: novoId,
                midia: novaMidia
            };
        }
    };
    
    $.fn.activeCheckbox = function(options) {
        if (options) {
            $.extend(true, defaults, options);
        }
        var novoId = $(this).attr('rel');
        var lista =  [];
        var checked = $(this).is(':checked');
        var retorno = $('#lista' + parent.idList, window.parent.document).val();

        if(novoId != 'checkAll') {
            if(retorno) {
                lista = $.evalJSON(retorno);
                if(checked) {
                    lista.push(defaults.itemImagem(this));
                }
                else {
                    for(var i = 0; i < lista.length; i++) {
                        if(parseInt(lista[i].id) == parseInt(novoId)) {
                            lista.splice(i, 1);
                        }
                    }
                }
            }
            else {
                lista.push(defaults.itemImagem(this));
            }
        }
        else {
            if(checked) {
                $(defaults.checkBox).each(function(){
                    lista.push(defaults.itemImagem(this));
                });
            }
            else {
                lista = [];
            }
        }
        $('#lista' + parent.idList, window.parent.document).val($.toJSON(lista));
    }

    //Selecionar todos os checkbox
    $.fn.checkAll = function(options) {
        if (options) {
            $.extend(true, defaults, options);
        }
        if('#'+$(this).attr('id') == defaults.checkAll) {
            $(defaults.checkBox).attr({
                checked: $(this).attr('checked')
            });
        }
        else {
            var cont = defaults.selecionados();
            var quant = $(defaults.checkWithoutAll).length;
            $(defaults.checkAll).attr({
                checked: (cont == quant)
            });
        }
    };

//    $.fn.functionCheckAll = function() {
//        var cont = defaults.selecionados();
//        var quant = $(defaults.checkWithoutAll).length;
//        $(defaults.checkAll).attr({
//            checked: (cont == quant)
//        });
//    }
    
    $.fn.activeRadio = function(options) {
        var lista =  [defaults.itemImagem(this)];
        $('#lista' + parent.idList, window.parent.document).val($.toJSON(lista));
    }
})(jQuery);

$(document).ready(function(){
    $('#checkAll').ready(function() {
        $(this).checkAll();
    });

    $('input[type=checkbox]').change(function(){
        $(this).checkAll();
        $(this).activeCheckbox();
    });

    $('input[type=radio]').click(function(){
        $(this).activeRadio();
    });
    
});