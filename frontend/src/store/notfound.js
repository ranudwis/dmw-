import store from './base'

function notfound() {
    return {
        handling: null
    }
}

const actions = {
    handle({ commit }, notFoundHandler) {
        commit('SET_HANDLING', notFoundHandler)
    }
}

export default store(notfound, { actions })
