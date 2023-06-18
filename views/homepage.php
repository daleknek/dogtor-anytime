<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require 'Config/dbConnect.php';

$user_logged_in = isset($_SESSION['id']);

if ($user_logged_in) {
    $patientId = $_SESSION['id'];

    $sql = "SELECT name FROM patient WHERE patientId = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $patientId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_name);
    $stmt->fetch();

    $stmt->close();
}
$conn->close();
?>

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        .dropdown-menu .dropdown-item.sign-out {
            color: red;
        }

        .main-section {
            background: url("images/bg_homepage.webp") center center;
            min-height: calc(100vh - 56px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-bar {
            max-width: 1000px;
            width: 700px;
            margin: 0 auto;
        }

        .search-bar input,
        .search-bar button {
            height: 70px;
            font-size: 25px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 30px;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>

=======
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    .dropdown-menu .dropdown-item.sign-out {
      color: red;
    }

    .main-section {
      background: url("images/bg_homepage.webp") center center;
      min-height: calc(100vh - 56px); /* Subtracting the header height */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .search-bar {
      max-width: 1000px;
      width: 700px;
      margin: 0 auto;
    }

    .search-bar input,
    .search-bar button {
      height: 70px;
      font-size: 25px;
    }

    .footer {
      background-color: #f8f9fa;
      padding: 30px;
      text-align: center;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
    }
  </style>
    
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
<?php include 'header.php'; ?>

<main class="main-section">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-8">
                <div class="search-bar">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Looking a vet for...?" aria-label="Search" aria-describedby="search-addon">
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<<<<<<< HEAD
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <p class="text-muted text-start">© 2023 DogtorAnytime</p>
            </div>
            <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
                <a href="/" class="link-dark text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
            </div>
            <div class="col-md-4">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="aboutUs" class="nav-link px-2 text-muted">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="contactUs" class="nav-link px-2 text-muted">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelector('.search-bar button').addEventListener('click', () => {
        const searchInput = document.querySelector('.search-bar input').value.trim();
        if (searchInput === '') {
            alert('Please enter a search query.');
        } else {
            fetch('results?search=' + encodeURIComponent(searchInput))
                .then(response => response.text())
                .then(html => {
                    const tempHtml = document.createElement('html');
                    tempHtml.innerHTML = html;
                    const newSearchResults = tempHtml.querySelector('div.card-deck.row');

                    if (newSearchResults && newSearchResults.children.length > 0) {
                        window.location.href = 'results?search=' + encodeURIComponent(searchInput);
                    } else {
                        alert('No results found! Please try something else.');
                    }
                })
                .catch(error => console.error(error));
        }
    });
</script>

</body>
</html>
=======
<?php include 'footer.php';?>

<script>

document.querySelector('.search-bar button').addEventListener('click', () => {
    const searchInput = document.querySelector('.search-bar input').value.trim();
    if (searchInput === '') {
        // Show warning message if input is empty
        alert('Please enter a search query.');
    } else {
        fetch('results?search=' + encodeURIComponent(searchInput))
            .then(response => response.text())
            .then(html => {
                const tempHtml = document.createElement('html');
                tempHtml.innerHTML = html;
                const newSearchResults = tempHtml.querySelector('div.card-deck.row');

                if (newSearchResults && newSearchResults.children.length > 0) {
                    window.location.href = 'results?search=' + encodeURIComponent(searchInput);
                } else {
                    alert('No results found! Please try something else.');
                }
            })
            .catch(error => console.error(error));
    }
});
    </script>
>>>>>>> 3493c470cce9e9b4135855c7de10fd6bf5a05b95
