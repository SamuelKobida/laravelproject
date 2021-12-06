import Index from "./components/Index.vue";
import AddRule from "./components/AddRule.vue";
import Home from "./components/Home";
import EshopList from "./components/EshopList";
import Rules from "./components/Rules";

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
    {
        name: 'eshoplist',
        path: base_path + 'eshoplist',
        component: EshopList
    },
    {
        name: 'rules',
        path: base_path + 'rules',
        component: Rules,
        props: true
    },
];


