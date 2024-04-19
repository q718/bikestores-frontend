<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="MMS401D" />
    <meta name="author" content="LThibault" />
    <title>Employee manager - BikeStores</title>
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

<body id="top">
    <!-- Navigation -->
    <?php
    include_once("www/menu.inc.php");
    ?>
    <!-- Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- Products -->
            <div id="listEmployees" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php
    include_once("www/footer.inc.php");
    ?>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- API data JS -->
    <script src="scripts/manager.js"></script>
</body>

</html>