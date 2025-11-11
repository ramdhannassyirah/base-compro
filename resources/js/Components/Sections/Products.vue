<template>
    <section class="my-20">
        <div ref="sectionRef" class="mx-auto max-w-7xl px-4">
            <div class="grid gap-4 md:grid-cols-3">
                <!-- Card Besar -->
                <div
                    class="card-item group relative col-span-2 h-[600px] cursor-pointer overflow-hidden rounded-2xl"
                >
                    <img
                        src="/images/2.avif"
                        alt=""
                        class="h-full w-full rounded-2xl object-cover object-bottom transition-all duration-300 group-hover:scale-125"
                    />
                    <div class="absolute inset-0 rounded-2xl bg-black/30"></div>

                    <div class="text-group absolute bottom-5 left-5">
                        <p
                            class="w-fit rounded-full border border-white px-4 py-1 text-white"
                        >
                            All Best Furniture
                        </p>
                        <p
                            class="mt-2 w-40 text-5xl font-semibold leading-tight text-white md:text-7xl"
                        >
                            Modern <br />
                            Minimalist
                        </p>
                    </div>
                </div>

                <!-- Card Kanan -->
                <div class="col-span-2 h-full space-y-4 md:col-span-1">
                    <div
                        class="card-item group relative h-[250px] cursor-pointer overflow-hidden rounded-2xl"
                    >
                        <img
                            src="/images/3.avif"
                            alt=""
                            class="h-full w-full rounded-2xl object-cover transition-all duration-300 group-hover:scale-125"
                        />
                        <div
                            class="text-group absolute bottom-5 right-5 flex flex-col items-end text-end"
                        >
                            <p
                                class="w-fit items-end rounded-full border px-4 py-1 text-white"
                            >
                                Best Table
                            </p>
                            <p
                                class="mt-2 w-40 text-sm font-semibold text-white"
                            >
                                Lorem ipsum dolor sit amet
                            </p>
                        </div>
                    </div>

                    <div
                        class="card-item group relative h-[330px] cursor-pointer overflow-hidden rounded-2xl"
                    >
                        <img
                            src="/images/4.avif"
                            alt=""
                            class="h-full w-full rounded-2xl object-cover object-bottom transition-all duration-300 group-hover:scale-125"
                        />
                        <div
                            class="absolute inset-0 rounded-2xl bg-black/30"
                        ></div>

                        <div class="text-group absolute left-5 top-5">
                            <p
                                class="w-fit rounded-full border border-white px-4 py-1 text-white"
                            >
                                Best Chair
                            </p>
                            <p
                                class="mt-2 w-40 text-sm font-semibold text-white"
                            >
                                Lorem ipsum dolor sit amet
                            </p>
                        </div>

                        <div
                            class="absolute -bottom-3 -right-3 flex h-24 w-24 items-center justify-center rounded-full bg-white"
                        >
                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-full bg-black transition-all duration-300 group-hover:bg-black/50"
                            >
                                <Icon
                                    icon="mdi:arrow-right"
                                    class="h-10 w-10 text-white"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { ref, onMounted } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const sectionRef = ref(null);

onMounted(() => {
    gsap.from('.card-item', {
        y: 80,
        opacity: 0,
        duration: 1.2,
        ease: 'power3.out',
        stagger: 0.15,
        scrollTrigger: {
            trigger: sectionRef.value,
            start: 'top 80%',
            once: true,
        },
    });
});
</script>
