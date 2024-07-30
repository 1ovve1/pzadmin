import {Survivor, SurvivorInterface} from "@/classes/Server/Survivor";

export interface SurvivorsListInterface {
    count: number
    list: Survivor[]
}

export class SurvivorsList {
    count: number
    list: Survivor[]

    constructor(survivors: SurvivorInterface[]) {
        this.list = survivors
        this.count = survivors.count
    }
}
