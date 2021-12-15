

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examination Committe System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
     integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
<link rel="stylesheet" href="/assets/css/toastr.min.css">
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/koya.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
     integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
     crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
     integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toast-css/1.1.0/grid.min.css"
     integrity="sha512-YOGZZn5CgXgAQSCsxTRmV67MmYIxppGYDz3hJWDZW4A/sSOweWFcynv324Y2lJvY5H5PL2xQJu4/e3YoRsnPeg==" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/koya.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item active ">
                            <a href="{{ route('home') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>


                        <li class="sidebar-item  ">
                            <a href="{{ route('add_teacher') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Add Teachers</span>
                            </a>

                        </li>
                        <li class="sidebar-item  ">
                            <a href="{{ route('teachers') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Teachers</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('teacher_distributing') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Teacher Distributing</span>
                            </a>

                        </li>





                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="triangle" width="20"></i>
                                <span>Committee</span>
                            </a>

                            <ul class="submenu ">

                                <li>
                                    <a href="{{ route('add_committee_staff') }}">Add Committe Staff</a>
                                </li>

                                <li>
                                    <a href="{{ route('committee_staff') }}">Committe Staff</a>
                                </li>


                            </ul>

                        </li>


                        <li class="sidebar-item  ">
                            <a href="{{ route('add_student') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Add Students</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{ route('student_detail') }}" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Students</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Students Hall</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">
                            <a href="Hall_Info.html" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Halls</span>
                            </a>

                        </li>
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Student Distributing</span>
                            </a>

                        </li>

                        <li class="sidebar-item  ">






                          </li>



                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Messages</h6>
                                            <p class='text-xs'>

                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="assets/images/admin.png" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Super Admin</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    {{ csrf_field() }}
                                    <button class="btn" type="submit" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i  width="20"><img src="assets/images/logout.png" style="width: 15px; height:15px  ;margin:0 5px 0 25px" alt=""></i>
                                   <strong> <span style="color: red" >Logout</span></strong>
                                    </button>
                            </form>


                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">

                <section class="section">
                    <div class="row mb-2">
                        <div class="col-12">
                            @include('sweetalert::alert')
                            @yield('content')
                        </div>
                    </div>
                </section>
            </div>


        </div>
    </div>
    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="/sweetalert2.all.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        //deleting sweet alert
        $('#logout-form').submit(function (e){
            e.preventDefault();

        Swal.fire({
          title: 'Are you sure?',
          text: "",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Log out ',

        }).then((result) => {
          if (result.isConfirmed) {

            this.submit();
            Swal.fire(
              'Logged Out',
              '',
              'success',
              500
            )
          }

        })
        })
        //end of deleting

     </script>

</body>

</html>
