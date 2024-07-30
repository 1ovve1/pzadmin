export interface SurvivorInterface {
    name: string
}

export class Survivor implements SurvivorInterface {
    name: string;

    constructor(name: string) {
        this.name = name
    }
}
