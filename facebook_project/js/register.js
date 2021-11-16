$(document).ready(function(){

    var emailValid;
    var confirmPass;
   
   
    $("#submit_btn").click(function(){
        validateEmail();
        confirmPassword();
        if(emailValid && confirmPass){
            $("#register_form").submit();
        }
    })

    function validateEmail(){
        var emailValue = $("#email").val();
        if (
            emailValue.length > 5 &&
            emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
            emailValue.lastIndexOf("@") != -1
          ) {
            emailValid = true;
        }else{
            emailValid = false;
            alert("Enter a valid Email")
        }
    }

    function confirmPassword(){
        confirmPass = false;
        if($("#password").val() == $("#confirm_password").val()){
            confirmPass = true;
        }else{
            alert("Unmatching passwords");
        }


    }
})