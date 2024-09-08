<script setup lang="ts">

import {ChannelProxy} from "@/classes/Events/ChannelProxy";
import {useServerStore} from "@/store/server";
import {onMounted, onUnmounted} from "vue";
import {Event} from "@/classes/Events/Event";

const server = useServerStore();
const channelProxy = new ChannelProxy('servers.zomboid');

onMounted(async () => {
    if (server.isEmpty) {
        await server.fetch();
    }
    channelProxy.addEvent(new Event('.status', (handler: any) => {
        server.setStatus(handler.status);
    }));
})

onUnmounted(() => {
    channelProxy.destroy();
})

</script>

<template>
    <h1 class="text-4xl lg:text-5xl uppercase">STATUS: {{ server.status }}</h1>
</template>

<style scoped>

</style>
