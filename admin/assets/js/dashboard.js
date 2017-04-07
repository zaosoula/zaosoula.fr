$(document).ready(function() {
    $('.disabled').each(function() {
        $(this).append('<div class="overlay"></div>');
    });

    $('.editable').each(function() {

        $('#editableHiddenForm').append('<input type="hidden" name="' + $(this).data('editable-name') + '"/>');
        switch ($(this).data('editable-mode')) {
            case "input":
                $(this).html('<input type="text" name="editable_' + $(this).data('editable-name') + '" value="' + $(this).text() + '" class="editableInput">');
                break;
            case "textarea":
                $(this).html('<textarea type="text" name="editable_' + $(this).data('editable-name') + '" class="editableTextarea">' + $(this).html().replace(/<br(\/)?>/g, "\r\n") + '</textarea>').find('textarea').autosize();
                break;
            default:
                break;
        }
    });


    $('.socialEditable').each(function() {
        $(this).append('<li><a href="#" class="icon fa-plus alt socialEditable-plus"><span class="label">plus</span></a></li>')
    });
    $('.socialEditable-plus').click(function() {
        swal({
            title: "Add social",
            text: "Type your social url",
            type: "input",
            confirmButtonText: "Next",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "https://twitter.com/zarque7"
        }, function(inputValue) {
            if (inputValue == false) {
                return false
            }
            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            if (inputValue.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@\.-]*)*\/?$/)) {

                $.post('request/fontawesome-brand.php', function(data) {
                    url = inputValue;
                    urlInfo = url.match(/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w +?=&@\.-]*)*\/?$/);
                    domain = urlInfo[2].replace(/^www\./, "") + '.' + urlInfo[3];
                    data = JSON.parse(data);
                    icon = data[domain];
                    if (icon != undefined) {
                        swal({
                            title: "Add social",
                            text: '<p>Check if is the good icon</p><br><i class="icon fa-' + icon.name + ' alt"></i>',
                            confirmButtonText: "Yes",
                            cancelButtonText: "No",
                            html: true,
                            showCancelButton: true,
                            closeOnConfirm: false,
                            closeOnCancel: false,
                        }, function(isConfirm) {
                            console.log(icon)
                            console.log(url)
                            if (isConfirm) {
                                Autolinker.link(url, {
                                    replaceFn: function(match) {
                                        switch (match.getType()) {
                                            case 'url':
                                                swal("Voila!", "Your imaginary file has been deleted.", "success");
                                                $('<li><a href="' + match.getUrl() + '" target="_blank" class="icon fa-' + icon.name + ' alt" data-icon="' + icon.name + '" data-action="created"><span class="label">' + icon.name + '</span></a></li>').insertBefore($('.socialEditable-plus').parent());
                                                $('.socialEditable .icon:not(.socialEditable-plus)').off("click").on("click", socialEditable_delete);
                                                return false; // let Autolinker perform its normal anchor tag replacement
                                        }
                                    }
                                });


                            } else {
                                $('.socialEditable-plus').click();
                            }
                        });
                    } else {
                        swal.showInputError("Sorry we don't found icon for this link try other");
                        return false
                    }
                });
            } else {
                swal.showInputError("You need to write an url!");
            }

        });
    });

    $('.socialEditable .icon:not(.socialEditable-plus)').on("click", socialEditable_delete);

    function socialEditable_delete(e) {
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
        }, function(isConfirm) {
            if (isConfirm) {
                if (link.data('id') != undefined) {
                    link.data('action', 'removed');
                    link.parent().hide();
                } else {
                    link.parent().remove();
                }
            }
        });
    }

    $('.editableBanner input[type=submit]').click(function() {
        $(this).val('Saving...');
        var data = {};
        $('[name^=editable_]').each(function() {
            var name = $(this).attr('name').replace("editable_", "")

            var namesplit = $(this).attr('name').replace("editable_", "").split(/_(.+)?/)

            $('#editableHiddenForm input[name=' + name + ']').val($(this).val());
            if (data[namesplit[0]] == undefined) {
                data[namesplit[0]] = {}
            }
            data[namesplit[0]][namesplit[1]] = $(this).val();
        });

        data['basics']['profiles'] = []
        $('.socialEditable').first().find('.icon:not(.socialEditable-plus)').each(function() {
            data['basics']['profiles'].push({
                id: $(this).data('id'),
                icon: $(this).data('icon'),
                action: $(this).data('action'),
                url: $(this).attr('href'),
            });
        });

        data['education'] = []
        $('.editableEducation .editableEducationRow').each(function() {
            temp = {}
            temp.id = $(this).data('editable-education-id');
            temp.uniqueId = $(this).data('uniqueId');
            temp.action = $(this).data('editable-education-action');
            $(this).find('.editableEducationItem [name^=editableEduaction_]').each(function() {
                var name = $(this).attr('name').replace("editableEduaction_", "")
                temp[name] = $(this).val();
            });
            data['education'].push(temp);
        });

        data['work'] = []
        $('.editableWork .editableWorkRow').each(function() {
            temp = {}
            temp.id = $(this).data('editable-work-id');
            temp.uniqueId = $(this).data('uniqueId');
            temp.action = $(this).data('editable-work-action');
            $(this).find('.editableWorkItem [name^=editableWork_]').each(function() {
                var name = $(this).attr('name').replace("editableWork_", "")
                temp[name] = $(this).val();
            });
            data['work'].push(temp);
        });

        data['projects'] = []
        $('.editableProjects .project:not(.not)').each(function() {
            temp = {}
            temp.id = $(this).data('editable-project-id');
            temp.uniqueId = $(this).data('uniqueId') || $(this).data('uniqueid');
            temp.action = $(this).data('editable-project-action');
            temp.picture = $(this).find('a').data('picture');
            temp.url = $(this).find('a').data('href');
            $(this).find('.editableProjectsItem [name^=editableProjects_]').each(function() {
                var name = $(this).attr('name').replace("editableProjects_", "")
                temp[name] = $(this).val();
            });
            data['projects'].push(temp);
        });

        data['skills'] = []
        $('.editableSkill .editableSkillRow').each(function() {
            temp = {}
            temp.id = $(this).data('editable-skill-id');
            temp.uniqueId = $(this).data('uniqueId');
            temp.action = $(this).data('editable-skill-action');
            $(this).find('.editableSkillItem [name^=editableSkill_]').each(function() {
                var name = $(this).attr('name').replace("editableSkill_", "")
                temp[name] = $(this).val();
            });
            data['skills'].push(temp);
        });

        data['languages'] = []
        $('.editableLang .editableLangRow').each(function() {
            temp = {}
            temp.id = $(this).data('editable-lang-id');
            temp.uniqueId = $(this).data('uniqueId');
            temp.action = $(this).data('editable-lang-action');
            $(this).find('.editableLangItem [name^=editableLang_]').each(function() {
                var name = $(this).attr('name').replace("editableLang_", "")
                temp[name] = $(this).val();
            });
            data['languages'].push(temp);
        });

        data['tools'] = []
        $('.editableTools .editableToolsRow').each(function() {
            temp = {}
            temp.id = $(this).data('editable-tools-id');
            temp.uniqueId = $(this).data('uniqueId');
            temp.action = $(this).data('editable-tools-action');
            $(this).find('.editableToolsItem [name^=editableTools_]').each(function() {
                var name = $(this).attr('name').replace("editableTools_", "")
                temp[name] = $(this).val();
            });
            data['tools'].push(temp);
        });
        console.log(data);

        $.post('request/editable.php', data, function(data) {
            console.log(data);
            data = JSON.parse(data);
            console.log(data.status);
            switch (data.status) {
                case 'success': //Good
                    $('.editableBanner input[type=submit]').val('Save');
                    swal({
                        title: "Saved!",
                        text: "Your page is saved",
                        type: "success",
                        timer: 3000,
                        confirmButtonText: "OK",
                        showConfirmButton: true
                    });
                    $('.icon:not(.socialEditable-plus)').each(function() {
                        $(this).data('action', '');
                    });
                    $('.editableEducation .editableEducationRow').each(function() {
                        if ($(this).data('editable-education-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.education[$(this).data('uniqueId')].id)
                            $(this).data('editable-education-id', data.education[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-education-id'));

                            $(this).data('editable-education-action', '');
                        }
                        if ($(this).data('editable-education-action') == 'remove') {
                            if (data.education[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });
                    $('.editableWork .editableWorkRow').each(function() {
                        if ($(this).data('editable-work-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.work[$(this).data('uniqueId')].id)
                            $(this).data('editable-work-id', data.work[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-work-id'));

                            $(this).data('editable-work-action', '');
                        }
                        if ($(this).data('editable-work-action') == 'remove') {
                            if (data.work[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });

                    $('.editableProjects .projects').each(function() {
                        if ($(this).data('editable-work-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.projects[$(this).data('uniqueId')].id)
                            $(this).data('editable-project-id-id', data.projects[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-project-id'));

                            $(this).data('editable-project-action', '');
                        }
                        if ($(this).data('editable-project-action') == 'remove') {
                            if (data.projects[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });

                    $('.editableSkill .editableSkillRow').each(function() {
                        if ($(this).data('editable-skill-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.skills[$(this).data('uniqueId')].id)
                            $(this).data('editable-skill-id', data.skills[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-skill-id'));

                            $(this).data('editable-skill-action', '');
                        }
                        if ($(this).data('editable-skill-action') == 'remove') {
                            if (data.skills[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });

                    $('.editableLang .editableLangRow').each(function() {
                        if ($(this).data('editable-lang-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.languages[$(this).data('uniqueId')].id)
                            $(this).data('editable-lang-id', data.languages[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-lang-id'));

                            $(this).data('editable-lang-action', '');
                        }
                        if ($(this).data('editable-lang-action') == 'remove') {
                            if (data.languages[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });

                    $('.editableTools .editableToolsRow').each(function() {
                        if ($(this).data('editable-tools-action') == 'new') {
                            console.log($(this).data('uniqueId'), data.tools[$(this).data('uniqueId')].id)
                            $(this).data('editable-tools-id', data.tools[$(this).data('uniqueId')].id);
                            console.log($(this).data('editable-tools-id'));

                            $(this).data('editable-tools-action', '');
                        }
                        if ($(this).data('editable-tools-action') == 'remove') {
                            if (data.tools[$(this).data('uniqueId')].action == 'remove');
                            $(this).remove();
                        }
                    });

                    break;
                default:
                    alert(data);
                    break;
            }
        });


    });
    $('.editableBanner input[type=reset]').click(function() {
        location.reload();
    });
});
