<script setup lang="ts">
import Image from "@/Components/Image.vue";
import Loader from "@/Components/Loader.vue";
import {defineProps, computed} from "vue";
import {useSettingsStore} from "@/store/settings";

interface AdminLayoutProps {
    loading: boolean;
}

const settings = useSettingsStore();
const props = withDefaults(defineProps<AdminLayoutProps>(), {
    loading: false
});


const darkModeClasses = computed(() => ({
        'darkMode': settings.darkMode,
        'whiteMode': !settings.darkMode,
}));

</script>

<template>
    <div class="wrapper p-6 lg:pt-8 transition-colors" :class="darkModeClasses">
        <Loader :loading="props.loading">
            <header class="flex flex-col lg:flex-row lg:justify-between">
                <div class="flex flex-row justify-center items-end">
                    <Image :relative-path="settings.darkModeLogo" width="150px" height="100px" alt="zomboid-logo-black"></Image>
                    <p class="text-5xl mb-4 ml-1 text-red-900">ADMIN</p>
                </div>
                <div class="flex flex-row justify-center mt-8">
                </div>
            </header>
            <main>
                <slot />
            </main>
            <footer>
                <el-button @click="settings.switchDarkMode()">test</el-button>
            </footer>
        </Loader>
    </div>
</template>

<style scoped>
* {
    font-family: 'JustMeAgainDownHere',serif;
}
</style>
