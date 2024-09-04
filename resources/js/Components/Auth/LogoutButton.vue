<script setup lang="ts">
import {useAuthStore} from "@/store/auth";
import router from "@/router";

const authStore = useAuthStore();

function logout(): void {
    authStore.logout().then(() => {
        return router.push({name: 'auth.login'})
    });
}
</script>

<template>
    <ElButton @click="logout()">LOGOUT</ElButton>
</template>

<style scoped>

</style>
