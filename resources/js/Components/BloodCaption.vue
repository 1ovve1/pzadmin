<script setup lang="ts">

import {onMounted, reactive, ref} from "vue";

interface BloodCaptionDataInterface {
    ctx: CanvasRenderingContext2D|null;
}

const data = reactive<BloodCaptionDataInterface>({
    ctx: null,
});

const caption = ref<HTMLElement>();
const canvas = ref<HTMLCanvasElement>();


onMounted(() => {
    const w = caption.value?.clientWidth, h = caption.value?.clientHeight;

    if (canvas.value !== undefined) {
        data.ctx = canvas.value.getContext("2d");
        if (data.ctx !== null) {
            data.ctx.canvas.height = h;
            data.ctx.canvas.width = w;

            const bloodDrops: Blood[] = [
                new Blood( 2,70,  1,  2),
                new Blood( 28, 37,  1,1.5),
                new Blood( 53,80,1.5,  1),
                new Blood( 68,60,  2,1.7),
                new Blood(93,68,  1,1.3),
                new Blood(154,78,  1,1.9),
                new Blood(174,71,  1,1.4),
                new Blood(222,76,1.3,1.1),
                new Blood(263,72,1.8,0.7),
                new Blood(280,75,1.4,1.3),
                new Blood(325,72,1.8,1.2),
                new Blood(380,75,1.4,0.9),
                new Blood(395,88,0.8,1.3),
                new Blood(418,70,1.2,1.6),
                new Blood(466,67,0.8,1.3),
                new Blood(487,71,1.2,1.2),
                new Blood(512,74,1.7,1.5),
                new Blood(542,74,1.7,0.8),
            ];

            const loop = () => {
                if (data.ctx !== null) {
                    data.ctx.fillStyle = 'rgba(0,0,0,0.005)';
                    data.ctx.fillRect(0,0,w,h);
                    for(var i = 0; i < bloodDrops.length; ++i){
                        if (Math.random()>0.5) bloodDrops[i].cy += bloodDrops[i].speed;
                        else bloodDrops[i].cy += bloodDrops[i].speed/3;
                        if(bloodDrops[i].cy > h)
                            bloodDrops[i].cy = bloodDrops[i].y;
                        bloodDrops[i].draw(data.ctx);
                    }
                    requestAnimationFrame(loop);
                }
            }

            loop();

        }

    }
});


class Blood {
    public readonly x: number;
    public readonly y: number;
    public readonly r: number;
    public cy: number;
    public readonly speed: number;

    constructor(x: number, y: number, r: number, speed: number) {
        this.x = x;
        this.y = y;
        this.r = r;
        this.cy = y;
        this.speed = speed;
    }

    draw(ctx: CanvasRenderingContext2D): void
    {
        ctx.beginPath();
        ctx.arc(this.x + 1, this.cy, this.r, 0, Math.PI*2);
        ctx.closePath();
        ctx.fillStyle = 'red';
        ctx.fill();
    }
}


</script>

<template>
    <div class="bloodyWrapper">
        <canvas ref="canvas" class="canvas"/>

        <div class="caption contain-content" ref="caption">server</div>

        <svg class="svg">
            <filter id="noise">
                <feTurbulence baseFrequency="0.07" type="fractalNoise"  result="turbNoise" />
                <feDisplacementMap
                    in="SourceGraphic"
                    in2="turbNoise"
                    xChannelSelector="G"
                    yChannelSelector="B"
                    scale="4"
                    result="disp"/>
            </filter>
        </svg>
    </div>
</template>

<style scoped>

.bloodyWrapper {
    filter: blur(1px) contrast(1.6);
    background: black;
    height: 100%; width: 100%;
    overflow: hidden;
}
.caption {
    font-size: 80px;
    color: red;
    position: absolute;
    z-index: 1;
    filter: url(#noise);
    white-space: nowrap;
}
.svg {
    display: none;
}
.canvas {
    position: absolute;
    border-bottom: 5px solid red;
    filter: url(#noise);
}
</style>
