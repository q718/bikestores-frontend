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

<body id="top">
    <!-- Navigation -->
    <?php
    include_once("www/menu.inc.php");
    ?>
    <!-- Header -->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Buy a bicycle!</h1>
                <p class="lead fw-normal text-white-50 mb-0">Find a store nearby</p>
            </div>
            <!-- Map -->
            <div id="map" class="card"></div>
        </div>
    </header>
    <!-- Section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <!-- Filters -->
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Brand</h5>
                                <select id="brandSelect" class="form-select">
                                    <!-- Options are populated dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Category</h5>
                                <select id="categorySelect" class="form-select">
                                    <!-- Options are populated dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Year</h5>
                                <select id="yearSelect" class="form-select">
                                    <!-- Options are populated dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Price – $</h5>
                                <select id="priceSelect" class="form-select">
                                    <!-- Options are populated dynamically -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <button id="resetButton" class="btn btn-secondary w-100">Reset Filters</button>
                    </div>
                </div>
            </div>
            <br>
            <!-- Products -->
            <div id="listProducts" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php
    include_once("www/footer.inc.php");
    ?>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Map JS -->
    <script src="scripts/osm.js"></script>
    <!-- API data JS -->
    <script src="scripts/json.js"></script>
</body>

</html>