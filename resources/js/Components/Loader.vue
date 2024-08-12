<script setup lang="ts">

import {Loader} from "@/classes/Loader";
import {onMounted, watch} from "vue";

interface LoaderProps {
    loading: boolean;
}

const props = withDefaults(defineProps<LoaderProps>(), {
    loading: false
})

const loadingInstance = new Loader({ fullscreen: true, background: "black" });
watch(() => props.loading, (newValue: boolean) => {
    loadingInstance.switch(newValue);
});

onMounted(() => {
    loadingInstance.switch(props.loading);
})


</script>

<template>
    <slot v-if="!loading"></slot>
</template>

<style scoped>

</style>
