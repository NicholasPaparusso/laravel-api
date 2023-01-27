<script>

import axios from 'axios';
import { store } from './data/store'
import ProjectCard from './components/ProjectCard.vue';
export default {

    name: 'App',
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

    <header>
        <div class="container d-flex justify-content-center align-items-center h-100">
            <h1 class="text-center text-white">
               Guest Home-Page
            </h1>
        </div>
    </header>

    <main class="py-5">
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
    </main>

</template>

<style lang="scss">
    // @use './styles/general.scss';
    header{
        background-color: #0e0e0e;
        height: 70px;
        position: fixed;
        top: 0;
        z-index: 99;
        width: 100%;
        margin-bottom: 70px;

        h1{
            font-size: 1.5em;
            font-weight: bold;
        }
    }

    main{
        margin-top: 70px ;
        height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .text p{
        font-size: .8em;
    }

    .np-card{
        border: 1px solid lightblue;
    }

</style>
