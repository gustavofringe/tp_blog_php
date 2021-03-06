<?php
include 'db/db.php';
$id = $_GET['id'];
$db = $pdo->prepare("SELECT id, titre,contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date FROM billets WHERE id=?");
$bdd = $pdo->prepare("SELECT id, id_billet,auteur, commentaire, DATE_FORMAT(date_commentaire, '%d/%m/%Y à %Hh%imin%ss') AS date_commentaire FROM commentaires WHERE id_billet=?");
$db->execute([$id]);
$bdd->execute([$id]);
$blog = $db->fetch();
$comments = $bdd->fetchAll();
?>
<?php include 'partials/header.php'; ?>
<h1><?= $blog->titre; ?></h1>
<p><?= $blog->contenu; ?></p>
<p><?= $blog->date; ?></p>
<?php foreach ($comments as $item):?>
<h2><?= $item->auteur; ?></h2>
    <p><?= $item->commentaire; ?></p>
    <p><?= $item->date_commentaire; ?></p>
<?php endforeach;?>
<a href="/">Revenir</a>
<h3>Ajouter un commentaire</h3>
<form action="new_comment.php" method="post">
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>
    <div class="form-group">
        <label for="autor">Auteur</label>
        <input type="text" class="form-control" id="autor" name="autor">
    </div>
    <input type="hidden" name="id" value="<?=$blog->id;?>">
    <button class="btn btn-primary">Send</button>
</form>
<?php include 'partials/footer.php'; ?>
