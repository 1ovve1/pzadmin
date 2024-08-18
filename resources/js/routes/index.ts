import {createRouter, createWebHistory} from "vue-router";
import Welcome from "@/Pages/Welcome.vue";
import Login from "@/Pages/Login.vue";
import Dashboard from "@/Pages/Admin/Dashboard.vue";


export default createRouter({
    history: createWebHistory(),
    routes: [
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
        }
    ]
});
