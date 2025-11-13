<template>
    <transition name="fade">
        <div v-if="visible" class="fixed bottom-6 right-6 z-50 space-y-2">
            <button
                @click="scrollTop"
                class="flex h-14 w-14 items-center justify-center rounded-full bg-black text-white shadow-lg duration-300 hover:bg-gray-600"
            >
                <Icon icon="stash:arrow-up-solid" class="text-3xl" />
            </button>

            <a
                :href="urlWA"
                target="_blank"
                class="flex h-14 w-14 items-center justify-center rounded-full bg-green-600 text-white shadow-lg duration-300 hover:bg-gray-600"
                rel="noopener noreferrer"
            >
                <Icon icon="mdi:whatsapp" class="text-3xl" />
            </a>
        </div>
    </transition>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import { ref, onMounted, onUnmounted } from 'vue';

const visible = ref(false);
const urlWA =
    'https://api.whatsapp.com/send/?phone=6285156330411&text&type=phone_number&app_absent=0';

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
