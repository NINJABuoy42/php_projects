
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Employee Management System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            
            <?php
            if (!isset($_SESSION['username'])) {

                echo '<li class="nav-item">
                    <a class="nav-link" href="login.php">LOGIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">REGISTER</a>
                </li>';
              
            }
            else {
            
                echo '<li class="nav-item"><a class="nav-link"><button type="button" class="btn btn-light"><h4>WELCOME: ' . $_SESSION['username'] . '</h4></button>
</a>
                </li>';
                echo '<li class="nav-item"><a class="nav-link" href="logout.php"><button type="button" class="btn btn-danger">LOGOUT</button></a>
                </li>';
            }
                

            ?>
        </ul>
        

    </div>




</nav>