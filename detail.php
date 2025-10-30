<?php
include 'includes/db_connect.php';
include 'includes/header.php';

// Check of er een ID is meegegeven in de URL
if (!isset($_GET['id'])) {
  echo "<p>Geen motor geselecteerd.</p>";
  include 'includes/footer.php';
  exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM motoren WHERE id = $id");

if ($result->num_rows == 0) {
  echo "<p>Motor niet gevonden.</p>";
  include 'includes/footer.php';
  exit;
}

$motor = $result->fetch_assoc();
?>

<main class="motor-detail">
  <div class="motor-detail-container">
    <div class="motor-image">
      <img src="<?= htmlspecialchars($motor['afbeelding']) ?>" alt="<?= htmlspecialchars($motor['naam']) ?>">
    </div>
    <div class="motor-info">
      <h2><?= htmlspecialchars($motor['merk']) ?> <?= htmlspecialchars($motor['naam']) ?></h2>
      <p class="prijs">Prijs: €<?= number_format($motor['prijs'], 2, ',', '.') ?></p>
      <p class="beschrijving"><?= nl2br(htmlspecialchars($motor['beschrijving'])) ?></p>
      <a href="catalogus.php" class="btn">← Terug naar Catalogus</a>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
