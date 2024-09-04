<script setup lang="ts">

import FormWrapper from "@/Components/Forms/FormWrapper.vue";
import {reactive} from "vue";
import {LoginFormInterface, RegistrationFormInterface, useAuthStore} from "@/store/auth";
import {ElMessageBox, FormRules} from "element-plus";

interface LoginDataInterface {
    form: LoginFormInterface;
}

const data = reactive<LoginDataInterface>({
    form: {
        username: '',
        password: '',
        remember_me: false,
    },
})
const emit = defineEmits<{
    (e: 'onSuccessSubmit'): void
}>();

const auth = useAuthStore();

const validateUsername = async (rule: any, value: any, callback: Function) => {
    value = String(value).trim();

    if (value === '') {
        callback(new Error('who are you mfk???'));
    } else if (value.length < 4) {
        callback(new Error('too small, think more'));
    } else if (value.length > 255) {
        callback(new Error('are you an idiot?'));
    } else {
        callback();
    }
}


/**
 * password validation
 */
const validationPassword = (rule: any, value: any, callback: Function) => {
    value = String(value).trim();

    if (value.length > 255) {
        callback(new Error('are you an idiot?'));
    } else {
        callback();
    }
}

/**
 * Main form rules
 */
const rules = reactive<FormRules<RegistrationFormInterface>>({
    username: [{
        required: true, asyncValidator: validateUsername, trigger: 'change',
    }],
    password: [{
        required: true, validator: validationPassword, trigger: 'blur',
    }],
});

async function authenticate() {
    try {
        await auth.login(data.form)

        emit('onSuccessSubmit');
    } catch (error) {
        await ElMessageBox.alert('Login or password are wrong! Are you zombie or not?', 'Nah???');
    }
}

</script>

<template>
    <FormWrapper title="LOGIN">
        <el-form :model="data.form" @keypress.enter.native="authenticate()" size="large" label-width="auto" style="max-width: 600px" class="flex flex-col justify-center items-center">
            <el-form-item title="username" label="USERNAME" prop="username">
                <el-input :formatter="(value: string) => value.toUpperCase()" v-model="data.form.username" style="width: 250px" name="username" placeholder="USERNAME" type="text" autofocus></el-input>
            </el-form-item>
            <el-form-item label="PASSWORD">
                <el-input v-model="data.form.password" style="width: 250px" name="password" placeholder="PASSWORD" type="password" show-password></el-input>
            </el-form-item>
            <el-form-item label="REMEMBER ME">
                <el-checkbox v-model="data.form.remember_me" name="remember_me"></el-checkbox>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="authenticate()">KNOCK-KNOCK</el-button>
            </el-form-item>
        </el-form>
    </FormWrapper>
</template>

<style scoped>

</style>
