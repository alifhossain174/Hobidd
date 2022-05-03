spinner = '<div id="facebookG"><div id="blockG_1" class="facebook_blockG"></div><div id="blockG_2" class="facebook_blockG"></div><div id="blockG_3" class="facebook_blockG"></div></div>';
tiny_mce = false;

function initTinymce() {
    tinymce.init({
        plugins: [
            "image", "link", "searchreplace", "code", "searchreplace", "paste", "table", "autolink"
        ],
        fontsize_formats: "5pt 6pt 7pt 8pt 9pt 10pt 11pt 12pt 26pt 36pt",
        toolbar: "insertfile undo redo | fontselect fontsizeselect | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        theme: 'modern',
        file_browser_callback: function (field_name, url, type, win) {
            openMediamasta(field_name);
        },
        relative_urls: false,
        language: "de",
        mode: "exact",
        elements: "mceEditor1,mceEditor2,mceEditor3,mceEditor4,mceEditor5"
    });
}

function toggleTableRows(el) {
    $('.' + el).each(function () {
        $(this).toggleClass('collapse');
    });
}

function getAttachmentList(token) {
    $.ajax({
        url: 'ticket.php?s=getAttachmentList',
        data: 'token=' + token,
        success: function (data) {
            $('#attachments').html(data);
        }
    });
}

/*
$(function() {
  $('a[href*=#]:not([href=#])').live('click', function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
*/
$(document).ready(function () {

    $('.hasclear').live('keyup', function () {
        var t = $(this);
        t.next('span').toggle(Boolean(t.val()));
    });

    //$(".clearer").hide($(this).prev('input').val()


    $('.clearer').each(function () {
        if (!$(this).prev('input').val()) {
            $(this).hide();
        }
    });

    $('.clearer').live('click', function () {
        $(this).prev('input').val('').focus();
        $(this).hide();
    });

    $('#notifyCustomer').live('click', function () {
        document.getElementById('notifyCustomerAjax').value = 'true';
    });

    $('#articleSearchAC').live('keyup.autocomplete', function () {
        $('#articleSearchAC').autocomplete({
            source: function (request, response) {
                $.post("stock.php?s=getArticlesAsJSON", {
                    data: request.term
                }, function (data) {
                    response($.map(data, function (item) {
                        return {
                            value: item.caption,
                            number: item.number,
                            matchcode: item.matchcode,
                            name1: item.name1,
                            name2: item.name2,
                            name3: item.name3,
                            vat: item.vat,
                            price: item.price,
                            description: item.description,
                            article_id: item.id,
                            unit_id: item.unit_id,
                            supplier_id: item.supplier_id
                        }
                    }))
                }, 'json');
            },
            minLength: 1,
            dataType: 'json',
            cache: false,
            focus: function (event, ui) {
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    $('#articleSearchAC').val('');
                }
            },
            select: function (event, ui) {
                $('#articleSearchAC').val('');
                $('#number').val(ui.item.number);
                $('#matchcode').val(ui.item.matchcode);
                $('#name1').val(ui.item.name1);
                $('#name2').val(ui.item.name2);
                $('#name3').val(ui.item.name3);
                $('#unit_id').val(ui.item.unit_id);
                $('#vat').val(ui.item.vat);
                $('#price').val(ui.item.price);
                $('#description').val(ui.item.description);
                $('#article_id').val(ui.item.article_id);
                return false;
            }
        });
    });

    $('#customerAC').live('keyup.autocomplete', function () {
        $('#customerAC').autocomplete({
            source: function (request, response) {
                $.post("ticket.php?s=getCustomerAsJSON", {
                    data: request.term
                }, function (data) {
                    response($.map(data, function (item) {
                        return {
                            value: item.caption,
                            name: item.name,
                            customer_id: item.customer_id
                        }
                    }))
                }, 'json');
            },
            minLength: 1,
            dataType: 'json',
            cache: false,
            focus: function (event, ui) {
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    $('#customerAC').val('');
                }
            },
            select: function (event, ui) {
                $('#customerAC').val(ui.item.customer_id);
                return false;
            }
        });
    });

    $('#vendorAC').live('keyup.autocomplete', function () {
        $('#vendorAC').autocomplete({
            source: function (request, response) {
                $.post("stock.php?s=getVendorsAsJSON", {
                    data: request.term
                }, function (data) {
                    response($.map(data, function (item) {
                        return {
                            value: item.caption,
                            name: item.name,
                            vendor_id: item.vendor_id,
                            street: item.street,
                            postalcode: item.postalcode,
                            location: item.location,
                            country: item.country,
                            email: item.email,
                            phone: item.phone,
                            uid: item.uid
                        }
                    }))
                }, 'json');
            },
            minLength: 1,
            dataType: 'json',
            cache: false,
            focus: function (event, ui) {
                return false;
            },
            change: function (event, ui) {
                if (ui.item == null) {
                    $('#vendorAC').val('');
                }
            },
            select: function (event, ui) {
                $('#vendorAC').val(ui.item.vendor_id);
                $('#vendor_name').val(ui.item.name);
                $('#vendor_street').val(ui.item.street);
                $('#vendor_postalcode').val(ui.item.postalcode);
                $('#vendor_location').val(ui.item.location);
                $('#vendor_country').val(ui.item.country);
                $('#vendor_email').val(ui.item.email);
                $('#vendor_phone').val(ui.item.phone);
                $('#vendor_uid').val(ui.item.uid);
                return false;
            }
        });
    });

    $('#toggleAll').live('click', function () {
        $('.toggle').each(function () {
            if ($(this).is(':checked')) {
                $(this).attr('checked', false);
            } else {
                $(this).attr('checked', true);
            }
        });
    });

    $('.datepicker').live('click', function () {
        $(this).datepicker({
            dateFormat: 'dd.mm.yy',
            showButtonPanel: true,
            currentText: 'Heute',
            closeText: 'X',
            dayNamesMin: ['So', 'Mo', 'Di', 'Mi', 'Do', 'Fr', 'Sa'],
            dayNames: ['Sonntag', 'Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag'],
            monthNames: ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'],
            numberOfMonths: [1, 1]
        }).focus();
    });

    $('.tooltip').tooltip({
        content: function (callback) {
            callback($(this).prop('title').replace('\n', '<br />'));
        }
    });

    /* VALIDATION STUFF */
    $('.inputInteger').live('keyup', function () {
        var val = $(this).val();
        val = val.replace(/[^0-9]/g, '');
        $(this).val(val);
    });

    $('.inputFloat').live('keyup', function () {
        var val = $(this).val();
        val = val.replace(/,/, '.');
        val = val.replace(/\.\./, '.');
        val = val.replace(/[^0-9\.]/g, '');
        $(this).val(val);
    });

    $('.color').live('change', function () {
        var val = $(this).val();
        $(this).parent().parent().css('background', val);
        var number = $(this).parent().find('.number').val();

        $.ajax({
            url: 'tmobile.php?s=setNumberBackgroundColor',
            data: 'color=' + val.replace(/#/, '', val) + '&number=' + number,
            success: function (data) {
                //alert(data);
            }
        });
    });

    $('.xcolor').live('change', function () {
        var val = $(this).val();

        $('#font_color').val(val);
    });

    $('.ajaxLink').live('click', function () {
        var url = $(this).attr('href');

        if ($(this).hasClass('confirm')) {
            if (confirm($(this).attr('rel')) == false) {
                return false;
            }
        }

        openAjaxLink(url);

        return false;
    });

    $('.ajaxLayer').live('click', function () {
        var url = $(this).attr('href');

        openAjaxLayer(url);

        return false;
    });


    //submit ajax form
    $('.ajaxForm').live('submit', function () {
        submitAjaxForm();
    });

    function showSuccessBox(msg) {
        $('#successBoxMsg').html(msg);
        $('#successBox').show();

        $("#successBox").ready(function () {
            $("#successBox").delay(3000).fadeOut(500, function () {
            });
        });
    }

    $('.inlineLink').live('click', function () {
        var url = $(this).attr('href');
        var layer = $(this).attr('rel');
        $.ajax({
            url: url,
            beforeSend: function () {
                $('#' + layer).html(spinner);
            },
            success: function (data) {
                $('#' + layer).html(data);
            }
        });

        return false;
    });

    $('.delete').live('click', function () {
        $('#modalDelete').modal({
            keyboard: true,
            backdrop: true,
            show: true
        });

        $('#deleteForm').attr('action', $(this).attr('href'));
        $('#delID').val($(this).attr('id').replace('d', ''));

        $('#deleteMessageTitle').html('Wirklich löschen?');
        $('#deleteMessage').html('');

        return false;
    });


    $('#buttonDeleteSubmit').live('click', function () {
        var options = {
            target: '#ajaxLayer',
            beforeSubmit: function (data) {
                $('#ajaxLayer').html(spinner);
            },
            success: function () {
                $('#modalDelete').modal('hide');
            }
        };
        $('#deleteForm').ajaxSubmit(options);

        return false;
    });

    $('#closeDeleteLayer').live('click', function () {
        $('#modalDelete').modal('hide');
    });

    $('#closeSuccessBox').live('click', function () {
        $('#successBox').hide();
    });

    //submit search form
    $('.ajaxSearchForm').live('submit', function () {
        sumitAjaxSearchForm();
    });

    $('#clearSearchForm').live('click', function () {
        document.getElementById('xclear').value = 'true';
    });

    $('#closeAjaxLayer').live('click', function () {
        if (ajax == true) {
            $('#ajaxLayer').dialog('close');
            return false;
        }
    });

    $('#ticket_filter_category, #ticket_filter_status, #ticket_filter_employee, #ticket_filter_priority, #ticket_filter_company, #ticket_filter_refresh_interval').live('change', function () {
        sumitAjaxSearchForm();
    });

    $('#filterTimeRange, #filterTimeType').live('change', function () {
        sumitAjaxSearchForm();
    });

    $('#filterUser').live('change', function () {
        var user_id = $(this).val();
        openAjaxLink('?s=listBookings&user_id=' + user_id);
    });

});

function sumitAjaxSearchForm() {
    var options = {
        target: '#mainContent',
        beforeSubmit: function (data) {
            $('#ajaxLayer').modal('hide')
            $('#mainContent').html(spinner);
        },
        success: function () {
            //$('input, textarea').placeholder();

            $('.clearer').each(function () {
                if (!$(this).prev('input').val()) {
                    $(this).hide();
                }
            });

        }
    };
    $('.ajaxSearchForm').ajaxSubmit(options);

    return false;
}

function openAjaxLayer(url) {
    $.ajax({
        url: url,
        beforeSend: function (data) {
            $('#spinner').html(spinner);
            $('#spinner').show();
        },
        success: function (data) {
            $('#ajaxLayer').html(data);

            $('#ajaxLayer').dialog({
                bgiframe: true,
                autoOpen: false,
                height: parseInt($('#layer').css('height')),
                width: parseInt($('#layer').css('width')),
                modal: true,
                title: $('#form-header').children('h4').html(),
                zIndex: 9998,
                open: function (event, ui) {
                    $('#layer').height('auto');
                    $('#layer').width('auto');
                },
                beforeClose: function (event, ui) {
                },

                buttons: {
                    "Save": {
                        text: 'Speichern',
                        'class': 'btn btn-primary',
                        click: function () {
                            submitAjaxForm();
                        }
                    },
                    "Cancel": {
                        text: 'Abbrechen',
                        'class': 'btn',
                        click: function () {
                            $(this).dialog("close");
                        }
                    }
                },
            });

            $('#spinner').hide();
            $('#form-header').remove();
            $('#ajaxLayer').dialog('open');
        }
    });
}

function submitAjaxForm() {
    if (tiny_mce) {
        tinyMCE.execCommand('mceRemoveControl', true, 1);
    }

    var options = {
        target: '#ajaxLayer',
        beforeSubmit: function (data) {
            $('#ajaxLayer').html(spinner);
        },
        success: function () {
            $('#form-header').remove();
            $('#layer').height('auto');
            $('#layer').width('auto');
        }
    };
    $('.ajaxForm').ajaxSubmit(options);

    return false;
}

function openAjaxLink(url) {
    $.ajax({
        url: url,
        beforeSend: function () {
            $('#mainContent').html(spinner);
        },
        success: function (data) {
            $('#mainContent').html(data);

            $('.clearer').each(function () {
                if (!$(this).prev('input').val()) {
                    $(this).hide();
                }
            });
        }
    });

    return false;
}
