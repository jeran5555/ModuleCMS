<?php include '../includes/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Motoren Beheer</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    body { padding: 2rem; }
    table { width: 100%; border-collapse: collapse; margin-top: 2rem; }
    th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
    th { background: #333; color: white; }
    a.btn { background: #ff4d00; color: white; padding: 6px 12px; border-radius: 6px; text-decoration: none; }
    a.btn:hover { background: #e64000; }
  </style>
</head>
<body>
  <h1>Motoren Beheer</h1>
  <a href="add.php" class="btn">+ Nieuwe motor toevoegen</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Merk</th>
      <th>Naam</th>
      <th>Prijs (€)</th>
      <th>Acties</th>
    </tr>
    <?php
      $result = $conn->query("SELECT * FROM motoren ORDER BY merk ASC");
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['merk']}</td>";
        echo "<td>{$row['naam']}</td>";
        echo "<td>" . number_format($row['prijs'], 2, ',', '.') . "</td>";
        echo "<td>
                <a href='edit.php?id={$row['id']}' class='btn'>Bewerk</a>
                <a href='delete.php?id={$row['id']}' class='btn' style='background:#c0392b;'>Verwijder</a>
              </td>";
        echo "</tr>";
      }
      $conn->close();
    ?>
  </table>
</body>
</html>
