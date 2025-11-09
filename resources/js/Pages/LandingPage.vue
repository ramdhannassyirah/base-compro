<template>
    <Head title="Beranda" />
    <AppLayout>
        <Hero />
        <ProductCarousel />
        <Products />
        <Information :testimonialCount="testimonialCount" />
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
});
</script>

<style></style>
