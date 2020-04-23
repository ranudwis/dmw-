import Vue from 'vue'
import VueRouter from 'vue-router'
import PublicMain from '@/templates/public/Main'
import Home from '@/views/home/Home'
import WebtutorRoutes from '@/views/webtutor/routes'
import Feedback from '@/views/feedback/Feedback'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: PublicMain,
        children: [
            { path: '', component: Home, name: 'home' },
            ...WebtutorRoutes,
            { path: 'feedback', component: Feedback, name: 'feedback' },
        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router
