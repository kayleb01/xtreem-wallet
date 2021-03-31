<!doctype html>
<html lang="en" class="deeppurple-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="Maxartkiller">

    <title>Home · Fimobile</title>

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
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <img src="img/logo.png" alt="logo">
            <h1 class="mt-3"><span class="font-weight-light ">Xtreem</span>Wallet</h1>
            <p class="text-mute text-uppercase small">Making payments seamless</p>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
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
                    <a href="setting.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised">important_devices</i>Settings</a>
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-toggle="modal" data-target="#colorscheme"><i class="material-icons icons-raised">color_lens</i>Color scheme</a>
                    <a href="login.html" class="list-group-item list-group-item-action"><i class="material-icons icons-raised bg-danger">power_settings_new</i>Logout</a>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" class="closesidemenu"><i class="material-icons icons-raised bg-dark ">close</i></a>
    <div class="wrapper homepage">
        <!-- header -->
        <div class="header">

            <div class="">
                <div class="">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Link</a>
                            </li>
                            <li class="nav-item"><a href="notification.html" class="btn  btn-link text-dark position-relative"><i class="material-icons">notifications_none</i><span class="counts">9+</span></a></li>
                          </ul>

                        </div>
                      </nav>
                    {{-- <button class="btn  btn-link text-dark menu-btn"><i class="material-icons">menu</i><span class="new-notification"></span></button> --}}
                </div>

            </div>
        </div>
        <!-- header ends -->

        <div class="container-fluid mb-3">
            <div class="card bg-template shadow mt-4 h-190">
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-auto">
                            <figure class="avatar avatar-60"><img src="img/user1.png" alt=""></figure>
                        </div>
                        <div class="col pl-0 align-self-center">
                            <h5 class="mb-1">Emmanuel Bright</h5>
                            <p class="text-mute small">Elite</p>
                        </div>
                    </div> --}}
                </div>
            </div>

        <div class="container row top-100 mx-auto">
            <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <div class="card mb-4 shadow">
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col">
                            <p class="text-normal">My Balance</p>
                            <h3 class="mb-0 font-weight-normal mb-3">$ 1548.00</h3>
                            <hr>
                            <h3 class="mb-0 font-weight-normal">N1548.00</h3>


                        </div>
                        <div class="col-auto">
                            <button class="btn btn-default btn-rounded-54 shadow" data-toggle="modal" data-target="#addmoney"><i class="material-icons">add</i></button>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-none">
                    <div class="row">
                        <div class="col">
                            <p>71.00 <i class="material-icons text-danger vm small">arrow_downward</i><br><small class="text-mute">INR</small></p>
                        </div>
                        <div class="col text-center">
                            <p>1.00 <i class="material-icons text-success vm small">arrow_upward</i><br><small class="text-mute">USD</small></p>
                        </div>
                        <div class="col text-right">
                            <p><i class="material-icons text-success vm small mr-1">arrow_upward</i>0.78<br><small class="text-mute">GBP</small></p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                <div class="card shadow">
                    <div class="card-body">
                            <h5 class="card-title"><span class="material-icons"> history</span>  Transaction History</h5>
                            <div class="d-flex justify-content-around">
                                <div class="h-100 bg-white p-3 m-3 text-center">
                                    <span class="material-icons md-48"> trending_up</span><br><br>
                                    <h5>Check Status</h5>
                                </div>
                                <div class="h-140 bg-white p-3 m-3 ml-2 text-center">
                                    <h2 class="font-weight-bold">0</h2>
                                    <span class=" "><h6>Transactions</h6> </span>
                                    <span class="small font-weight-bold">{{date('M, Y')}}</span>
                                </div>
                            </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="swiper-container icon-slide top mb-4">
                    <div class="swiper-wrapper">
                        <a href="" class="swiper-slide text-center" data-toggle="modal" data-target="#paymodal">
                            <div class="avatar avatar-60 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons text-template">local_atm</i>
                            </div>
                            <p class="small mt-2">Pay</p>
                        </a>
                        <a href="" class="swiper-slide text-center" data-toggle="modal" data-target="#sendmoney">
                            <div class="avatar avatar-60 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons text-template">send</i>
                            </div>
                            <p class="small mt-2">Send</p>
                        </a>
                        <a href="" class="swiper-slide text-center" data-toggle="modal" data-target="#bookmodal">
                            <div class="avatar avatar-60 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons text-template">directions_railway</i>
                            </div>
                            <p class="small mt-2">Book</p>
                        </a>
                        <a href="" class="swiper-slide text-center">
                            <div class="avatar avatar-60 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons text-template">assignment</i>
                            </div>
                            <p class="small mt-2">Bills</p>
                        </a>
                        <a href="" class="swiper-slide text-center">
                            <div class="avatar avatar-60 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons text-template">camera</i>
                            </div>
                            <p class="small mt-2">Scan</p>
                        </a>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="container px-0">
                    <!-- Swiper -->
                    <div class="swiper-container two-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Home Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Cash Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Car Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Business Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Edu Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card shadow border-0">
                                    <div class="card-body">
                                        <div class="row no-gutters h-100">
                                            <div class="col">
                                                <p>$ 1548.00<br><small class="text-secondary">Home Loan EMI</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container px-0">
                    <!-- Swiper -->
                    <div class="swiper-container offer-slide">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card shadow border-0 bg-template">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-auto pr-0">
                                                <img src="img/graphics-carousel-scheme1.png" alt="" class="mw-100">
                                            </div>
                                            <div class="col align-self-center">
                                                <h5 class="mb-2 font-weight-normal">Gold loan scheme</h5>
                                                <p class="text-mute">Get all money at market rate of gold</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="card shadow border-0 bg-template">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col pr-0 align-self-center">
                                                <h5 class="mb-2 font-weight-normal">Gold loan scheme</h5>
                                                <p class="text-mute">Get all money at market rate of gold</p>
                                            </div>
                                            <div class="col-auto">
                                                <img src="img/graphics-carousel-scheme1.png" alt="" class="mw-100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h6 class="subtitle">Loan Status </h6>
            <div class="card shadow border-0 mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto pr-0">
                            <div class="avatar avatar-50 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons vm text-template">local_atm</i>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <h6 class="font-weight-normal mb-1">EMI</h6>
                            <p class="text-mute small text-secondary">Home Loan</p>
                        </div>
                        <div class="col-auto align-self-center border-left">
                            <h6 class="font-weight-normal mb-1">$ 1548.00</h6>
                            <p class="text-mute small text-secondary">Due: 15-12-2019</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow border-0 mb-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto pr-0">
                            <div class="avatar avatar-50 no-shadow border-0">
                                <div class="overlay bg-template"></div>
                                <i class="material-icons vm text-template">local_atm</i>
                            </div>
                        </div>
                        <div class="col-auto align-self-center">
                            <h6 class="font-weight-normal mb-1">EMI</h6>
                            <p class="text-mute small text-secondary">Car Loan</p>
                        </div>
                        <div class="col-auto align-self-center border-left">
                            <h6 class="font-weight-normal mb-1">$ 658.00</h6>
                            <p class="text-mute small text-secondary">Due: 18-12-2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- footer-->

        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="index.html" class="btn btn-link-default active">
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

    <!-- notification -->
    {{-- <div class="notification bg-white shadow-sm border-primary">
        <div class="row">
            <div class="col-auto align-self-center pr-0">
                <i class="material-icons text-primary md-36">fullscreen</i>
            </div>
            <div class="col">
                <h6>Viewing in Phone?</h6>
                <p class="mb-0 text-secondary">Double tap to enter into fullscreen mode for each page.</p>
            </div>
            <div class="col-auto align-self-center pl-0">
                <button class="btn btn-link closenotification"><i class="material-icons text-secondary text-mute md-18 ">close</i></button>
            </div>
        </div>
    </div> --}}
    <!-- notification ends -->

    <!-- Modal -->
    <div class="modal fade" id="addmoney" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center pt-0">
                    <img src="img/infomarmation-graphics2.png" alt="logo" class="logo-small">
                    <div class="form-group mt-4">
                        <input type="text" class="form-control form-control-lg text-center" placeholder="Enter amount" required="" autofocus="">
                    </div>
                    <p class="text-mute">You will be redirected to payment gatway to procceed further. Enter amount in USD.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-default btn-lg btn-rounded shadow btn-block" class="close" data-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sendmoney" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5>Send Money</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="form-group mt-4">
                        <select class="form-control form-control-lg text-center">
                            <option>Mrs. Magon Johnson</option>
                            <option selected>Ms. Shivani Dilux</option>
                        </select>
                    </div>

                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-60 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">London, UK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mt-4">
                        <input type="text" class="form-control form-control-lg text-center" placeholder="Enter amount" required="" autofocus="">
                    </div>
                    <p class="text-mute text-center">You will be redirected to payment gatway to procceed further. Enter amount in USD.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-default btn-lg btn-rounded shadow btn-block" class="close" data-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5>Pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">To Bill</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline2">To Person</label>
                    </div>

                    <div class="form-group mt-4">
                        <select class="form-control text-center">
                            <option>Mrs. Magon Johnson</option>
                            <option selected>Ms. Shivani Dilux</option>
                        </select>
                    </div>

                    <div class="card shadow border-0 mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-60 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">London, UK</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mt-4">
                        <input type="text" class="form-control form-control-lg text-center" placeholder="Enter amount" required="" autofocus="">
                    </div>
                    <p class="text-mute text-center">You will be redirected to payment gatway to procceed further. Enter amount in USD.</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-default btn-lg btn-rounded shadow btn-block" class="close" data-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="bookmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5>Pay</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline12" name="customRadioInline12" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline12">Flight</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline22" name="customRadioInline12" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline22">Train</label>
                    </div>
                    <h6 class="subtitle">Select Location</h6>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control text-center" placeholder="Select start point" required="" autofocus="">
                    </div>
                    <div class="form-group mt-4">
                        <input type="text" class="form-control text-center" placeholder="Select end point" required="">
                    </div>
                    <h6 class="subtitle">Select Date</h6>
                    <div class="form-group mt-4">
                        <input type="date" class="form-control text-center" placeholder="Select end point" required="">
                    </div>
                    <h6 class="subtitle">number of passangers</h6>
                    <div class="form-group mt-4">
                        <select class="form-control  text-center">
                            <option>1</option>
                            <option selected>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-default btn-lg btn-rounded shadow btn-block" class="close" data-dismiss="modal">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery, popper and bootstrap js -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- swiper js -->
    <script src="{{asset('js/swiper.min.js')}}"></script>

    <!-- cookie js -->
    <script src="vendor/cookie/jquery.cookie.js"></script>

    <!-- template custom js -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
