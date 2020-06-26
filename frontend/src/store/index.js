import Vue from 'vue'
import Vuex from 'vuex'
import pathify from 'vuex-pathify'
import alert from './alert'
import loader from './loader'

Vue.use(Vuex)

export default new Vuex.Store({
    plugins: [ pathify.plugin ],
    modules: {
        alert,
        loader,
    }
})
