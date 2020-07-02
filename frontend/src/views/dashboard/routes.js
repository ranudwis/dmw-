import DashboardIndex from './DashboardIndex'
import ExamRoute from './exam/routes'
import WebtutorRoute from './webtutor/routes'
import AcademicRoute from './academic/routes'

export default [
    { path: '', component: DashboardIndex, name: 'dashboard.index' },
    ...ExamRoute,
    ...WebtutorRoute,
    ...AcademicRoute,
]
