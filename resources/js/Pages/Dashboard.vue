<script setup>
import InformationCard from '@/Components/InformationCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    articles: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="">
            <div class="grid grid-cols-4 gap-4">
                <InformationCard :count="articles" :title="'Total Articles'" />
                <InformationCard :count="articles" :title="'Total Articles'" />
                <InformationCard :count="articles" :title="'Total Articles'" />
                <InformationCard :count="articles" :title="'Total Articles'" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
