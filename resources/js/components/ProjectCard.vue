<script>
import {truncateStr} from '../data/functions/';
export default {
  name: 'ProjectCard',
   props:{
    project: Object
   },

   data(){
    return{
      truncateStr
    }
   },

   methods:{

    },
   
}

</script>

<template>
  <div class="col-4 p-4 ">
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

</template>

<style>

</style>