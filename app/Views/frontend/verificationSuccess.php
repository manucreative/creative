<div class="wrapper">

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

                <br>
                <hr>
 <div class=" text-center text-capitalize col-sm-12" >
        <h1 Style="color:orange" class="modal-title text-center">Verification Success</h1>
        <?php if (session()->getFlashdata('userEmail')): ?>
                <h5 class=" text-center"> <?php echo session()->getFlashdata('userEmail') ?> &nbsp; Has been verified, Thank you </h5>
                <?php endif; ?>
</div>