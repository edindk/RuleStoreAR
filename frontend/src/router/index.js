import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import About from '../views/About.vue'
import ARViewer from "@/components/ARViewer.vue";
import Login from '../views/Auth/Login.vue'
import Logout from '../views/Auth/Logout.vue'
import Register from '../views/Auth/Register.vue'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/arviewer',
        name: 'arviewer',
        component: ARViewer
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
