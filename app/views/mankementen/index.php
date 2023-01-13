<?php require(APPROOT . '/views/includes/header.php'); ?>
<h2><?= $data['title']; ?></h2>

<h4><?= 'Instructeur naam: ' .  $data['naam'] ?></h4>
<h4><?= 'Email: ' .  $data['email'] ?></h4>
<h4><?= 'Kenteken auto: ' .  $data['kenteken'] ?></h4>


<table border='1'>
    <thead>
        <th>Datum</th>
        <th>Mankement</th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>

<br>
<a href="<?= URLROOT; ?>/mankementen/create/<?= $data['autoid']; ?>">
<div class="button">
    <input type="button" value="Mankement toevoegen">
</a>
</div>

<?php require(APPROOT . '/views/includes/footer.php'); ?>