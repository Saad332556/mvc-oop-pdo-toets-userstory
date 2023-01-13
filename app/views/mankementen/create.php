<?php require(APPROOT . '/views/includes/header.php');?>
<h2><?= $data['title']; ?></h2>

<h4><?=  $data['kenteken']; ?></h4>

<form action="<?= URLROOT; ?>/mankementen/create" method="post">
    <table>
        <tbody>
            <tr>
                <td for="Mankement" style="padding-bottom: 4.5rem">Mankement:</td>
                <td><input type="text" name="mankement" id="mankement" style="height: 5rem; width: 15rem"></td>
            </tr>

            <div class="MankementError"><?= $data['MankementError'];?></div>
            <input type="hidden" name="autoid" value="<?= $data['autoid'];?>">

            <tr>
                <td><input type="submit" value="Voer In"></td>
            </tr>
        </tbody>
    </table>
</form>

<?php require(APPROOT . '/views/includes/footer.php');?>