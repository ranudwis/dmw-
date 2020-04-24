import ModuleMain from './ModuleMain'
import ModuleIndex from './ModuleIndex'
import SemesterShow from './SemesterShow'
import CourseShow from './CourseShow'

export default [
    {
        path: 'modul',
        component: ModuleMain,
        children: [
            { path: '', component: ModuleIndex, name: 'module.index' },
            { path: 'semester/:slug', component: SemesterShow, name: 'semester.show' },
            { path: 'matkul/:slug', component: CourseShow, name: 'course.show' },
        ]
    }
]
