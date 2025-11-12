<template>
    <Head title="Articles" />
    <AppLayout>
        <div class="mx-auto mb-20 grid max-w-7xl grid-cols-3 gap-6 px-4">
            <ArticleCard
                v-for="article in articles"
                :key="article.id"
                :article="article"
            />
        </div>
    </AppLayout>
</template>

<script setup>
import ArticleCard from '@/Components/ArticleCard.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    articles: Object,
});
</script>

<style></style>
