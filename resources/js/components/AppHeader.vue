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
                    <h1>Guest</h1>
                </div>
                <div class="col-4">
                    <navbar>
                        <ul class="d-flex">
                            <li class="px-4" v-for="route in routesData" :key="route.id"><router-link :to="{ name: route.name}" class="np-link">{{route.show}}</router-link></li>

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
                .np-link{
                    position: relative;
                    top: 0;
                    transition: all .5s;
                    color: white;
                    text-decoration: none;
                    text-transform: uppercase;
                    font-size: .8em;
                    font-weight: bold;

                    &:hover,
                    &.active{
                        color: lightblue;
                    }
                    &::after{
                        content: '';
                        width: 105%;
                        border: 2px solid lightblue;
                        border-radius: 2px;
                        position: absolute;
                        top: 38px;
                        left: 0;
                        opacity: 0;
                        transition: all .5s;
                    }

                    &:hover::after,
                    &.active::after{
                        opacity: 1;
                    }
                }
            }
        }
    }
</style>
