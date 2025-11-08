<template>
    <Link
        :href="href"
        class="inline-block w-full items-center gap-2 rounded-lg py-3"
        :class="classes"
    >
        <Icon :icon="icon" class="h-6 w-6" />
        <slot />
    </Link>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const classes = computed(() =>
    props.active
        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-1 pt-1 border-b-2 border-gray-300 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-indigo-400 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out',
);

const props = defineProps({
    href: {
        type: String,
    },
    icon: {
        type: String,
    },
    active: {
        type: Boolean,
    },
});
</script>

<style></style>
