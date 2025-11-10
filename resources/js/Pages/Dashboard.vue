<script setup>
import InformationCard from '@/Components/InformationCard.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    articles: Object,
    testimonials: Object,
    categories: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="">
            <div class="grid gap-4 lg:grid-cols-2 xl:grid-cols-4">
                <InformationCard
                    :count="articles"
                    :icon="'ix:product'"
                    :title="'Total Products'"
                />
                <InformationCard
                    :count="articles"
                    :icon="'material-symbols:article-rounded'"
                    :title="'Total Articles'"
                />
                <InformationCard
                    :count="testimonials"
                    :title="'Total Testimonial'"
                    :icon="'dashicons:testimonial'"
                />

                <InformationCard
                    :count="categories"
                    :icon="'mdi:category'"
                    :title="'Total Categories'"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
