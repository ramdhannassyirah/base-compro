<template>
    <Head title="Beranda" />
    <AppLayout>
        <Hero />
        <ProductCarousel />
        <Products />
        <Information />
        <About />
        <Testimonial />
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
</script>

<style></style>
