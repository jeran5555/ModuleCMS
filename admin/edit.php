<?php include '../includes/db_connect.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM motoren WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $naam = $_POST['naam'];
  $merk = $_POST['merk'];
  $prijs = $_POST['prijs'];
  $beschrijving = $_POST['beschrijving'];
  $afbeeldingPath = $row['afbeelding']; // standaard de oude behouden

  // === Als er een nieuwe afbeelding is ===
  if (!empty($_FILES["afbeelding"]["name"])) {
    $uploadDir = '../assets/images/';
    $fileName = basename($_FILES["afbeelding"]["name"]);
    $targetFilePath = $uploadDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowTypes = array('jpg','jpeg','png','gif','webp');
    if (in_array($fileType, $allowTypes)) {
      if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $targetFilePath)) {
        $afbeeldingPath = 'assets/images/' . $fileName;
      }
    }
  }

  $sql = "UPDATE motoren 
          SET naam='$naam', merk='$merk', prijs='$prijs',
              beschrijving='$beschrijving', afbeelding='$afbeeldingPath'
          WHERE id=$id";

  if ($conn->query($sql)) {
    header("Location: index.php");
    exit;
  } else {
    echo "Fout bij bijwerken: " . $conn->error;
  }
}
?>

<h2>Motor bewerken</h2>
<form method="post" enctype="multipart/form-data">
  <label>Merk:</label><br>
  <input type="text" name="merk" value="<?= htmlspecialchars($row['merk']) ?>"><br><br>

  <label>Naam:</label><br>
  <input type="text" name="naam" value="<?= htmlspecialchars($row['naam']) ?>"><br><br>

  <label>Prijs (€):</label><br>
  <input type="number" step="0.01" name="prijs" value="<?= htmlspecialchars($row['prijs']) ?>"><br><br>

  <label>Beschrijving:</label><br>
  <textarea name="beschrijving" rows="4" cols="40"><?= htmlspecialchars($row['beschrijving']) ?></textarea><br><br>

  <p>Huidige afbeelding:</p>
  <img src="../<?= htmlspecialchars($row['afbeelding']) ?>" alt="" width="200"><br><br>

  <label>Nieuwe afbeelding (optioneel):</label><br>
  <input type="file" name="afbeelding" accept="image/*"><br><br>

  <button type="submit">Opslaan</button>
</form>

<a href="index.php">← Terug</a>
