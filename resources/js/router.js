import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from './pages/Login.vue'
import Register from './pages/Register.vue'
import Home from './pages/Home.vue'
import Settlement from './pages/Settlement.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: Home
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/register',
    component: Register
  },
  {
    path: '/payment',
    component: Settlement
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router