<template>
    <section>
        <div class="h-auto bg-black py-20">
            <div
                class="mx-auto grid max-w-7xl grid-cols-1 gap-10 px-6 md:grid-cols-3 md:items-start"
            >
                <!-- Kontak Info -->
                <div class="space-y-4 text-white">
                    <h1 class="text-3xl font-bold uppercase leading-tight">
                        Kontak Kami
                    </h1>
                    <p class="text-gray-300">
                        Silakan hubungi kami untuk mendapatkan informasi lebih
                        lanjut mengenai layanan kami.
                    </p>

                    <div
                        class="space-y-3 border-t border-gray-700 pt-4 text-sm text-gray-200"
                    >
                        <p class="flex items-center gap-2">
                            <Icon icon="mdi:email" /> ravoralabs@gmail.com
                        </p>
                        <p class="flex items-center gap-2">
                            <Icon icon="mdi:phone" /> 085156330411
                        </p>
                        <p class="flex items-center gap-2">
                            <Icon icon="mdi:map" /> Jl. Mesjid Agung No 36
                            Pamoyanan
                        </p>
                    </div>
                </div>

                <!-- Form -->
                <div class="md:col-span-2">
                    <form
                        @submit.prevent="submit"
                        class="grid grid-cols-1 gap-5 md:grid-cols-2"
                    >
                        <!-- Name -->
                        <div>
                            <InputLabel
                                for="name"
                                value="Nama"
                                class="text-white"
                            />
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autocomplete="name"
                                v-model="form.name"
                            />
                        </div>

                        <!-- Email -->
                        <div>
                            <InputLabel
                                for="email"
                                value="Email"
                                class="text-white"
                            />
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                required
                                autocomplete="email"
                                v-model="form.email"
                            />
                        </div>

                        <!-- Message -->
                        <div class="md:col-span-2">
                            <InputLabel
                                for="message"
                                value="Pesan"
                                class="text-white"
                            />
                            <textarea
                                id="message"
                                rows="5"
                                class="mt-1 w-full rounded-md border-gray-300 text-sm text-gray-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required
                                v-model="form.message"
                            ></textarea>
                        </div>

                        <!-- Button -->
                        <div class="md:col-span-2">
                            <button
                                type="submit"
                                class="w-fit rounded-md border border-white px-4 py-3 text-center text-sm text-white transition hover:bg-gray-700"
                            >
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Icon } from '@iconify/vue';
import InputLabel from '../InputLabel.vue';
import TextInput from '../TextInput.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    id: '',
    name: '',
    email: '',
    message: '',
});

const submit = () => {
    form.post(route('contact.store'), {
        forceFormData: true,
        preserveScroll: true,
        preserveState: true,
        onError: (errors) => console.log(errors),
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<style scoped></style>
