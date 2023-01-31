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
        }
    },
    methods:{
        sendForm(){
            const data = {
                name: this.name,
                object: this.object,
                email: this.email,
                message: this.message
            }
            axios.post(`http://127.0.0.1:8000/api/contacts`, data)
                .then( result =>{
                    if(!result.data.success){
                        this.errors = result.data.errors ;
                    }
                })
        }
    }
}
</script>

<template>

    <form class="w-50" @submit.prevent="sendForm()">
        <div class="mb-3">
            <input v-model.trim="name" :class="{'is-invalid': errors.name}" class="form-control" type="text" name="name" placeholder="Inserisci il tuo nome">
            <p v-for="(error , index) in errors.name " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <input v-model.trim="object" :class="{'is-invalid': errors.object}" class="form-control" type="text" name="object" placeholder="Inserisci l'oggetto">
            <p v-for="(error , index) in errors.object " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <input v-model.trim="email" :class="{'is-invalid': errors.email}" class="form-control" type="text" name="email" placeholder="Inserisci l'email">
            <p v-for="(error , index) in errors.email " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>

        <div class="mb-3">
            <textarea v-model.trim="message" :class="{'is-invalid': errors.message}" class="form-control" name="message" id="" cols="30" rows="10"></textarea>
            <p v-for="(error , index) in errors.message " :key="error + index" class="text-danger ms-1"> {{ error}} </p>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Invia </button>
    </form>

</template>

<style>

</style>
