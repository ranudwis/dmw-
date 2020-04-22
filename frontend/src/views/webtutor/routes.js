import WebtutorMain from './WebtutorMain'
import WebtutorIndex from './WebtutorIndex'

export default [
    {
        path: 'webtutor',
        component: WebtutorMain,
        children: [
            { path: '', component: WebtutorIndex, name: 'webtutor.index' },
        ]
    },
]
