<?php include 'includes/header.php'; ?>
<?php include 'includes/nav.php'; ?>

<main class="content container">
  <h2>Onze Motoren</h2>

  <div class="motoren-grid">
    <?php
      $motoren = [
        ["naam" => "Yamaha MT-09", "afbeelding" => "assets/images/mt09.jpg"],
        ["naam" => "Kawasaki Z900", "afbeelding" => "assets/images/z900.jpg"],
        ["naam" => "Ducati Monster", "afbeelding" => "assets/images/monster.jpg"],
        ["naam" => "BMW S1000R", "afbeelding" => "assets/images/s1000r.jpg"],
      ];

      foreach ($motoren as $motor) {
        echo '<div class="motor-card">';
        echo '<img src="' . $motor["afbeelding"] . '" alt="' . $motor["naam"] . '">';
        echo '<h3>' . $motor["naam"] . '</h3>';
        echo '<a href="#" class="btn-small">Bekijk meer</a>';
        echo '</div>';
      }
    ?>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
