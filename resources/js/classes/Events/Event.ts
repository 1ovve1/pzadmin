export interface EventInterface
{
    eventName: string;
    callable: <T>(handler: T) => void;
}

export class Event implements EventInterface
{
    eventName: string;
    callable: <T>(handler: T) => void;

    constructor(eventName: string, callable: <T>(handler: T) => void)
    {
        this.eventName = eventName;
        this.callable = callable;
    }
}
