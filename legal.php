<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="MMS401D" />
    <meta name="author" content="LThibault" />
    <title>BikeStores - Buy a bicycle!</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap) -->
    <link href="styles/theme.css" rel="stylesheet" />
    <!-- Map assets -->
    <link rel="stylesheet" href="styles/main.css" />
    <script src="scripts/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <!-- JQuery for easier API connection -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body id=top>
    <!-- Navigation -->
    <?php
    include_once("www/menu.inc.php");
    ?>
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Cookies policy</h1>
                <p class="lead fw-normal text-white-50 mb-0">Notification on the use of cookies</p>
            </div>
        </div>
    </header>
    <!-- Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <p>This website, operated in France and subject to European data protection regulations, uses a cookie for the following purposes:</p>
            <ol>
                <li>
                    <p><strong>Authentication Cookie:</strong> This cookie is used to authenticate you when you log in to our site. It temporarily stores secure authentication information to allow you access to certain parts of the site reserved for registered users. Without this cookie, you would not be able to access these secure areas.</p>
                    <p><strong>Why it's important:</strong> The authentication cookie ensures that you can securely access your account and use interactive features of the site. It enables us to recognize you as an authenticated user, providing a personalized and secure experience.</p>
                    <p><strong>Consequences of disabling:</strong> If you choose to disable this cookie, you may experience difficulties accessing certain features of the site. For example, you may be prompted to log in again on each visit or you may not be able to access certain members-only pages.</p>
                </li>
            </ol>
            <hr>
            <p>As a user, you have full control over the use of this cookie. You can choose to disable or delete this cookie at any time by adjusting your browser settings. However, please note that disabling this cookie may result in difficulties accessing certain features of the site.</p>
            <p>It is important to clarify that this website does not collect or use any personal data for subsequent purposes. The authentication cookie is solely used to provide you with a secure and personalized user experience during your visit to the site.</p>
            <p>If you have any questions regarding the use of this cookie, feel free to contact me at <a href="mailto:qwerti@ik.me">qwerti@ik.me</a>.</p>
            <hr>
            <p>By continuing to use this site without changing your cookie settings, you consent to the use of this authentication cookie.</p>
    </section>
    <!-- Footer -->
    <?php
    include_once("www/footer.inc.php");
    ?>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>