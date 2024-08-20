<script setup lang="ts">

import AdminLayout from "@/Layouts/AdminLayout.vue";
import {useAuthStore} from "@/store/auth";
import {onBeforeMount, reactive} from "vue";
import router from "@/router";
import {AxiosError} from "axios";

interface NonAuthenticatedAdminLayoutData {
    loading: boolean;
}

const data = reactive<NonAuthenticatedAdminLayoutData>({
    loading: true,
});
const authStore = useAuthStore();

onBeforeMount(() => {
    authStore.ping().then(() => {
        router.push({name: "admin.dashboard"});
    }).catch(() => {
        data.loading = false;
    });
});

</script>

<template>
    <AdminLayout v-show="!data.loading">
        <slot />
    </AdminLayout>
</template>

<style scoped>

</style>
