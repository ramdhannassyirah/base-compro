<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="flex min-h-screen items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0"
    >
        <div class="flex w-1/2 items-center justify-center">
            <Link href="/">
                <ApplicationLogo class="fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="flex min-h-screen w-1/2 items-center justify-center bg-white shadow-md sm:rounded-lg"
        >
            <div class="w-full">
                <div class="mx-auto max-w-md">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
