import {defineStore} from "pinia";


export const useSettingsStore = defineStore('settings', {
    state: () => ({
        darkMode: false,
    }),
    getters: {
        darkModeLogo(state) {
            return state.darkMode ? 'zomboid-logo.png': 'zomboid-logo-black.png';
        }
    },
    actions: {
        switchDarkMode(): void {
            this.darkMode = !this.darkMode;
        }
    },
    persist: true,
})
