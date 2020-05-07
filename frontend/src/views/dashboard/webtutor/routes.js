import dashboard from '@/router/dashboard'

const component = dashboard('webtutor')

export default [
    { path: 'webtutor', component: component('WebtutorIndex'), name: 'dashboard.webtutor.index' },
    { path: 'webtutor/label', component: component('WebtutorLabel'), name: 'dashboard.webtutor.label' },
]
