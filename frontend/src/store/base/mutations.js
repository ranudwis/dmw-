import { make } from 'vuex-pathify'

export default stateObject => {
    return {
        ...make.mutations(stateObject()),

        RESET(state) {
            Object.assign(state, stateObject())
        }
    }
}
