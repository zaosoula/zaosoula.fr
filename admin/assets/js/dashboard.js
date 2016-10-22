$(document).ready(function(){
  $('.disabled').each(function(){
    $(this).append('<div class="overlay"></div>');
  });

  $('.editable').each(function(){

    $('#editableHiddenForm').append('<input type="hidden" name="'+$(this).data('editable-name')+'"/>');
    switch($(this).data('editable-mode')) {
      case "input":
        $(this).html('<input type="text" name="editable_'+$(this).data('editable-name')+'" value="'+$(this).text()+'" class="editableInput">');
        break;
      case "textarea":
        $(this).html('<textarea type="text" name="editable_'+$(this).data('editable-name')+'" class="editableTextarea">'+$(this).html().replace(/<br(\/)?>/g, "\r\n")+'</textarea>').find('textarea').autosize();
        break;
      default:
          break;
    }
  });


  $('.socialEditable').each(function(){
    $(this).append('<li><a href="#" class="icon fa-plus alt socialEditable-plus"><span class="label">plus</span></a></li>')
  });
  $('.socialEditable-plus').click(function(){
    swal({
      title: "Add social",
      text: "Type your social url",
      type: "input",
      confirmButtonText: "Next",
      cancelButtonText: "Cancel",
      showCancelButton: true,
      closeOnConfirm: false,
      inputPlaceholder: "https://twitter.com/zarque7"
    }, function(inputValue){
      if (inputValue == false) {
        return false
      }
      if (inputValue === "") {
        swal.showInputError("You need to write something!");
        return false
    }

      if(inputValue.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@\.-]*)*\/?$/)){

        $.post('request/fontawesome-brand.php',function(data){
         url = inputValue;
           urlInfo = url.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@\.-]*)*\/?$/);
           domain = urlInfo[2].replace(/^www\./, "") +'.'+ urlInfo[3];
          data = JSON.parse(data);
          icon = data[domain];
          if(icon != undefined){
            swal({
              title: "Add social",
              text: '<p>Check if is the good icon</p><br><i class="icon fa-'+icon.name+' alt"></i>',
              confirmButtonText: "Yes",
              cancelButtonText: "No",
              html: true,
              showCancelButton: true,
              closeOnConfirm: false,
              closeOnCancel: false,
            },function(isConfirm){
              console.log(icon)
              console.log(url)
              if (isConfirm) {
                Autolinker.link( url, {
                  replaceFn : function( match ) {
                      switch( match.getType() ) {
                          case 'url' :
                            swal("Voila!", "Your imaginary file has been deleted.", "success");
                            $('<li><a href="'+match.getUrl()+'" target="_blank" class="icon fa-'+icon.name+' alt" data-icon="'+icon.name+'" data-action="created"><span class="label">'+icon.name+'</span></a></li>').insertBefore($('.socialEditable-plus').parent());
                            $('.socialEditable .icon:not(.socialEditable-plus)').off("click").on("click", socialEditable_delete);
                            return false;  // let Autolinker perform its normal anchor tag replacement
                      }
                  }
              } );


              } else {
                $('.socialEditable-plus').click();
              }
            });
          }else{
            swal.showInputError("Sorry we don't found icon for this link try other");
            return false
          }
        });
      }else{
        swal.showInputError("You need to write an url!");
      }

    });
  });

  $('.socialEditable .icon:not(.socialEditable-plus)').on("click", socialEditable_delete);

  function socialEditable_delete(e){
    e.preventDefault();
    link = $(this)
      swal({
        title: "Delete ?",
        text: '<p>You want to delete this icon</p>',
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        html: true,
        showCancelButton: true,
        closeOnConfirm: true,
        closeOnCancel: true,
      },function(isConfirm){
        if (isConfirm) {
          if(link.data('id')!=undefined){
            link.data('action','removed');
            link.parent().hide();
          }else{
            link.parent().remove();
          }
        }
      });
  }

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
    });

    data['basics']['profiles']=[]
    $('.socialEditable').first().find('.icon:not(.socialEditable-plus)').each(function(){
      data['basics']['profiles'].push({
        id: $(this).data('id'),
        icon: $(this).data('icon'),
        action: $(this).data('action'),
        url: $(this).attr('href'),
      });
    });

    console.log(data);

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
          $('.icon:not(.socialEditable-plus)').each(function(){
            $(this).data('action','');
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
