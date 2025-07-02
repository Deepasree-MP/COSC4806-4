  <?php if (!isset($_SESSION["auth"])) {
    header("Location: /login");
  } ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftdDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.png">
    <title>COSC 4806</title>
    <style>
      .navbar-custom {
        background-color: #b71c1c;
      }
      .navbar-custom .navbar-brand,
      .navbar-custom .nav-link,
      .navbar-custom .dropdown-item {
        color: #fff;
      }
      .navbar-custom .nav-link:hover,
      .navbar-custom .dropdown-item:hover {
        color: #fdd835;            
      }
      .navbar-custom .dropdown-menu {
        background-color: #b71c1c;
      }
      .navbar-custom .dropdown-item {
        color: #fff;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-custom">
      <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">COSC 4806</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon bg-light"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" href="/home">Home</a>
            </li>
            <?php if (isset($_SESSION["auth"])): ?>
              <li class="nav-item">
                <a class="nav-link" href="/remainders/index">My Remainders</a>
              </li>
            <?php endif; ?>
          </ul>
          <ul class="navbar-nav ms-auto">
            <?php if (isset($_SESSION["auth"])): ?>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="/logout">Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link fw-bold" href="/login">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
