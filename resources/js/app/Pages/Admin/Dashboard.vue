<script setup lang="ts">

import AdminLayout from "@/app/Layouts/AdminLayout.vue";
import ServerStatus from "@/app/Components/Server/ServerStatus.vue";
import ServerSwitch from "@/app/Components/Server/ServerSwitch.vue";
import LogsViewer from "@/app/Components/Server/LogsViewer.vue";
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
