<?php
session_start();

// Fonction pour vérifier si une tuile est cachée
function isTileHidden($tile) {
    return isset($_SESSION["hidden_tiles"][$tile]);
}

// Si le formulaire est soumis, mettez à jour les tuiles cachées dans la session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tile"])) {
        $tile = $_POST["tile"];
        $_SESSION["hidden_tiles"][$tile] = true;
    }
}

// Récupérer les tuiles cachées de la session, s'il y en a
$hidden_tiles = isset($_SESSION["hidden_tiles"]) ? $_SESSION["hidden_tiles"] : [];

// Générer les tuiles
$tiles = range(1, 32); 
shuffle($tiles); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jeux</title>
</head>

<style>
body {
    margin:0;
    background-image: url("bg.png");
}
.container {
    padding: 1px;
    margin-top: 60px;
    margin-left: auto;
    margin-right: auto;
    width: 672px;
    height: 480px;
    background-color:  rgba(200,200,200,0.6);
    -webkit-box-shadow: 2px 2px 73px -4px rgba(0,0,0,0.75);
    -moz-box-shadow: 2px 2px 73px -4px rgba(0,0,0,0.75);
    box-shadow: 2px 2px 73px -4px rgba(0,0,0,0.75); 
}
.container div {
    cursor: pointer;
    float:left;
    width:80px;
    height: 116px;
    border-color: #ccc; 
    border-style: solid;
    border-width: 2px;
}
.container div:hover {
    opacity: 0.60;
}
.hidden {
    display: none;
}
</style>

<body>

<div class="container">
    <?php foreach ($tiles as $tile): ?>
    <div class="<?= isset($hidden_tiles[$tile]) ? 'hidden' : ''; ?>" onclick="hideTile(this);">
        <form id="form_<?php echo $tile; ?>" method="post">
            <input type="hidden" name="tile" value="<?php echo $tile; ?>">
            <img src="./img/<?php echo $tile; ?>.webp" width="80">
        </form>
    </div>
    <?php endforeach; ?>
</div>

<script>
function hideTile(tile) {
    var form = tile.getElementsByTagName('form')[0];
    form.submit();
}
</script>

</body>
</html>
