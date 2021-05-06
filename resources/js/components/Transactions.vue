<template>
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
                    <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" class="btn  btn-link text-dark"><i class="material-icons">navigate_before</i></a>
                </div>
                <div class="col text-center menu-btn p-2">Xtreem Wallet</div>
                <div class="col-auto">
                    <a href="notification.html" class="btn  btn-link text-dark position-relative"><i class="material-icons">notifications_none</i><span class="counts">9+</span></a>
                </div>
            </div>
        </div>
        <!-- header ends -->

        <div class="container">
            <!-- page content here -->
            <h6 class="subtitle">Transaction History</h6>
            <div class="row">
                <div class="col-12 px-0">
                    <ul class="list-group list-group-flush border-top border-bottom">
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user4.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mrs. Magon Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user3.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mr. Jack Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-danger">-$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-danger">-$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user4.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mrs. Magon Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user3.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mr. Jack Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user4.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mrs. Magon Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user3.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mr. Jack Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-danger">-$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user2.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Ms. Shivani Dilux</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-danger">-$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user4.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mrs. Magon Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <div class="avatar avatar-50 no-shadow border-0">
                                        <img src="img/user3.png" alt="">
                                    </div>
                                </div>
                                <div class="col align-self-center pr-0">
                                    <h6 class="font-weight-normal mb-1">Mr. Jack Strudio</h6>
                                    <p class="text-mute small text-secondary">15-1-2020, 8:00 am</p>
                                </div>
                                <div class="col-auto">
                                    <h6 class="text-success">$154.0</h6>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- page content ends -->
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

</template>

<script>
export default {
    data(){
        return {
                ttransactions:'',
                token: ''
        }
    },
    created(){
        if(!document.cookie.split(';').some((item) => item.trim().startsWith('key='))){
                    window.location.assign('/login')
            }
    },
    mounted(){
        if(document.cookie.split(';').some((item) => item.trim().startsWith('key='))){
            let authCookie = document.cookie.split(';')
            for (let i = 0; i < authCookie.length; i++) {
                const cc = authCookie[i].split("=");
                if ('key' == cc[0].trim()) {
                    this.token  = decodeURIComponent(cc[1])
                }
            }
        }
    },

    methods:{
        getTransactions(){
            axios.get('/transactions', {
                headers:{
                    'Content-Type': 'application/json',
                    'accept': 'application/json'
                }
            })
        }
    }

}
</script>
