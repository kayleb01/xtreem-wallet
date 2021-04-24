require('./bootstrap');

// Import modules...
import { createApp } from 'vue';

import Login from './components/Login.vue';
import Dashboard from './components/Dashboard.vue';


createApp({
    components:{
        Login,
        Dashboard
    }
}).mount('#app')
// const app = Vue({
//     el: '#app',
//     router

// });

