import Vue from 'vue'
import VueRouter from 'vue-router'
import PublicMain from '@/templates/public/Main'
import Home from '@/views/home/Home'
import WebtutorRoutes from '@/views/webtutor/routes'
import Feedback from '@/views/feedback/Feedback'
import AcademicRoute from '@/views/academic/routes'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: PublicMain,
        children: [
            { path: '', component: Home, name: 'home' },
            ...WebtutorRoutes,
            ...AcademicRoute,
            { path: 'feedback', component: Feedback, name: 'feedback' },
        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes,
    scrollBehavior(to, from, savedPosition) {
        return savedPosition ? savedPosition : { x: 0, y: 0 }
    }
})

export default router
