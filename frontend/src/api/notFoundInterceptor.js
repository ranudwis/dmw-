import store from '@/store'
import alert from '@/dmw/alert'

export default {
    request(config) {
        store.set('notfound/handling', null)

        return config
    },

    response: [
        function (response) {
            return response
        },

        function (error) {
            if (
                error.response.status
                && error.response.status === 404
            ) {
                if (error.config.notFoundHandler) {
                    store.dispatch('notfound/handle', error.config.notFoundHandler)
                } else {
                    alert.failed('http.notFound')
                }
            }

            return Promise.reject(error)
        }
    ]
}
