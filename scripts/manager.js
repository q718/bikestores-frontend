$(document).ready(function () {
    /**
     * Function to load all employees.
     */
    function loadAllEmployees() { // Ajax request to get all employees
        $.ajax({
            url: "https://dev-lenoir226.users.info.unicaen.fr/bikestores/employees",
            type: "GET",
            dataType: "json",
            success: function (data) {
                $("#listEmployees").empty();
                $.each(data, function (index, employee) {
                    $("#listEmployees").append("<div class='col mb-5'><div class='card h-100'><img class='card-img-top' src='https://dummyimage.com/450x300/dee2e6/6c757d.jpg' alt='...' /><div class='card-body p-4'><div class='text-center'><h5 class='fw-bolder'>" + employee.employee_name + "</h5>" + employee.employee_role + "</div></div></div></div>");
                });
            }
        });
    }

    if (document.cookie.includes('user_role') && (document.cookie.includes('user_role=it') || document.cookie.includes('user_role=chief'))) {
        // Load all employees if the user role is 'it' or 'chief'
        loadAllEmployees();
    }
    else {
        $("#listEmployees").append("<div class='alert alert-danger'><b>UNAUTHORIZED</b></div>");
    }
});
