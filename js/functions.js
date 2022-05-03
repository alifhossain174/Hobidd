$(document).ready(function (e) {

    if (tippy) {
        tippy('.tippy');
    }


    $('#type').on('change', function () {

        var v = $(this).val();

        if (v == 'raffle') {
            $('#xminprice1').addClass('hidden');
            $('#xpriceinfo').removeClass('hidden');
            $('#xduration').addClass('hidden');
        } else if (v == 'raffle_offer') {
            $('#xminprice1').removeClass('hidden');
        } else if (v == 'offer') {
            $('#xminprice1').removeClass('hidden');
            $('#xpriceinfo').addClass('hidden');
            $('#xduration').removeClass('hidden');
        }

    });


    var hash = window.location.hash;

    if (hash == '#advertise') {
        var box = 'mob_advertise_box';
        var content_id = 30;

        if (content_id) {
            $.ajax({
                url: '/en/get-content/' + content_id + '/',
                beforeSend: function () {
                },
                success: function (data) {
                    $('#' + box).html(data);
                }
            });
        }

        if ($('#' + box).hasClass('hidden')) {
            $('.mob_box_sub').addClass('hidden');
            $('#' + box).removeClass('hidden');
        } else {
            $('.mob_box_sub').addClass('hidden');
        }

    }


    touchmove = false;

    $(document).on('touchstart', '.mob_box', function (event) {
        touchmove = false;
    });

    $(document).on('touchmove', '.mob_box', function (event) {
        touchmove = true;
    });

    $(document).on('touchend', '.mob_box', function (event) {

        if (touchmove) {

        } else {
            var box = $(this).attr('rel');
            var content_id = $(this).attr('id');

            var url = document.location.href;
            url = url.split('/');

            if (content_id) {
                $.ajax({
                    url: '/' + url[3] + '/get-content/' + content_id + '/',
                    beforeSend: function () {
                    },
                    success: function (data) {
                        $('#' + box).html(data);
                    }
                });
            }

            if ($('#' + box).hasClass('hidden')) {
                $('.mob_box_sub').addClass('hidden');
                $('#' + box).removeClass('hidden');
            } else {
                $('.mob_box_sub').addClass('hidden');
            }
        }
    });

    $('#checkCountry').on('change', function () {

        $.ajax({
            url: '/en/is-eu-country/' + $(this).val() + '/',
            success: function (data) {
                if (data == 'true') {
                    $('#uid-container').removeClass('hidden');
                } else {
                    $('#uid-container').addClass('hidden');
                }
            }
        });

    });


    if ($('#prod-gal').length > 0) {

        var slider = new MasterSlider();
        slider.control('thumblist', {
            arrows: true,
            autohide: false,
            dir: 'v',
            align: 'right',
            width: 340,
            height: 186,
            margin: 0,
            space: 0,
            hideUnder: 9999999
        });
        slider.control('arrows', {autohide: false, overVideo: true});
        //slider.control('arrows');
        slider.setup('prod-gal', {
            width: 1058,
            height: 550,
            speed: 25,
            //preload:'all',
            loop: true,
            view: 'fade',
            fillMode: 'fill'
        });


        /*
        var slider = new MasterSlider();
            slider.setup('prod-gal' , {
                width:1058,
                height:550,
                space:0,
                view:'basic',
                dir:'v',
                view:'fade'
            });
            slider.control('arrows');
            slider.control('scrollbar' , {dir:'v'});
            slider.control('circletimer' , {color:"#FFFFFF" , stroke:9});
            slider.control('thumblist' , {autohide:false ,dir:'v', align:'right', width:340, height:181, arrows: true, margin:0, space:0});
            */
    }


    if ($('#prod-gal-mobile').length > 0) {

        var slider = new MasterSlider();
        slider.setup('prod-gal-mobile', {
            width: 380,
            height: 300,
            space: 5,
            view: 'basic',
            autofill: false,
            speed: 20,
            loop: true,
        });

        slider.control('arrows', {autohide: false, overVideo: true});
        //slider.control('bullets');
    }

    $('#toggleMenu').on('click', function () {

        var d = $('#cat-container-mobile').css('display');

        $('#cat-container-mobile').css('display', (d == 'none' ? 'block' : 'none'));

        return false;
    });

    $('#toggleMainMenu').on('click', function () {

        var d = $('#menu-container').css('display');

        $('#menu-container').css('display', (d == 'none' ? 'block' : 'none'));

        return false;
    });

});

function deletePhoto(nr) {
    $.ajax({
        url: '/de/foto-loeschen/' + nr + '/',
        beforeSend: function () {
        },
        success: function (data) {
            $('#pc' + nr).remove();
        }
    });

    return false;
}

var slideIndex = 1;
var profile_images = ["null"]; // The first image is not showing up so null for first element is reqired
var upload_btn_text = "";
showSlides(1);

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";

    $(".next").show();
    $(".prev").show();
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function addPhotoForAdds(file, index) {
    if($(".choose-image-for-ad." + index + " i").attr("class").includes("fa-times-circle")) {
        if(profile_images.length > 11) {
            alert("You can only choose up to 10 images");
            return false;
        }
        profile_images.push(file);        

        $(".choose-image-for-ad." + index + " i").removeClass().addClass("far fa-check-circle");
        //$(".choose-image-for-ad." + index + " i").css("color", "white");
    }
    else {
        var file_index = profile_images.indexOf(file);
        if (file_index !== -1) {
            profile_images.splice(file_index, 1);
        }
        $(".choose-image-for-ad." + index + " i").removeClass().addClass("far fa-times-circle");
        //$(".choose-image-for-ad." + index + " i").css("color", "white");
    }


    $("#files").val(JSON.stringify(profile_images));
}


function addImage(input) {
    // if(input.files.length == 1) return;

    var file_name = input.val().split("\\")[2];
    var previous_desc = $('.'+input.attr("id") + '-desc').html();
    $('.' + input.attr("id") + '-desc').text(file_name);
    var new_file = input.attr("id").split("file")[1];
    new_file = parseInt(new_file) + 1;
    new_file = "file" + new_file;
    if(upload_btn_text == "") {
        upload_btn_text = $("."+input.attr("id") + " label span").text();
    }

    // var style = window.location.pathname.includes("de") ? "margin-left:25px;padding-left:35px;": "margin-left:5px";
    var next_file_html = '<div class="form-group col-12 d-flex pl-0 align-items-center"><div class="mr-3"><label class="btn btn-secondary"><span>' + upload_btn_text + '</span>';
    next_file_html += '<input type="file" class="form-control-file profile-gallery-files" id="' + new_file + '" name="' + new_file + '" size="60" multiple onChange="addImage($(this))"/></label></div>';
    next_file_html += '<div class="file-name ' + new_file + '-desc">' + previous_desc + '</div></div>';

    $(".upload-gallery-photos").prepend(next_file_html);


    const label = input.parent().find("span")
    label.text("REMOVE PICTURE");
    label.click(e => {
        e.preventDefault();

        e.target.closest('.form-group').remove();
    })

}

function clickToRemoveImage(input){
    $(input.parentNode.parentNode.nextElementSibling).remove()
    $(input.parentNode.parentNode).remove()
}

function deleteLogo() {
    $.ajax({
        url: '/en/logo-loeschen/',
        beforeSend: function () {
        },
        success: function (data) {
            $('#lc').remove();
        }
    });

    return false;
}

function deletePhotoFromGallery(photo, num) {
    $.ajax({
        url: '/en/delete-photo?photo=' + photo + "/",
        beforeSend: function () {
        },
        success: function (data) {
            console.log("d");
            $(".gallery." + num).remove();
            $(".mySlides." + num).remove();
        }
    });

    return false;
}		