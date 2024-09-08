<script setup lang="ts">

import {computed, onBeforeMount, onMounted, ref, StyleValue} from "vue";

const globalWidth = ref<number>(window.innerWidth);

const styles = computed<StyleValue>(() => ({
    display: (globalWidth.value < 786) ? "none": "block",
    height: (globalWidth.value > 1023) ? "480px": "560px",
    width: (globalWidth.value > 1023) ? "984px": "700px",
}));

onBeforeMount(() => {
    window.addEventListener('resize', () => {
        globalWidth.value = window.innerWidth;
        console.log(globalWidth.value);
    });
});

</script>

<template>
    <div class="bg-gray-300" :style="styles">
        <div class="text-black font-mono mx-3 my-5">
                        <span class="text-sm font-mono block">
                            1725565282906> 152,897,900> [05-09-24 19:41:22.906] > ZNet: SZombienet -> SSteamSDK: SetMaxPlayerCount
                        </span>
            <span class="text-sm font-mono block">
                            1725565282906> 152,897,900> [05-09-24 19:41:22.906] > ZNet: Public IP: 94.25.237.20
                        </span>
            <span class="text-sm font-mono block">
                            1725565283304> 152,898,298> [05-09-24 19:41:23.304] > ZNet: SSteamSDK -> SZombienet: OnPolicyResponse
                        </span>
            <span class="text-sm font-mono block">
                            1725565283305> 152,898,299> [05-09-24 19:41:23.305] > ZNet: OnPolicyResponse
                        </span>
            <span class="text-sm font-mono block">
                            1725565283305> 152,898,299> [05-09-24 19:41:23.305] > ZNet: SZombienet -> SSteamSDK: BSecure
                        </span>
            <span class="text-sm font-mono block">
                            1725565283305> 152,898,299> [05-09-24 19:41:23.305] > ZNet: Zomboid Server is VAC Secure
                        </span>
            <span class="text-sm font-mono block">
                            1725572963715> 160,578,709> [05-09-24 21:49:23.715] > ZNet: SSteamSDK -> SZombienet: OnSteamServersDisonnected
                        </span>
            <span class="text-sm font-mono block">
                            1725572963716> 160,578,710> [05-09-24 21:49:23.716] > ZNet: OnSteamServersDisonnected 3
                        </span>
            <span class="text-sm font-mono block">
                            1725572979404> 160,594,398> [05-09-24 21:49:39.404] > ZNet: SSteamSDK -> SZombienet: OnSteamServersConnected
                        </span>
            <span class="text-sm font-mono block">
                            1725572979405> 160,594,399> [05-09-24 21:49:39.405] > ZNet: OnSteamServersConnected
                        </span>
            <span class="text-sm font-mono block">
                            1725572979405> 160,594,399> [05-09-24 21:49:39.405] > ZNet: SZombienet -> SSteamSDK: SetMaxPlayerCount
                        </span>
            <span class="text-sm font-mono block">
                            1725572979405> 160,594,399> [05-09-24 21:49:39.405] > ZNet: Public IP: 188.170.76.82
                        </span>
            <span class="text-sm font-mono block">
                            1725572979603> 160,594,596> [05-09-24 21:49:39.602] > ZNet: SSteamSDK -> SZombienet: OnPolicyResponse
                        </span>
            <span class="text-sm font-mono block">
                            1725572979603> 160,594,597> [05-09-24 21:49:39.603] > ZNet: OnPolicyResponse
                        </span>
            <span class="text-sm font-mono block">
                            1725572979603> 160,594,597> [05-09-24 21:49:39.603] > ZNet: SZombienet -> SSteamSDK: BSecure
                        </span>
            <span class="text-sm font-mono block">
                            1725572979603> 160,594,597> [05-09-24 21:49:39.603] > ZNet: Zomboid Server is VAC Secu
                        </span>
        </div>
    </div>
</template>

<style scoped>

</style>
