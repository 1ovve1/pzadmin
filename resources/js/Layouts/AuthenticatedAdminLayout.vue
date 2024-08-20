<script setup lang="ts">

import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useAuthStore} from "@/store/auth";
import {onBeforeMount, onMounted, reactive} from "vue";
import router from "@/router";
import {AxiosError} from "axios";

interface AuthenticatedAdminLayoutData {
    loading: boolean;
}

const data = reactive<AuthenticatedAdminLayoutData>({
    loading: true,
});
const authStore = useAuthStore();

onBeforeMount(() => {
    authStore.ping().then(() => {
        data.loading = false;
    }).catch(() => {
        router.push({name: "auth.login"});
    });
});

function logout(): void {
    authStore.logout().then(() => {
        return router.push({name: 'auth.login'})
    });
}

</script>

<template>
    <AdminLayout v-show="!data.loading">
        <slot />
        <template v-slot:right_header>
            <div class="text-3xl mr-2">
                <h1>username</h1>
            </div>
            <div>
                <ElButton @click="logout()">LOGOUT</ElButton>
            </div>
        </template>
    </AdminLayout>
</template>

<style scoped>

</style>
