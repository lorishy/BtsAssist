<?php require_once "Entete.php";

$idUtilisateur = $_SESSION["id_utilisateur"];
$idArticle = $_GET["id"];
$Article = new Article($idArticle);
$idUtilisateurArticle = $Article->getIdUtilisateur();

if(isset($_GET['id']) && !empty($_GET['id']) && $idUtilisateur == $idUtilisateurArticle->getIdUtilisateur()) { ?>
<section class="section section-bg larger-padding-top">
    <div class="section-header">
        <h2 class="titreAcceuil">Editier</h2>
        <span class="section-separator"></span>
        <p class="titreAcceuil">Modification de votre article</p>
    </div> 
<div class="container container-small">
<?php if(isset($_GET["succes"]) && $_GET["succes"] == "1") {
    echo "<div class='text-success'>La modification a bien été effectuée</div>";}?>
<?php if(isset($_GET["error"]) && $_GET["error"] == "image") {
    echo "<div class='text-danger'>Erreur lors de l'insertion de l'image</div>";}?>
<?php if(isset($_GET["error"]) && $_GET["error"] == "extension") {
    echo "<div class='text-danger'>L'image n'est pas au bon format</div>";}?>
<?php if(isset($_GET["error"]) && $_GET["error"] == "vide") {
    echo "<div class='text-danger'>Veuillez remplir au moins un champ</div>";}?>

    <form class="mt-4" method="POST" action="../Traitements/EditArticle.php?id=<?=$idArticle?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Titre :</label>
            <input type="text" class="form-control" name="titre" placeholder="<?=$Article->getTitreArticle()?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Contenu :</label>
            <textarea class="form-control" name="contenu" placeholder="<?=$Article->getContenuArticle()?>" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image :</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div>
            <div class="text-center">
                <button class="btn div-btn-base" type="submit" name="save">Sauvegarder les modifications</button>
            </div>
        </div>
    </form>
</div>
</section>
<?php }  else {
    header("location:/Index.php");
}

require_once "Pied.php"?>