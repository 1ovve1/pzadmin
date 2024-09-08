<script setup lang="ts">

import {useServerStore} from "@/store/server";
import {computed, ref} from "vue";

const server = useServerStore();

const disabled = ref<boolean>(false);

const title = computed<string>((): string => {
    if (disabled.value) {
        return '';
    } else if (server.isActive) {
        return 'down';
    } else {
        return 'start';
    }
});

async function resolveUpAndDown(): Promise<void>
{
    disabled.value = true;

    if (server.isActive) {
        server.setStatus('...');
        await server.down();
    } else {
        server.setStatus('...');
        await server.start();
    }

    setTimeout(() => disabled.value = false, 3000)
}

</script>

<template>
    <el-button @click="resolveUpAndDown()" :disabled="disabled" color="dark" size="large" :loading="disabled" class="w-36">
        <span class="uppercase text-4xl">{{ title }}</span>
    </el-button>
</template>

<style scoped>

</style>
