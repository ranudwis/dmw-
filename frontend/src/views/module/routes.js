import ModuleMain from './ModuleMain'
import ModuleIndex from './ModuleIndex'

export default [
    {
        path: 'modul',
        component: ModuleMain,
        children: [
            { path: '', component: ModuleIndex, name: 'module.index' },
        ]
    }
]
