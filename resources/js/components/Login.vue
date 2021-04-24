<template>
    <div class=" container-fluid">
        <div class="row m-0 p-0">
            <div class="col-lg-4 my-5 col-sm-12 col-xs-12 col-md-8 rounded mx-auto shadow bg-white mt-5 pt-4">
                 <div class="m-3 px-3 text-center">
                    <br>
                    <img src="storage/img/logo.png" alt="logo" height="50" width="70" class="m-3">
                    <form class="form-signin mt-3 " @submit.prevent="login()">
                        <div class="form-group">
                            <input type="email" id="email" class="form-control text-center" name="email"  placeholder="something@mail.com" v-model="form.email" required autofocus>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control  text-center" name="password" placeholder="Password"  v-model="form.password" required>
                        </div>

                       <div class="form-group my-4 text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="custom-control-label" for="rememberme">Remember Me</label>
                            </div>
                        </div>


                    <!-- login buttons -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-secondary  btn-rounded shadow btn-block">Login</button>
                            </div>
                            <hr class="m-3">
                            <!-- login buttons -->
                        <a href="/forgot-password" class=" small mt-4 d-block">Forgot Password?</a>
                    </form>
                </div>
             </div>
            </div>
        </div>
</template>

<script>

export default {
    data(){
        return{
                form:{email:'', password:''}
        }
    },



    methods:{
        login(){
            axios.
                post('api/login', this.form,{
                    headers:{
                        'contentType':'application/json',
                        'accept':'application/json'
                    }
                })
            .then((res) =>{
                let response = res.data
                let token = response.token

                //set the user token for subsequent
                //requests
                this.setCookie(token)

                //redirect the user to dashboard using view router
               window.location.assign('/dashboard');

            }

            )
            .catch( err => console.log(err))
        },


        setCookie(token){
            let date = new Date()
            date.setTime(date.getTime() + (5 * 24 * 60 * 60 * 1000))
            let expires = "expires=" + date.toUTCString()
            document.cookie = 'key=' + token + ';' + expires + ";path=/"
        }

    }
}

</script>
