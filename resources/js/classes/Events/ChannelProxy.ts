import {EventInterface} from "@/classes/Events/Event";
import {Channel} from "laravel-echo";

export interface ChannelProxyInterface
{
    readonly channelName: string;

    addEvent(event: EventInterface): this;

    destroy(): this;
}

export class ChannelProxy implements ChannelProxyInterface
{
    readonly channelName: string;
    eventsCollection: Array<EventInterface>;

    private readonly channel: Channel;

    constructor(channelName: string) {
        this.channelName = channelName;
        this.channel = window.Echo.channel(channelName);
        this.eventsCollection = [];
    }

    addEvent(event: EventInterface): this {
        this.channel.listen(event.eventName, event.callable);
        this.eventsCollection.push(event);

        return this;
    }

    destroy(): this {
        this.eventsCollection.map((event: EventInterface) => this.channel.stopListening(event.eventName));
        this.eventsCollection = [];

        return this;
    }

    destroyAll(): this {
        return this;
    }

    removeEvent(eventName: string): this {
        return this;
    }

}
