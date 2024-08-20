import {defineStore} from "pinia";
import {LoginFormInterface} from "@/Pages/Login.vue";
import client from "@/store/api";

export const useAuthStore = defineStore('auth', {
    state: (): AuthStateInterface => ({
        type: '',
        token: '',
        expires_at: new Date(),
        regenerate_timeout_index: null
    }),
    actions: {
        async ping(): Promise<void> {
            return client.auth.ping()
                .then(() => {
                    this.regenerate_timeout_index = null;
                    this.startRegenerateProcess();
                });
        },
        async login(loginForm: LoginFormInterface): Promise<void> {
            return client.auth.login<AuthStateInterface>(loginForm.username, loginForm.password)
                .then((authState: AuthStateInterface) => {
                    this.setAuthState(authState);
                });
        },
        async logout(): Promise<void> {
            return client.auth.logout();
        },
        async regenerate(): Promise<void> {
            return client.auth.regenerate<AuthStateInterface>()
                .then((authState: AuthStateInterface) => {
                    this.setAuthState(authState);
                })
        },
        setAuthState(authState: AuthStateInterface) {
            this.setType(authState.type);
            this.setToken(authState.token);
            this.setExpiresAt(authState.expires_at);
        },
        setToken(token: string): void {
            this.token = token;
        },
        setType(type: string): void {
            this.type = type;
        },
        setExpiresAt(date: Date): void {
            this.expires_at = new Date(date);
        },
        getExpiresAt(): Date {
            return new Date(this.expires_at);
        },
        startRegenerateProcess(): void {
            const timeDiffMs: number = this.getExpiresAt().valueOf() - (new Date()).valueOf();

            if ((timeDiffMs > 0) && (this.regenerate_timeout_index === null)) {
                this.regenerate_timeout_index = setTimeout(async (): Promise<void> => {
                    return this.regenerate().then(() => {
                        this.regenerate_timeout_index = null;
                        this.startRegenerateProcess();
                    });
                }, (timeDiffMs > 10000) ? timeDiffMs / 2: 10000);
            }
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
    expires_at: Date;
    regenerate_timeout_index?: number|null;
}
