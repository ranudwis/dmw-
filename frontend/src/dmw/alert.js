import store from '@/store'
import messageResolver from './message'

function dispatch (type, message) {
    store.dispatch(`alert/alert`, { type, message: messageResolver(message) })
}

export default {
    success (message) {
        dispatch('success', message)
    },

    failed (message) {
        dispatch('failed', message)
    }
}
