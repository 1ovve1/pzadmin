import apiClient from "@/store/api/client";

export default {
    apiClient,
    auth: {
        tokens: {
            ping: async (): Promise<void> => {
                return apiClient.get('/auth/tokens/ping');
            },
            regenerate: async <T>(): Promise<T> => {
                return apiClient.get('/auth/tokens/regenerate').then(({ data }) => data.data);
            },
        },
        verify: {
            hash: async (hash: string): Promise<void> => {
                return apiClient.get(`/auth/verify/hash/${hash}`);
            },
            username: async (username: string): Promise<void> => {
                return apiClient.get(`/auth/verify/username/${username}`);
            },
            email: async (email: string): Promise<void> => {
                return apiClient.get(`/auth/verify/email/${email}`);
            }
        },
        login: async <T>(username: string, password: string, remember_me: boolean): Promise<T> => {
            return apiClient.post('/auth/login', {username, password, remember_me}).then(({ data }) => data.data);
        },
        registration: async (username: string, email: string, password: string, password_confirmation: string, hash: string): Promise<void> => {
            return apiClient.post('/auth/registration', {username, email, password, password_confirmation, hash});
        },
        logout: async (): Promise<void> => {
            return apiClient.get('/auth/logout');
        }
    },
    servers: {
        zomboid: {
            index: async <T>(): Promise<T> => {
                return apiClient.get('/zomboid').then(({ data }) => data.data);
            },
            players: {
                index: async <T>(): Promise<T> => {
                    return apiClient.get('/zomboid/players').then(({ data }) => data);
                }
            }
        }
    }
}
