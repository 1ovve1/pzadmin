import {defineStore} from "pinia";
import apiClient from "@/store/api/client";

export const useServerStore = defineStore("server", {
    state: (): ServerStateInterface => ({
        id: -1,
        prefix: '',
        name: '',
        fullName: '',
        ip: '127.0.0.1',
        port: 0,
        status: '...',
    }),
    actions: {
        async fetch(): Promise<void> {
            this.$state = await apiClient.servers.zomboid.index<ServerStateInterface>();
        },
        setStatus(status: string): void
        {
            this.status = status;
        },
    }
})

interface ServerStateInterface
{
    id: number;
    prefix: string;
    name: string;
    fullName: string;
    ip: string;
    port: number;
    status: string;
}
