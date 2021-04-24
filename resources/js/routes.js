import Dashboard from './components/Dashboard.vue';
import Home from './components/Home.vue';
import Login from './components/Login.vue';


export const routes = [

    { path: '/login', component: Login, name: 'Login' },
    { path: '/dashboard', component: Dashboard, name: 'Dashboard' },
    { path: '/', component: Home, name: 'Home' },


];
