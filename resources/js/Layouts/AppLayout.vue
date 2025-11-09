<template>
    <div>
        <nav>
            <div
                class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6"
            >
                <div>
                    <img
                        v-if="websiteSetting.logo"
                        :src="`/storage/${websiteSetting.logo}`"
                        alt="Logo"
                        class="h-10 w-auto object-contain"
                    />
                    <h1 v-else class="text-xl font-semibold">{{ appName }}</h1>
                </div>

                <div class="hidden space-x-4 md:flex">
                    <Link
                        href="/"
                        :class="
                            $page.url === '/'
                                ? 'border-b-2 border-black pb-1'
                                : ''
                        "
                    >
                        Beranda
                    </Link>

                    <Link
                        href="/articles"
                        :class="
                            $page.url.startsWith('/articles')
                                ? 'border-b-2 border-black pb-1'
                                : ''
                        "
                    >
                        Articles
                    </Link>

                    <Link
                        href="/product"
                        :class="
                            $page.url.startsWith('/product')
                                ? 'border-b-2 border-black pb-1'
                                : ''
                        "
                    >
                        Product
                    </Link>

                    <a href="#testimonial"> Testimonial </a>

                    <Link
                        href="/about"
                        :class="
                            $page.url.startsWith('/about')
                                ? 'border-b-2 border-black pb-1'
                                : ''
                        "
                    >
                        Tentang Kami
                    </Link>
                </div>
            </div>
        </nav>
        <main class="min-h-screen">
            <slot />
        </main>
        <footer class="w-full bg-black pt-12 text-gray-300">
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 md:grid-cols-4"
            >
                <!-- Brand -->
                <div>
                    <h2 class="mb-3 text-2xl font-semibold text-white">
                        {{ appName }}
                    </h2>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Crafting Digital Experiences Through Code, Design, and
                        Innovation.
                    </p>
                </div>

                <!-- Services -->
                <div>
                    <h3 class="mb-3 font-semibold text-white">Services</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="#" class="transition hover:text-white"
                                >Web Development</a
                            >
                        </li>
                        <li>
                            <a href="#" class="transition hover:text-white"
                                >Mobile App Development</a
                            >
                        </li>
                        <li>
                            <a href="#" class="transition hover:text-white"
                                >UI/UX Design</a
                            >
                        </li>
                        <li>
                            <a href="#" class="transition hover:text-white"
                                >Branding & Identity</a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Social -->
                <div>
                    <h3 class="mb-3 font-semibold text-white">Follow Us</h3>
                    <div class="flex gap-4 text-xl">
                        <a
                            :href="websiteSetting.instagram"
                            target="_blank"
                            class="transition hover:text-white"
                        >
                            <Icon icon="mdi:instagram" width="24" height="24" />
                        </a>
                        <a
                            :href="websiteSetting.linkedin"
                            target="_blank"
                            class="transition hover:text-white"
                        >
                            <Icon icon="mdi:linkedin" width="24" height="24" />
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom -->
            <div
                class="mt-10 border-t border-gray-700 py-6 text-center text-sm text-gray-500"
            >
                Copyright &copy; {{ new Date().getFullYear() }}
                {{ websiteSetting.name }}. All Rights Reserved.
            </div>
        </footer>
    </div>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { Link, usePage } from '@inertiajs/vue3';

const appName = usePage().props.appName;
const websiteSetting = usePage().props.websiteSetting;
</script>

<style></style>
