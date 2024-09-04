<script setup lang="ts">

import FormWrapper from "@/Components/Forms/FormWrapper.vue";
import {RegistrationFormInterface, useAuthStore} from "@/store/auth";
import {onBeforeMount, reactive, ref} from "vue";
import {ElMessageBox, FormInstance, FormRules} from "element-plus";
import {debounce} from "ts-debounce";


interface RegistrationFormPropsInterface {
    /**
     * unique hash invite identifier
     */
    hash: string;
}
const props = defineProps<RegistrationFormPropsInterface>()

interface RegistrationFormDataInterface {
    form: RegistrationFormInterface;
}
const data = reactive<RegistrationFormDataInterface>({
    form: {
        username: '',
        email: '',
        password: '',
        password_confirmation: '',
        hash: '',
    },
});

const emit = defineEmits<{
    (e: 'hashBad'): void,
    (e: 'hashOk'): void,
    (e: 'onSuccessSubmit'): void
}>();

const authStore = useAuthStore();
const formRef = ref<FormInstance>();

/**
 * #######################################
 * VALIDATION
 */

/**
 * Username validation (unique check + additional validation)
 */
const usernameExistValidation = debounce(async (callback: Function, value: string) => {
    try {
        await authStore.verifyUsername(value);

        callback();
    } catch (error) {
        callback(new Error('username already exists'));
    }
}, 1000)
const validateUsername = async (_: any, value: any, callback: Function) => {
    usernameExistValidation.cancel();
    value = String(value).trim();

    if (value === '') {
        callback(new Error('who are you mfk???'));
    } else if (value.length < 4) {
        callback(new Error('too small, think more'));
    } else if (value.length > 255) {
        callback(new Error('are you an idiot?'));
    } else {
        await usernameExistValidation(callback, value);
    }
}

/**
 * email validation
 */
const emailExistsValidation = debounce(async (callback: Function, value: string) => {
    try {
        await authStore.verifyEmail(value);

        callback();
    } catch (error) {
        callback(new Error('two mans - one email...'));
    }
}, 1000);
const validationEmail = async (_: any, value: any, callback: Function) => {
    emailExistsValidation.cancel();
    value = String(value).trim();
    const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (!value.match(regex)) {
        callback(new Error('incorrect email format'));
    } else if (value.length > 255) {
        callback(new Error('are you an idiot?'));
    } else {
        await emailExistsValidation(callback, value);
    }
}

/**
 * password validation
 */
const validationPassword = (_: any, value: any, callback: Function) => {
    value = String(value).trim();
    const regex = /^(?=.*[0-9])[a-zA-Z0-9!@#$%^&*]{8,16}$/;

    if (!value.match(regex)) {
        return new Error('incorrect format');
    } else if (value.length > 255) {
        callback(new Error('are you an idiot?'));
    } else {
        if (data.form.password_confirmation !== '') {
            formRef.value?.validateField('password_confirmation');
        }

        callback();
    }
}
const validationPasswordConfirmation = (_: any, value: any, callback: Function) => {
    value = String(value).trim();

    if (value !== data.form.password) {
        return new Error('passwords are different');
    } else if (value.length > 255) {
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
    email: [{
        required: true, asyncValidator: validationEmail, trigger: 'change',
    }],
    password: [{
        required: true, validator: validationPassword, trigger: 'change',
    }],
    password_confirmation: [{
        required: true, validator: validationPasswordConfirmation, trigger: 'change',
    }],
    hash: [],
});

/**
 * #######################################
 */

async function registration(): Promise<void> {
    try {
        await formRef.value?.validate(async (valid: boolean) => {
            if (valid) {
                await authStore.registration(data.form);
                await authStore.login(data.form);
            } else {
                throw new Error('bad validation');
            }
        })

        emit('onSuccessSubmit');
    } catch (error) {
        await ElMessageBox.alert('Something went wrong :(', '...');
    }
}

onBeforeMount(async () => {
    try {
        if (props.hash.length !== 8) {
            throw new Error(`Incompatible hash given (${props.hash})`);
        }

        await authStore.verifyHash(props.hash);

        data.form.hash = props.hash;
        emit('hashOk');
    } catch (error) {
        emit('hashBad');
    }
})


</script>

<template>
    <FormWrapper title="REGISTRATION">
        <el-form :model="data.form"
                 @keypress.enter.native="registration()"
                 size="large"
                 label-width="auto"
                 style="max-width: 600px"
                 class="flex flex-col justify-center items-center"
                 :rules="rules"
                 ref="formRef">
            <el-form-item title="username" label="USERNAME" prop="username">
                <el-input v-model="data.form.username" style="width: 250px" name="username" placeholder="USERNAME"
                          type="text" v-uppercase-input></el-input>
            </el-form-item>
            <el-form-item title="email" label="EMAIL" prop="email">
                <el-input v-model="data.form.email" style="width: 250px" name="email" placeholder="EMAIL" type="text" v-uppercase-input></el-input>
            </el-form-item>
            <el-form-item title="password" label="PASSWORD" prop='password'>
                <el-input v-model="data.form.password" style="width: 250px" name="password" placeholder="PASSWORD"
                          type="password" show-password></el-input>
            </el-form-item>
            <el-form-item title="password confirm" label="CONFIRM" prop="password_confirmation">
                <el-input v-model="data.form.password_confirmation" style="width: 250px" name="password_confirmation"
                          placeholder="PASSWORD CONFIRM" type="password" show-password></el-input>
            </el-form-item>

            <el-button @click="registration()" type="primary">KNOCK-KNOCK</el-button>
        </el-form>
    </FormWrapper>
</template>

<style>
</style>
