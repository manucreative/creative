<br>
<?php if (session()->has('error')): ?>
                <div class="alert alert-danger">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->has('success')): ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
<br>
<div class="verificationSent text-capitalize col-sm-12" >
    <div class="vBox">
        <h4 Style="color:Orange" class="message">Oops!! We are sorry for the password loss</h4>
        
            <p>We are deeply sorry to learn that you lost the Password, we have got your back. Please kindly next time be more careful and protect your staff</p>
            <h6>Enter your valid Email address bellow and press send button</h6>
            <hr>
            <?= form_open(base_url('creative/admin/userMailSend/index/key'), ['class'=> 'login100-form validate-form', 'id' => 'adminLoginForm'])?>
            <div class="wrap-input100 validate-input m-b-23" data-validate = "Make sure it is not null, and email is well structured">
            <span class=" text-left label-input100">Type your Email Address &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="my_email" name="email_address" id="email_address" value="<?= old('email_address') ?>" placeholder="Type your email address">
            <span class="focus-input100" data-symbol="&#9993;"></span>
	  </div>

      <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Get Recover Link
							</button>
						</div>
					</div>

    <?= form_close() ?>
            <h6><span style="color: red; text-decoration:underline;">Thank you for you cooperation we are her to serve you</span> </h6>
    </div>
</div>
