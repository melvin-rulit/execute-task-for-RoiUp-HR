
//-- Import vue-router
import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {path: '/client/:link', name: 'Home', component: () => import('./components/RouterComponents/HomePage.vue'), props: true},
    {path: '/delete_link', name: 'DeleteLink', component: () => import('./components/RouterComponents/DeleteLink.vue')},
    {path: '/generate_link', name: 'GenerateLink', component: () => import('./components/RouterComponents/GenerateLink.vue')},
    {path: '/feeling_lock', name: 'FeelingLock', component: () => import('./components/RouterComponents/FeelingLock.vue')},
    {path: '/', name: 'Register', component: () => import('./components/Auth/Register.vue')},
    {path: '/admins_panel', name: 'Admin', component: () => import('./components/Menu/MenuComponent.vue')},

]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
