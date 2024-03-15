<!DOCTYPE html>
<html lang="en">

<head>
    <title>AdminX - The last Admin template you'll ever need</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="css/adminx.css" media="screen" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons@4.29.0/dist/feather.min.css">

    <!--
      # Optional Resources
      Feel free to delete these if you don't need them in your project
    -->
</head>

<body>
    <div class="adminx-container">
        <nav class="navbar navbar-expand justify-content-between fixed-top">
            <a class="navbar-brand mb-0 h1 d-none d-md-block" href="index.html">
                <img src="assets/logo.png" class="navbar-brand-image d-inline-block align-top mr-2" alt="">
                AdminX
            </a>

            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger mr-5">Logout</button>
            </form>

        </nav>

        <!-- expand-hover push -->
        <!-- Sidebar -->
        <div class="adminx-sidebar expand-hover push">
            <ul class="sidebar-nav">
                <li class="sidebar-nav-item">
                    <a href="/" class="sidebar-nav-link">
                        <span class="sidebar-nav-icon">
                            <i data-feather="home"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Dashboard
                        </span>
                    </a>
                </li>

                @can('isNotAssistant')
                    <li class="sidebar-nav-item">
                        <a href="codes" class="sidebar-nav-link">
                            <span class="sidebar-nav-icon">
                                <i data-feather="layout"></i>
                            </span>
                            <span class="sidebar-nav-name">
                                Generate code
                            </span>
                        </a>
                    </li>
                @endcan

                @can('admin')
                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-link" href="attendancesreport">
                            <span class="sidebar-nav-icon">
                                <i data-feather="pie-chart"></i>
                            </span>
                            <span class="sidebar-nav-name">
                                Attendance report
                            </span>
                        </a>
                    </li>
                @endcan

                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link" href="myattendance">
                        <span class="sidebar-nav-icon">
                            <i data-feather="align-justify"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            My attendance
                        </span>
                    </a>
                </li>

                @can('admin')
                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-link" href="users">
                            <span class="sidebar-nav-icon">
                                <i data-feather="edit"></i>
                            </span>
                            <span class="sidebar-nav-name">
                                Users
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-link" href="materials">
                            <span class="sidebar-nav-icon">
                                <i data-feather="grid"></i>
                            </span>
                            <span class="sidebar-nav-name">
                                Materials
                            </span>
                        </a>
                    </li>

                    <li class="sidebar-nav-item">
                        <a class="sidebar-nav-link" href="kelas">
                            <span class="sidebar-nav-icon">
                                <i data-feather="layers"></i>
                            </span>
                            <span class="sidebar-nav-name">
                                Classes
                            </span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div><!-- Sidebar End -->

        <!-- adminx-content-aside -->
        <div class="adminx-content">
            <!-- <div class="adminx-aside">

        </div> -->

            <div class="adminx-main-content">
                <div class="container-fluid">
                    <!-- BreadCrumb -->
                    @yield('container')
                </div>
            </div>
        </div>
    </div>

    <!-- If you prefer jQuery these are the required scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.29.0/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
    <!-- If you prefer vanilla JS these are the only required scripts -->
    <!-- script src="./dist/js/vendor.js"></script>
    <script src="./dist/js/adminx.vanilla.js"></script-->
</body>

</html>
