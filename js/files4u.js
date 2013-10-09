$(document).ready(function(){try{
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
    password:{ 
         required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
        },
         password_confirm: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "incorrect password"
        }
    },
    submitHandler: function(e) {
        if ($('#signup_form').valid()) {
            $("#signup_form").submit(function(e) {
             e.preventDefault();
		value=$(this).serialize();
                  $.post("register.php", value).done(function(data) {
                    alert(data);
                 });
        });   
    }
    }
});

}
catch(e){alert(e);}


try{
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
    password:{ 
         required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
        }
        
    },
    submitHandler: function(e) {
        if ($('#login_form').valid()) {
            $("#login_form").submit(function() {
                alert("okay da");
                $("html").load(("demo.html"));
            });   
    }
    }
});

}
catch(e){alert(e);}



   
    $("#popup_box").hide();
    $(".login").click(function(){
       loadPopupBox(); 
    });
    
	
    $('#popupBoxClose').click( function() {			
			unloadPopupBox();
    });

   // $(".main").click( function() {
  //          unloadPopupBox();
  //  });

    function unloadPopupBox() {	// TO Unload the Popupbox
            $('#popup_box').fadeOut("slow");
            $(".main").css({ // this is just for style		
                    "opacity": "1"  
            }); 
    }	

    function loadPopupBox() {	// To Load the Popupbox
            
         	
            $('#popup_box').fadeIn("slow");
              $(".main").css({ // this is just for style
                    "opacity": ".3"  
          }); 
    }

}); 