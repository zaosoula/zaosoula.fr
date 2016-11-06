

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

  $('.editableEducation').each(function(){
    $(this).append('<a class="editableEducationAdd linkAdd"><i class="fa fa-plus"></i> Add education</a>').find('.editableEducationAdd').click(function(){
      $(this).parent().find('h2:first').after($('.editableEducationTemplate').html()).parent().find('.editableEducationRow:first').uniqueId().hide().slideDown().append('<a class="editableEducationSupp linkSupp"><i class="fa fa-trash"></i></a>').find('.editableEducationSupp').click(function(){
        console.log($(this).parent().data('editable-education-action'));
        if($(this).parent().data('editable-education-action') == 'new'){
          $(this).parent().slideUp().remove();
        }else{
          $(this).parent().slideUp().data('editable-education-action', 'remove');
        }
      });
    })
  });


  $('.editableEducationRow').each(function(){
    $(this).uniqueId().append('<a class="editableEducationSupp linkSupp"><i class="fa fa-trash"></i></a>').find('.editableEducationSupp').click(function(){
      console.log($(this).parent().data('editable-education-action'));
      if($(this).parent().data('editable-education-action') == 'new'){
        $(this).parent().slideUp(function(){$('this').remove()});
      }else{
        $(this).parent().slideUp().data('editable-education-action', 'remove');
      }
    })
  });



  $('.editableEducationRow .editableEducationItem').each(function(){
    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editableEduaction_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput"  placeholder="'+$(this).text()+'">').find('input').on('input', function() {
            $(this).autoWidth(10);
        }).trigger('input');
        console.log($(this))
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editableEduaction_'+$(this).data('editable-name')+'" class="editableTextarea" placeholder="'+$(this).text()+'">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      default:
          break;
    }
  });
});
