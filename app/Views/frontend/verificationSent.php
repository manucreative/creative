<div class="wrapper" id="regForm">

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
    <div class="vBox">
        <h4 Style="color:forestgreen" class="message">THANKS! PLEASE CHECK YOU E-MAIL</h4>
        <?php if (session()->getFlashdata('userEmail')): ?>
                <p class=" text-center"> We have send an Email to &nbsp;<span style="color: blue; text-decoration:underline"><?php echo session()->getFlashdata('userEmail') ?></span>  &nbsp; for Verification </p>
        <?php endif; ?>
            <p>You are required to access you provided Email account and click the link that has been sent to you. 
                Please keep in mind that the link will expire after some time. 
            </p>
            <h6> NOTE: &nbsp;<span style="color: red; text-decoration:underline;">You are required to complate this verification in order to access your account</span> </h6>
    </div>
</div>