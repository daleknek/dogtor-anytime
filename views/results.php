<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
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
      background-color: #E5E4E2;
      min-height: calc(100vh - 56px);
      display: flex;
      justify-content: center;
      align-items: center;
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

    .card {
      margin: 5% 0%;
    }

    .card-body {
      margin: 0% 0% 0% 3%;
      padding: 6% 0%;
    }

    .input-group {
      max-width: 300px;
      margin: 0 auto;
    }

    .custom-card-img {
      max-height: 200px;
      object-fit: cover;
    }

    .pagination {
      justify-content: center;
    }
  </style>
</head>

<body>
  <?php include 'header.php'; ?>
  <main class="main-section">
    <div class="container">
      <div class="input-group">
        <input id="search_text" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary" onclick="search()">Search</button>
      </div>
      <div class="card-deck row">
        <?php
        require 'Config/dbConnect.php';
        function prepareSearchPattern($search)
        {
          $search = strtolower($search);
          return "%$search%";
        }
        $noResults = false;
        
        if (isset($_GET['search'])) {
          $search = $_GET['search'];
          $stmt = $conn->prepare("SELECT * FROM vet WHERE LOWER(name) LIKE LOWER(?) OR LOWER(surname) LIKE LOWER(?) OR LOWER(specialization) LIKE LOWER(?)");
          $stmt->bind_param("sss", $searchPattern, $searchPattern, $searchPattern);
          $searchPattern = prepareSearchPattern($search);
          $stmt->execute();
          $veterinarians = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
          if (!empty($veterinarians)) {
            foreach ($veterinarians as $vet) {
              $vetId = $vet['vetId'];
              $clinic = $vet['clinic'];
              $name = $vet['name'];
              $surname = $vet['surname'];
              $email = $vet['email'];
              $aboutUs = $vet['aboutUs'];
              $specialization = $vet['specialization'];
              $avatar = base64_encode($vet['avatar']);
              $html = <<<HTML
                <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="card">
                    <div class="view overlay">
                      <img class="card-img-top custom-card-img" src="data:image/jpeg;charset=utf-8;base64,$avatar" alt="Card image cap">
                      <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                      </a>
                    </div>
                    <div class="card-body">
                      <h4 class="card-title">$name $surname</h4>
                      <hr>
                      <p class="card-text"><strong>Specialization</strong> $specialization</p>
                      <button type="button" class="btn btn-primary">Read more</button>
                    </div>
                  </div>
                </div>
                HTML;
              echo $html;
          }
        } else {
          $noResults = true;
      }
  }
      ?>
    </div>
  </div>
</main>
        ?>
      </div>
    </div>
  </main>
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

  <script>
      function search() {
    const val = document.getElementById('search_text').value.trim();
    if (val === '') {
        alert('Please enter a search query.');
    } else {
        fetch('results?search=' + encodeURIComponent(val))
            .then(response => response.text())
            .then(html => {
                const tempHtml = document.createElement('html');
                tempHtml.innerHTML = html;
                const newSearchResults = tempHtml.querySelector('div.card-deck.row');

                if (newSearchResults && newSearchResults.children.length > 0) {
                    window.location.href = 'results?search=' + encodeURIComponent(val);
                } else {
                    alert('No results found! Please try something else.');
                }
            })
            .catch(error => console.error(error));
    }
}

document.querySelector('button.btn-outline-primary').onclick = search; // replace 'addEventListener' with 'onclick'

  </script>
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>