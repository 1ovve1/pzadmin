<script setup lang="ts">
import AdminLayout from "@/Layouts/AdminLayout.vue";
import {onMounted, reactive} from "vue";
import {useAuthStore} from "@/store/auth";

interface LoginDataInterface {
    form: LoginFormInterface;
    loading: boolean;
}

export interface LoginFormInterface {
    username: string;
    password: string;
    remember: boolean;
}

const data = reactive<LoginDataInterface>({
    form: {
        username: '',
        password: '',
        remember: false,
    },
    loading: true,
})
const auth = useAuthStore();

async function authenticate() {
    await auth.login(data.form)
}

onMounted(() => {
    data.loading = false;
})

</script>

<template>
    <AdminLayout :loading="data.loading">
        <div class="flex flex-col justify-center items-center mt-24">
            <div class="flex flex-col justify-center items-center p-6 border rounded-2xl border-red-700 shadow-2xl shadow-red-600 bg-black">
                <h3 class="mb-5 text-3xl">LOGIN</h3>
                <ElForm :model="data.form" size="large" label-width="auto" style="max-width: 600px" class="flex flex-col justify-center items-center">
                    <ElFormItem label="USERNAME">
                        <ElInput v-model="data.form.username" name="username" placeholder="username" type="text"></ElInput>
                    </ElFormItem>
                    <ElFormItem label="PASSWORD">
                        <ElInput v-model="data.form.password" name="password" placeholder="password" type="password"></ElInput>
                    </ElFormItem>
                    <ElFormItem label="REMEMBER ME">
                        <ElCheckbox v-model="data.form.remember" name="remember"></ElCheckbox>
                    </ElFormItem>

                    <ElFormItem>
                        <ElButton type="primary" @click="authenticate()">ENTER</ElButton>
                    </ElFormItem>
                </ElForm>
            </div>
        </div>
    </AdminLayout>
</template>

<style>
.el-input input {
    text-align: center;
    font-size: 22px;
}
</style>
