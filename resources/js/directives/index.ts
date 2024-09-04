import {App} from "vue";

const vUppercaseInput = {
    updated(el: HTMLElement) {
        const input: HTMLInputElement|null = el.querySelector("input");

        if (input === null) {
            throw new Error('Bad input resolve');
        }

        input.value = input.value.toUpperCase();
    }
}

export default {
    install (Vue: App): void {
        Vue.directive('uppercase-input', vUppercaseInput);
    }
}
