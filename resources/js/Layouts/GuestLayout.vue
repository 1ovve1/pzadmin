<script setup lang="ts">
import Image from "@/Components/Image.vue";
import {watch} from "vue";
import {ElLoading} from "element-plus";

const props = defineProps({
    status: { type: String, default: '...' },
    loading: { type: Boolean, default: false},
});

const loadingInstance = ElLoading.service({ fullscreen: true, background: "black" });

watch(() => props.loading, (newValue: boolean, oldValue: boolean) => {
    if (!newValue) {
        loadingInstance.close();
    }
});

</script>

<template>
    <div class="wrapper">
        <div v-if="!loading">
            <header class="flex flex-col lg:flex-row lg:justify-between m-6 lg:mt-8">
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
        </div>
    </div>
</template>

<style scoped>
    * {
        background-color: rgba(2, 1, 1, 1);
        color: white;
        font-family: 'JustMeAgainDownHere',serif;
    }

    .wrapper {
        min-height: 100%;
        display: grid;
        grid-template-rows: auto 1fr auto;
    }
</style>
