<?php
include 'db/db.php';
$content = $_POST['content'];
$autor = $_POST['autor'];
$id = $_POST['id'];
if (!empty($content) || preg_match('/^[a-zA-Z0-9_]+$/', $content)) {
    if (!empty($autor) || preg_match('/^[a-zA-Z0-9_]+$/', $autor)) {
        $db = $pdo->prepare("INSERT INTO commentaires SET id_billet = ?, auteur = ?, commentaire = ?, date_commentaire = NOW()");
        $db->execute([$id, $autor, $content]);
        header('Location: index.php');
        die();
    }
}

