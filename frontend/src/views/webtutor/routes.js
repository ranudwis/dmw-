import WebtutorMain from './WebtutorMain'
import WebtutorIndex from './WebtutorIndex'
import WebtutorShow from './WebtutorShow'
import WebtutorWithLabel from './WebtutorWithLabel'

export default [
    {
        path: 'webtutor',
        component: WebtutorMain,
        children: [
            { path: '', component: WebtutorIndex, name: 'webtutor.index' },
            { path: ':slug', component: WebtutorShow, name: 'webtutor.show' },
            { path: 'label/:label', component: WebtutorWithLabel, name: 'webtutor.label' },
        ]
    },
]
