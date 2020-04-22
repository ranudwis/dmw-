import WebtutorMain from './WebtutorMain'
import WebtutorIndex from './WebtutorIndex'
import WebtutorWithLabel from './WebtutorWithLabel'

export default [
    {
        path: 'webtutor',
        component: WebtutorMain,
        children: [
            { path: '', component: WebtutorIndex, name: 'webtutor.index' },
            { path: 'label/:label', component: WebtutorWithLabel, name: 'webtutor.label' },
        ]
    },
]
