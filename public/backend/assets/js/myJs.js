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
                if (currentUrl.indexOf("/creative/dashboard") !== -1) {
                    document.getElementById("dashboard-link").classList.add("myNav");
                } else if (currentUrl.indexOf("/creative/viewServices") !== -1) {
                    document.getElementById("viewService").classList.add("myNav");
                }else if (currentUrl.indexOf("/creative/addServiceForm") !== -1) {
                    document.getElementById("viewService").classList.add("myNav");
                } else if (currentUrl.indexOf("/creative/viewSliders") !== -1) {
                    document.getElementById("viewSliders").classList.add("myNav");
                }else if (currentUrl.indexOf("/creative/addSliderContent") !== -1) {
                    document.getElementById("viewSliders").classList.add("myNav");
                }else if (currentUrl.indexOf("/creative/configurations") !== -1) {
                    document.getElementById("viewConfigs").classList.add("myNav");
                }
                else if (currentUrl.indexOf("/creative/configurations") !== 1) {
                    document.getElementById("#moreControls").classList.add("myNav");
                }

                $("#moreControls").click(function() { 
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
                    url: "deleteServices",
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = "viewServices";
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
                    url: "deleteSliders",
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = "viewSliders";
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
    
    // category delete function Start
    $(function(){
    //If check_all checked then check all table rows
    $("#check_all_cats").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='categories']").prop("checked", true);
        } else {
            $("input:checkbox[name='categories']").prop("checked", false);
        }
    });
    
    // Check each table row checkbox for categories
    $("input:checkbox[name='categories']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='categories']").length;
        var total_checked_boxes = $("input:checkbox[name='categories']:checked").length;
    
        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
            $("#check_all_cats").prop("checked", true);
        }
        else {
            $("#check_all_cats").prop("checked", false);
        }
    });
    
    $("#delete_selected_cats").on("click", function (e) {
        e.preventDefault();
        var ids = '';
        var comma = '';
        $("input:checkbox[name='categories']:checked").each(function() {
            ids = ids + comma + this.value;
            comma = ',';
        });
        
        //console.log(ids);
        
        if(ids.length > 0) {
            if (confirm("Are you sure you want to delete the selected categories?")) {
            $('#overlay').show();
            $('#loaderBanner').show();
            $.ajax({
                type: "POST",
                url: "deleteCats",
                data: {'ids': ids},
                dataType: "html",
                cache: false,
                success: function(success_message) {
                    $('#successMessage').html(success_message);
                     window.setTimeout(function(){
                        $('#loaderBanner').hide();
                       $('#overlay').hide();
                       window.location.href = "viewCategories";
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
            $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one category row for deletion</span>');
        }
    });
    });
    
    // Category delete function end
    
    // TopUps delete function Start
    $(function(){
    //If check_all checked then check all table rows
    $("#check_all_topUps").on("click", function () {
        if ($("input:checkbox").prop("checked")) {
            $("input:checkbox[name='topUps']").prop("checked", true);
        } else {
            $("input:checkbox[name='topUps']").prop("checked", false);
        }
    });
    
    // Check each table row checkbox for products
    $("input:checkbox[name='topUps']").on("change", function () {
        var total_check_boxes = $("input:checkbox[name='topUps']").length;
        var total_checked_boxes = $("input:checkbox[name='topUps']:checked").length;
    
        // If all checked manually then check check_all checkbox
        if (total_check_boxes === total_checked_boxes) {
            $("#check_all_topUps").prop("checked", true);
        }
        else {
            $("#check_all_topUps").prop("checked", false);
        }
    });
    
    $("#delete_selected_topUps").on("click", function (e) {
        e.preventDefault();
        var ids = '';
        var comma = '';
        $("input:checkbox[name='topUps']:checked").each(function() {
            ids = ids + comma + this.value;
            comma = ',';
        });
        
        //console.log(ids);
        
        if(ids.length > 0) {
            if (confirm("Are you sure you want to delete the selected topUps?")) {
            $('#overlay').show();
            $('#loaderBanner').show();
            $.ajax({
                type: "POST",
                url: "deleteTopUps",
                data: {'ids': ids},
                dataType: "html",
                cache: false,
                success: function(success_message) {
                    $('#successMessage').html(success_message);
                     window.setTimeout(function(){
                        $('#loaderBanner').hide();
                       $('#overlay').hide();
                       window.location.href = "viewTopUps";
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
            $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one topUp row for deletion</span>');
        }
    });
    });
    // topUps delete function end
    
    
    // admin delete function Start
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
                if (confirm("Are you sure you want to delete the selected admin(s)?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: "deleteAdmins",
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = "viewAdmins";
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
        // admin delete function end
    
    
    $(document).ready(function () {
        // ,#editTopUpsBtn,#editCat,#addAdminBtn
        $('#addSliderBtn,#addServiceBtn,#editServiceBtn,#btnUpdateFeatures,#addCategory,#addTopUp,#sliderUpdateForm').click(function (e) {
            // Prevent the form from submitting immediately
            e.preventDefault();
            $('#overlay').show();
            // Show the loading gif
            $('#loaderBanner').show();
    
            setTimeout(function () {
                // Hide the loading gif
                $('#loaderBanner').hide();
                $('#overlay').hide();
                // Submit the form
                // , .topUpsEditForm, .categoriesEditForm, .AdminAddForm'
                $('.sliderAddForm, .serviceAddForm, .serviceUpdateForm, .updateFeatures, .categoryAddForm, .topUpsAddForm, .sliderUpdateForm').submit();
            }, 4000);
        });
    });


    // multiStep form
    /**
 * Define a function to navigate betweens form steps.
 * It accepts one parameter. That is - step number.
 */
const navigateToFormStep = (stepNumber) => {
    /**
     * Hide all form steps.
     */
    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });
    /**
     * Mark all form steps as unfinished.
     */
    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });
    /**
     * Show the current form step (as passed to the function).
     */
    document.querySelector("#step-" + stepNumber).classList.remove("d-none");
    /**
     * Select the form step circle (progress bar).
     */
    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
    /**
     * Mark the current form step as active.
     */
    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");
    /**
     * Loop through each form step circles.
     * This loop will continue up to the current step number.
     * Example: If the current step is 3,
     * then the loop will perform operations for step 1 and 2.
     */
    for (let index = 0; index < stepNumber; index++) {
        /**
         * Select the form step circle (progress bar).
         */
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        /**
         * Check if the element exist. If yes, then proceed.
         */
        if (formStepCircle) {
            /**
             * Mark the form step as completed.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};
/**
 * Select all form navigation buttons, and loop through them.
 */
document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
    /**
     * Add a click event listener to the button.
     */
    formNavigationBtn.addEventListener("click", () => {
        /**
         * Get the value of the step.
         */
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        /**
         * Call the function to navigate to the target form step.
         */
        navigateToFormStep(stepNumber);
    });
});

    
    