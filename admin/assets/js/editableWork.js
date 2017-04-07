

$(document).ready(function(){

  $.fn.autoWidth = function(padding) {
      if (!$.fn.autoWidth.fakeEl) $.fn.autoWidth.fakeEl =      $('<span>').hide().appendTo(document.body);
      $.fn.autoWidth.fakeEl.text(this.val() || this.attr('placeholder')).css('font', this.css('font'));
      this.css('width', ($.fn.autoWidth.fakeEl.width() + padding));
  };

  $.fn.uniqueId = function() {
      var rand = Math.floor(Math.random() * 26) + Date.now();
      this.data('uniqueId', rand);
      console.log(rand)
      return this;
  };

  $('.editableWork').each(function(){
    $(this).append('<a class="editableWorkAdd linkAdd"><i class="fa fa-plus"></i> Add work</a>').find('.editableWorkAdd').click(function(){
      $(this).parent().find('h2:first').after($('.editableWorkTemplate').html()).parent().find('.editableWorkRow:first').uniqueId().hide().slideDown().append('<a class="editableWorkSupp linkSupp"><i class="fa fa-trash"></i></a>').find('.editableWorkSupp').click(function(){
        console.log($(this).parent().data('editable-work-action'));
        if($(this).parent().data('editable-work-action') == 'new'){
          $(this).parent().slideUp().remove();
        }else{
          $(this).parent().slideUp().data('editable-work-action', 'remove');
        }
      });
    })
  });


  $('.editableWorkRow').each(function(){
    $(this).uniqueId().append('<a class="editableWorkSupp linkSupp"><i class="fa fa-trash"></i></a>').find('.editableWorkSupp').click(function(){
      console.log($(this).parent().data('editable-work-action'));
      if($(this).parent().data('editable-work-action') == 'new'){
        $(this).parent().slideUp(function(){$(this).remove()});
      }else{
        $(this).parent().slideUp().data('editable-work-action', 'remove');
      }
    })
  });



  $('.editableWorkRow .editableWorkItem').each(function(){
    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editableWork_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput"  placeholder="'+$(this).text()+'">').find('input').on('input', function() {
            $(this).autoWidth(10);
        }).trigger('input');
        console.log($(this))
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editableWork_'+$(this).data('editable-name')+'" class="editableTextarea" placeholder="'+$(this).text()+'">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      default:
          break;
    }
  });
});
