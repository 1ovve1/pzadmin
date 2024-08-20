import apiClient from "@/store/api/client";

export default {
    apiClient,
    auth: {
        login: async <T>(username: string, password: string): Promise<T> => {
            return apiClient.post('/auth/login', {username, password}).then(({ data }) => data.data);
        },
        logout: async (): Promise<void> => {
            return apiClient.get('/auth/logout');
        },
        ping: async (): Promise<void> => {
            return apiClient.get('/auth/ping');
        },
        regenerate: async <T>(): Promise<T> => {
            return apiClient.get('/auth/regenerate').then(({ data }) => data.data);
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
