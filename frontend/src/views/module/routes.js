import ModuleMain from './ModuleMain'
import ModuleIndex from './ModuleIndex'
import SemesterShow from './SemesterShow'

export default [
    {
        path: 'modul',
        component: ModuleMain,
        children: [
            { path: '', component: ModuleIndex, name: 'module.index' },
            { path: 'semester/:slug', component: SemesterShow, name: 'semester.show' },
        ]
    }
]
