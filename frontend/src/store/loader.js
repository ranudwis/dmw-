import Vue from 'vue'
import store from './base'

function loader() {
    return {
        loaders: {}
    }
}

const getters = {
    loading: (state) => (name) => !!state.loaders[name]
}

const mutations = {
    CREATE_LOADER(state, name) {
        Vue.set(state.loaders, name, 1)
    },

    ADD_LOADER(state, name) {
        Vue.set(state.loaders, name, state.loaders[name] + 1)
    },

    SUB_LOADER(state, name) {
        Vue.set(state.loaders, name, state.loaders[name] - 1)
    },

    DELETE_LOADER(state, name) {
        delete state.loaders[name]
    }
}

const actions = {
    load({ commit, state }, name) {
        if (state.loaders[name]) {
            commit('ADD_LOADER', name)
        } else {
            commit('CREATE_LOADER', name)
        }
    },

    unload({ commit, state }, name) {
        if (state.loaders[name]) {
            commit('SUB_LOADER', name)

            if (state.loaders[name] == 0) {
                commit('DELETE_LOADER', name)
            }
        }
    }
}

export default store(loader, { getters, mutations, actions })
