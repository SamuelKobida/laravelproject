import Index from "./components/Index.vue";
import AddRule from "./components/AddRule.vue";
import Home from "./components/Home";

let base_path = "/laravelproject/public/";

export const routes = [

    {
        name: 'home',
        path: base_path,
        component: Home
    },
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


