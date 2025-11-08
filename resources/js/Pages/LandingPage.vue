<template>
    <Head title="Beranda" />
    <AppLayout>
        <Hero />
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
} from '@/Components/Sections';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<style></style>
