import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import App from "./components/App.vue";
import { routes } from "./routes";

const router = createRouter({
    history: createWebHistory(),
    routes: routes
});

const app = createApp(App);

app.use(router);

router.isReady().then(() => app.mount("#example"));

require('./bootstrap');
