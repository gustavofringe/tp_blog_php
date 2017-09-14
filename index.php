<?php
include 'db/db.php';
$bdd = $pdo->query("SELECT titre,contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date FROM billets");
$bdd->execute();
$blog = $bdd->fetchAll();
?>
<?php include 'partials/header.php'; ?>
<h1>Mon super blog</h1>
<?php foreach($blog as $content): ?>
<ul class="list-group mt-5">
    <li class="list-group-item"><?= $content['titre']; ?></li>
    <li class="list-group-item"><?= $content['contenu']; ?></li>
    <li class="list-group-item">Poster le <?= $content['date']; ?></li>
    <li class="list-group-item"><a href="comments.php?title=<?= $content['titre']; ?>">Commentaires</a></li>
</ul>
<?php endforeach; ?>


