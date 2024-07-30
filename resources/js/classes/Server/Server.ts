import {SurvivorsListInterface} from "@/classes/Server/SurvivorsListInterface";

export interface ServerInterface {
    ip: string
    port: string
    survivors: SurvivorsListInterface
}

export class Server implements ServerInterface {
    ip: string
    port: string
    survivors: SurvivorsListInterface

    constructor(ip: string, port: string, survivors: SurvivorsListInterface) {
        this.ip = ip
        this.port = port
        this.survivors = survivors
    }
}
