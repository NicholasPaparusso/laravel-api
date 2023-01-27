<script>

import axios from 'axios';
import { store } from './data/store'
import AppHeader from './components/AppHeader.vue'
import ProjectCard from './components/ProjectCard.vue';
export default {

    name: 'App',
    components:{
        AppHeader
    },
    data(){
        return{
            store
        }
    },

    methods:{

    },

    mounted(){

    }
}
</script>

<template>

    <AppHeader></AppHeader>
    <main class="py-5">
        <router-view></router-view>
    </main>

</template>

<style lang="scss">
    @use '../scss/appVue.scss';
</style>
