import Vue from 'vue'
import Router from 'vue-router'

import HomeLayout from '../layouts/home'
import DashboardLayout from '../layouts/dashboard'

import Home from '../components/home/home'
import Login from '../components/home/login'
import Register from '../components/home/register'
import Blog from '../components/home/blog'
import Career from '../components/home/career'

import Dashboard from '../components/dashboard/dashboard'
import Posts from '../components/dashboard/posts'
import Offers from '../components/dashboard/offers'

Vue.use(Router)

const routes = [
    {
        name: 'homeloyouts',
        path: '/',
        component: HomeLayout,
        meta: { requiresAuth: false },
        children: [
            {
                name: 'home',
                path: '/home',
                component: Home,
                meta: { requiresAuth: false },
            },
            {
                name: 'login',
                path: '/login',
                component: Login,
                meta: { requiresAuth: false },
            },
            {
                name: 'register',
                path: '/register',
                component: Register,
                meta: { requiresAuth: false },
            },
            {
                name: 'blog',
                path: '/blog',
                component: Blog,
                meta: { requiresAuth: false },
            },
            {
                name: 'career',
                path: '/career',
                component: Career,
                meta: { requiresAuth: false },
            }
        ]
    },
    {
        name: 'dashboardloyouts',
        path: '/',
        component: DashboardLayout,
        meta: { requiresAuth: false },
        children: [
            {
                name: 'dashboard',
                path: '/dashboard',
                component: Dashboard,
                meta: { requiresAuth: true },
            },
            {
                name: 'posts',
                path: '/posts',
                component: Posts,
                meta: { requiresAuth: true },
            },
            {
                name: 'offers',
                path: '/offers',
                component: Offers,
                meta: { requiresAuth: true },
            }
        ]
    }
]

const router = new Router({
    routes,
    mode: 'history',
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('user') == null) next('/login')
        else next()
    } else {
        if (localStorage.getItem('user') != null && to.path == '/login') next('/dashboard')
        if (localStorage.getItem('user') != null && to.path == '/register') next('/dashboard')
        next()
    }
})

export default router