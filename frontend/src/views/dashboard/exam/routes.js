import dashboard from '@/router/dashboard'

const component = dashboard('exam')

export default [
    { path: 'ujian', component: component('ExamIndex'), name: 'dashboard.exam.index' },
]
