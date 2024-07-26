<script setup lang="ts">

import Image from "@/Components/Image.vue";
</script>

<template>
    <div class="wrapper">
        <header class="flex flex-col lg:flex-row lg:justify-between m-6 lg:mt-8">
            <div class="flex flex-row justify-center items-end">
                <Image relative-path="zomboid-logo.png" width="150px" height="100px" alt="zomboid-logo"></Image>
                <p class="text-5xl mb-4 ml-1">SERVER</p>
            </div>
            <div class="flex flex-row justify-center mt-8">
                <h1 class="text-4xl lg:text-5xl">STATUS: ACTIVE</h1>
            </div>
        </header>
        <main>
            <slot />
        </main>
        <footer>
        </footer>
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
