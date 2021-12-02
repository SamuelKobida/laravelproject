import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./components/App.vue";
import { routes } from "./routes";

import axios from "axios";
import VueAxios from "vue-axios";

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

const app = createApp(App);

app.use(router);
app.use(VueAxios, axios);

app.config.globalProperties.$axios = axios;

router.isReady().then(() => app.mount("#example"));

require('./bootstrap');
