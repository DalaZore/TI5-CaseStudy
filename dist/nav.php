
<nav class="navbar navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Placeholder</a>
    <?php require_once("php/db_functions.php");
    $login = new userClass();
    if($login->is_loggedin()!="")
    {
        echo "<a href=\"login.php\" class=\"btn btn-outline-success my-2 my-sm-0\">Shopping Cart</a>";
    }
    else
    {
        echo "<a href=\"login.php\" class=\"btn btn-outline-success my-2 my-sm-0\">Login</a>";
    }

    ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Articles
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="articles.php">All Articles</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="hardware.php">Hardware</a>
                    <ul>
                        <a class="dropdown-item" href="hardware_win.php">Windows</a>
                        <a class="dropdown-item" href="hardware_mac.php">Mac</a>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="software.php">Software</a>
                    <ul>
                        <a class="dropdown-item" href="software_win.php">Windows</a>
                        <a class="dropdown-item" href="software_mac.php">Mac</a>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
