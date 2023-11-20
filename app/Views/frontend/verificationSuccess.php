<div class="wrapper">

<br>
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

                <div class="verificationSent text-capitalize col-sm-12" >
    <div class="sBox">

            <div class="list-icon">
                <svg class="svg-content" viewBox="0 0 512 512" id="svg-9c37" style="font-size: 50px; margin: -1.2em;"><path d="m433.1 67.1-231.8 231.9c-6.2 6.2-16.4 6.2-22.6 0l-99.8-99.8-78.9 78.8 150.5 150.5c10.5 10.5 24.6 16.3 39.4 16.3 14.8 0 29-5.9 39.4-16.3l282.7-282.5z" fill="#30ab0a"></path></svg>
            </div>
    
    <br>
    <br>
        <h4 Style="color:forestgreen; text-decoration:underline;" class="message">Congratulations! Verification Success</h4>
        <?php if (session()->getFlashdata('userEmail')): ?>
                <p class=" text-center"> The E-mail &nbsp;<span style="color: blue; text-decoration:underline"><?php echo session()->getFlashdata('userEmail') ?></span>  &nbsp; Has been verified </p>
        <?php endif; ?>
            <p>You are now a Modern artisan Network member. </p>
            <p>An email has been sent to you with more details, and also, the administrator has been notified about a new visitor, </p>
            <br>
            <h6> NOTE: &nbsp;<span style="color: blue;">The Email sent contains a link to your panel, please use your credentials to Login</span> </h6>
            <hr>
            <a href="<?php echo base_url(); ?>" class="btn btn-success">Thanks! Got It</a>
    </div>
</div>