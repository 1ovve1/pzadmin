<script setup lang="ts">

import {computed, onBeforeMount, onDeactivated, onMounted, onUnmounted, ref, StyleValue} from "vue";
import {useZomboidLogsStore, ZomboidLogInterface} from "@/store/zomboid/logs";
import {ChannelProxy} from "@/classes/Events/ChannelProxy";
import {Event} from "@/classes/Events/Event";

const globalWidth = ref<number>(window.innerWidth);
const scrollWindow = ref<HTMLDivElement>();
const channelProxy = new ChannelProxy('servers.zomboid.logs');

const logs = useZomboidLogsStore();

const styles = computed<StyleValue>(() => ({
    display: (globalWidth.value < 786) ? "none": "block",
    height: (globalWidth.value > 1023) ? "480px": "560px",
    width: (globalWidth.value > 1023) ? "984px": "700px",
}));

onBeforeMount(() => {
    window.addEventListener('resize', () => {
        globalWidth.value = window.innerWidth;
    });
});

onMounted(async () => {
    if (scrollWindow.value) {
        const scrollWindowValue = scrollWindow.value;

        await logs.fetch();

        scrollWindowValue.scrollTop = scrollWindowValue.scrollHeight;

        channelProxy.addEvent(new Event<ZomboidLogInterface[]>('.record', async (newLogs: ZomboidLogInterface[]) => {
            const ifScrollHeightWasInTheEndOfList = (scrollWindowValue.scrollTop + scrollWindowValue.clientHeight) === scrollWindowValue.scrollHeight;

            logs.setData(newLogs);

            if (ifScrollHeightWasInTheEndOfList) {
                scrollWindowValue.scrollTop = scrollWindowValue.scrollHeight;
            }
        }));
    }
});

onUnmounted(() => {
    channelProxy.destroy();
})

</script>

<template>
    <div ref="scrollWindow" class="bg-gray-300 overflow-y-scroll" :style="styles">
        <div class="text-black font-mono mx-3 my-5">
            <span v-for="(log, index) in logs.getLogs" :key="index" class="text-sm font-mono block" v-html="log.toString()">
            </span>
        </div>
    </div>
</template>

<style scoped>

</style>
