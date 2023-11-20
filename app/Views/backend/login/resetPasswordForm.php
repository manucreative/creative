<br>

<div class="verificationSent text-capitalize col-sm-12" >
    <div class="vBox">
    <?php foreach ($errors as $error): ?>
            <div class="file error">
            <h6 style="background-color: red; color:black; padding:20px"><?= esc($error) ?></h6>
            </div>
            <?php endforeach ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class=" text-center alert alert-danger" id="flash-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
                <?php endif; ?>
            <?php if (session()->getFlashdata('success')): ?>
                <div class=" text-center alert alert-success" id="flash-message">
                    <?= session()->getFlashdata('success') ?>
                </div>
                <?php endif; ?>
        <h4 Style="color:Orange" class="message">Reset your Password</h4>
            <h6>Kindly Enter you new Password</h6>
            <hr>
            <?= form_open(base_url('creative/admin/updatePassword/index/key'), ['class'=> 'login100-form validate-form', 'id' => 'adminLoginForm'])?>
     <div class="wrap-input100 validate-input m-b-23" data-validate = "We need strong Password, (at least 8 characters, should have a capital letter and a number)">
            <span class="label-input100">Enter A New Strong Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="password" id="password" value="<?= old('password') ?>" placeholder="Type your password">
            <input type="hidden" name="token" id="token" value="<?php echo $token; ?>">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>

      <div class="wrap-input100 validate-input m-b-23" data-validate = "Looks like your Password Do not Marge Please Check">
            <span class="label-input100">Kindly Re-enter The New Password &nbsp; <span style="color:red">*</span></span>
            <input class="input100" type="password" name="re_enterPass" id="re_enterPass" value="<?= old('re_enterPass') ?>" placeholder="Re-type your Password">
            <span class="focus-input100" data-symbol="&#xf190;"></span>
	  </div>

      <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Reset Password Now
							</button>
						</div>
					</div>
    <?= form_close() ?>
    <hr>
            <h6><span style="color: red; text-decoration:underline;">Thank you for you cooperation we are here to serve you</span> </h6>
    </div>
</div>