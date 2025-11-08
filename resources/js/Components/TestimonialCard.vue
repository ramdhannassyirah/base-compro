<template>
    <div class="max-w-sm rounded-xl border bg-white p-6 shadow-sm">
        <div class="flex flex-col items-center justify-center text-center">
            <div class="mb-2 flex gap-1">
                <span v-for="i in 5" :key="i" class="text-yellow-400">★</span>
            </div>
            <h3 class="font-semibold text-gray-800">Sarah Amelia</h3>
            <p class="text-sm text-gray-500">Founder, Bloom Studio</p>
        </div>
        <p class="mt-2 text-center text-lg leading-relaxed text-gray-600">
            “Pelayanan sangat cepat dan profesional. Hasilnya melebihi
            ekspektasi saya. Sangat direkomendasikan!”
        </p>
    </div>
</template>
