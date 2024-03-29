<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Transaction History - CMS</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="css/styles.css">
    
    <link rel="icon" href="https://www.thesparksfoundationsingapore.org/images/logo_small.png">
  </head>

  <body class="text-center">

    <!-- Navbar -->
    <div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <a href="index.php">
            <img class="masthead-brand" src="https://www.thesparksfoundationsingapore.org/images/logo_small.png" alt="" style="max-height: 60px; min-width: 70px"/>
          </a>
          <nav class="nav navbar navbar-expand-sm navbar-light nav-masthead justify-content-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav" id="navList">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="viewUsers.php">View Users</a></li>
                <li class="nav-item"><a class="nav-link active" href="#">Transaction History</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </header>

    
      <main role="main" class="inner cover">
         
        
          <?php
             $servername = "localhost";
             $username = "id15104103_keyur1";
             $password = "iyC*>i)#%4MA9BL>";
             $dbname = "id15104103_keyur";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
    
            $sql = "SELECT * FROM transactions ORDER BY ID DESC";
            $result = $conn->query($sql);
    
            if( $result->num_rows ==0 ){
              echo '<tr><td colspan="3">No Rows Returned</td></tr>';
            }
    
            if ($result->num_rows > 0) {
          ?>
          
        
            <div class="table-responsive" style="font-size: 15px;">
              <table class="table table-striped table-dark table-hover table-bordered table-sm" style="margin-top: 20px;" id="transactionTable">
                <thead>
                  <tr>
                    <th scope="col">Sender</th>
                    <th scope="col">Receiver</th>
                    <th scope="col">Credits Transferred</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while( $row = $result->fetch_assoc() ){
                    echo "<tr><td>".$row["Sender"]."</td><td>".$row["Receiver"]."</td><td>".$row["Transferred_Credits"]."</td></tr>\n";
                  }
                ?>
                </tbody>
              </table>
            </div>
            <?php 
                } else {}
                $conn->close();
            ?>
      </main>

      <!-- Footer -->
      <footer class="mastfoot mt-auto">
        
      </footer>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity=""
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity=""
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity=""
    ></script>
  </body>
</html>