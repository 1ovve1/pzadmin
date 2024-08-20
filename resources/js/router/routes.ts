import Welcome from "@/Pages/Welcome.vue";
import Login from "@/Pages/Login.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";
import {RouteRecordRaw, RouteRecordRedirect, RouteRecordRedirectOption} from "vue-router";

const routes: Readonly<RouteRecordRaw[]> = [
    {
        path: '/',
        name: "welcome",
        component: Welcome
    },
    {
        path: '/login',
        name: "auth.login",
        component: Login
    },
    {
        path: "/admin/dashboard",
        name: "admin.dashboard",
        component: Dashboard
    },
    {
        path: "/admin",
        redirect: () => ({name: "admin.dashboard"})
    },
    {
        path: "/admin/:any",
        redirect: () => ({name: "auth.login"})
    },
    {
        path: "/:any",
        redirect: ()=> ({name: "welcome"})
    }
];

export default routes;
