<?php include '../includes/db_connect.php'; ?>

<?php
$id = $_GET['id'];
// Eerst afbeelding verwijderen
$result = $conn->query("SELECT afbeelding FROM motoren WHERE id=$id");
if ($result && $row = $result->fetch_assoc()) {
  $filePath = '../' . $row['afbeelding'];
  if (file_exists($filePath)) {
    unlink($filePath);
  }
}

$sql = "DELETE FROM motoren WHERE id=$id";
if ($conn->query($sql)) {
  header("Location: index.php");
  exit;
} else {
  echo "Fout bij verwijderen: " . $conn->error;
}
?>
