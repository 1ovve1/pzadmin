<script setup lang="ts">

import AdminLayout from "@/Layouts/AdminLayout.vue";
import ServerStatus from "@/Components/Server/ServerStatus.vue";
import ServerSwitch from "@/Components/Server/ServerSwitch.vue";
import LogsViewer from "@/Components/Server/LogsViewer.vue";
</script>

<template>
    <AdminLayout>
        <div class="flex flex-col mt-12">
            <div class="flex justify-center">
                <LogsViewer />
            </div>
            <div class="flex justify-center mt-14">
                <ServerStatus />
            </div>
            <div class="flex justify-center mt-14">
                <ServerSwitch />
            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>

</style>
