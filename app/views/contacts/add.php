<?php $this->setSiteTitle('Add new customer') ?>

<?php $this->start('body'); ?>

<div class="row align-items-center justify-content-center">
  <div class="col-md-6 bg-light p-3">
        <h2 class="text-center">Add New Customer</h2>
        <hr>
        <?php $this->partial('contacts', 'form'); ?>
    </div>
</div>
<?php $this->end('body'); ?>