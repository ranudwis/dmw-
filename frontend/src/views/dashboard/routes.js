import DashboardIndex from './DashboardIndex'
import WebtutorRoute from './webtutor/routes'
import AcademicRoute from './academic/routes'

export default [
    { path: '', component: DashboardIndex, name: 'dashboard.index' },
    ...WebtutorRoute,
    ...AcademicRoute,
]
