<script>
import {routesData} from '../data/data' ;
export default {

    name: 'AppHeader',
    data(){
        return{
            routesData,
        }
    }
}
</script>


<template>
    <header>
        <div class="container ">
            <div class="row d-flex align-items-center pt-0 ">
                <div class="col-2 ">
                    <img src="#" alt="logo">
                </div>
                <div class="col-6">
                    <h1>Guest Home page</h1>
                </div>
                <div class="col-4">
                    <navbar>
                        <ul class="d-flex">
                            <li class="px-4" v-for="route in routesData" :key="route.id"><router-link :to="{ name: route.name}">{{route.show}}</router-link></li>

                        </ul>
                    </navbar>
                </div>
            </div>
        </div>
    </header>
</template>

<style lang="scss" scoped>
    @use '../../scss/appVue.scss';
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
            color:white;
        }

        .container, .row {
            height: 100%;
        }
        ul{
            padding: 0;
            margin: 0;
            list-style: none;
            li{
                a{
                    color: white;
                    text-decoration: none;
                    transition: all .3s;
                    &:hover,
                    &.active{
                        color: lightblue;
                    }
                }
            }
        }
    }
</style>
