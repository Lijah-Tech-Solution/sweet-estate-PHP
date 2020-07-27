<?php $this->start('body'); ?>
    <h2 class="text-center">My Contacts</h2>
    <table class="table table-stripped table-condensed table-bordered table-hover">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Outstanding Payment</th>
            <th> Action</th>
        </thead>
        <tbody>
            <?php foreach($this->contacts as $contact): ?>
                <tr>
                    <td>
                        <a href="<?= PROOT ?>contacts/details/<?=$contact->id ?>">
                            <?= $contact->displayName(); ?></td>
                        </a>
                    <td><?= $contact->email ?></td>
                    <td>₦ <?= $contact->home_phone ?></td>
                    <td>
                        <a href="<?=PROOT?>contacts/update/<?=$contact->id?>"class="btn btn-xs btn-info">
                            <i class="glyphicon glyphicon-pencil"></i> Update payment
                        </a>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php $this->end('body'); ?>



