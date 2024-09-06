<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .navbar {
            background-color: #343a40; /* Dark navbar */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; /* White text for navbar */
        }
        .profile-container {
            background-color: #ffffff; /* White background for profile section */
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-top: 20px;
        }
        .profile-photo {
            border-radius: 50%; /* Circular profile photo */
            margin-bottom: 15px;
        }
        .research-interest h3 {
            margin-top: 20px;
        }
        .navbar .nav-link:hover {
            color: #ffc107 !important; /* Hover effect for navbar links */
        }
    </style>
    <title>Home Page</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">My Website</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publication.php">Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="projects.php">Projects</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Edit Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<h2>Welcome to the Student Page</h2>



</body>
</html>