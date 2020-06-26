import store from '@/store'

export const isLoading = (name) => store.get('loader/loading', name)

export const interceptors = {
    request(config) {
        if (config.loader) {
            store.dispatch('loader/load', config.loader)
        }

        return config
    },

    response(response) {
        if (response.config.loader) {
            store.dispatch('loader/unload', response.config.loader)
        }

        return response
    }
}
