import {createRouter, createWebHistory, Router, RouteRecordRaw} from "vue-router";
import routes from "@/router/routes";


const router: Router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
