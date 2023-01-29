import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import About from './pages/About.vue';
import Projects from './pages/Projects.vue';
import Detail from './pages/Detail.vue';
import Error404 from './pages/Error404.vue';

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass : 'active' ,
    linkExactActiveClass : 'exactive' ,
    routes: [
        {
            path: '/',
            name: 'homepage',
            component: Home
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: Contacts
        },
        {
            path: '/chi_siamo',
            name: 'about',
            component: About
        },
        {
            path: '/progetti',
            name: 'projects',
            component: Projects
        },
        {
            path: '/projetti/dettaglio-progetto/:slug',
            name: 'detail',
            component: Detail
        },
        {
        path: '/:pathMatch(.*)*',

        component: Error404
        }
    ]

});

export { router };
