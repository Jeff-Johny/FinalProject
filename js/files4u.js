var lasturl = "";
var data = "";
var search_item = "";
var flag = 0;
$(document).ready(function() {



    $("#account_settings").click(function() {
        $("#contentwith_link").load("account_settings.php");

    });

    $("#download").click(function() {
        window.open("uploads/" + document.getElementById('search_result').innerHTML);
    });

    $("#searchimage").click(function() {
        search_item = document.getElementById("search").value;
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {'filename': search_item},
            success: function(data) {
                document.getElementById('search_result').innerHTML = data;
            }
        });
    });
    $("#account_settings").click(function() {

        $("#contentwith_link").load("account_settings.php");
    });

    $('#ad_div1').cycle({
        fx: 'scrollDown'
    });
    $('#ad_div2').cycle({
        fx: 'turnDown',
        delay: -4000
    });
    $('#ad_div3').cycle({
        fx: 'curtainX',
        sync: false,
        delay: -2000
    });

    try {
        $("#signup_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirm: {
                    required: true,
                    minlength: 5,
                    equalTo: "#sign_pass"
                }
            },
            messages: {
                email: {
                    required: "We need your email address to contact you",
                    email: "Your email address must be in the format of name@domain.com"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password_confirm: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "incorrect password"
                }
            }


        });

        $("#signup_form").submit(function(e) {
            if ($('#signup_form').valid()) {
                currentName = document.getElementById("sign_name").innerHTML;
                e.preventDefault();
                value = $(this).serialize();

                $.post("register.php", value).done(function() {
                    loadPopupBox();
                });

            }
        });
    }
    catch (e) {
        alert(e);
    }



    $("#form_change_password").validate({
        rules: {
            current_pass: {
                required: true,
                minlength: 5
            },
            new_pass: {
                required: true,
                minlength: 5
            },
            confirm_new_pass: {
                required: true,
                minlength: 5,
                equalTo: "#new_password"
            }
        },
        messages: {
            current_pass: {
                required: "We need your email address to contact you",
                minlength: "Your password must be at least 5 characters long"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password_confirm: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "incorrect password"
            }
        }


    });

    $("#form_change_password").submit(function(e) {alert("hai");
        if ($('#form_change_password').valid()) {
            $.ajax({
                type: 'POST',
                url: 'change.php',
                data: {'name': document.getElementById("change_name").value,
                    'password': document.getElementById("new_password").value
                },
                success: function(data) {
                    alert(data);
                }
            });
        }
    });





    try {
        $("#login_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                email: {
                    required: "Please enter your email address",
                    email: "Your email address must be in the format of name@domain.com"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                }

            }

        });

        $("#login_form").submit(function(e) {

            if ($('#login_form').valid()) {
                e.preventDefault();

                value = $("#login_form").serialize();
                console.log(value);
                $.post("login.php", value).done(function(data) {
                    if (data === "Array") {
                        window.location.assign('demo.php');
                    }
                    else {
                        document.getElementById("error").innerHTML = '<a style="color:red;margin-left:20px">Incorrect user name or password</a>';
                    }

                });
            }
        });
    }
    catch (e) {
        alert(e);
    }




    $("#popup_box").hide();
    $(".login").click(function() {
        loadPopupBox();
    });


    $('#popupBoxClose').click(function() {
        unloadPopupBox();
    });

    // $(".main").click( function() {
    //          unloadPopupBox();
    //  });

    function unloadPopupBox() {	// TO Unload the Popupbox
        $('#popup_box').fadeOut("slow");
        $(".main").css({// this is just for style		
            "opacity": "1"
        });
    }

    function loadPopupBox() {	// To Load the Popupbox


        $('#popup_box').fadeIn("slow");
        $(".main").css({// this is just for style
            "opacity": ".3"
        });
    }


    $("#signout").click(function() {
        $.post("unset_session.php");
    });



    $("#account_div").hide();
    $("#titleright_button").click(function() {
        $("#account_div").show();
    });
    $("#account_div").mouseleave(function() {
        $("#account_div").hide();
    });



    checkURL();
    $('ul li a').click(function() {

        checkURL(this.hash);

    });

    //filling in the default content
    default_content = $('#pageContent').html();


    setInterval("checkURL()", 250);

    $("#main_button1").mouseenter(function() {
        document.getElementById("main_button1").className = "newmain_button";
    });
    $("#main_button1").click(function() {
        $("#contentwith_link").load("searching_page.php");
    })
    $("#main_button1").mouseleave(function() {
        document.getElementById("main_button1").className = "main_button";
    });
    $("#main_button2").mouseenter(function() {
        document.getElementById("main_button2").className = "newmain_button";
    });
    $("#main_button2").click(function() {
        $("#contentwith_link").load("upload_page.html");
    });
    $("#main_button2").mouseleave(function() {
        document.getElementById("main_button2").className = "main_button";
    });
    $("#main_button3").mouseenter(function() {
        document.getElementById("main_button3").className = "newmain_button";
    });
    $("#main_button3").click(function() {
        $("#contentwith_link").load("collection_page.html", function() {
            $.ajax({
                type: "POST",
                url: "show.php",
                success: function(data) {
                    var div_text = JSON.parse(data);
                    $("#pageContent").append('<div>' +
                            '<ul id="content_page_ul">' +
                            '</ul>' +
                            '</div>');
                    for (var i = 0; i < div_text.length; i++) {
                        console.log('inside');
                        $("#content_page_ul").append(div_text[i]);
                        console.log(div_text);
                    }
                }
            });



        });

    });

    $("#main_button3").mouseleave(function() {
        document.getElementById("main_button3").className = "main_button";
    });




});

function checkURL(hash)
{
    if (!hash)
        hash = window.location.hash;

    if (hash !== lasturl)
    {
        lasturl = hash;
        // FIX - if we've used the history buttons to return to the homepage,
        // fill the pageContent with the default_content

        if (hash === "")
            $('#pageContent').html(default_content);

        else
            loadPage(hash);
    }
}


function loadPage(url)
{
    url = url.replace('#page', '');

    $('#loading').css('visibility', 'visible');

    $.ajax({
        type: "POST",
        url: "load_page.php",
        data: 'page=' + url,
        dataType: "html",
        success: function(msg) {

            if (parseInt(msg) !== 0)
            {
                $('#pageContent').html(msg);
                $('#loading').css('visibility', 'hidden');
            }
        }

    });




}

function download_item(clicked_id) {
    $.ajax({
        type: 'POST',
        url: 'search_id.php',
        data: {'search_id': clicked_id},
        success: function(data) {
            window.open("uploads/" + data);
        }
    });
}
function change() {
    $("#contentwith_link").load("collection_page.html", function() {
        $.ajax({
            type: "POST",
            url: "show.php",
            success: function(data) {
                var div_text = JSON.parse(data);
                $("#pageContent").append('<div>' +
                        '<ul id="content_page_ul">' +
                        '</ul>' +
                        '</div>');
                for (var i = 0; i < div_text.length; i++) {
                    console.log('inside');
                    $("#content_page_ul").append(div_text[i]);
                    console.log(div_text);
                }
            }
        });



    });
}
function search() {
    search_item = document.getElementById("search").value;
    $.ajax({
        type: 'POST',
        url: 'search.php',
        data: {'filename': search_item},
        success: function(data) {
            document.getElementById('search_result').innerHTML = data;
        }
    });
}
function download_item() {
    window.open("uploads/" + document.getElementById('search_result').innerHTML);
}