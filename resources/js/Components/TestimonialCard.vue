<template>
    <div class="max-w-sm rounded-xl border bg-white p-6 shadow-sm">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="mb-2 flex gap-1">
                <span
                    v-for="i in testimonial.stars"
                    :key="i"
                    class="text-yellow-400"
                    >★</span
                >
            </div>
            <h3 class="font-semibold text-gray-800">{{ testimonial.name }}</h3>
            <p class="text-sm text-gray-500">{{ testimonial.position }}</p>
        </div>
        <p class="mt-2 text-center text-lg leading-relaxed text-gray-600">
            "{{ testimonial.content }}"
        </p>
    </div>
</template>

<script setup>
defineProps({
    testimonial: Object,
});
</script>
