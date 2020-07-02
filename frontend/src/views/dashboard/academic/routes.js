import dashboard from '@/router/dashboard'

const component = dashboard('academic')

export default [
    { path: 'matkul', component: component('CourseIndex'), name: 'dashboard.academic.course' },
    { path: 'matkul/:slug', component: component('CourseShow'), name: 'dashboard.academic.course.show' },
]
