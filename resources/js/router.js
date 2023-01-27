import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import Contacts from './pages/Contacts.vue';
import About from './pages/About.vue';
import Detail from './pages/Detail.vue';

const router = createRouter({
    history: createWebHistory(),

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
        }
        // {
        //     path: '',
        //     name: '',
        //     component:
        // },
        // {
        //     path: '',

        //     component:
        // }
    ]

});

export { router };
