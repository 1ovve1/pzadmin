<script setup lang="ts">

</script>

<template>
    <router-view v-slot="{ Component }">
        <transition>
            <component :is="Component" />
        </transition>
    </router-view>
</template>

<style scoped>

</style>
