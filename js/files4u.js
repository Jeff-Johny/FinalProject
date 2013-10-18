var lasturl = "";
var data = "";
var searchItem = "";
var flag = 0;
$(document).ready(function() {
    //link for different socialsites for login
    $("#socialsite1").click(function() {
        window.location.assign('http://twitter.com');
    });
    $("#socialsite2").click(function() {
        window.location.assign('http://facebook.com');
    });
    $("#socialsite3").click(function() {
        window.location.assign('http://gmail.com');
    });
    $("#socialimage1").click(function() {
        window.location.assign('http://twitter.com');
    });
    $("#socialimage2").click(function() {
        window.location.assign('http://facebook.com');
    });
    $("#socialimage3").click(function() {
        window.location.assign('http://gmail.com');
    });
    //disply user name on account settings for editing
    $("#accountSettings").click(function() {
        $("#contentWithLink").load("accountSettings.php", function() {
            $.ajax({
                type: 'POST',
                url: 'findName.php',
                success: function(data) {
                    document.getElementById('changeName').value = data;
                }
            });
        });

    });
    //downloading on searching
    $("#download").click(function() {
        window.location("uploads/" + document.getElementById('searchResult').innerHTML);
    });
    //searching
    $("#searchImage").click(function() {
        searchItem = document.getElementById("search").value;
        $.ajax({
            type: 'POST',
            url: 'search.php',
            data: {'filename': searchItem},
            success: function(data) {
                document.getElementById('searchResult').innerHTML = data;
            }
        });
    });
    $("#accountSettings").click(function() {
        $("#contentWithLink").load("accountSettings.php");
    });
    //giving slide show
    $('#adDiv1').cycle({
        fx: 'scrollDown'
    });
    $('#adDiv2').cycle({
        fx: 'turnDown',
        delay: -4000
    });
    $('#adDiv3').cycle({
        fx: 'curtainX',
        sync: false,
        delay: -2000
    });
    //validating signup form
    try {
        $("#signupForm").validate({
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
                    equalTo: "#signPass"
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
        $("#signupForm").submit(function(e) {
            if ($('#signupForm').valid()) {
                currentName = document.getElementById("signName").innerHTML;
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
    //validating login form
    try {
        $("#loginForm").validate({
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
        $("#loginForm").submit(function(e) {
            if ($('#loginForm').valid()) {
                e.preventDefault();
                value = $("#loginForm").serialize();
                console.log(value);
                $.post("login.php", value).done(function(data) {
                    if (data === "Array") {
                        window.location.assign('home.php');
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
    //loading login form
    $("#popupBox").hide();
    $(".login").click(function() {
        loadPopupBox();
    });
    $('#popupBoxClose').click(function() {
        unloadPopupBox();
    });
    function unloadPopupBox() {	// TO Unload the Popupbox
        $('#popupBox').fadeOut("slow");
        $(".main").css({// this is just for style		
            "opacity": "1"
        });
    }
    function loadPopupBox() {	// To Load the Popupbox
        $('#popupBox').fadeIn("slow");
        $(".main").css({// this is just for style
            "opacity": ".3"
        });
    }
    //unsetting session variable
    $("#signout").click(function() {
        $.post("unsetSession.php");
    });
    //loading account settings popup menu
    $("#accountDiv").hide();
    $("#titleRightButton").click(function() {
        $("#accountDiv").show();
    });
    $("#accountDiv").mouseleave(function() {
        $("#accountDiv").hide();
    });
    $("#mainButton1").mouseenter(function() {
        document.getElementById("mainButton1").className = "newMainButton";
    });
    $("#mainButton1").click(function() {
        $("#contentWithLink").load("searchingPage.php");
    })
    $("#mainButton1").mouseleave(function() {
        document.getElementById("mainButton1").className = "mainButton";
    });
    $("#mainButton2").mouseenter(function() {
        document.getElementById("mainButton2").className = "newMainButton";
    });

    $("#mainButton2").mouseleave(function() {
        document.getElementById("mainButton2").className = "mainButton";
    });
    $("#mainButton3").mouseenter(function() {
        document.getElementById("mainButton3").className = "newMainButton";
    });
    //loading list of files
    $("#mainButton3").click(function() {
        $("#contentWithLink").load("collectionPage.php", function() {
            $.ajax({
                type: "POST",
                data: {'type': '1'},
                url: "show.php",
                success: function(data) {
                    var div_text = JSON.parse(data);
                    $("#pageContent").append('<div>' +
                            '<ul id="contentPageUl">' +
                            '</ul>' +
                            '</div>');
                    for (var i = 0; i < div_text.length; i++) {
                        console.log('inside');
                        $("#contentPageUl").append(div_text[i]);
                        console.log(div_text);
                    }
                }
            });
        });
    });
    $("#mainButton3").mouseleave(function() {
        document.getElementById("mainButton3").className = "mainButton";
    });
});
function checkURL(hash){
    if (!hash)
        hash = window.location.hash;
    if (hash !== lasturl){
        lasturl = hash;
        // FIX - if we've used the history buttons to return to the homepage,
        // fill the pageContent with the default_content
        if (hash === ""){
            $('#pageContent').html(default_content);
        }
        else
            loadPage(hash);
    }
}
function loadPage(url){
    url = url.replace('#page', '');
    $('#loading').css('visibility', 'visible');
    $.ajax({
        type: "POST",
        url: "loadPage.php",
        data: 'page=' + url,
        dataType: "html",
        success: function(msg) {
            if (parseInt(msg) !== 0){
                $('#pageContent').html(msg);
                $('#loading').css('visibility', 'hidden');
            }
        }
    });
}
//downloading items on the gallery
function downloadItems(clickedId) {
    $.ajax({
        type: 'POST',
        url: 'searchId.php',
        data: {'searchId': clickedId},
        success: function(data) {
            window.open("uploads/" + data);
        }
    });
}
//show files with different category
function showWithType(type) {
    $("#contentWithLink").load("collectionPage.php", function() {
        $.ajax({
            type: "POST",
            data: {'type': type},
            url: "show.php",
            success: function(data) {
                var divText = JSON.parse(data);
                $("#pageContent").append('<div>' +
                        '<ul id="contentPageUl">' +
                        '</ul>' +
                        '</div>');
                for (var i = 0; i < divText.length; i++) {
                    $("#contentPageUl").append(divText[i]);
                    console.log(divText);
                }
            }
        });
    });
}
function search() {
    searchItem = document.getElementById("search").value;
    $.ajax({
        type: 'POST',
        url: 'search.php',
        data: {'fileName': search_item},
        success: function(data) {
            document.getElementById('searchResult').innerHTML = data;
        }
    });
}
//download single file
function downloadItem() {
    window.open("uploads/" + document.getElementById('searchResult').innerHTML);
}
//loading different category for uploading file
function uploadTypeChange() {
    $("#contentWithLink").load("uploadPage.php", function() {
        checkURL();
        $('ul li .uploadA').click(function() {
            checkURL(this.hash);
        });
        //filling in the default content
        defaultContent = $('#pageContent').html();
        setInterval("checkURL()", 250);
    });
}
function nameChangeDone() {
    $.ajax({
        type: 'POST',
        url: 'changeName.php',
        data: {'name': document.getElementById("changeName").value
        },
        success: function() {
            alert("Name changed successfully!");
        }
    });
}
