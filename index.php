<?php
include 'db/db.php';
$bdd = $pdo->query("SELECT id, titre,contenu, DATE_FORMAT(date_creation, '%d/%m/%Y à %Hh%imin%ss') AS date FROM billets ORDER BY id DESC");
$bdd->execute();
$blog = $bdd->fetchAll();
?>
<pre>
    <?php print_r($blog); ?>
</pre>
<?php include 'partials/header.php'; ?>
<h1>Mon super blog</h1>
<?php foreach($blog as $content): ?>
<ul class="list-group mt-5">
    <li class="list-group-item"><?= $content->titre; ?></li>
    <li class="list-group-item"><?= $content->contenu; ?></li>
    <li class="list-group-item">Poster le <?= $content->date; ?></li>
    <li class="list-group-item"><a href="comments.php?id=<?= $content->id; ?>">Commentaires</a></li>
</ul>
<?php endforeach; ?>


