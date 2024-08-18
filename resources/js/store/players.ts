import {defineStore} from "pinia";
import {LinkInterface, Pagination, PaginationInterface} from "@/classes/Pagination";
import client from "@/store/api/client";

export const usePlayersStore = defineStore('players', {
    state: (): PlayersStateInterface => Object.assign({}, new Pagination<PlayerInterface>()),
    actions: {
        async fetch(): Promise<void> {
            this.$state = await client.servers.zomboid.players.index<PlayersStateInterface>();
        }
    },
    getters: {
        playersCount(): number {
            return this.data.length;
        }
    }
});

interface PlayersStateInterface extends PaginationInterface<PlayerInterface>{

}

interface PlayerInterface
{
    name: string;
}
