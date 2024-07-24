import {InjectionKey} from "vue";
import {createStore, Store} from "vuex";

export interface State {
    count: number
}

export const key: InjectionKey<Store<State>> = Symbol()

export const store = createStore<State>({
    state: {
        count: 0
    }
})


