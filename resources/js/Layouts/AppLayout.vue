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
                        class="h-14 w-auto object-contain"
                    />
                    <h1 v-else class="text-xl font-semibold">{{ appName }}</h1>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        class="hidden space-x-4 border-2 border-transparent md:flex"
                    >
                        <Link
                            href="/"
                            :class="
                                $page.url === '/'
                                    ? 'border-b-2 border-black'
                                    : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                            "
                        >
                            Beranda
                        </Link>

                        <Link
                            href="/articles"
                            :class="
                                $page.url.startsWith('/articles')
                                    ? 'border-b-2 border-black'
                                    : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                            "
                        >
                            Articles
                        </Link>

                        <Link
                            href="/product"
                            :class="
                                $page.url.startsWith('/product')
                                    ? 'border-b-2 border-black'
                                    : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                            "
                        >
                            Product
                        </Link>

                        <a
                            href="#testimonial"
                            class="transition-all duration-300 hover:border-b-2 hover:border-black"
                        >
                            Testimonial
                        </a>

                        <Link
                            href="/about"
                            :class="
                                $page.url.startsWith('/about')
                                    ? 'border-b-2 border-black'
                                    : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                            "
                        >
                            Tentang Kami
                        </Link>
                        <Link
                            href="#contact"
                            class="transition-all duration-300 hover:border-b-2 hover:border-black"
                        >
                            Kontak Kami
                        </Link>
                    </div>
                    <Link
                        v-if="isAuthenticated"
                        href="/dashboard"
                        class="flex items-center gap-2 rounded-xl border px-4 py-2 transition-all duration-300 hover:border-gray-700"
                    >
                        Dashboard
                        <Icon icon="mdi:account" class="text-xl" />
                    </Link>
                </div>
            </div>
        </nav>

        <ScrollToTop />
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
import { computed } from 'vue';
import ScrollToTop from '@/Components/ScrollToTop.vue';

const appName = usePage().props.appName;
const websiteSetting = computed(() => usePage().props.websiteSetting);
const isAuthenticated = computed(() => usePage().props.auth.user);
</script>

<style></style>
