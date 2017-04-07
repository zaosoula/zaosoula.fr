

$(document).ready(function(){

  $.fn.uniqueId = function() {
      var rand = Math.floor(Math.random() * 26) + Date.now();
      this.data('uniqueId', rand);
      console.log(rand)
      return this;
  };

  $.fn.makeEditabelSkill = function(){
    this.find('.editableSkillItem').each(function() {

    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editableSkill_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput"  placeholder="'+$(this).text()+'">').find('input').on('input', function() {
            $(this).autoWidth(10);
        }).trigger('input');
        console.log($(this))
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editableSkill_'+$(this).data('editable-name')+'" class="editableTextarea" placeholder="'+$(this).text()+'">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      case "stars":
        $(this).raty({
          score: function() {
            return $(this).attr('data-score');
          },
          scoreName: 'editableSkill_'+$(this).data('editable-name'),
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

  $('.editableSkill').each(function(){
    $(this).append('<a class="editableSkillAdd linkAdd"><i class="fa fa-plus"></i> Add skill</a>').find('.editableSkillAdd').click(function(){
      console.log($(this).parent().find('.row .editableSkillRow').length, $(this).parent().find('.row .div:first'));

      if($(this).parent().find('.row .editableSkillRow').length%2 == 0){
        pos = 'first';
      }else{
        pos = 'last';
      }

      $(this).parent().find('.row div:'+pos+' ul').append($('.editableSkillTemplate').html()).parent().find('.editableSkillRow:last').uniqueId().makeEditabelSkill().hide().slideDown().find('.ability-score').append(' <a class="editableSkillSupp"><i class="fa fa-trash"></i></a>').find('.editableSkillSupp').click(function(){
        console.log($(this).parent().parent().data('editable-skill-action'));
        if($(this).parent().parent().data('editable-skill-action') == 'new'){
          $(this).parent().parent().slideUp(function(){$(this).remove()});
        }else{
          $(this).parent().parent().slideUp().data('editable-skill-action', 'remove');
        }
        });

    })
  });


  $('.editableSkill .editableSkillRow').each(function(){
    $(this).uniqueId().find('.ability-score').append(' <a class="editableSkillSupp"><i class="fa fa-trash"></i></a>').find('.editableSkillSupp').click(function(){
      console.log($(this).parent().parent().data('editable-skill-action'));
      if($(this).parent().parent().data('editable-skill-action') == 'new'){
        $(this).parent().parent().slideUp(function(){$(this).remove()});
      }else{
        $(this).parent().parent().slideUp().data('editable-skill-action', 'remove');
      }
    });
  });



  $('.editableSkill .editableSkillRow').makeEditabelSkill();

});
