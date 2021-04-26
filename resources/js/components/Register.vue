<template>
    <div>

    <div class="wrapper">
        <!-- header -->
        <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <a href="introduction.html" class="btn  btn-link text-dark"><i class="material-icons">chevron_left</i></a>
                </div>
                <div class="col text-center"></div>
                <div class="col-auto">
                </div>
            </div>
        </div>
        <!-- header ends -->

        <div class="row no-gutters login-row">
            <div class="col align-self-center px-3 text-center">
                <br>
                <img src="/storage/img/logo.png" alt="logo" height="50" width="70" class="m-3">
                <form class="form-signin mt-3 ">
                    <div class="form-group">
                        <input type="text" id="username" class="form-control form-control-lg text-center" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="number" id="phone" class="form-control form-control-lg text-center" placeholder="Phone Number" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="inputEmail" class="form-control form-control-lg text-center" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="inputPassword" class="form-control form-control-lg text-center" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="confirmPassword" class="form-control form-control-lg text-center" placeholder="Confirm Password" required>
                    </div>

                </form>
            </div>
        </div>

        <!-- login buttons -->
        <div class="row mx-0 bottom-button-container">
            <div class="col">
                <a href="otp.html" class="btn btn-default btn-lg btn-rounded shadow btn-block">Next</a>
            </div>
        </div>
        <!-- login buttons -->
    </div>


    </div>
</template>
<script>
export default {
    data() {

    },
}
</script>
