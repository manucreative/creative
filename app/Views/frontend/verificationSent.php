<div class="wrapper" id="regForm">

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

 <div class=" text-center text-capitalize col-sm-12" >
        <h1 Style="color:forestgreen" class="modal-title text-center">THANK YOU FOR YOUR CO-OPERATION KINDLY CHECK YOU EMAIL</h1>
        <?php if (session()->getFlashdata('userEmail')): ?>
                <h3 class=" text-center"> We have send an Email to &nbsp;<?php echo session()->getFlashdata('userEmail') ?> &nbsp; for Verification </h3>
                <?php endif; ?>
</div>