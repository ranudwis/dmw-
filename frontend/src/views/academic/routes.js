import AcademicIndex from './AcademicIndex'
import SemesterShow from './SemesterShow'
import CourseShow from './CourseShow'
import ExamShow from './ExamShow'

export default [
    { path: 'akademis', component: AcademicIndex, name: 'module.index' },
    { path: 'semester/:slug', component: SemesterShow, name: 'semester.show' },
    { path: 'matkul/:slug', component: CourseShow, name: 'course.show' },
    { path: 'matkul/:slug/ujian/:examId', component: ExamShow, name: 'exam.show' },
]
