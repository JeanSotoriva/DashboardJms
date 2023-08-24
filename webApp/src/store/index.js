import { createStore } from 'vuex'
import usuarios from './modules/usuarios'
import colaboradores from './modules/colaboradores'
import auth from './modules/auth/auth'
import { state, mutations } from './default'

const store = createStore({
  modules: {
    usuarios,
    colaboradores,
    auth
  },
  state,
  mutations
})

export default store