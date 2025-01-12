
<nav class="navbar custom-navbar navbar-expand-lg py-2">
    <div class="container-fluid px-0">
        <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
        <a href="dashboard.php" class="navbar-brand"><strong>AMS</strong> Dashboard</a>
        <div id="navbar_main">
            <ul class="navbar-nav mr-auto hidden-xs">
                <li class="nav-item page-header">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="fa fa-home"></i></a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon"  id="navbar_1_dropdown_3" role="button" ><i class="fa fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <h6 class="dropdown-header">User menu</h6>
                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user text-primary"></i>My Profile</a>

                        <a class="dropdown-item" href="change-password.php"><i class="fa fa-cog text-primary"></i>Settings</a>
                        <div class="dropdown-divider" role="presentation"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out text-primary"></i>Sign out</a>
                    </div>
                </li>
            </ul>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Find the user icon element
                    var userIcon = document.getElementById('navbar_1_dropdown_3');

                    // Add a click event listener to the user icon
                    userIcon.addEventListener('click', function () {
                        // Find the dropdown menu
                        var dropdownMenu = document.querySelector('.dropdown-menu');

                        // Toggle the display property
                        if (dropdownMenu.style.display === 'block') {
                            dropdownMenu.style.display = 'none';
                        } else {
                            dropdownMenu.style.display = 'block';
                        }
                    });
                });
    </script>
        </div>
    </div>
</nav>