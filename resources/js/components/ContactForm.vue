<script>
import axios from 'axios';
import {baseUrl} from '../data/data';
export default {
    name: 'ContactForm',

    data(){
        return{
            baseUrl,
            name: '',
            object: '',
            email: '',
            message: '',
            errors: {},
            isLoading: false,
        }
    },
    methods:{
        sendForm(){
            this.isLoading= true;
            const data = {
                name: this.name,
                object: this.object,
                email: this.email,
                message: this.message
            }
            axios.post(`http://127.0.0.1:8000/api/contacts`, data)
                .then( result =>{
                    this.isLoading = false;
                    if(!result.data.success){
                        this.errors = result.data.errors ;
                    }else{
                        this.name = '';
                        this.object = '';
                        this.email = '';
                        this.message = '';
                        this.errors = {};
                    }
                })
        }
    }
}
</script>

<template>

    <form class="w-50" @submit.prevent="sendForm()">
        <div class="mb-3">
            <input v-model.trim="name" :class="{'is-invalid': errors.name}" class="form-control" type="text"  placeholder="Inserisci il tuo nome">
            <p v-for="(error , index) in errors.name " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <input v-model.trim="object" :class="{'is-invalid': errors.object}" class="form-control" type="text" placeholder="Inserisci l'oggetto">
            <p v-for="(error , index) in errors.object " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <input v-model.trim="email" :class="{'is-invalid': errors.email}" class="form-control" type="text"  placeholder="Inserisci l'email">
            <p v-for="(error , index) in errors.email " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <textarea v-model.trim="message" :class="{'is-invalid': errors.message}" class="form-control"  id="" cols="30" rows="10"></textarea>
            <p v-for="(error , index) in errors.message " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>
        <button type="submit" :disabled="isLoading" class="btn btn-success btn-sm">{{isLoading? 'invio in corso...' : 'Invia'}} </button>
    </form>

</template>

<style>

</style>
