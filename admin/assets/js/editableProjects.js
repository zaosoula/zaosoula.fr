$(document).ready(function() {

    $.fn.autoWidth = function(padding) {
        if (!$.fn.autoWidth.fakeEl) $.fn.autoWidth.fakeEl = $('<span>').hide().appendTo(document.body);
        $.fn.autoWidth.fakeEl.text(this.val() || this.attr('placeholder')).css('font', this.css('font'));
        this.css('width', ($.fn.autoWidth.fakeEl.width() + padding));
    };

    $.fn.uniqueId = function() {
        var rand = Math.floor(Math.random() * 26) + Date.now();
        this.data('uniqueId', rand);
        console.log(rand)
        return this;
    };

    $.fn.editableProjectsItem = function(){
      console.log(this);
    this.find('.editableProjectsItem').each(function() {
      console.log($(this).data('editable-name') );
        switch ($(this).data('editable-mode')) {
            case "input":
                $(this).html('<input type="text" name="editableProjects_' + $(this).data('editable-name') + '" value="' + $(this).text() + '" class="editableInput"  placeholder="' + $(this).text() + '">').find('input').on('input', function() {
                    $(this).autoWidth(10);
                }).trigger('input');
                break;
            default:
                break;
        }
    });
    return this;
  }
    $('.editableProjects').each(function() {
        var editableProjects = $(this);
        editableProjects.append('<div class="project 4u 12u$(medium) not"><div class="content active" style="background-image: -moz-linear-gradient(45deg, #e3ae76 15%, #c85c55 85%);background-image: -webkit-linear-gradient(45deg, #e3ae76 15%, #c85c55 85%);background-image: -ms-linear-gradient(45deg, #e3ae76 15%, #c85c55 85%);background-image: linear-gradient(45deg, #e3ae76 15%, #c85c55 85%);"><a class="editableProjectsAdd"><div class="overlay"><h3>Ajouté un projet</h3><p>à votre portfolio</p></div></a></div></div>').find('.editableProjectsAdd').click(function() {
            var editableProjectsAdd = $(this);
            swal({
                title: "Add project",
                text: "Type your project's url",
                type: "input",
                confirmButtonText: "Next",
                cancelButtonText: "Cancel",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "https://exemple.com"
            }, function(inputValue) {
                if (inputValue == false) {
                    return false
                }
                if (inputValue === "") {
                    swal.showInputError("You need to write something!");
                    return false
                }

                if (inputValue.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@\.-]*)*\/?$/)) {

                    Autolinker.link(inputValue, {
                        replaceFn: function(match) {
                            switch (match.getType()) {
                                case 'url':
                                    var projectUrl = inputValue

                                    swal({
                                        title: "Add project",
                                        text: "<p>Type your image's url</p><br/><p><i>If you want to upload your image click <a href='http://imgur.com/upload' target='_blank'here</a></i></p>",
                                        type: "input",
                                        html: true,
                                        confirmButtonText: "Next",
                                        cancelButtonText: "Cancel",
                                        showCancelButton: true,
                                        closeOnConfirm: false,
                                        inputPlaceholder: "http://imgur.com/a/38Dw9",
                                        showLoaderOnConfirm: true,
                                    }, function(inputValue) {
                                        if (inputValue == false) {
                                            return false
                                        }
                                        if (inputValue === "") {
                                            swal.showInputError("You need to write something!");
                                            return false
                                        }

                                        if (inputValue.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@,\.-]*)*\/?$/)) {

                                            Autolinker.link(inputValue, {
                                                replaceFn: function(match) {
                                                    switch (match.getType()) {
                                                        case 'url':
                                                            var imageUrl = inputValue
                                                            $.ajax({
                                                                url: imageUrl,
                                                                type: "HEAD",
                                                                error: function() {
                                                                    swal.showInputError("This url not return an image!");
                                                                },
                                                                success: function() {
                                                                    var rand = Math.floor(Math.random() * 26) + Date.now();
                                                                    project = $('<div class="project 4u 12u$(medium)" data-uniqueId="' + rand + '" data-editable-project-action="new"><div class="content" style=\'background-image: url("' + imageUrl + '");\'><a data-href="' + projectUrl + '" data-picture="' + imageUrl + '"" target="_blank"><div class="overlay"><h3 class="editableProjectsItem" data-editable-mode="input" data-editable-name="name">Project\'s  name</h3><p class="editableProjectsItem" data-editable-mode="input" data-editable-name="summary">Project\'s  summary</p></div></a></div></div>')
                                                                    console.log(rand);
                                                                    editableProjectsAdd.parent().parent().before(project).parent().find('[data-uniqueId=' + rand + ']').hide().editableProjectsItem().slideDown().find('.overlay').append('<p><a class="editableProjectsSupp"><i class="fa fa-trash"></i></a></p>').find('.editableProjectsSupp').click(function(){

                                                                                  project = $(this).parent().parent().parent().parent().parent()
                                                                                    console.log(project.data('editable-project-action'));
                                                                                  swal({
                                                                                      title: "Delete ?",
                                                                                      text: '<p>You want to delete this project</p>',
                                                                                      confirmButtonText: "Yes",
                                                                                      cancelButtonText: "No",
                                                                                      html: true,
                                                                                      showCancelButton: true,
                                                                                      closeOnConfirm: true,
                                                                                      closeOnCancel: true,
                                                                                  }, function(isConfirm) {
                                                                                      if (isConfirm) {
                                                                                          console.log(project.data('editable-project-action'));
                                                                                          if (project.data('editable-project-action') == 'new') {
                                                                                              project.slideUp(function() {
                                                                                                  project.remove()
                                                                                              });
                                                                                          } else {
                                                                                              project.slideUp().data('editable-project-action', 'remove');
                                                                                          }
                                                                                      }
                                                                                  });
                                                                    });
                                                                    swal.close();
                                                                }
                                                            });


                                                            return false; // let Autolinker perform its normal anchor tag replacement
                                                    }
                                                }
                                            });

                                        } else {
                                            swal.showInputError("You need to write an url!");
                                        }

                                    });

                                    return false; // let Autolinker perform its normal anchor tag replacement
                            }
                        }
                    });

                } else {
                    swal.showInputError("You need to write an url!");
                }

            });


        })
    });


    $('.editableProjects .content:not(.active)').each(function() {
        $(this).parent().uniqueId().find('.overlay').append('<p><a class="editableProjectsSupp"><i class="fa fa-trash"></i></a></p>').find('.editableProjectsSupp').click(function() {

            project = $(this).parent().parent().parent().parent().parent()
            swal({
                title: "Delete ?",
                text: '<p>You want to delete this project</p>',
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                html: true,
                showCancelButton: true,
                closeOnConfirm: true,
                closeOnCancel: true,
            }, function(isConfirm) {
                if (isConfirm) {
                    console.log(project.data('editable-project-action'));
                    if (project.data('editable-project-action') == 'new') {
                        project.slideUp(function() {
                            $('this').remove()
                        });
                    } else {
                        project.slideUp().data('editable-project-action', 'remove');
                    }
                }
            });


        })
    });




    $('.editableProjects  .editableProjectsItem').each(function() {
        switch ($(this).data('editable-mode')) {
            case "input":
                $(this).html('<input type="text" name="editableProjects_' + $(this).data('editable-name') + '" value="' + $(this).text() + '" class="editableInput"  placeholder="' + $(this).text() + '">').find('input').on('input', function() {
                    $(this).autoWidth(10);
                }).trigger('input');
                console.log($(this))
                break;
            default:
                break;
        }
    });
});
