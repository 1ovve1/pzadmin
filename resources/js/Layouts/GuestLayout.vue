<script setup lang="ts">
import Image from "@/Components/Image.vue";
import Loader from "@/Components/Loader.vue";
import {defineProps} from "vue";

interface GuestLayoutProps {
    status: string;
    loading: boolean;
}

const props = withDefaults(defineProps<GuestLayoutProps>(), {
    status: '...',
    loading: false,
});

</script>

<template>
    <div class="wrapper p-6 lg:pt-8 darkMode">
        <Loader :loading="loading">
            <header class="flex flex-col lg:flex-row lg:justify-between">
                <div class="flex flex-row justify-center items-end">
                    <Image relative-path="zomboid-logo.png" width="150px" height="100px" alt="zomboid-logo"></Image>
                    <p class="text-5xl mb-4 ml-1">SERVER</p>
                </div>
                <div class="flex flex-row justify-center mt-8">
                    <h1 class="text-4xl lg:text-5xl uppercase">STATUS: {{ props.status }}</h1>
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
