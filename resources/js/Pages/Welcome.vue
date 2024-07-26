<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";

const props = defineProps({
    server: {type: Object, default: {ip: 'none', port: 'none', survivors: { count: 0, list: [{ name: 'lowel' }]}}}
});

</script>

<template>
<GuestLayout>
    <div class="wrapper">
        <ul class="flex flex-col mt-20">
            <li class="flex flex-row justify-center text-4xl xl:text-6xl lg:text-5xl mb-7">
                <p>IP</p>
                <span class="mr-3">:</span>
                <p>{{ props.server.ip }}</p>
            </li>
            <li class="flex flex-row justify-center text-4xl xl:text-6xl lg:text-5xl mb-7">
                <p>PORT</p>
                <span class="mr-3">:</span>
                <p>{{ props.server.port }}</p>
            </li>
            <li class="flex flex-row justify-center text-4xl xl:text-6xl lg:text-5xl mb-7">
                <p>TOTAL SURVIVORS</p>
                <span class="mr-3">:</span>
                <p>{{ props.server.survivors.count }}</p>
            </li>
        </ul>

        <ul class="flex flex-col mt-20">
            <li v-for="(player,index) in props.server.survivors.list" class="flex flex-row justify-center text-4xl xl:text-6xl lg:text-5xl mb-7">
                <p>{{ index + 1 }}</p>
                <span class="mr-3">.</span>
                <p>{{ player?.name ?? 'none' }}</p>
            </li>
        </ul>
    </div>
</GuestLayout>
</template>

<style scoped>

</style>
