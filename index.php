<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .navbar {
            background-color: #343a40; 
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important; 
        }
        .profile-container {
            background-color: #ffffff; 
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            margin-top: 20px;
        }
        .profile-photo {
            border-radius: 50%; 
            margin-bottom: 15px;
        }
        .research-interest h3 {
            margin-top: 20px;
        }
        .navbar .nav-link:hover {
            color: #ffc107 !important; 
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
          <a class="nav-link active" aria-current="page" href="publication.php">Publications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="students.php">Students</a>
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

<div class="container">
    <div class="profile-container text-center">
        <img src="ashok.jpg" alt="Dr. Ashok Singh Sairam" class="profile-photo" style="height: 120px; width:120px;">
        <div class="profile-info">
            <h2>Dr. Ashok Singh Sairam</h2>
            <p><strong>Designation:</strong> Professor</p>
            <p><strong>Contact Details:</strong></p>
            <p>Email:  ashok@iitg.ac.in</p>
            <p>Phone:  +91 (0)361 258 3727</p>
        </div>
        <div class="research-interest text-start">
            <h3>Research Interests:</h3>
            <p>Computer Networks and Security</p>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS for the navbar toggler to function -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0EvHe/X+R7Yk4drPRhX30W1oaD97g2txg0SwKZB5xqtBObgbR1AM6vFyZ06b6/6M" crossorigin="anonymous"></script>
</body>
</html>
