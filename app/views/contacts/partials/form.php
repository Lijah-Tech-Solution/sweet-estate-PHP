<?php
use Core\FH;
?>
<form action="<?= $this->postAction ?>" method="POST" class="form">
    <?=FH::displayErrors($this->displayErrors)?>
    <?=FH::csrfInput(); ?>
    <?= FH::inputBlock('text','First Name','fname',$this->contact->fname,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6']);?>
    <?= FH::inputBlock('text','Last Name','lname',$this->contact->lname,['class'=>'form-control input-sm'],['class'=>'form-group col-md-6']);?>
    <?= FH::inputBlock('text','Address','address',$this->contact->address,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
    <?= FH::inputBlock('text','City','city',$this->contact->city,['class'=>'form-control'],['class'=>'form-group col-md-5']);?>
    <?= FH::inputBlock('text','Email','email',$this->contact->email,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
    <?= FH::inputBlock('text','Total cost','home_phone',$this->contact->home_phone,['class'=>'form-control'],['class'=>'form-group col-md-6']);?>
    <div class="col-md-12 text-right">
        <a href="<?=PROOT?>contacts" class="btn btn-default">Cancel</a>
        <?= FH::submitTag('Save', ['class'=>'btn btn-primary']);?>
    </div>
</form>