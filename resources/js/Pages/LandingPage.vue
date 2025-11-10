<template>
    <Head title="Beranda" />
    <AppLayout>
        <Hero />
        <ProductCarousel :products="products" />
        <Products />
        <Information
            :testimonialCount="testimonialCount"
            :productCount="productCount"
            :articleCount="articleCount"
        />
        <About />
        <Testimonial id="testimonial" :testimonials="testimonials" />
    </AppLayout>
</template>

<script setup>
import {
    Hero,
    Products,
    Information,
    About,
    Testimonial,
    ProductCarousel,
} from '@/Components/Sections';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    testimonials: Object,
    testimonialCount: Number,
    products: Object,
    productCount: Number,
    articles: Object,
    articleCount: Number,
});
</script>

<style></style>
