

</div>  <!-- /. WRAPPER  -->
    <!-- Custom JS -->
    <script src="<?php echo base_url('backend/assets/js/myJs.js')?>"></script>
  <script src="<?php echo base_url('backend/tinymce/js/tinymce/tinymce.min.js') ?>"></script>

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
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
    selector: '#feature_desc2,#feature_desc1,#feature_desc3,#service_short_content,#service_main_content', // Change this to match your textarea's class or ID
    height: 300,
    plugins: 'link image code',
    toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
    menubar: false
});
 </script>
</body>
</html>
