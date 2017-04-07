

$(document).ready(function(){

  $.fn.uniqueId = function() {
      var rand = Math.floor(Math.random() * 26) + Date.now();
      this.data('uniqueId', rand);
      console.log(rand)
      return this;
  };

  $.fn.makeEditabelTools = function(){
    this.find('.editableToolsItem').each(function() {

    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editableTools_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput"  placeholder="'+$(this).text()+'">').find('input').on('input', function() {
            $(this).autoWidth(10);
        }).trigger('input');
        console.log($(this))
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editableTools_'+$(this).data('editable-name')+'" class="editableTextarea" placeholder="'+$(this).text()+'">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      case "stars":
        $(this).raty({
          score: function() {
            return $(this).attr('data-score');
          },
          scoreName: 'editableTools_'+$(this).data('editable-name'),
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

  $('.editableTools').each(function(){
    $(this).append('<a class="editableToolsAdd linkAdd"><i class="fa fa-plus"></i> Add tools</a>').find('.editableToolsAdd').click(function(){
      console.log($(this).parent().find('.row .editableToolsRow').length, $(this).parent().find('.row .div:first'));

      if($(this).parent().find('.row .editableToolsRow').length%2 == 0){
        pos = 'first';
      }else{
        pos = 'last';
      }

      $(this).parent().find('.row div:'+pos+' ul').append($('.editableToolsTemplate').html()).parent().find('.editableToolsRow:last').uniqueId().makeEditabelTools().hide().slideDown().find('.ability-score').append(' <a class="editableToolsSupp"><i class="fa fa-trash"></i></a>').find('.editableToolsSupp').click(function(){
        console.log($(this).parent().parent().data('editable-tools-action'));
        if($(this).parent().parent().data('editable-tools-action') == 'new'){
          $(this).parent().parent().slideUp(function(){$(this).remove()});
        }else{
          $(this).parent().parent().slideUp().data('editable-tools-action', 'remove');
        }
        });

    })
  });


  $('.editableTools .editableToolsRow').each(function(){
    $(this).uniqueId().find('.ability-score').append(' <a class="editableToolsSupp"><i class="fa fa-trash"></i></a>').find('.editableToolsSupp').click(function(){
      console.log($(this).parent().parent().data('editable-tools-action'));
      if($(this).parent().parent().data('editable-tools-action') == 'new'){
        $(this).parent().parent().slideUp(function(){$(this).remove()});
      }else{
        $(this).parent().parent().slideUp().data('editable-tools-action', 'remove');
      }
    });
  });



  $('.editableTools .editableToolsRow').makeEditabelTools();

});
