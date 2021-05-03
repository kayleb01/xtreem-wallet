<template>
    <div>

    <div class="wrapper">
        <!-- header -->
        <!-- <div class="header">
            <div class="row no-gutters">
                <div class="col-auto">
                    <a href="#" onclick="window.history.back()" class="btn  btn-link text-dark"><i class="material-icons">chevron_left</i></a>
                </div>
                <div class="col text-center"></div>
                <div class="col-auto">
                </div>
            </div>
        </div> -->
        <!-- header ends -->

        <div class="row no-gutters">
            <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 bg-white mx-auto align-self-center px-3 m-4 text-center shadow">
                <div class="m-3 px-3 text-center">
                    <img src="/storage/img/logo.png" class="align-center m-3" alt="logo" height="50" width="70">
                    <form class="mt-3" @submit.prevent="register">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control form-control-lg" placeholder="First name" required autofocus v-model="form.first_name">
                        </div>
                         <div class="form-group">
                            <input type="text" name="last_name" class="form-control form-control-lg" placeholder="Last name" required v-model="form.last_name">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control form-control-lg " placeholder="Phone Number" required v-model="form.phone">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="email" required v-model="form.email">
                        </div>
                         <div class="form-group">
                           <select name="country" id="country" class="form-control" v-model="form.country">
                               <option value="" disabled> select country</option>
                               <option value="NGN">Nigeria</option>
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required v-model="form.password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required v-model="form.password_confirmation">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-block btn-primary rounded"> Register</button>
                            <div class="text-center font-weight-bold m-3 text-dark pointer"><span onclick="window.history.back()">Go back</span></div>
                        </div>
                    </form>
                    <div class="border border-success text-success p-2 m-3" v-if="feedback !=''">{{feedback}}</div>
                </div>

            </div>
        </div>

    </div>


    </div>
</template>
<script>
export default {
    data() {

        return{
            form:{
                first_name:"",
                last_name: "",
                phone: "",
                email: "",
                password:"",
                role_id: 1,
                country: "",
                password_confirmation:""
            },
            loading:false,
            feedback:""
        }
    },

    methods:{
        register(){
            this.loading = true
            axios.post('api/register', this.form, {
                headers:{
                    'contentType': 'application/json',
                    'accept': 'application/json'
                }
            })
            .then((response) => {
                this.loading = false;
                this.feedback = response.data.message
            })
            .catch((error) => {
             console.log(error)

             })
        }
    }
}
</script>
