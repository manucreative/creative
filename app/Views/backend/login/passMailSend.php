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
        <h4 Style="color:green" class="message">Great we have send you and Email to reset</h4>
<br>
            <h6>Open you Email and click the link please</h6>
            <hr>

      <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="submit" class="login100-form-btn">
								Thank! Got it
							</button>
						</div>
					</div>

            <h6><span style="color: red; text-decoration:underline;">Thank you for you cooperation we are here to serve you</span> </h6>
    </div>
</div>
