<br>
 <div id="page-wrapper" >
            <div id="page-inner">
<?php foreach ($errors as $error): ?>
  <div class="file error">
  <h6 style="background-color: red; color:black; padding:20px"><?= esc($error) ?></h6>
  </div>
<?php endforeach ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" id="flash-message">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success" id="flash-message">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>
    
                <!-- <div class="row">
                    <div class="col-md-4">
                     <h2>Creative Dashboard</h2>   
                        <h5>Welcome Emmanuel, Good to see you back. </h5>
                    </div>
                </div>   -->
                <div class="row">
      <div class="col-sm-3">
      <div class="">
        <h3 class="modal-t" id="exampleModalLabel">Update FAQs: All fields marked with <span style="color: red;">*</span> is required</h3>
      </div>
      </div>
      <div class="col-sm-9">
      <div class="modal-footer">
        <a href="#"><button id="myFaqs" data-action="myFaqs" class="btn btn-success">View All FAQs</button></a>
        </div>
      </div>

    </div>


<?= form_open(base_url('creative/updateFaq'), ['class'=> 'faqUpdateForm'])?>

      <div class="modal-body">

      <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="faq_question" class="col-sm-3 col-form-label" style="text-align: end;">Existing question  <span style="color: red;">*</span></label>
            <div class="col-sm-5  validate_input "data-validate = "This field is required">
                <input type="text" id="faq_question" name="faq_question" value="<?= $faq['faq_question'] ?>" placeholder="" class="form-control myInput">
                <input type="hidden" id="faq_id" name="faq_id" value="<?= $faq['faq_id'] ?>">
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
        <div class="col-sm-1"></div>
            <label for="faq_answer" class="col-sm-3 col-form-label" style="text-align: end;"> Existing answer  <span style="color: red;">*</span></label>
            <div class="col-sm-5  validate_input "data-validate = "This field is required">
                <textarea type="text" id="faq_answer" name="faq_answer"  placeholder="" class="form-control myInput"><?= $faq['faq_answer'] ?></textarea>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>


      </div>
      <div class="modal-footer">
        <button type="submit" value=""style="width: 100%; font-weight:700" id="faqUpdateForm" name="faqUpdateForm" class="btn btn-success btn-lg"><i class="fa fa-edit"></i>&nbsp;UPDATE THE FAQ NOW</button>
      </div>
  <?= form_close() ?>
      
</div>
</div>