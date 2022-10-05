import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '../views/LoginView.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component: LoginView
  },
  {
    path: "/chat",
    name: "chat",
    component: HomeView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
