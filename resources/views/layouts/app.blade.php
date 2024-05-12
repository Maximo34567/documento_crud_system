<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Documento</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Documento</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." id="searchInput" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                </div>
            </form>
        </nav>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get reference to search input
                const searchInput = document.getElementById('searchInput');

                // Add event listener to input field for 'input' event
                searchInput.addEventListener('input', function() {
                    // Get search query
                    const query = this.value.trim().toLowerCase();

                    // Get table rows for each table
                    const fileRows = document.querySelectorAll('#fileTable tbody tr');
                    const folderRows = document.querySelectorAll('#folderTable tbody tr');
                    const clientRows = document.querySelectorAll('#clientTable tbody tr');
                    const rolesRows = document.querySelectorAll('#rolesTable tbody tr');

                    // Function to handle search for a table
                    function filterRows(rows) {
                        rows.forEach(row => {
                            // Get row text content
                            const textContent = row.textContent.toLowerCase();

                            // Check if row contains search query
                            if (textContent.includes(query)) {
                                // Show row if it matches search query
                                row.style.display = '';
                            } else {
                                // Hide row if it doesn't match search query
                                row.style.display = 'none';
                            }
                        });
                    }

                    // Filter rows for each table
                    filterRows(fileRows);
                    filterRows(folderRows);
                    filterRows(clientRows);
                    filterRows(rolesRows);
                });
            });
        </script>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('file.dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <div class="sb-sidenav-menu-heading">Management</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFile" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                File
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFile" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('file.view')}}">View File</a>
                                    <a class="nav-link" href="{{route('file.create')}}">Add File</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseFolder" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                                Folder
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseFolder" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('folder.view')}}">View Folder</a>
                                    <a class="nav-link" href="{{route('folder.create')}}">Add Folder</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRoles" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Roles
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRoles" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('roles.view')}}">View Roles</a>
                                    <a class="nav-link" href="{{route('roles.create')}}">Add Roles</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Client
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('client.view')}}">View Client</a>
                                    <a class="nav-link" href="{{route('client.create')}}">Add Client</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Session</div>
                            <a class="nav-link" href="{{ route('logout') }}"> <!-- Add the logout route -->
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div> <!-- Change the icon to sign-out icon -->
                                Logout
                            </a>


                        </div>
                    </div>
                    {{-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> --}}
                </nav>
            </div>
        @yield('content')
    </body>
</html>
