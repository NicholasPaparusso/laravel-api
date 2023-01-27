import { reactive } from "vue";

export const store = reactive({
  projects:[],
  next_page: null,
  prev_page:null,
  paginator: [],
});