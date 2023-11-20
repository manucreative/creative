

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
        <h4 Style="color:green" class="message">Great we have send you and Email to reset</h4>
<br>
            <h6>Open you Email and click the link please</h6>
            <hr>
    <a href="<?php echo base_url(); ?>">
      <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Thank! Got it
							</button>
						</div>
					</div>
    </a>
<hr>
            <h6><span style="color: red; text-decoration:underline;">Thank you for you cooperation we are here to serve you</span> </h6>
    </div>
</div>
