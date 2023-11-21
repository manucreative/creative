    $(document).ready(function() {
        // Select the flash message container
        var flashMessage = $('#flash-message');

        // Check if the flash message is present
        if (flashMessage.length) {
            setTimeout(function() {
                flashMessage.addClass('fade-out');
            }, 3000); // 3000 milliseconds = 3 seconds
        }

           // Get the current URL
                var currentUrl = window.location.href;

                // Check if the current URL matches a specific URL pattern (e.g., the dashboard URL)
                if (currentUrl.indexOf(dashboardUrl) !== -1) {
                    document.getElementById("dashboard-link").classList.add("myNav");
                }
                else if (currentUrl.indexOf(viewServicesUrl) !== -1) {
                    document.getElementById("viewService").classList.add("myNav");
                }
                else if (currentUrl.indexOf(addServiceFormUrl) !== -1) {
                    document.getElementById("viewService").classList.add("myNav");
                }
                else if (currentUrl.indexOf(sliderViewLocation) !== -1) {
                    document.getElementById("viewSliders").classList.add("myNav");
                }
                else if (currentUrl.indexOf(addSliderUrl) !== -1) {
                    document.getElementById("viewSliders").classList.add("myNav");
                }
                else if (currentUrl.indexOf(configUrl) !== -1) {
                    document.getElementById("viewConfigs").classList.add("myNav");
                }
                else if (currentUrl.indexOf("/creative/configurations") !== -1) {
                    document.getElementById("#moreControls").classList.add("myNav");
                }
                else if (currentUrl.indexOf(viewFaqsUrl) !== -1) {
                    document.getElementById("myFaqs").classList.add("myNav");
                }
                else if (currentUrl.indexOf(addFaqsUrl) !== -1) {
                    document.getElementById("myFaqs").classList.add("myNav");
                }

                $("#moreControls").click(function() { 
                    $(this).addClass("myNav2");
                });
                $("#manageProfile").click(function() { 
                    $(this).addClass("myNav2");
                });
                $("#manageServices").click(function() { 
                    $(this).addClass("myNav2");
                });
    });



    $(function() {
        //If check_all checked then check all table rows
        $("#check_all_services").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='services']").prop("checked", true);
            } else {
                $("input:checkbox[name='services']").prop("checked", false);
            }
        });
    
        // Check each table row checkbox
        $("input:checkbox[name='services']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='services']").length;
            var total_checked_boxes = $("input:checkbox[name='services']:checked").length;
    
            // If all checked manually then check check_all_services checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#check_all_services").prop("checked", true);
            }
            else {
                $("#check_all_services").prop("checked", false);
            }
        });
        
        $("#delete_selected_services").on("click", function () {
            var ids = '';
            var comma = '';
            $("input:checkbox[name='services']:checked").each(function() {
                ids = ids + comma + this.value;
                comma = ',';
            });
            
            //console.log(ids);
            
            if(ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected services?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: serviceDeleteUrl,
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = serviceLocation;
                         }, 4000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#loaderBanner').hide();
                        $('#overlay').hide(); // Hide the overlay
                        $("#successMessage").html("<span style='background-color: red; color:black; padding:10px'>" + textStatus + " " + errorThrown + "</span>");
                    }
                });
            }
            } else {
                $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one row for deletion</span>');
            }
        });
    });
    
    
    // sliders Delete function start
    $(function(){
        //If check_all checked then check all table rows
        $("#check_all_sliders").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='sliders']").prop("checked", true);
            } else {
                $("input:checkbox[name='sliders']").prop("checked", false);
            }
        });
    
        // Check each table row checkbox for sliders
        $("input:checkbox[name='sliders']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='sliders']").length;
            var total_checked_boxes = $("input:checkbox[name='sliders']:checked").length;
    
            // If all checked manually then check check_all checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#check_all_sliders").prop("checked", true);
            }
            else {
                $("#check_all_sliders").prop("checked", false);
            }
        });
    
        $("#delete_selected_sliders").on("click", function (e) {
            e.preventDefault();
            var ids = '';
            var comma = '';
            $("input:checkbox[name='sliders']:checked").each(function() {
                ids = ids + comma + this.value;
                comma = ',';
            });
            
            //console.log(ids);
            
            if(ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected sliders?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: sliderDeleteUrl,
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = sliderViewLocation;
                         }, 4000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#loaderBanner').hide();
                        $('#overlay').hide(); // Hide the overlay
                        $("#successMessage").html("<span style='background-color: red; color:black; padding:10px'>" + textStatus + " " + errorThrown + "</span>");
                    }
                });
            }
            } else {
                $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one product row for deletion</span>');
            }
        });
    });
    // sliders delete function end



    /**
     * ==============================
     * FAQs delete function Start
     * ====================
     */
 
    $(function(){
    //If check_all checked then check all table rows
    $("#check_all_faqs").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='faqs']").prop("checked", true);
        } else {
            $("input:checkbox[name='faqs']").prop("checked", false);
        }
    });
    
    // Check each table row checkbox for categories
    $("input:checkbox[name='faqs']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='faqs']").length;
        var total_checked_boxes = $("input:checkbox[name='faqs']:checked").length;
    
        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
            $("#check_all_faqs").prop("checked", true);
        }
        else {
            $("#check_all_faqs").prop("checked", false);
        }
    });
    
    $("#delete_selected_faq").on("click", function (e) {
        e.preventDefault();
        var ids = '';
        var comma = '';
        $("input:checkbox[name='faqs']:checked").each(function() {
            ids = ids + comma + this.value;
            comma = ',';
        });
        
        //console.log(ids);
        
        if(ids.length > 0) {
            if (confirm("Are you sure you want to delete the selected faqs?")) {
            $('#overlay').show();
            $('#loaderBanner').show();
            $.ajax({
                type: "POST",
                url: faqDeleteUrl,
                data: {'ids': ids},
                dataType: "html",
                cache: false,
                success: function(success_message) {
                    $('#successMessage').html(success_message);
                     window.setTimeout(function(){
                        $('#loaderBanner').hide();
                       $('#overlay').hide();
                       window.location.href = gaqViewLocation;
                     }, 4000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#loaderBanner').hide();
                    $('#overlay').hide(); // Hide the overlay
                    $("#successMessage").html("<span style='background-color: red; color:black; padding:10px'>" + textStatus + " " + errorThrown + "</span>");
                }
            });
        }
        } else {
            $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one faq row for deletion</span>');
        }
    });
    });
    

    
    // admins delete function Start
    $(function(){
    //If check_all checked then check all table rows
    $("#check_all_admins").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='admins']").prop("checked", true);
        } else {
            $("input:checkbox[name='admins']").prop("checked", false);
        }
    });
    
    // Check each table row checkbox for products
    $("input:checkbox[name='admins']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='admins']").length;
        var total_checked_boxes = $("input:checkbox[name='admins']:checked").length;
    
        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
            $("#check_all_admins").prop("checked", true);
        }
        else {
            $("#check_all_admins").prop("checked", false);
        }
    });
    
    $("#delete_selected_admins").on("click", function (e) {
        e.preventDefault();
        var ids = '';
        var comma = '';
        $("input:checkbox[name='admins']:checked").each(function() {
            ids = ids + comma + this.value;
            comma = ',';
        });
        
        //console.log(ids);
        
        if(ids.length > 0) {
            if (confirm("Are you sure you want to delete the selected admins?")) {
            $('#overlay').show();
            $('#loaderBanner').show();
            $.ajax({
                type: "POST",
                url: adminDeleteUrl,
                data: {'ids': ids},
                dataType: "html",
                cache: false,
                success: function(success_message) {
                    $('#successMessage').html(success_message);
                     window.setTimeout(function(){
                        $('#loaderBanner').hide();
                       $('#overlay').hide();
                       window.location.href = "viewAllAdmins";
                     }, 4000);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#loaderBanner').hide();
                    $('#overlay').hide(); // Hide the overlay
                    $("#successMessage").html("<span style='background-color: red; color:black; padding:10px'>" + textStatus + " " + errorThrown + "</span>");
                }
            });
        }
        } else {
            $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one admin row for deletion</span>');
        }
    });
    });
    // topUps delete function end
    
    
    // articles delete function Start
    $(function(){
        //If check_all checked then check all table rows
        $("#check_all_articles").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='articles']").prop("checked", true);
            } else {
                $("input:checkbox[name='articles']").prop("checked", false);
            }
        });
        
        // Check each table row checkbox for products
        $("input:checkbox[name='articles']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='articles']").length;
            var total_checked_boxes = $("input:checkbox[name='articles']:checked").length;
        
            // If all checked manually then check check_all checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#check_all_articles").prop("checked", true);
            }
            else {
                $("#check_all_articles").prop("checked", false);
            }
        });
        
        $("#delete_selected_article").on("click", function (e) {
            e.preventDefault();
            var ids = '';
            var comma = '';
            $("input:checkbox[name='articles']:checked").each(function() {
                ids = ids + comma + this.value;
                comma = ',';
            });
            
            //console.log(ids);
            
            if(ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected article(s)?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: deleteArticleUrl,
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = articlesViewLocation;
                         }, 4000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $('#loaderBanner').hide();
                        $('#overlay').hide(); // Hide the overlay
                        $("#successMessage").html("<span style='background-color: red; color:black; padding:10px'>" + textStatus + " " + errorThrown + "</span>");
                    }
                });
            }
            } else {
                $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one Article row for deletion</span>');
            }
        });
        });
        // articles delete function end
    
    
    $(document).ready(function () {
        $('#addSliderBtn,#addServiceBtn,#editServiceBtn,#btnUpdateFeatures,#addCategory,#addTopUp,#sliderUpdateForm,#faqAddForm,#faqUpdateForm,#articleAdditionForm, #articleEditForm').click(function (e) {
            e.preventDefault();
            $('#overlay').show();
            $('#loaderBanner').show();
    
            setTimeout(function () {
                $('#loaderBanner').hide();
                $('#overlay').hide();
                $('.sliderAddForm, .serviceAddForm, .serviceUpdateForm, .updateFeatures, .categoryAddForm, .topUpsAddForm, .sliderUpdateForm, .faqAddForm, .faqUpdateForm, .articleAdditionForm, .articleEditForm').submit();
            }, 4000);
        });

        // admin clickble row
        $('tr[data-href]').each(function () {
            const $row = $(this);

            // Exclude the checkbox column from the click event
            $row.find('td:has(:checkbox)').click(function (e) {
                e.stopPropagation();
            });

            $row.css('cursor', 'pointer').click(function () {
                const href = $row.data('href');
                if (href) {
                    window.location.href = href;
                }
            });
        })

       
    });


    // multiStep form
    /**
 * Define a function to navigate betweens form steps.
 * It accepts one parameter. That is - step number.
 */
// const navigateToFormStep = (stepNumber) => {

//     /**
//      * Hide all form steps.
//      */
//     document.querySelectorAll(".form-step").forEach((formStepElement) => {
//         formStepElement.classList.add("d-none");
//     });

    /**
     * Mark all form steps as unfinished.
     */
//     document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
//         formStepHeader.classList.add("form-stepper-unfinished");
//         formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
//     });
//     /**
//      * Show the current form step (as passed to the function).
//      */
//     document.querySelector("#step-" + stepNumber).classList.remove("d-none");
//     /**
//      * Select the form step circle (progress bar).
//      */
//     const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
//     /**
//      * Mark the current form step as active.
//      */
//     formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
//     formStepCircle.classList.add("form-stepper-active");
//     /**
//      * Loop through each form step circles.
//      * This loop will continue up to the current step number.
//      * Example: If the current step is 3,
//      * then the loop will perform operations for step 1 and 2.
//      */
//     for (let index = 0; index < stepNumber; index++) {
//         /**
//          * Select the form step circle (progress bar).
//          */
//         const formStepCircle = document.querySelector('li[step="' + index + '"]');
//         /**
//          * Check if the element exist. If yes, then proceed.
//          */
//         if (formStepCircle) {
//             /**
//              * Mark the form step as completed.
//              */
//             formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
//             formStepCircle.classList.add("form-stepper-completed");
//         }
//     }
// };
// /**
//  * Select all form navigation buttons, and loop through them.
//  */
// document.querySelectorAll(".btn-navigate-form-step, .btn-navigate-form-step-back").forEach((formNavigationBtn) => {
//     formNavigationBtn.addEventListener("click", () => {
//         const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));

//         // Check if the current step contains any required fields that are empty.
//         const currentStepFields = document.querySelectorAll(`#step-${stepNumber} [data-required]`);
//         let isValidStep = true;

//         currentStepFields.forEach((field) => {
//             if (field.value.trim() === "") {
//                 isValidStep = false;
//                 field.classList.add("invalid-field");
//             } else {
//                 field.classList.remove("invalid-field");
//             }
//         });

//         // Only navigate if the current step is valid.
//         if (isValidStep) {
//             navigateToFormStep(stepNumber);
//         }
//     });
// });


(function ($) {
    "use strict";


     /*==================================================================
    [ Focus input ]*/
    $('.myInput').each(function(){
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
    var input = $('.validate_input .myInput');

    $('.profileUpdateForm,.faqAddForm,.AdminAddForm').on('submit',function(){
        
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.profileUpdateForm .myInput').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.AdminAddForm .myInput').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.faqAddForm .myInput').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate(input) {
        var type = $(input).attr('type');
        var name = $(input).attr('name');
        var value = $(input).val().trim();
    
        if (type === 'email') {
            // Email validation
            var emailPattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/;
            if (!emailPattern.test(value)) {
                return false;
            }else if(value === '') {
                return false;
            }
        } else if (type === 'text' || type === 'password') {

            if (value === '') {
                return false;
            }
        } else if (name === 'role') {

            if (value === '') {
                return false;
            }
        } else if (type === 'date') {

            if (value === '') {
                return false;
            }
         } else if (type === 'telephone') {
            var telephonePattern = /^254\d{9}$/;
            if (!telephonePattern.test(value)) {
                return false;
            }
        }else if (name === 'whatsApp') {
            var pattern = /^254\d{9}$/;
            if (value === '') {
                return true; // Blank input is allowed
            }else if (!pattern.test(value)) {
                return false; // Doesn't match the pattern
            }
        }
 
        //  else if (type === 'file') {
        //     // File validation (customize this to your needs)
        //     // Check if a file is selected
        //     if (!input.files.length) {
        //         return false;
        //     }
        // }
    
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
// validations


// Function to navigate to a specific step
const navigateToFormStep = (stepNumber) => {
    // Hide all form steps
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });

    // Show the current form step
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    // Update the active step in your progress bar
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.remove("form-stepper-active");
        formStepHeader.classList.remove("form-stepper-completed");
        if (formStepHeader.getAttribute("step") <= stepNumber) {
            formStepHeader.classList.add("form-stepper-completed");
        }
        if (formStepHeader.getAttribute("step") === stepNumber) {
            formStepHeader.classList.add("form-stepper-active");
        }
    });
};

// Add event listeners to all navigation buttons
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    formNavigationBtn.addEventListener("click", () => {
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));

        // Check if the current step contains any fields that require validation.
        const currentStepFields = document.querySelectorAll(`#step-${stepNumber} [data-valida]`);
        let isValidStep = true;

        currentStepFields.forEach((field) => {
            // You can implement custom validation logic for each field here
            // For example, check if the field meets specific criteria.
            if (field.value.trim() === "") {
                isValidStep = false;
                field.classList.add("invalid-field");
            } else {
                field.classList.remove("invalid-field");
            }
        });

        // Only navigate if the current step is valid.
        if (isValidStep) {
            navigateToFormStep(stepNumber);
        }
    });
});
