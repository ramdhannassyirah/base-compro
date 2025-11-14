<template>
    <Head :title="product.name" />
    <AppLayout>
        <div class="mx-auto max-w-4xl px-4 pb-10">
            <!-- Photos -->
            <div class="mb-6 h-96 overflow-hidden rounded-xl">
                <img
                    :src="product.photos[0]"
                    alt="Photos"
                    class="h-full w-full rounded-xl object-cover"
                />
            </div>
            <div class="" v-if="product.photos.length > 1">
                <div class="flex items-center gap-4 overflow-x-auto">
                    <img
                        v-for="photo in product.photos"
                        :key="photo"
                        :src="photo"
                        alt="Photos"
                        class="aspect-square h-40 w-full rounded-xl object-cover"
                    />
                </div>
            </div>

            <!-- Metadata -->
            <div
                class="mb-4 mt-6 flex items-center gap-4 text-sm text-gray-500"
            >
                <div class="flex items-center gap-1">
                    <Icon icon="material-symbols:category-outline" />
                    {{ product.category }}
                </div>
            </div>

            <!-- Name -->
            <h1 class="mb-4 text-3xl font-bold text-gray-800">
                {{ product.name }}
            </h1>

            <!-- Description -->
            <p class="mb-8 leading-relaxed text-gray-700">
                {{ product.description }}
            </p>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Icon } from '@iconify/vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    product: Object,
});

console.log(props.product);
</script>

<style></style>
