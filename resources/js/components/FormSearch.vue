<script>

import axios from 'axios';
import { store } from '../data/store';
export default {

    name: 'FormSearch',
    components:{

    },
    data(){
        return{
            store,
            tosearch: ''
        }
    },

    methods:{

        getApi(){
            const data = new FormData();
            data.append('tosearch', this.tosearch);

            axios.post('http://127.0.0.1:8000/api/projects/search', data)
                .then(result =>{
                    store.projects = result.data.projects;
                    store.showPaginator = false;
                    this.tosearch = '';
                })
        }

    },

    mounted(){

    }
}
</script>

<template>

    <div class="d-flex form-container align-items-center">
        <input v-model.trim="tosearch" placeholder="Cerca un progetto per nome" id="search" class="" type="text" @keyup.enter="getApi">
        <button @click="getApi" type="submit" >Cerca</button>
    </div>

</template>

<style lang="scss" scoped>

.form-container{
    border-radius: 20px;
    outline: 2px solid lightblue;
    max-width: 320px;

    input{
        border: 0px;
        outline: 0px;
        min-width: 250px;
    }

    button{
        background-color: white;
        border: 0px;
        border-left: 2px solid lightblue;
    }

    button, input{
        padding: 10px 15px;
        font-size: .9em;
    }
}

</style>
