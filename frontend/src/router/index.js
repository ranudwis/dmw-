import Vue from 'vue'
import VueRouter from 'vue-router'
import PublicMain from '@/templates/public/Main'
import Home from '@/views/home/Home'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: PublicMain,
        children: [
            { path: '', component: Home, name: 'home' },
        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
