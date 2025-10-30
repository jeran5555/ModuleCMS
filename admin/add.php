<?php include '../includes/db_connect.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $naam = $_POST['naam'];
  $merk = $_POST['merk'];
  $prijs = $_POST['prijs'];
  $beschrijving = $_POST['beschrijving'];

  // ==== Afbeelding uploaden ====
  $uploadDir = '../assets/images/';
  $fileName = basename($_FILES["afbeelding"]["name"]);
  $targetFilePath = $uploadDir . $fileName;
  $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

  $allowTypes = array('jpg','jpeg','png','gif','webp');
  if (in_array($fileType, $allowTypes)) {
    if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $targetFilePath)) {
      $afbeeldingPath = 'assets/images/' . $fileName; // voor database
    } else {
      echo "❌ Fout bij uploaden van afbeelding.";
      exit;
    }
  } else {
    echo "❌ Alleen JPG, PNG, GIF of WEBP toegestaan.";
    exit;
  }

  // ==== Data opslaan ====
  $sql = "INSERT INTO motoren (naam, merk, prijs, beschrijving, afbeelding)
          VALUES ('$naam', '$merk', '$prijs', '$beschrijving', '$afbeeldingPath')";

  if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Fout bij toevoegen: " . $conn->error;
  }
}
?>

<h2>Nieuwe motor toevoegen</h2>
<form method="post" enctype="multipart/form-data">
  <label>Merk:</label><br>
  <input type="text" name="merk" required><br><br>

  <label>Naam:</label><br>
  <input type="text" name="naam" required><br><br>

  <label>Prijs (€):</label><br>
  <input type="number" step="0.01" name="prijs" required><br><br>

  <label>Beschrijving:</label><br>
  <textarea name="beschrijving" rows="4" cols="40"></textarea><br><br>

  <label>Afbeelding uploaden:</label><br>
  <input type="file" name="afbeelding" accept="image/*" required><br><br>

  <button type="submit">Opslaan</button>
</form>

<a href="index.php">← Terug</a>
