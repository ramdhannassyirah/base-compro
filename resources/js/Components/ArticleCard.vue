<template>
    <Link
        :href="route('articles.show', article.slug)"
        class="group max-w-md overflow-hidden bg-white"
    >
        <div
            class="h-64 overflow-hidden rounded-xl transition-all duration-300 group-hover:-translate-y-1"
        >
            <img
                :src="article.thumbnail"
                class="h-full w-full object-cover"
                alt="broken"
            />
        </div>
        <div class="space-y-2 py-4">
            <div class="">
                <p class="text-md flex items-center gap-2 text-gray-500">
                    <Icon icon="uil:calender" class="text-md" />
                    {{ article.created_at }}
                </p>
            </div>
            <h1 class="mb-2 text-lg font-semibold">{{ article.title }}</h1>
            <p class="line-clamp-4 leading-snug text-gray-600">
                {{ article.description }}
            </p>
        </div>
    </Link>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    article: Object,
});
</script>

<style></style>
