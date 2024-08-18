import './bootstrap';
import '../css/app.css';
import 'element-plus/dist/index.css';
import 'element-plus/theme-chalk/dark/css-vars.css';
import './echo';

import { createApp, h, DefineComponent } from 'vue';
import ElementPlus from 'element-plus';
import store from '@/store';
import Welcome from "@/Pages/Welcome.vue";
import router from "@/routes"
import App from "@/App.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


createApp(App)
    .use(router)
    .use(store)
    .use(ElementPlus)
    .mount("#app");
