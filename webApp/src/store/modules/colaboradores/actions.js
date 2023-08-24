import axios from "axios"
import { URI_BASE_API } from '@/configs/axios'
import { TOKEN_NAME } from '@/configs/axios';

export default {
  getColaboradores ({ commit }) {
    const token = localStorage.getItem(TOKEN_NAME)
    if (!token) return Promise.reject();
    commit('SET_PRELOADER', true)
    commit('SET_TEXT_PRELOADER', 'Carregando os colaboradores')
  
    return axios.get(`${URI_BASE_API}/colaborador`, {
      headers: {
          'Authorization': `Bearer ${token}`
      }
    }) 
    .then(response => commit('SET_COLABORADORES', response.data))
    .finally(() => commit('SET_PRELOADER', false))
  },
}