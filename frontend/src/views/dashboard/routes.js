import DashboardIndex from './DashboardIndex'
import WebtutorRoute from './webtutor/routes'

export default [
    { path: '', component: DashboardIndex, name: 'dashboard.index' },
    ...WebtutorRoute,
]
