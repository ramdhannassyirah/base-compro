<template>
    <section class="my-28">
        <div class="mb-14 text-center">
            <h2 class="text-5xl font-semibold">Highlights of Products</h2>
        </div>
        <Swiper
            :modules="[Autoplay]"
            :space-between="20"
            :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
            }"
            loop
            :breakpoints="{
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1.5,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
                1440: {
                    slidesPerView: 4,
                },
            }"
            :pagination="{ clickable: true }"
        >
            <SwiperSlide class="px-4" v-for="item in products" :key="item">
                <ProductCard :product="item" />
            </SwiperSlide>
        </Swiper>
    </section>
</template>

<script setup>
import ProductCard from '../ProductCard.vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay } from 'swiper/modules';
import 'swiper/css';

const props = defineProps({
    products: Object,
});
</script>

<style scoped></style>
