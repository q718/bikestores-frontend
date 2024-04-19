/**
 * Function to load filtered products based on category, brand, year, and price.
 * @param {string} category - The category of the products to filter.
 * @param {string} brand - The brand of the products to filter.
 * @param {number} year - The year of the products to filter.
 * @param {number} price - The price of the products to filter.
 */
$(document).ready(function () {
    function loadFilteredProducts(category, brand, year, price) {
        var url = "https://dev-lenoir226.users.info.unicaen.fr/bikestores/filter?";

        if (category) {
            url += "category=" + category;
        }
        if (brand) {
            if (category) {
                url += "&";
            }
            url += "brand=" + brand;
        }
        if (year) {
            if (category || brand) {
                url += "&";
            }
            url += "year=" + year;
        }
        if (price) {
            if (category || brand || year) {
                url += "&";
            }
            url += "price=" + price;
        }

        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (data.length === 0) {
                    $("#listProducts").html("<div class='alert alert-warning'>Sorry, no results match the selected filters.</div>");
                } else {
                    $("#listProducts").empty();
                    $.each(data, function (index, product) {
                        $("#listProducts").append("<div class='col mb-5'><div class='card h-100'><img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' /><div class='card-body p-4'><div class='text-center'><h5 class='fw-bolder'>" + product.product_name + "</h5>$" + product.list_price + "</div></div></div></div>");
                    });
                }
            }
        });
    }

    /**
     * Function to load brands and populate the dropdown.
     */
    function loadBrands() { // Ajax request to get brands
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/brands",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#brandSelect").empty();
                $("#brandSelect").append("<option value=''>All brands</option>");
                $.each(data, function (index, brand) {
                    $("#brandSelect").append("<option value='" + brand.brand_id + "'>" + brand.brand_name + "</option>");
                });
            }
        });
    }

    // Call the function to load brands when the page loads
    loadBrands();

    /**
     * Function to load categories and populate the dropdown.
     */
    function loadCategories() { // Ajax request to get categories
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/categories",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#categorySelect").empty();
                $("#categorySelect").append("<option value=''>All categories</option>");
                $.each(data, function (index, category) {
                    $("#categorySelect").append("<option value='" + category.category_id + "'>" + category.category_name + "</option>");
                });
            }
        });
    }

    // Call the function to load categories when the page loads
    loadCategories();

    /**
     * Function to load years and populate the dropdown.
     */
    function loadYears() { // Ajax request to get products and extract unique years
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/products",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var uniqueYears = [];

                $.each(data, function (index, product) {
                    if (! uniqueYears.includes(product.model_year)) {
                        uniqueYears.push(product.model_year);
                    }
                });

                // Populate the dropdown with unique years
                $("#yearSelect").empty();
                $("#yearSelect").append("<option value=''>All years</option>");
                $.each(uniqueYears, function (index, year) {
                    $("#yearSelect").append("<option value='" + year + "'>" + year + "</option>");
                });
            }
        });
    }

    // Call the function to load years when the page loads
    loadYears();

    /**
     * Function to load prices and populate the dropdown with price ranges.
     */
    function loadPrices() { // Ajax request to get products and extract prices
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/products",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var allPrices = data.map(function (product) {
                    return parseFloat(product.list_price);
                });

                // Find the maximum price
                var maxPrice = Math.max(... allPrices);

                // Define price ranges
                var priceRanges = [];
                var rangeStart = 0;
                var rangeEnd = 500;

                // Divide prices into ranges of 500 starting from 0 up to maxPrice
                while (rangeStart <= maxPrice) {
                    var pricesInRange = allPrices.filter(function (price) {
                        return price >= rangeStart && price < rangeEnd;
                    });

                    if (pricesInRange.length > 0) {
                        priceRanges.push({
                            start: rangeStart,
                            end: rangeEnd - 1,
                            prices: pricesInRange
                        });
                    }

                    rangeStart += 500;
                    rangeEnd += 500;
                }

                // Populate the dropdown with price range options
                $("#priceSelect").empty();
                $("#priceSelect").append("<option value=''>All prices</option>");
                $.each(priceRanges, function (index, range) {
                    var optionText = range.start + "-" + range.end;
                    var optionValue = range.prices.join(",");
                    $("#priceSelect").append("<option value='" + optionValue + "'>" + optionText + "</option>");
                });
            }
        });
    }

    // Call the function to load prices when the page loads
    loadPrices();

    /**
     * Function to handle filter change and load filtered products.
     */
    function handleFilterChange() {
        var category = $("#categorySelect").val();
        var brand = $("#brandSelect").val();
        var year = $("#yearSelect").val();
        var price = $("#priceSelect").val();
        loadFilteredProducts(category, brand, year, price);
    }

    // Handle brand change
    $("#brandSelect").change(function () {
        handleFilterChange();
    });

    // Handle category change
    $("#categorySelect").change(function () {
        handleFilterChange();
    });

    // Handle year change
    $("#yearSelect").change(function () {
        handleFilterChange();
    });

    // Handle price change
    $("#priceSelect").change(function () {
        handleFilterChange();
    });

    /**
     * Handle reset filter button click and load all products.
     */
    $("#resetButton").click(function () {
        $("#categorySelect").val('');
        $("#brandSelect").val('');
        $("#yearSelect").val('');
        $("#priceSelect").val('');
        loadAllProducts();
    });

    /**
     * Function to load all products.
     */
    function loadAllProducts() { // Ajax request to get all products
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/products",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#listProducts").empty();
                $.each(data, function (index, product) {
                    $("#listProducts").append("<div class='col mb-5'><div class='card h-100'><img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' /><div class='card-body p-4'><div class='text-center'><h5 class='fw-bolder'>" + product.product_name + "</h5>$" + product.list_price + "</div></div></div></div>");
                });
            }
        });
    }

    // Load all products by default when the page loads
    loadAllProducts();
});
