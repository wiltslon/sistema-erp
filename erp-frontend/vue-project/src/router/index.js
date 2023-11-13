import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import EmpresaView from '../views/Empresa/index.vue'
import EmpresaShow from '../views/Empresa/show.vue'
import EmpresaCreate from '../views/Empresa/create.vue'
import EmpresaEdit from '../views/Empresa/edit.vue'
import ClienteView from '../views/Cliente/index.vue'
import ClienteShow from '../views/Cliente/show.vue'
import ClienteCreate from '../views/Cliente/create.vue'
import ClienteEdit from '../views/Cliente/edit.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    },
    {
      path: '/empresa',
      name: 'empresa',
      component: EmpresaView
    },
    {
      path: '/empresa/:codigo/show',
      name: 'empresaShow',
      component: EmpresaShow
    },
    {
      path: '/empresa/:codigo/edit',
      name: 'empresaEdit',
      component: EmpresaEdit
    },
    {
      path: '/empresa/create',
      name: 'empresaCreate',
      component: EmpresaCreate
    },
    {
      path: '/cliente',
      name: 'cliente',
      component: ClienteView
    },
    {
      path: '/cliente/:codigo/show',
      name: 'clienteShow',
      component: ClienteShow
    },
    {
      path: '/cliente/create',
      name: 'clienteCreate',
      component: ClienteCreate
    },
    {
      path: '/cliente/:codigo/edit',
      name: 'clienteEdit',
      component: ClienteEdit
    }
  ]
})

export default router
