<template>
    <section class="mx-auto my-20 max-w-7xl gap-10">
        <div class="mb-14 text-center">
            <h2 class="text-5xl font-semibold">Testimonial</h2>
            <p class="mt-2 text-gray-500">
                Lorem ipsum dolor sit amet consectetur adipisicing elit
            </p>
        </div>

        <!-- Jika tidak ada testimonial -->
        <div
            v-if="!testimonials || testimonials.length === 0"
            class="py-20 text-center text-gray-400"
        >
            Belum ada testimoni
        </div>

        <!-- Jika ada testimonial -->
        <Swiper
            v-else
            :modules="[Autoplay]"
            :space-between="20"
            :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
            }"
            loop
            :breakpoints="{
                0: { slidesPerView: 1 },
                640: { slidesPerView: 1.5 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            }"
            :pagination="{ clickable: true }"
        >
            <SwiperSlide
                class="px-4"
                v-for="testimonial in testimonials"
                :key="testimonial.id"
            >
                <TestimonialCard :testimonial="testimonial" />
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<script setup>
import TestimonialCard from '../TestimonialCard.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay } from 'swiper/modules';
import 'swiper/css';

defineProps({
    testimonials: {
        type: Array,
        default: () => [],
    },
});
</script>

<style scoped></style>
