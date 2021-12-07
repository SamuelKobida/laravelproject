import Index from "./components/Index.vue";
import AddRule from "./components/AddRule.vue";
import Home from "./components/Home";
import EshopList from "./components/EshopList";
import Rules from "./components/Rules";
import Login from "./components/Login";
import Register from "./components/Register";


let base_path = "/laravelproject/public/";

export const routes = [

    {
        name: 'home',
        path: base_path,
        component: Home,

    },

    {
        name: 'register',
        path: base_path + 'register',
        component: Register
    },

    {
        name: 'login',
        path: base_path + 'login',
        component: Login,

    },

    {
        name: 'index',
        path: base_path + 'index',
        component: Index,

        beforeEnter: (to, form, next) =>{
            axios.get("http://localhost/laravelproject/public/api/authenticated/").then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },

    {
        name: 'addrule',
        path: base_path + 'addrule',
        component: AddRule,

        beforeEnter: (to, form, next) =>{
            axios.get("http://localhost/laravelproject/public/api/authenticated/").then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },

    {
        name: 'eshoplist',
        path: base_path + 'eshoplist',
        component: EshopList,

        beforeEnter: (to, form, next) =>{
            axios.get("http://localhost/laravelproject/public/api/authenticated/").then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },

    {
        name: 'rules',
        path: base_path + 'rules/:id',
        component: Rules,
        props: true,

        beforeEnter: (to, form, next) =>{
            axios.get("http://localhost/laravelproject/public/api/authenticated/").then(()=>{
                next()
            }).catch(()=>{
                return next({ name: 'login'})
            })
        }
    },


];


