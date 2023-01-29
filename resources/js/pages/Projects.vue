<script>

import axios from 'axios';
import { store } from '../data/store'
import ProjectCard from '../components/ProjectCard.vue';
export default {

    name: 'Projects',
    components:{
        ProjectCard,
    },
    data(){
        return{
            store
        }
    },

    methods:{
        getApi(url){
            axios.get(url)

                .then(result => {
                    store.projects = result.data.projects.data,
                    store.next_page = result.data.projects.next_page_url,
                    store.prev_page = result.data.projects.prev_page_url,
                    store.paginator = result.data.projects.links
                    console.log(store.projects);
                })
        },

        truncateStr(string){
            if(string.length > 120){
               return string.substr(0,120) + '...'
            }else{
                return string
            }
        }
    },

    mounted(){
        this.getApi('http://127.0.0.1:8000/api/projects?page=1');
    }
}
</script>

<template>

        <div class="container d-flex flex-column align-items-center">

            <div class="paginator">
                <button class="btn btn-primary btn-sm mx-2"
                @click="getApi(store.prev_page)"
                :disabled="store.prev_page === null"
                >
                    Prev
                </button>

                <button class="btn btn-primary btn-sm mx-2"
                v-for="page in store.paginator" :key="page.label"
                @click="getApi(page.url)"
                :disabled="page.active == true"
                v-show="!page.label.includes('&')"
                >
                   {{ page.label }}
                </button>

                <button class="btn btn-primary btn-sm mx-2"
                @click="getApi(store.next_page)"
                :disabled="store.next_page === null"
                >
                    Next
                </button>
            </div>

            <div class="row">
                <ProjectCard v-for="project in store.projects" :key="project.id" :project="project" />
            </div>
        </div>


</template>

<style lang="scss" scoped>
    @use '../../scss/appVue.scss';

</style>
