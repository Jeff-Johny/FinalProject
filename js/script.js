var default_content = "";

$(document).ready(function() {
    $('.ad_div').cycle({
         fx:    'zoom',
         easing: 'easeOutBack', 
         delay:  -4000 
    });
    
    $("#account_div").hide();
    $("#account_button").click(function() {
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
        $("#contentwith_link").load("page_5.html");
    });
    $("#main_button1").mouseleave(function() {
        document.getElementById("main_button1").className = "main_button";
    });
    $("#main_button2").mouseenter(function() {
        document.getElementById("main_button2").className = "newmain_button";
        $("#contentwith_link").load("page_6.html")
    });
    $("#main_button2").mouseleave(function() {
        document.getElementById("main_button2").className = "main_button";
    });
    $("#main_button3").mouseenter(function() {
        document.getElementById("main_button3").className = "newmain_button";
        $("#contentwith_link").load("page_7.html")
    });
    $("#main_button3").mouseleave(function() {
        document.getElementById("main_button3").className = "main_button";
    });
});

var lasturl = "";

function checkURL(hash)
{
    if (!hash)
        hash = window.location.hash;

    if (hash != lasturl)
    {
        lasturl = hash;

        // FIX - if we've used the history buttons to return to the homepage,
        // fill the pageContent with the default_content

        if (hash == "")
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

            if (parseInt(msg) != 0)
            {
                $('#pageContent').html(msg);
                $('#loading').css('visibility', 'hidden');
            }
        }

    });




}