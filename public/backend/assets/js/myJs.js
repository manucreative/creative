    $(document).ready(function() {
        // Select the flash message container
        var flashMessage = $('#flash-message');

        // Check if the flash message is present
        if (flashMessage.length) {
            setTimeout(function() {
                flashMessage.addClass('fade-out');
            }, 3000); // 3000 milliseconds = 3 seconds
        }
    });

    $(function() {
        //If check_all checked then check all table rows
        $("#check_all").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='banners']").prop("checked", true);
            } else {
                $("input:checkbox[name='banners']").prop("checked", false);
            }
        });
    
        // Check each table row checkbox
        $("input:checkbox[name='banners']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='banners']").length;
            var total_checked_boxes = $("input:checkbox[name='banners']:checked").length;
    
            // If all checked manually then check check_all checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#check_all").prop("checked", true);
            }
            else {
                $("#check_all").prop("checked", false);
            }
        });
        
        $("#delete_selected").on("click", function () {
            var ids = '';
            var comma = '';
            $("input:checkbox[name='banners']:checked").each(function() {
                ids = ids + comma + this.value;
                comma = ',';
            });
            
            //console.log(ids);
            
            if(ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected banners?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: "deleteBanners",
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = "view_banners";
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
                $("#successMessage").html('<span style="background-color: red; color:black; padding:10px">You must select at least one banner row for deletion</span>');
            }
        });
    });
    
    
    // Products Delete function start
    $(function(){
        //If check_all checked then check all table rows
        $("#check_all_products").on("click", function () {
            if ($("input:checkbox").prop("checked")) {
                $("input:checkbox[name='products']").prop("checked", true);
            } else {
                $("input:checkbox[name='products']").prop("checked", false);
            }
        });
    
        // Check each table row checkbox for products
        $("input:checkbox[name='products']").on("change", function () {
            var total_check_boxes = $("input:checkbox[name='products']").length;
            var total_checked_boxes = $("input:checkbox[name='products']:checked").length;
    
            // If all checked manually then check check_all checkbox
            if (total_check_boxes === total_checked_boxes) {
                $("#check_all_products").prop("checked", true);
            }
            else {
                $("#check_all_products").prop("checked", false);
            }
        });
    
        $("#delete_selected_products").on("click", function (e) {
            e.preventDefault();
            var ids = '';
            var comma = '';
            $("input:checkbox[name='products']:checked").each(function() {
                ids = ids + comma + this.value;
                comma = ',';
            });
            
            //console.log(ids);
            
            if(ids.length > 0) {
                if (confirm("Are you sure you want to delete the selected Products?")) {
                $('#overlay').show();
                $('#loaderBanner').show();
                $.ajax({
                    type: "POST",
                    url: "deleteProducts",
                    data: {'ids': ids},
                    dataType: "html",
                    cache: false,
                    success: function(success_message) {
                        $('#successMessage').html(success_message);
                         window.setTimeout(function(){
                            $('#loaderBanner').hide();
                           $('#overlay').hide();
                           window.location.href = "view_products";
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
    // product delete function end
    
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
        $('#addSliderBtn,#addServiceBtn,#editServiceBtn,#btnUpdateFeatures,#addCategory,#addTopUp').click(function (e) {
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
                $('.sliderAddForm, .serviceAddForm, .serviceUpdateForm, .updateFeatures, .categoryAddForm, .topUpsAddForm').submit();
            }, 4000);
        });
    });


    // All buttons Configurations
    $(document).ready(function () {
        $('#addTopUpsBtn,#viewTopsBtn,#btnViewCats,#btnAddCats,#btnAddAdmin,#btnViewAdmins,#btnAddProducts,#btnViewProducts,#btnBanner').click(function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            $('#overlay').show();
            // Show the loading gif
            $('#loaderBanner').show();
    
            setTimeout(function () {
                // Hide the loading gif
                $('#loaderBanner').hide();
                $('#overlay').hide();
    
                switch(action){
                 case 'addTopUps':
                window.location.href = "viewTopUps";
                    break;
                case 'viewTopUps':
                    window.location.href = "addTopUps";
                    break;
                case 'viewCats':
                    window.location.href = "addCategories";
                    break;
                case 'addCats':
                    window.location.href = "viewCategories";
                    break;
                case 'addAdmin':
                    window.location.href = "addAdminForm";
                    break;
                case 'viewAdmin':
                    window.location.href = "viewAdmins";
                    break;
                case 'addProduct':
                    window.location.href = "product_addition_page";
                    break;
                case 'viewProduct':
                    window.location.href = "view_products";
                    break;
                case 'viewProd':
                    window.location.href = "../view_products";
                    break;
                case 'addBanner':
                    window.location.href = "addBanners";
                    break;
                case 'editBanner':
                    window.location.href = "../view_banners";
                    break;
                case 'viewBanner':
                    window.location.href = "view_banners";
                    break;
                }
            }, 1500);
        });
    
        // for admin header dropdowns
        var dropdown = $('.dropdown-menu');
    
        $('.admin_names').click(function () {
          dropdown.fadeToggle('fast'); // Toggle with fade effect
        });
    
        // Close the dropdown when clicking outside of it
        $(document).click(function (event) {
          if (!$(event.target).closest('.dropdown').length) {
            dropdown.fadeOut('fast'); // Hide with fade effect
          }
        });
    });
    