<template>
    <!-- Overlay -->
    <transition name="fade">
        <div
            v-if="modelValue"
            class="fixed inset-0 z-40 bg-black/40"
            @click="close"
        ></div>
    </transition>

    <!-- Modal Wrapper (centered) -->
    <transition name="slide-up">
        <div
            v-if="modelValue"
            class="fixed inset-0 z-50 flex items-end justify-end p-4"
        >
            <!-- Modal Box -->
            <div
                class="max-h-[90vh] w-full max-w-lg overflow-y-auto rounded-md bg-white p-6 shadow-lg"
            >
                <!-- Title -->
                <h2 class="mb-4 text-lg font-semibold">{{ title }}</h2>

                <!-- Body -->
                <div class="mb-6">
                    <slot />
                </div>

                <!-- Footer -->
                <div class="flex justify-end gap-3">
                    <slot name="footer">
                        <button
                            @click="close"
                            class="rounded border px-3 py-1 hover:bg-gray-100"
                        >
                            Tutup
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
const props = defineProps({
    modelValue: Boolean,
    title: { type: String, default: 'Form' },
});

const emit = defineEmits(['update:modelValue', 'reset']);

const close = () => {
    emit('update:modelValue', false);
    emit('reset');
};
</script>

<style scoped>
/* Overlay fade */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* Modal slide up */
.slide-up-enter-active,
.slide-up-leave-active {
    transition:
        transform 0.3s ease,
        opacity 0.3s ease;
}
.slide-up-enter-from,
.slide-up-leave-to {
    transform: translateY(50%);
    opacity: 0;
}
</style>
