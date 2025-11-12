<template>
    <div>
        <nav
            class="w-full border-b bg-white"
            :class="fixed ? 'fixed top-0 z-50' : ''"
        >
            <div
                class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6"
            >
                <!-- Logo -->
                <div class="flex items-center">
                    <img
                        v-if="websiteSetting.logo"
                        :src="`/storage/${websiteSetting.logo}`"
                        alt="Logo"
                        class="h-14 w-auto object-contain"
                    />
                    <h1 v-else class="text-xl font-semibold">{{ appName }}</h1>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden items-center gap-4 md:flex">
                    <Link
                        href="/"
                        :class="
                            $page.url === '/'
                                ? 'border-b-2 border-black'
                                : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                        "
                        >Beranda</Link
                    >
                    <Link
                        href="/articles"
                        :class="
                            $page.url.startsWith('/articles')
                                ? 'border-b-2 border-black'
                                : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                        "
                        >Articles</Link
                    >
                    <Link
                        href="/product"
                        :class="
                            $page.url.startsWith('/product')
                                ? 'border-b-2 border-black'
                                : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                        "
                        >Product</Link
                    >
                    <a
                        href="#testimonial"
                        class="transition-all duration-300 hover:border-b-2 hover:border-black"
                        >Testimonial</a
                    >
                    <Link
                        href="/about"
                        :class="
                            $page.url.startsWith('/about')
                                ? 'border-b-2 border-black'
                                : 'transition-all duration-300 hover:border-b-2 hover:border-black'
                        "
                        >Tentang Kami</Link
                    >
                    <Link
                        href="#contact"
                        class="transition-all duration-300 hover:border-b-2 hover:border-black"
                        >Kontak Kami</Link
                    >

                    <Link
                        v-if="isAuthenticated"
                        href="/dashboard"
                        class="flex items-center gap-2 rounded-xl border px-4 py-2 transition-all duration-300 hover:border-gray-700"
                    >
                        Dashboard
                        <Icon icon="mdi:account" class="text-xl" />
                    </Link>
                </div>

                <!-- Mobile Hamburger -->
                <div class="flex items-center gap-2 md:hidden">
                    <Link
                        v-if="isAuthenticated"
                        href="/dashboard"
                        class="flex items-center gap-2 rounded-xl border px-4 py-2 transition-all duration-300 hover:border-gray-700"
                    >
                        Dashboard
                        <Icon icon="mdi:account" class="text-xl" />
                    </Link>

                    <button
                        @click="showingMobileMenu = !showingMobileMenu"
                        class="focus:outline-none"
                    >
                        <Icon
                            :icon="showingMobileMenu ? 'mdi:close' : 'mdi:menu'"
                            class="text-2xl"
                        />
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-show="showingMobileMenu" class="border-t bg-white md:hidden">
                <Link href="/" class="block border-b px-4 py-2">Beranda</Link>
                <Link href="/articles" class="block border-b px-4 py-2"
                    >Articles</Link
                >
                <Link href="/product" class="block border-b px-4 py-2"
                    >Product</Link
                >
                <a href="#testimonial" class="block border-b px-4 py-2"
                    >Testimonial</a
                >
                <Link href="/about" class="block border-b px-4 py-2"
                    >Tentang Kami</Link
                >
                <a href="#contact" class="block border-b px-4 py-2"
                    >Kontak Kami</a
                >
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
import { computed, ref, onMounted, onUnmounted } from 'vue';
import ScrollToTop from '@/Components/ScrollToTop.vue';

const showingMobileMenu = ref(false);
const fixed = ref(false);

const onScroll = () => {
    fixed.value = window.scrollY > 80;
};

onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));

const appName = usePage().props.appName;
const websiteSetting = computed(() => usePage().props.websiteSetting);
const isAuthenticated = computed(() => usePage().props.auth.user);
</script>

<style></style>
