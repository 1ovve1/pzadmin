import {defineStore} from "pinia";

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
        }
    }
});


interface AuthStateInterface
{
    type: string;
    token: string;
}
