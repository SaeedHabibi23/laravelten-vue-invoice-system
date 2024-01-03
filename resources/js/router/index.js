import { createRouter, createWebHistory } from "vue-router";


import InvoiceIndex from '../components/invoice/index.vue' 

import notfound from '../components/PageNotFound.vue'


const routes = [
    {
        path: '/',
        component: InvoiceIndex
    },
    {
        path: '/:pathMatch(.*)*',
        component:  notfound,
    },
]


const router = createRouter({
    history: createWebHistory(),
    routes
})
export default router
