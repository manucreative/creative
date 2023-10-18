

</div>  <!-- /. WRAPPER  -->
<script>
      // All buttons Configurations
    $(document).ready(function () {
        $('#viewService,#btnAddService,#btnAddSlider,#viewConfigs,#viewSliders,#myProfile,#allUsers,#myFaqs,#addFaqs,#btnBanner,#viewMyServices,#addAdmin').click(function (e) {
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
                 case 'viewService':
                window.location.href = "<?php echo base_url('creative/admin/viewServices/index/key/'.$session_key);?>";
                    break;
                case 'btnAddService':
                    window.location.href = "<?php echo base_url('creative/admin/addServiceForm/index/key/'.$session_key);?>";
                    break;
                case 'btnAddSlider':
                    window.location.href = "<?php echo base_url('creative/admin/addSliderContent/index/key/'.$session_key);?>";
                    break;
                case 'viewConfigs':
                    window.location.href = "<?php echo base_url('creative/admin/configurations/index/key/'.$session_key);?>";
                    break;
                case 'viewSliders':
                    window.location.href = "<?php echo base_url('creative/admin/viewSliders/index/key/'.$session_key);?>";
                    break;
                case 'myProfile':
                    window.location.href = "<?php echo base_url('creative/admin/profileUpdateForm/index/key/'.$session_key.'/'.$token);?>";
                    break;
                case 'myFaqs':
                    window.location.href = "<?php echo base_url('creative/admin/viewFaqs/index/key/'.$session_key);?>";
                    break;
                case 'addFaqs':
                    window.location.href = "<?php echo base_url('creative/admin/addFaqs/index/key/'.$session_key);?>";
                    break;
                case 'viewMyServices':
                    window.location.href = "<?php echo base_url('creative/admin/viewOwnerService/index/key/'.$session_key);?>";
                    break;
                case 'allUsers':
                    window.location.href = "<?php echo base_url('creative/admin/viewAllUsers/index/key/'.$session_key);?>";
                    break;
                case 'addAdmin':
                    window.location.href = "<?php echo base_url('creative/admin/addAdminForm/index/key/'.$session_key);?>";
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
    </script>
    <script>
            var dashboardUrl = "<?php echo base_url('creative/admin/dashboard/index/key/'.$session_key);?>"
            var viewServicesUrl = "<?php echo base_url('creative/admin/viewServices/index/key/'.$session_key)?>";
            var viewFaqsUrl = "<?php echo base_url('creative/admin/viewFaqs/index/key/'.$session_key);?>"
            var addServiceFormUrl = "<?php echo base_url('creative/admin/addServiceForm/index/key/'.$session_key);?>"
            var addSliderUrl = "<?php echo base_url('creative/admin/addSliderContent/index/key/'.$session_key);?>"
            var configUrl = "<?php echo base_url('creative/admin/configurations/index/key/'.$session_key)?>";
            var addFaqsUrl = "<?php echo base_url('creative/admin/addFaqs/index/key/'.$session_key)?>";
        //service Scripts
            var serviceDeleteUrl = "<?php echo base_url('creative/admin/deleteServices/index/key/'.$session_key); ?>";
            var serviceLocation = "<?php echo base_url('creative/admin/viewServices/index/key/'.$session_key);?>"
        //slider scripts
            var sliderDeleteUrl = "<?php echo base_url('creative/admin/deleteSliders/index/key/'.$session_key); ?>";
            var sliderViewLocation = "<?php echo base_url('creative/admin/viewSliders/index/key/'.$session_key);?>"
        //slider scripts
            var faqDeleteUrl = "<?php echo base_url('creative/admin/deleteFaqs/index/key/'.$session_key); ?>";
            var gaqViewLocation = "<?php echo base_url('creative/admin/viewFaqs/index/key/'.$session_key);?>"
            var adminDeleteUrl = "<?php echo base_url('creative/admin/deleteAdmins/index/key/'.$session_key);?>"
    </script>


    <!-- Custom JS -->
    <script src="<?php echo base_url('backend/assets/js/myJs.js')?>"></script>
  <script src="<?php echo base_url('backend/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
  

  <script src="<?php echo base_url('backend/assets/js/dataTables/datatables.net/jquery.dataTables.js')?>"></script>
   <script src="<?php echo base_url('backend/assets/js/dataTables/datatables.net-bs4/dataTables.bootstrap4.js')?>"></script>
   <script src="<?php  echo base_url('backend/assets/js/dataTables/data-table.js')?>"></script>


    <script src="<?php echo base_url('backend/assets/js/jquery-1.10.2.js');?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('backend/assets/js/bootstrap.min.js');?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('backend/assets/js/jquery.metisMenu.js');?>"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo base_url('backend/assets/js/morris/raphael-2.1.0.min.js');?>"></script>
    <script src="<?php echo base_url('backend/assets/js/morris/morris.js');?>"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('backend/assets/js/custom.js');?>"></script>
    
   

    <script>
tinymce.init({
    selector: '#feature_desc2,#feature_desc1,#feature_desc3,#service_short_content,#service_main_content,#short_desc_slider,#education_details,#faq_answer', // Change this to match your textarea's class or ID
    height: 300,
    plugins: 'link image code',
    toolbar: 'undo redo | formatselect | bold italic underline strikethrough | fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | table | code',
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    menubar: true,
    skin_url: '<?php echo base_url('frontend/tinymce/js/tinymce/skins/ui/tinymce-5-dark');?>',
});
 </script>
</body>
</html>
