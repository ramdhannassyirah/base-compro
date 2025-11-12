<template>
    <Head title="Articles" />
    <AppLayout>
        <div class="mx-auto mb-20 grid max-w-7xl gap-6 px-4 md:grid-cols-3">
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

defineProps({
    articles: Object,
});
</script>

<style></style>
