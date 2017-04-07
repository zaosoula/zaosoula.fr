

$(document).ready(function(){

  $.fn.uniqueId = function() {
      var rand = Math.floor(Math.random() * 26) + Date.now();
      this.data('uniqueId', rand);
      console.log(rand)
      return this;
  };

  $.fn.makeEditabelLang = function(){
    this.find('.editableLangItem').each(function() {

    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editableLang_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput"  placeholder="'+$(this).text()+'">').find('input').on('input', function() {
            $(this).autoWidth(10);
        }).trigger('input');
        console.log($(this))
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editableLang_'+$(this).data('editable-name')+'" class="editableTextarea" placeholder="'+$(this).text()+'">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      case "stars":
        $(this).raty({
          score: function() {
            return $(this).attr('data-score');
          },
          scoreName: 'editableLang_'+$(this).data('editable-name'),
          starOff : 'fa fa-star-o',
          starOn  : 'fa fa-star',
          hints: ['HINT1', 'HINT2', 'HINT3', 'HINT4', 'HINT5'],
          space: false,
        });
      default:
          break;
    }
  });
    return this;

  }

  $('.editableLang').each(function(){
    $(this).append('<a class="editableLangAdd linkAdd"><i class="fa fa-plus"></i> Add lang</a>').find('.editableLangAdd').click(function(){
      console.log($(this).parent().find('.row .editableLangRow').length, $(this).parent().find('.row .div:first'));

      if($(this).parent().find('.row .editableLangRow').length%2 == 0){
        pos = 'first';
      }else{
        pos = 'last';
      }

      $(this).parent().find('.row div:'+pos+' ul').append($('.editableLangTemplate').html()).parent().find('.editableLangRow:last').uniqueId().makeEditabelLang().hide().slideDown().find('.ability-score').append(' <a class="editableLangSupp"><i class="fa fa-trash"></i></a>').find('.editableLangSupp').click(function(){
        console.log($(this).parent().parent().data('editable-lang-action'));
        if($(this).parent().parent().data('editable-lang-action') == 'new'){
          $(this).parent().parent().slideUp(function(){$(this).remove()});
        }else{
          $(this).parent().parent().slideUp().data('editable-lang-action', 'remove');
        }
        });

    })
  });


  $('.editableLang .editableLangRow').each(function(){
    $(this).uniqueId().find('.ability-score').append(' <a class="editableLangSupp"><i class="fa fa-trash"></i></a>').find('.editableLangSupp').click(function(){
      console.log($(this).parent().parent().data('editable-lang-action'));
      if($(this).parent().parent().data('editable-lang-action') == 'new'){
        $(this).parent().parent().slideUp(function(){$(this).remove()});
      }else{
        $(this).parent().parent().slideUp().data('editable-lang-action', 'remove');
      }
    });
  });



  $('.editableLang .editableLangRow').makeEditabelLang();

});
