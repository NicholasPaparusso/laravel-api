<script>

import axios from 'axios';
import {baseUrl} from '../data/data';
import {truncateStr} from '../data/functions/';
export default {
    name: 'Detail',

    data(){
        return{
            baseUrl,
            truncateStr,
            project: {}
        }
    },

    methods:{

        getApi(){
            axios.get(baseUrl + this.$route.params.slug)

            .then(result => {
                this.project = result.data
                console.log(this.project);
            })
        }

    },

    mounted(){
        this.getApi()
    },

    computed:{
        formatDate(){

            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(this.project.updated_at).toLocaleDateString('it-IT', dateOptions)
        }
    },
}
</script>


<template>
    <div class="container py-5 d-flex justify-content-center">
        <div class="np-card p-3">
            <div class="title d-flex justify-content-center align-items-center">
                <h5  v-html="project.name"></h5>
                <h6 class="mx-3">ID: {{project.id}}</h6>
                <p v-if="project.type"
                 class="mx-3  badge text-bg-primary">{{project.type.name}}</p>
            </div>

            <div class="image-container d-flex justify-content-center py-4">
                <img :src="project.cover_image" :alt="project.slug">
            </div>

            <div class="text">
                <p v-html="(project.summary)"></p>
                <div class="technologies">
                <span v-for="technology in project.technologies" :key="technology.id" class="p-1 mx-2 badge text-bg-success">{{ technology.name }}</span>
                </div>
                    </div>
            <div class="date">
                <p>Ultima modifica: {{ formatDate}}</p>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>

    p{
        font-size: .8em;
    }

    .np-card{
        border: 1px solid lightblue;
        max-width: 800px;
    }

    .date{
        padding-top: 20px;

    }

    .image-container{


        img{
        width: 500px;
        }
    }


</style>
