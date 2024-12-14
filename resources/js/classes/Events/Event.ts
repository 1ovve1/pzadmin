export interface EventInterface<T>
{
    eventName: string;
    callable: (handler: T) => void;
}

export class Event<T> implements EventInterface<T>
{
    eventName: string;
    callable: (handler: T) => void;

    constructor(eventName: string, callable: (handler: T) => void)
    {
        this.eventName = eventName;
        this.callable = callable;
    }
}
