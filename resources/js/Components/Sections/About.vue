<template>
    <section class="mb-20" ref="sectionRef">
        <div class="mx-auto max-w-7xl px-4">
            <div class="grid items-center gap-10 lg:grid-cols-3">
                <div ref="imageRef" class="col-span-2">
                    <img
                        src="/images/5.webp"
                        alt="Modern interior design with Poliform furniture"
                        class="h-full w-full rounded-xl object-cover"
                    />
                </div>

                <div ref="textRef">
                    <p
                        class="fade-item mb-2 text-sm uppercase tracking-widest text-gray-500"
                    >
                        Elegance • Timeless
                    </p>

                    <h2
                        class="fade-item mb-6 text-4xl font-extrabold leading-tight text-gray-900 sm:text-5xl"
                    >
                        Modern Style<br />
                        Timeless Charm
                    </h2>

                    <p
                        class="fade-item mb-10 text-justify text-lg text-gray-600"
                    >
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Dolor, distinctio porro provident, quod ex sapiente
                        eligendi ipsam laboriosam esse rerum dolorem temporibus
                        ab perferendis illo. Mollitia, illum harum dicta iusto
                        eius nisi.
                    </p>

                    <button
                        class="fade-item flex w-max items-center rounded-lg bg-black px-6 py-3 text-lg font-medium text-white transition duration-300 hover:bg-gray-800"
                    >
                        Tentang Kami
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const sectionRef = ref(null);
const imageRef = ref(null);
const textRef = ref(null);

onMounted(() => {
    // Gambar: muncul dari kiri
    gsap.from(imageRef.value, {
        x: -120,
        opacity: 0,
        duration: 1.5,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: sectionRef.value,
            start: 'top 80%',
            once: true,
        },
    });

    // Teks: muncul satu per satu
    gsap.from(textRef.value, {
        y: 30,
        opacity: 0,
        duration: 3,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: sectionRef.value,
            start: 'top 80%',
            once: true,
        },
    });
});
</script>

<style scoped></style>
