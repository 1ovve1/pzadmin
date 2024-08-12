import {createPinia} from "pinia";
import piniaPersistentState from "pinia-plugin-persistedstate";

export default createPinia()
    .use(piniaPersistentState);
