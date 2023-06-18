
  <style>

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
                      <p class="card-text">About: $aboutUs</p>
                      <a href="/dogtor-anytime/clinic/$vetId" class="btn btn-primary">Read more</a>
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
<?php include 'footer.php'; ?>
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
