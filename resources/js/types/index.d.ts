import { Config } from 'ziggy-js';
import { Store } from 'vuex'

export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at: string;
}

export type PageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    auth: {
        user: User;
    };
    ziggy: Config & { location: string };
};


export interface State {
    count: number
}

declare module '@vue/runtime-core' {
    // declare your own store states
    interface State {
        count: number
    }

    // provide typings for `this.$store`
    interface ComponentCustomProperties {
        $store: Store<State>
    }
}
