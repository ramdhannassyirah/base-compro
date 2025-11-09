<template>
    <section class="mb-20" ref="sectionRef">
        <div
            class="mx-auto grid max-w-7xl items-center justify-items-center gap-4 md:grid-cols-4"
        >
            <div class="text-start">
                <h1 ref="num1" class="text-7xl font-semibold">0</h1>
                <p class="text-lg font-semibold">Products</p>
            </div>
            <div class="text-start">
                <h1 ref="num2" class="text-7xl font-semibold">0</h1>
                <p class="text-lg font-semibold">Articles</p>
            </div>
            <div class="text-start">
                <h1 ref="num3" class="text-7xl font-semibold">0</h1>
                <p class="text-lg font-semibold">Clients</p>
            </div>
            <div class="text-start">
                <h1 ref="num4" class="text-7xl font-semibold">0</h1>
                <p class="text-lg font-semibold">Testimonials</p>
            </div>
        </div>
    </section>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const props = defineProps({
    testimonialCount: Number,
});

gsap.registerPlugin(ScrollTrigger);

const sectionRef = ref(null);
const num1 = ref(null);
const num2 = ref(null);
const num3 = ref(null);
const num4 = ref(null);

const counters = [
    { el: num1, end: 50 },
    { el: num2, end: 10 },
    { el: num3, end: props.testimonialCount },
    { el: num4, end: props.testimonialCount },
];

onMounted(() => {
    ScrollTrigger.create({
        trigger: sectionRef.value,
        start: 'top 80%',
        once: true,
        onEnter() {
            counters.forEach(({ el, end }) => {
                gsap.fromTo(
                    el.value,
                    { innerText: 0 },
                    {
                        innerText: end,
                        duration: 2,
                        ease: 'power2.out',
                        snap: { innerText: 1 },
                    },
                );
            });
        },
    });
});
</script>
