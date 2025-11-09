<template>
    <transition name="fade">
        <button
            v-if="visible"
            @click="scrollTop"
            class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full bg-black text-white shadow-lg duration-300 hover:bg-gray-600"
        >
            <Icon icon="stash:arrow-up-solid" class="text-3xl" />
        </button>
    </transition>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { ref, onMounted, onUnmounted } from 'vue';

const visible = ref(false);

const onScroll = () => {
    visible.value = window.scrollY > 200;
};

const scrollTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
.fade-enter-to,
.fade-leave-from {
    opacity: 1;
}
</style>
