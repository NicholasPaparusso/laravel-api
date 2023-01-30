<script>

import { store } from '../data/store';
import axios from 'axios';
import {baseUrl} from '../data/data';
export default {
    name: 'TypeSearch',

    data(){
        return{
            store,
            baseUrl
        }
    },

    methods:{
        getApi(type_id){
            axios.get(baseUrl + 'searchbytype/' + type_id)
                .then(result => {
                    store.projects = result.data.projects;
                    store.showPaginator = false;
                })
        }
    }
}
</script>

<template>
    <div>
        <div>
            <h5>Cerca per tipo</h5>
        </div>
        <div class="d-flex  flex-wrap gap-3">
            <button
            v-for=" typenp in store.types " :key="typenp.id" class="btn btn-primary btn-sm"
            @click="getApi(typenp.id)"
            > {{ typenp.name }}</button>

        </div>
    </div>
</template>

<style>

</style>
