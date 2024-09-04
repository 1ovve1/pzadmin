import { AxiosInstance } from 'axios';

declare global {
    interface Window {
        axios: AxiosInstance;
    }
}

declare module 'vue' {
    interface ComponentCustomProperties {
    }
}

