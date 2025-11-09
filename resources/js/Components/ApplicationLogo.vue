<template>
    <div>
        <img
            v-if="websiteSetting.logo"
            :src="`/storage/${websiteSetting.logo}`"
            alt="Logo"
            class="h-10 w-auto object-contain"
        />
        <h1 v-else class="mt-3 text-center text-xl font-semibold">
            {{ websiteSetting.name }}
        </h1>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const websiteSetting = computed(() => usePage().props.websiteSetting);
</script>
