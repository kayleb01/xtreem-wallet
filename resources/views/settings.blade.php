<!doctype html>
<html lang="en" class="deeppurple-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Setting · Settings</title>
     <!-- Material design icons CSS -->
     <link rel="stylesheet" href="{{asset('css/material-icons.css')}}">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
     rel="stylesheet">
     <!-- Roboto fonts CSS -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

     <!-- Bootstrap core CSS -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

     <!-- Swiper CSS -->
     <link href="{{asset('css/swiper.min.css')}}" rel="stylesheet">

     <!-- Custom styles for this template -->
     <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Loader -->
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="img/logo.png" alt="logo">
            <h1 class="mt-3"><span class="font-weight-light ">Xtreen</span>wallet</h1>
            <p class="text-mute text-uppercase small">Making payments seamless</p>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Loader ends -->

    <!-- sidebar -->
    <div class="sidebar">
        <div class="mt-4 mb-3">
            <div class="row">
                <div class="col-auto">
                    <figure class="avatar avatar-60 border-0"><img src="img/user1.png" alt=""></figure>
                </div>
                <div class="col pl-0 align-self-center">
                    <h5 class="mb-1">Ammy Jahnson</h5>
                    <p class="text-mute small">Work, London, UK</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="list-group main-menu">
                    <a href="index.html" class="list-group-item list-group-item-action active"><i class="material-icons icons-raised">home</i>Home</a>
                    <a href="notification.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">notifications</i>Notification <span class="badge badge-dark text-white">2</span></a>
                    <a href="alltransactions.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">find_in_page</i>History</a>
                    <a href="controls.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">view_quilt<span class="new-notification"></span></i>Pages Controls</a>
                    <a href="setting.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">important_devices</i>Settings</a><a href="javascript:void(0)" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#colorscheme"><i class="material-icons icons-raised">color_lens</i>Color scheme</a>
                    <a href="login.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised bg-danger">power_settings_new</i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" class="closesidemenu"><i class="material-icons icons-raised bg-dark ">close</i></a>
    <!-- sidebar ends -->

    <div class="wrapper">
        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <button class="btn  btn-link text-dark menu-btn"><i class="material-icons">menu</i><span class="new-notification"></span></button>
                </div>
                <div class="col text-center"><img src="img/logo-header.png" alt="" class="header-logo"></div>
                <div class="col-auto">
                    <a href="notification.html" class="btn  btn-link text-dark position-relative"><i class="material-icons">notifications_none</i><span class="counts">9+</span></a>
                </div>
            </div>
        </div>
        <!-- header ends -->

        <div class="container">
            <div class="row mt-3">
                <div class="col-12 px-0">
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <h6 class="text-dark mb-1">Email Notification</h6>
                                    <p class="text-secondary mb-0 small">Default all notification will be sent</p>
                                </div>
                                <div class="col-2 pl-0 align-self-center text-right">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                                        <label class="custom-control-label" for="customSwitch1"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <h6 class="text-dark mb-1">SMS Notification</h6>
                                    <p class="text-secondary mb-0 small">Receive SMS notification</p>
                                </div>
                                <div class="col-2 pl-0 align-self-center text-right">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                                        <label class="custom-control-label" for="customSwitch4"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <h6 class="text-dark mb-1">Profile Avaialability</h6>
                                    <p class="text-secondary mb-0 small">Everyone can see my profile in search</p>
                                </div>
                                <div class="col-2 pl-0 align-self-center text-right">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                                        <label class="custom-control-label" for="customSwitch2"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <h6 class="text-dark mb-1">Sent Request</h6>
                                    <p class="text-secondary mb-0 small">Everyone can sent me a request</p>
                                </div>
                                <div class="col-2 pl-0 align-self-center text-right">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitch3">
                                        <label class="custom-control-label" for="customSwitch3"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <a href="change-password.html" class="row">
                                <div class="col">
                                    <h6 class="text-dark mb-1">Change password</h6>
                                    <p class="text-secondary mb-0 small">You must need your verified email</p>
                                </div>
                                <div class="col-2 pl-0 align-self-center text-right">
                                     <i class="material-icons text-secondary">chevron_right</i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- footer-->
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="index.html" class="btn btn-link-default ">
                                <i class="material-icons">home</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="statistics.html" class="btn btn-link-default">
                                <i class="material-icons">insert_chart_outline</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="wallet.html" class="btn btn-link-default">
                                <i class="material-icons">account_balance_wallet</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="transactions.html" class="btn btn-link-default">
                                <i class="material-icons">widgets</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="profile.html" class="btn btn-link-default">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer ends-->
    </div>



    <!-- color chooser menu start -->
    <div class="modal fade " id="colorscheme" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header theme-header border-0">
                    <h6 class="">Color Picker</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="text-center theme-color">
                        <button class="m-1 btn red-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="red-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn blue-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="blue-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn yellow-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="yellow-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn green-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="green-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn pink-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="pink-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn orange-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="orange-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn purple-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="purple-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn deeppurple-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="deeppurple-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn lightblue-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="lightblue-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn teal-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="teal-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn lime-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="lime-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn deeporange-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="deeporange-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn gray-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="gray-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                        <button class="m-1 btn black-theme-bg text-white btn-rounded-54 shadow-sm" data-theme="black-theme"><i class="material-icons w-50">color_lens_outline</i></button>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-6 text-left">
                        <div class="row">
                            <div class="col-auto text-right align-self-center"><i class="material-icons text-warning vm">wb_sunny</i></div>
                            <div class="col-auto text-center align-self-center px-0">
                                <div class="custom-control custom-switch float-right">
                                    <input type="checkbox" name="themelayout" class="custom-control-input" id="theme-dark">
                                    <label class="custom-control-label" for="theme-dark"></label>
                                </div>
                            </div>
                            <div class="col-auto text-left align-self-center"><i class="material-icons text-dark vm">brightness_2</i></div>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <div class="row">
                            <div class="col-auto text-right align-self-center">LTR</div>
                            <div class="col-auto text-center align-self-center px-0">
                                <div class="custom-control custom-switch float-right">
                                    <input type="checkbox" name="rtllayout" class="custom-control-input" id="theme-rtl">
                                    <label class="custom-control-label" for="theme-rtl"></label>
                                </div>
                            </div>
                            <div class="col-auto text-left align-self-center">RTL</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- color chooser menu ends -->


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- swiper js -->
    <script src="{{asset('js/swiper.min.js')}}"></script>

    <!-- cookie js -->
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- template custom js -->
    <script src="{{asset('js/main.js')}}"></script>

<script>
    </script>
</body>

</html>