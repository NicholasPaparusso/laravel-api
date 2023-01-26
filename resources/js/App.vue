<script>

import axios from 'axios';

export default {

    name: 'App',

    data(){
        return{
            projects:[],
            next_page: null,
            prev_page:null,
            paginator: [],
        }
    },

    methods:{
        getApi(url){
            axios.get(url)

                .then(result => {
                    this.projects = result.data.projects.data,
                    this.next_page = result.data.projects.next_page_url,
                    this.prev_page = result.data.projects.prev_page_url,
                    this.paginator = result.data.projects.links
                    console.log(this.paginator);
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
                @click="getApi(this.prev_page)"
                :disabled="this.prev_page === null"
                >
                    Prev
                </button>

                <button class="btn btn-primary btn-sm mx-2"
                v-for="page in paginator" :key="page.label"
                @click="getApi(page.url)"
                :disabled="page.active == true"
                v-show="!page.label.includes('&')"
                >
                   {{ page.label }}
                </button>

                <button class="btn btn-primary btn-sm mx-2"
                @click="getApi(this.next_page)"
                :disabled="this.next_page === null"
                >
                    Next
                </button>
            </div>

            <div class="row">

                <div v-for="project in projects" :key="project.id" class="col-4 p-4 ">

                    <div class="np-card p-3">
                        <div class="title d-flex align-items-center">
                            <h5 v-html="project.name"></h5>
                            <h6 class="mx-3">ID: {{project.id}}</h6>
                            <p v-if="project.type"
                             class="mx-3  badge text-bg-primary">{{project.type.name}}</p>
                        </div>

                        <div class="text">
                            <p v-html="truncateStr(project.summary)"></p>
                            <div class="technologies">
                                <span v-for="technology in project.technologies" :key="technology.id" class="p-1 mx-2 badge text-bg-success">{{ technology.name }}</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </main>

</template>

<style lang="scss" scoped>

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
