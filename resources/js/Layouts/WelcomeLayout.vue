<script setup lang="ts">
import Image from "@/Components/Image.vue";
import Loader from "@/Components/Loader.vue";
import {defineProps} from "vue";
import Fog from "@/Components/Fog.vue";
import BloodCaption from "@/Components/BloodCaption.vue";
import PageLayout from "@/Layouts/Base/PageLayout.vue";

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
    <Fog />
    <Loader :loading="loading">
        <PageLayout>
            <template v-slot:header_logo_postfix>SERVER</template>
            <template v-slot:header_right_area>
                <h1 class="text-4xl lg:text-5xl uppercase">STATUS: {{ props.status }}</h1>
            </template>
            <slot />
        </PageLayout>
    </Loader>
</template>

<style scoped>
</style>
