import { reactive } from "vue";

export const store = reactive({
  projects:[],
  types: [],
  technologies: [],
  next_page: null,
  prev_page:null,
  paginator: [],
  showPaginator: null ,
});
