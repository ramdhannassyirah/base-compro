<template>
    <Head title="Produts" />
    <AppLayout>
        <div class="mx-auto mb-20 grid max-w-7xl grid-cols-3 gap-6 px-4">
            <ProductCard
                v-for="product in products"
                :key="product.id"
                :product="product"
            />
        </div>
    </AppLayout>
</template>

<script setup>
import ProductCard from '@/Components/ProductCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    products: Object,
});
</script>

<style></style>
