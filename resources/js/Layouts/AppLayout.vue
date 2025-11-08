<template>
    <div>
        <nav>
            <div
                class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6"
            >
                <div class="">
                    <h1 class="text-xl font-semibold">{{ appName }}</h1>
                </div>
                <div class="hidden space-x-4 md:block">
                    <Link href="">Beranda</Link>
                    <Link href="">Articles</Link>
                    <Link href="">Product</Link>
                    <Link href="">Testimonial</Link>
                    <Link href="">Tentang Kami</Link>
                </div>
            </div>
        </nav>
        <main class="min-h-screen">
            <slot />
        </main>
        <footer class="w-full bg-black">
            <div class="mx-auto max-w-7xl p-4">
                <p class="text-white">Copyright &copy; {{ appName }}</p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const appName = usePage().props.appName;
</script>

<style></style>
