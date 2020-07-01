import dashboard from '@/router/dashboard'

const component = dashboard('academic')

export default [
    { path: 'akademis', component: component('AcademicIndex'), name: 'dashboard.academic.index' },
]
