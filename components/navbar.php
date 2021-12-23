<?php
$nav_links = array(
  "Home" => array(
    "One" => "aa.php",
    "Two" => "bb.php",
    "Three" => array(
      "Sub" => "cc.php"
    )
  )
);

function echo_nav_array($arr)
{
  foreach ($arr as $name => $href) {
    if (gettype($href) === "array") {
      echo '
      <li class="dropend">
      <a href="' . $href . '" class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown">' . $name . '</a>
      <ul class="dropdown-menu dropdown-submenu shadow">
      ';

      echo_nav_array($href);

      echo '</ul></li>';
    } else {
      echo '
      <li><a class="dropdown-item" href="' . $href . '">' . $name . '</a></li>
      ';
    }
  }
}
?>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
  <div class="container-fluid">

    <a class="navbar-brand" href="#"> <img src="images/doatap-logo.png" alt="" width="250px"> <span class="badge bg-primary">Mega Menu</span></a>

    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content">
      <div class="hamburger-toggle">
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">


        <!-- Dynamic Navbar -->
        <?php

        foreach ($nav_links as $name => $href) {
          if (gettype($href) === "array") {
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="' . $href . '" data-bs-toggle="dropdown" data-bs-auto-close="outside">' . $name . '</a>
            <ul class="dropdown-menu shadow">
            ';

            echo_nav_array($href);

            echo '</ul></li>';
          } else {
            echo '
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="' . $href . '">' . $name . '</a>
            </li>
            ';
          }
        }

        ?>

      </ul>

<<<<<<< HEAD
      <!-- SEARCH -->
      <form class="d-flex ms-auto">

        <select class="selectpicker" data-width="fit">
          <option><span class="flag-icon flag-icon-gr"></span> Greek</option>
          <option><span class="flag-icon flag-icon-mx"></span> Español</option>
        </select>

        <div class="input-group">
          <input class="form-control border-0 mr-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-secondary border-0" type="submit">Search</button>
        </div>
      </form>

=======
      <div class="ms-auto">
        <!-- LANGUAGE -->
        <select class="selectpicker d-flex ms-auto" data-width="fit">
          <option><span class="flag-icon flag-icon-gr"></span>Greek</option>
          <option><span class="flag-icon flag-icon-mx"></span>English</option>
        </select>

        <!-- SEARCH -->
        <form class="d-flex">
          <div class="input-group">
            <input class="form-control border-0 mr-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary border-0" type="submit">Search</button>
          </div>
        </form>
        
      </div>
>>>>>>> 6afca6f0e2da4430c35595dc1019fd8f39c03edf
    </div>
  </div>
</nav>

<script>
  document.addEventListener('click', function(e) {
    // Hamburger menu
    if (e.target.classList.contains('hamburger-toggle')) {
      e.target.children[0].classList.toggle('active');
    }
  })
</script>