<h3><?= $data['title'] ?></h3>
<p><a href="<?= URLROOT ?>/mankementen/create">Mankement Toevoegen</a></p>
<table>
    <thead>
        <th>Naam Instructeur</th>
        <th>E-mailadres</th>
        <th>Kenteken auto</th>
        <th>Datum</th>
        <th>Mankement</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<p><a href="<?= URLROOT; ?>/landingpages/index">Terug naar Overzicht Mankementen</a></p>