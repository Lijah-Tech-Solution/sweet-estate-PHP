<?php
use Core\FH;
use Core\H;
?>
<?php $this->setSiteTitle('Update Paymentt'); ?>
<?php $this->start('body'); ?>
<div class="row align-items-center justify-content-center">
  <div class="col-md-6 bg-light p-3">
<form action="<?= $this->postAction ?>" method="POST" class="form">
    <?=FH::csrfInput(); ?>
    <?= FH::inputBlock('text','Enter New payment','home_phone',$this->contact->home_phone,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
    <div class="col-md-12 text-right">
        <a href="<?=PROOT?>contacts" class="btn btn-default">Cancel</a>
        <?= FH::submitTag('Update', ['class'=>'btn btn-primary']);?>
    </div>
</div>
</div>
<?php $this->end('body'); ?>