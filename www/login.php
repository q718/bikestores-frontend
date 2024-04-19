<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email and password fields are present
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Get the values of email and password fields
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Call the API to get information about the employee
        $api_url = "https://dev-lenoir226.users.info.unicaen.fr/bikestores/employees";
        $json_data = file_get_contents($api_url);
        $employees = json_decode($json_data, true);

        // Check credentials and user role
        foreach ($employees as $employee) {
            if ($employee['employee_email'] == $email && $employee['employee_password'] == $password) {
                // Credentials are valid, set a cookie to store the user's role
                setcookie('user_role', $employee['employee_role'], time() + (86400 * 30), "/"); // Cookie valid for 30 days
                // Redirect to index.php
                header("Location: ../index.php");
                exit();
            }
        }

        // If credentials are invalid, redirect to index.php with an error message in the URL parameter
        header("Location: ../index.php?error=1");
        exit();
    }
}

// Handle logout if the logout form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Delete the cookie by setting its expiration in the past
    setcookie('user_role', '', time() - 3600, "/");
    // Redirect to index.php
    header("Location: ../index.php");
    exit();
}
