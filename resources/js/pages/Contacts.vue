<script>
import ContactForm from '../components/ContactForm.vue';
export default {
    name: 'Contacts',

    components:{
        ContactForm,
    }
}
</script>


<template>
    <div class="container d-flex justify-content-center align-items-center flex-column">
        <h1 class="mb-3">Pagina contatti</h1>
        <ContactForm/>
    </div>
</template>

<style>

</style>
