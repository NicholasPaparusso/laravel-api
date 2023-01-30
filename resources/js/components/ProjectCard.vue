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

    computed:{
        formatDate(){

            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(this.project.updated_at).toLocaleDateString('it-IT', dateOptions)
        }
    },
}

</script>

<template>
  <div class="col-4 p-4 ">
    <div class="np-card p-3">
      <div class="title d-flex align-items-center">
            <router-link :to="{name: 'detail', params:{slug: project.slug}}"><h5 v-html="project.name"></h5></router-link>
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
        min-width: 300px;
    }

    .date{
        padding-top: 20px;

    }
    a{
        text-decoration: none;
        color: inherit;

        &:hover{
            color: #0d6efd;
        }
    }
</style>
