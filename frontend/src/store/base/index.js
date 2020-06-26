import mutations from './mutations'

export default (stateObject, addition = {}) => {
    return {
        namespaced: true,
        state: stateObject,
        mutations: {
            ...mutations(stateObject),
            ...addition.mutations,
        },
        getters: addition.getters,
        actions: addition.actions,
    }
}
