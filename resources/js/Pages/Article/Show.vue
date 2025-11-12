<template>
    <Head :title="articles.title" />

    <AppLayout>
        <div class="mx-auto max-w-4xl px-4 pb-10">
            <!-- Thumbnail -->
            <div class="mb-6 h-80 overflow-hidden rounded-xl">
                <img
                    :src="articles.thumbnail"
                    alt="Thumbnail"
                    class="h-full w-full object-cover"
                />
            </div>

            <!-- Title -->
            <h1 class="mb-4 text-3xl font-bold text-gray-800">
                {{ articles.title }}
            </h1>

            <!-- Metadata -->
            <div class="mb-6 flex items-center gap-4 text-sm text-gray-500">
                <div class="flex items-center gap-1">
                    <Icon icon="uil:calender" />
                    {{ articles.created_at }}
                </div>
                <div class="flex items-center gap-1">
                    <Icon icon="mdi:account" />
                    {{ articles.author?.name }}
                </div>
            </div>

            <!-- Description -->
            <p class="mb-8 leading-relaxed text-gray-700">
                {{ articles.description }}
            </p>

            <!-- Content -->
            <div
                class="prose max-w-none text-gray-800"
                v-html="articles.content"
            ></div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Icon } from '@iconify/vue';

const props = defineProps({
    articles: Object,
});

console.log(props.articles);
</script>

<style>
/* opsional: biar konten HTML dari artikel lebih rapi */
.prose img {
    border-radius: 0.5rem;
}
</style>
