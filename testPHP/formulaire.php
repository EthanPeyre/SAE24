<?php
/* Accès à la base */
include("mysql.php");

$success = "";
$errors  = [];
$nom     = "";
$prenom  = "";
$mail    = "";
$num     = "";
$message = "";

/* formulaire de champ obligatoire */
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom     = trim(isset($_POST["nom"])     ? $_POST["nom"]     : "");
    $prenom  = trim(isset($_POST["prenom"])  ? $_POST["prenom"]  : "");
    $mail    = trim(isset($_POST["mail"])    ? $_POST["mail"]    : "");
    $num     = trim(isset($_POST["num"])     ? $_POST["num"]     : "");
    $message = trim(isset($_POST["message"]) ? $_POST["message"] : "");

/* message si erreur */
    if (empty($nom))    $errors[] = "Le nom est requis.";
    if (empty($prenom)) $errors[] = "Le prénom est requis.";
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL))
        $errors[] = "Une adresse email valide est requise.";
    if (!empty($num) && !preg_match('/^\d{10}$/', $num))
        $errors[] = "Le numéro de téléphone doit contenir 10 chiffres.";
    if (empty($message)) $errors[] = "Le message est requis.";

    if (empty($errors)) {
        $mail_escaped    = mysqli_real_escape_string($id_bd, $mail); /*escapes special characters in a string for use in an SQL query*/
        $result = mysqli_query($id_bd, "SELECT id_client FROM client WHERE mail = '$mail_escaped'");
		
        if (mysqli_num_rows($result) === 0) {/*Gets the number of rows in the result set*/
            $id_client = uniqid("CLI_");
            $nom_e     = mysqli_real_escape_string($id_bd, $nom);
            $prenom_e  = mysqli_real_escape_string($id_bd, $prenom);
            $message_e = mysqli_real_escape_string($id_bd, $message);
            $num_e     = !empty($num) ? (int)$num : "NULL";

            $sql = "INSERT INTO client (id_client, nom, prenom, mail, num, message)
                    VALUES ('$id_client', '$nom_e', '$prenom_e', '$mail_escaped', $num_e, '$message_e')";

            mysqli_query($id_bd, $sql);
        }

        $success = "Votre message a bien été envoyé.";
        $nom = $prenom = $mail = $num = $message = "";
    }
}

mysqli_close($id_bd);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
</head>
<body>

<h2>Formulaire de Contact</h2>

<?php if ($success): ?>
    <p><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="POST" action="">

    <label for="nom">Nom :</label><br>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>"><br><br>

    <label for="prenom">Prénom :</label><br>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($prenom) ?>"><br><br>

    <label for="mail">Adresse email :</label><br>
    <input type="text" id="mail" name="mail" value="<?= htmlspecialchars($mail) ?>"><br><br>

    <label for="num">Numéro de téléphone :</label><br>
    <input type="text" id="num" name="num" value="<?= htmlspecialchars($num) ?>"><br><br>

    <label for="message">Message :</label><br>
    <textarea id="message" name="message"><?= htmlspecialchars($message) ?></textarea><br><br>

    <input type="submit" value="Envoyer le message">

</form>

</body>
</html>
