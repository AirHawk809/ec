import Axios from "axios"

const state = {
  user: null
}

const getters = {}

const mutations = {
  setUser(state, user) {
    state.user = user
  }
}

const actions = {
  async register(context, data) {
    const response = await axios.post('/api/auth/register', data)
    context.commit('setUser', response.data)
  },
  async login(context, data) {
    const response = await axios.post('/api/auth/login', data)
    console.log(response)
    context.commit('setUser', response.data)
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}