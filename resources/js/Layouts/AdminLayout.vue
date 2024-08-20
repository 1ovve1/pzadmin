<script setup lang="ts">
import Image from "@/Components/Image.vue";
import Loader from "@/Components/Loader.vue";
import {defineProps, computed} from "vue";
import {useSettingsStore} from "@/store/settings";

interface AdminLayoutProps {
    loading?: boolean;
}

const props = withDefaults(defineProps<AdminLayoutProps>(), {
    loading: false
});


</script>

<template>
    <div class="wrapper p-6 lg:pt-8 transition-colors">
        <Loader :loading="props.loading">
            <header class="flex flex-col lg:flex-row lg:justify-between">
                <div class="flex flex-row justify-center items-end">
                    <Image relative-path="zomboid-logo.png" width="150px" height="100px" alt="zomboid-logo-black"></Image>
                    <p class="text-5xl mb-4 ml-1 text-red-900">ADMIN</p>
                </div>
                <div class="flex flex-row justify-center items-center mt-8">
                    <slot name="right_header" />
                </div>
            </header>
            <main>
                <slot />
            </main>
            <footer>
            </footer>
        </Loader>
    </div>
</template>

<style scoped>
</style>
