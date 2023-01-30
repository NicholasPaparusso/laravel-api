<script>

import axios from 'axios';
import { store } from '../data/store'
import ProjectCard from '../components/ProjectCard.vue';
import FormSearch from '../components/FormSearch.vue';
import TypeSearch from '../components/TypeSearch.vue';
import TechSearch from '../components/TechSearch.vue';
export default {

    name: 'Projects',
    components:{
        ProjectCard,
        FormSearch,
        TypeSearch,
        TechSearch,
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
                    store.types = result.data.types,
                    store.technologies = result.data.technologies,
                    store.next_page = result.data.projects.next_page_url,
                    store.prev_page = result.data.projects.prev_page_url,
                    store.paginator = result.data.projects.links
                    console.log(store.technologies);
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

            <div class="row w-100 mb-4 d-flex align-items-center">
                <div class="col-4 d-flex justify-content-center"><TechSearch /></div>
                <div class="col-4 d-flex justify-content-center"><FormSearch /></div>
                <div class="col-4 d-flex justify-content-center"><TypeSearch /></div>
            </div>

            <div v-if="store.showPaginator != false" class="paginator">
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

            <div>
                <button v-if="store.showPaginator == false" @click="(store.showPaginator = true) && (getApi('http://127.0.0.1:8000/api/projects?page=1'))"  class="paginator-toggle"  >Annulla ricerca</button>
            </div>

            <div class="row d-flex justify-content-center w-100">
                <ProjectCard v-for="project in store.projects" :key="project.id" :project="project" />
            </div>
        </div>


</template>

<style lang="scss" scoped>
    @use '../../scss/appVue.scss';

    .paginator-toggle{
        background: white;
        outline: 2px solid lightblue;
        border: 0px;
        padding: 5px 10px;
        border-radius: 20px;
    }

</style>
