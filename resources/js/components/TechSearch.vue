<script>

import axios from 'axios';
import { store } from '../data/store';
import {baseUrl} from '../data/data';
export default {
    name: 'TechSearch',

    data(){
        return{
            store,
            baseUrl
        }
    },

    methods:{
        getApi(tech_id){
            axios.get(baseUrl + 'searchbytech/' + tech_id)
                .then(result => {
                    store.projects = result.data;
                    console.log(result.data);
                    store.showPaginator = false;
                })
        }

    }
}
</script>

<template>
    <div>
        <div>
            <h5>Cerca per tecnologie</h5>
        </div>
        <div class="d-flex flex-wrap gap-3">
            <button
            v-for=" tech in store.technologies " :key="tech.id" class="btn btn-primary btn-sm"
            @click="getApi(tech.id)"
            > {{ tech.name }}</button>

        </div>
    </div>
</template>

<style>

</style>
