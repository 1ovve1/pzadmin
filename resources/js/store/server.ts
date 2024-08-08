import {defineStore} from "pinia";
import apiClient from "@/store/api/client";

export const useServerStore = defineStore("players", {
    state: (): ServerStateInterface => ({
        ip: '127.0.0.1',
        port: 'none',
        status: '...',
        players: {
            list: [] as PlayerInterface[]
        }
    }),
    getters: {
        playersCount(): number {
            return this.players.list.length;
        }
    },
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
    ip: string;
    port: number|string;
    status: string;
    players: {
        list: PlayerInterface[];
    };
}

interface PlayerInterface
{
    name: string;
}
