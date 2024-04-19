<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container px-4 px-lg-5">
        <!-- Brand logo -->
        <a class="navbar-brand" href="#top">BikeStores</a>
        <!-- Navbar toggler button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <!-- Navbar collapse section -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar items -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <!-- Home link (active) -->
                <li class="nav-item"><a class="nav-link" aria-current="page" href="/">Home</a></li>
                <!-- Other links -->
                <li class="nav-item"><a class="nav-link" href="#bottom">About</a></li>
                <!-- Dropdown menu for Legal -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Legal</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- Cookies policy link -->
                        <li><a class="dropdown-item" href="legal.php">Cookies policy</a></li>
                        <!-- Divider -->
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <!-- Licence link -->
                        <li><a class="dropdown-item" href="https://github.com/q718/bikestores-frontend" target="_blank">Licence</a></li>
                    </ul>
                </li>
                <!-- API Documentation link -->
                <li class="nav-item"><a class="nav-link" href="https://dev-lenoir226.users.info.unicaen.fr/bikestores" target="_blank">API Documentation</a></li>
                <?php
                if (isset($_COOKIE['user_role']) && ($_COOKIE['user_role'] == "it" || $_COOKIE['user_role'] == "chief")) {
                    echo '<li class="nav-item"><a class="nav-link" href="manager.php">Manage employees</a></li>';
                }
                ?>
            </ul>
            <!-- PHP section for displaying error alert, user role, and login/logout button -->
            <?php
            // Check if there is an error in the URL
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                // Display an alert in case of login error
                echo '<script>alert("Email or password incorrect.");</script>';
            }

            // Check if user role cookie is set
            if (isset($_COOKIE['user_role'])) {
                // Display the user role and logout button
                echo '<form class="d-flex" action="www/login.php" method="POST">
                        <button class="btn btn-outline-dark me-2" type="submit" name="logout">
                            <i class="bi-door-closed-fill me-1"></i>
                            Logout (' . $_COOKIE['user_role'] . ')
                        </button>
                    </form>';
            } else {
                // Display the login form
                echo '<form class="d-flex" action="www/login.php" method="POST">
                        <div class="input-group">
                            <input class="form-control" type="email" id="email" name="email" required placeholder="Email">
                            <input class="form-control" type="password" id="password" name="password" required placeholder="Password">
                            <button class="btn btn-outline-dark me-2" type="submit">
                                <i class="bi-door-open-fill me-1"></i>
                                Login
                            </button>
                        </div>
                    </form>';
            }
            ?>
        </div>
    </div>
</nav>