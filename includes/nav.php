<header class="site-header">
  <div class="container nav-container">
    <h1 class="logo">🏍️ Motoren Catalogus</h1>

    <!-- Hamburger knop -->
    <div class="hamburger" id="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <!-- Navigatie -->
    <nav id="nav-menu">
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="catalogus.php">Catalogus</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </div>
</header>

<script>
  // JavaScript voor het openen/sluiten van het menu
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('nav-menu');

  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    navMenu.classList.toggle('active');
  });
</script>
