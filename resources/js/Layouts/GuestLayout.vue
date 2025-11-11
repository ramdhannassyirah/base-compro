<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div
        class="min-h-screen items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 md:flex"
    >
        <div class="hidden items-center justify-center md:flex md:w-1/2">
            <Link href="/">
                <ApplicationLogo class="fill-current text-gray-500" />
            </Link>
        </div>

        <div
            class="flex min-h-screen items-center justify-center bg-white shadow-md sm:rounded-lg md:w-1/2"
        >
            <div class="w-full">
                <div class="mx-auto max-w-md px-4">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>
