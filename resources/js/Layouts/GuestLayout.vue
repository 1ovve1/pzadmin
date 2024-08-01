<script setup lang="ts">
import Image from "@/Components/Image.vue";
import {computed, onMounted, reactive, ref} from "vue";
import axios from "axios";

const server = reactive({
    status: '...'
})


const getServerStatus = () => {
    return axios.get('/api/v1/servers/zomboid')
}


onMounted(() => {
    getServerStatus().then(({data}) => {
        server.status = data.status
    });

    window.Echo.channel('servers.zomboid')
        .listen('.status', (data: any) => {
            server.status = data.status
        });
})

</script>

<template>
    <div class="wrapper">
        <header class="flex flex-col lg:flex-row lg:justify-between m-6 lg:mt-8">
            <div class="flex flex-row justify-center items-end">
                <Image relative-path="zomboid-logo.png" width="150px" height="100px" alt="zomboid-logo"></Image>
                <p class="text-5xl mb-4 ml-1">SERVER</p>
            </div>
            <div class="flex flex-row justify-center mt-8">
                <h1 class="text-4xl lg:text-5xl uppercase">STATUS: {{ server.status }}</h1>
            </div>
        </header>
        <main>
            <slot />
        </main>
        <footer>
        </footer>
    </div>d
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
