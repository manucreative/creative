
(function ($) {
    "use strict";


     /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        var type = $(input).attr('type');
        var name = $(input).attr('name');
        var value = $(input).val().trim();
    
        if (type === 'my_email') {
            // Email validation
            var emailPattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
            if (!emailPattern.test(value)) {
                return false;
            }else if(value === '') {
                return false;
            }
        } else if (type === 'password') {
            if (value === '' || value.length < 8) {
                return false;
            }
        }
        else if (name === 're_enterPass') {
            var passwordValue = $('input[name="password"]').val().trim();
            if (value !== passwordValue) {
                return false;
            }
        }
        else if (type === 'text') {
            if (value === '') {
                return false;
            }
        } 
        else if (type === 'telephone') {
            var telephonePattern = /^254\d{9}$/;
            if (!telephonePattern.test(value)) {
                return false;
            }
        }
    
        return true;
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);