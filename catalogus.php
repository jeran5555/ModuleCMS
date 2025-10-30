<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/db_connect.php'; ?>

<main class="content container">
  <h2>Onze Motoren</h2>

  <div class="motoren-grid">
    <?php
      $sql = "SELECT * FROM motoren ORDER BY merk ASC";
      $result = $conn->query($sql);

      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='motor-card'>
        <img src='" . htmlspecialchars($row['afbeelding']) . "' alt='" . htmlspecialchars($row['naam']) . "'>
        <h3>" . htmlspecialchars($row['merk']) . " " . htmlspecialchars($row['naam']) . "</h3>
        <p>" . htmlspecialchars($row['beschrijving']) . "</p>
        <a href='detail.php?id=" . $row['id'] . "' class='btn'>Bekijk details</a>
      </div>";

        }
      } else {
        echo '<p>Geen motoren gevonden in de database.</p>';
      }

      $conn->close();
    ?>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
