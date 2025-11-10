<template>
    <div class="max-w-md overflow-hidden">
        <div
            class="relative flex w-full items-center justify-center overflow-hidden rounded-lg"
        >
            <img :src="product.photos[0]" alt="Hyperion lamp" />
        </div>
        <div>
            <hr class="my-4 border-t-2 border-gray-400" />
        </div>
        <div class="">
            <div class="flex items-center justify-between">
                <h2 class="line-clamp-2 text-lg font-medium text-gray-800">
                    {{ product.name }}
                </h2>
            </div>
            <p class="mt-1 text-base text-gray-500">
                {{ formatIDR(product.price) }}
            </p>
        </div>
    </div>
</template>

<script setup>
import { useCurrency } from '@/Composables/useCurrency';
const { formatIDR } = useCurrency();

defineProps({
    product: Object,
});
</script>

<style scoped></style>
