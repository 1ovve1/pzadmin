import {ElLoading} from "element-plus";

export interface LoaderInterface {
    loaderBuffer?: ReturnType<typeof ElLoading.service>;
    config: Parameters<typeof ElLoading.service>[0]

    start(): void;
    stop(): void;
    switch(value: boolean): void;
}

export class Loader implements LoaderInterface {
    loaderBuffer?: ReturnType<typeof ElLoading.service> = undefined;
    config: Parameters<typeof ElLoading.service>[0]

    constructor(config: Parameters<typeof ElLoading.service>[0]) {
        this.config = config;
    }

    start(): void {
        this.loaderBuffer = ElLoading.service(this.config);
    }

    stop(): void {
        this.loaderBuffer?.close();
    }

    switch(value: boolean): void {
        if (value) {
            this.start();
        } else {
            setTimeout(() => this.stop(), 1000)
        }
    }
}
