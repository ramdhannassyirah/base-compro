<template>
    <section class="relative mx-auto mt-8 max-w-7xl">
        <!-- Background Image -->
        <div class="absolute inset-0 mx-4">
            <img
                src="/images/1.avif"
                alt="Contemporary Interior"
                class="h-full w-full rounded-2xl object-cover"
            />
            <!-- overlay -->
            <div class="absolute inset-0 rounded-2xl bg-black/30"></div>
        </div>

        <!-- Content -->
        <div
            class="relative z-10 mx-auto flex h-[600px] max-w-7xl flex-col justify-center px-6 text-white"
        >
            <h1
                ref="titleRef"
                class="mb-6 text-center text-7xl font-extrabold uppercase"
            >
                {{ appName }}
            </h1>
        </div>
    </section>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { onMounted, ref, nextTick } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const appName = usePage().props.appName;

const titleRef = ref(null);

onMounted(async () => {
    await nextTick();

    const text = titleRef.value.innerText;
    titleRef.value.innerHTML = text
        .split('')
        .map((char) => `<span class="inline-block opacity-0">${char}</span>`)
        .join('');

    const letters = titleRef.value.querySelectorAll('span');

    gsap.to(letters, {
        opacity: 1,
        y: 0,
        duration: 5,
        ease: 'power3.out',
        stagger: 0.05,
        scrollTrigger: {
            trigger: titleRef.value,
            start: 'top 80%',
            once: true,
        },
    });
});
</script>

<style></style>
