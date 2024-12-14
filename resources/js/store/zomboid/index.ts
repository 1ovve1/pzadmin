import {defineStore} from "pinia";
import apiClient from "@/store/api";

export const useZomboidStore = defineStore("server", {
    state: (): ServerStateInterface => ({
        id: -1,
        prefix: '',
        name: '',
        fullName: '',
        ip: '127.0.0.1',
        port: 0,
        status: '...',
    }),
    getters: {
        getStatus: (state: ServerStateInterface): ServerStatusEnum =>
            state.status,
        isEmpty: (state: ServerStateInterface): boolean =>
            state.id === -1,
        isActive: (state: ServerStateInterface): boolean =>
            state.status === 'active',
        isDown: (state: ServerStateInterface): boolean =>
            state.status === 'down',
    },
    actions: {
        async fetch(): Promise<void> {
            if (this.isEmpty) {
                this.$state = await apiClient.zomboid.index<ServerStateInterface>();
            }
        },
        async start(): Promise<void> {
            await apiClient.zomboid.start();
        },
        async down(): Promise<void> {
            await apiClient.zomboid.down();
        },
        setStatus(status: ServerStatusEnum): void
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
    status: ServerStatusEnum;
}

type ServerStatusEnum = '...' | 'active' | 'down' | 'pending' | 'restarting' | 'paused' | 'error';
