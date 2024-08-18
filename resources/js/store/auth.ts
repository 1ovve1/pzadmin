import {defineStore} from "pinia";
import {LoginFormInterface} from "@/Pages/Login.vue";
import client from "@/store/api/client";

export const useAuthStore = defineStore('auth', {
    state: (): AuthStateInterface => ({
        type: '',
        token: '',
    }),
    actions: {
        setToken(token: string): void {
            this.token = token;
        },
        setType(type: string): void {
            this.type = type;
        },
        async login(loginForm: LoginFormInterface) {
            return client.auth.login<AuthStateInterface>(loginForm.username, loginForm.password)
                .then((authState: AuthStateInterface) => {
                    this.setType(authState.type);
                    this.setToken(authState.token);
                });
        }
    },
    persist: {
        storage: sessionStorage
    },
});


interface AuthStateInterface
{
    type: string;
    token: string;
}
