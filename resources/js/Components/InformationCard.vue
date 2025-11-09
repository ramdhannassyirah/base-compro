<template>
    <div
        class="grid grid-cols-2 items-center gap-1 rounded-lg bg-white px-8 py-10 shadow-md"
    >
        <div class="justify-self-center text-center">
            <p class="text-5xl font-bold">{{ count || '0' }}</p>
            <p class="text-md text-gray-500">{{ title }}</p>
        </div>
        <div
            class="flex h-20 w-20 items-center justify-center justify-self-center rounded-full bg-gray-200"
        >
            <Icon :icon="icon" class="text-5xl text-gray-500" />
        </div>
    </div>
</template>

<script setup>
defineProps({
    count: {
        type: Number,
    },
    title: {
        type: String,
    },
    icon: Object,
});

import { Icon } from '@iconify/vue';
</script>

<style></style>
