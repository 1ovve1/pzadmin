import {useAuthStore} from "@/store/auth";
import axios from "axios";

const apiClient = axios.create({
    baseURL: '/api/v1',
    validateStatus: (status) => status >= 200 && status < 400,
});

apiClient.interceptors.request.use((config: any) => {
    const authStore = useAuthStore();
    const token = authStore.token;
    const type = authStore.type;

    return {
        ...config,
        headers: {...config.headers, Authorization: `${type} ${token}`}
    }
})


export default {
    apiClient,
    servers: {
        zomboid: {
            index: async <T>(): Promise<T> => {
                return apiClient.get('/servers/zomboid').then(({ data }) => data.data);
            }
        }
    }
}
