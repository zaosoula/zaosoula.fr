$(document).ready(function(){
  $('input[name=password],input[name=username]').focus(function(){
    $(this).attr('style','');
  });
  $('#loginform').submit(function(e){
    e.preventDefault();
    valid=true;
    $('input').attr('style','');

    if($('input[name=username]').val()==""){
        $('input[name=username]').css('border-color', '#c85c55').css('box-shadown','0 0 0 1px #c85c55');
        valid = false;

    }

    if($('input[name=password]').val()==""){
        $('input[name=password]').css('border-color', '#c85c55').css('box-shadown','0 0 0 1px #c85c55');
        valid = false;

    }

    if(valid==true){
      $.post('request/login.php',{username:$('input[name=username]').val(),password:$('input[name=password]').val()},function(data){
        switch (parseInt(data)) {
          case 1: //Good
            $(location).attr("href", 'dashboard');
            break;
          default:
            swal({
              title: "Êtes-vous sûr ?",
              text: "Désolés ce ne sont pas les bons identifiants",
              type: "warning",
              showConfirmButton: false,
              timer: 2000,
            });
            $('input[name=password],input[name=username]').val("");
            $('input[name=username]').focus();
          break;
        }
      });
    }
  });
});
