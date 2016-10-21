$(document).ready(function(){
  $('.editable').each(function(){
    $('#editableHiddenForm').append('<input type="hidden" name="'+$(this).data('editable-name')+'"/>');
    switch($(this).data('editable-mode')) {
      case "input":
            $(this).html('<input type="text" name="editable_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput">');

      case "textarea":
        $(this).html('<textarea type="text" name="editable_'+$(this).data('editable-name')+'" class="editableTextarea">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      default:
          break;
    }
  });
  $('.editableBanner input[type=submit]').click(function(){
    $(this).val('Saving...');
    var data={};
    $('[name^=editable]').each(function(){
      var name = $(this).attr('name').replace("editable_", "")

      var namesplit = $(this).attr('name').replace("editable_", "").split(/_(.+)?/)

      $('#editableHiddenForm input[name='+name+']').val($(this).val());
      if(data[namesplit[0]]==undefined ){
          data[namesplit[0]]={}
      }
      data[namesplit[0]][namesplit[1]] = $(this).val();
      console.log(jQuery.makeArray(namesplit));
    });
    $.post('request/editable.php',data,function(data){
      switch (parseInt(data)) {
        case 1: //Good
          $('.editableBanner input[type=submit]').val('Save');
          swal({
            title: "Saved!",
            text: "Your page is saved",
            type: "success",
            timer: 3000,
            confirmButtonText: "OK",
            showConfirmButton: true
          });
          break;
        default:
          alert(data);
        break;
      }
    });
  });
  $('.editableBanner input[type=reset]').click(function(){
      location.reload();
  });
});
