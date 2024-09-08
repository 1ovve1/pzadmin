<script setup lang="ts">
import Image from "@/Components/Image.vue";
import Loader from "@/Components/Loader.vue";
import {defineProps} from "vue";
import Fog from "@/Components/Fog.vue";
import BloodCaption from "@/Components/BloodCaption.vue";
import PageLayout from "@/Layouts/Base/PageLayout.vue";
import ServerStatus from "@/Components/Server/ServerStatus.vue";

interface GuestLayoutProps {
    loading: boolean;
}

const props = withDefaults(defineProps<GuestLayoutProps>(), {
    loading: false,
});

</script>

<template>
    <Fog />
    <Loader :loading="props.loading">
        <PageLayout>
            <template v-slot:header_logo_postfix>SERVER</template>
            <template v-slot:header_right_area>
                <ServerStatus />
            </template>
            <slot />
        </PageLayout>
    </Loader>
</template>

<style scoped>
</style>
