import Index from "./components/Index.vue";
import AddRule from "./components/AddRule.vue";

let base_path = "/laravelproject/public/";

export const routes = [
    {
        name: 'index',
        path: base_path + 'index',
        component: Index
    },
    {
        name: 'addrule',
        path: base_path + 'addrule',
        component: AddRule
    },

];


