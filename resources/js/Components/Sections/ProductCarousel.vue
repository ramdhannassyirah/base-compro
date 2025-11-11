<template>
    <section class="my-28">
        <div class="mb-14 text-center">
            <h2 class="text-5xl font-semibold">Highlights of Products</h2>
        </div>

        <!-- Kondisi jika tidak ada product -->
        <div
            v-if="!products || products.length === 0"
            class="py-10 text-center text-gray-500"
        >
            <p>Tidak ada produk untuk ditampilkan.</p>
        </div>

        <!-- Swiper hanya tampil kalau ada produk -->
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
            <SwiperSlide class="px-4" v-for="item in products" :key="item.id">
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
    products: {
        type: Array,
        default: () => [],
    },
});
</script>

<style scoped></style>
