require('./bootstrap');

// Import modules...
import { createApp } from 'vue';

import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';
import Register from './components/Register.vue'

createApp({
    components:{
        Login,
        Dashboard,
        Register
    }
}).mount('#app')
// const app = Vue({
//     el: '#app',
//     router

// });

