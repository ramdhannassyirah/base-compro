<template>
    <AuthenticatedLayout>
        <Head title="Settings" />

        <div class="rounded-xl bg-white p-8 shadow-md">
            <div class="mb-3 flex items-center gap-4">
                <img
                    v-if="logoPreview"
                    :src="logoPreview"
                    class="h-20 w-20 rounded border object-contain"
                />

                <button
                    v-if="logoPreview"
                    @click.prevent="deleteLogo"
                    class="text-sm text-red-600 hover:underline"
                >
                    Hapus Logo
                </button>
            </div>
            <form @submit.prevent="submit">
                <div class="grid gap-4 md:grid-cols-2">
                    <!-- Logo -->
                    <div>
                        <InputLabel for="logo" value="Logo Website" />

                        <input
                            type="file"
                            id="logo"
                            accept="image/*"
                            @change="handleFileChange"
                            class="w-full rounded border p-2"
                        />
                    </div>

                    <!-- Nama Website -->
                    <div>
                        <InputLabel for="name" value="Nama Website" />
                        <TextInput
                            v-model="settings.name"
                            type="text"
                            id="name"
                            class="w-full rounded border p-2"
                        />
                    </div>

                    <!-- Alamat -->
                    <div>
                        <InputLabel for="alamat" value="Alamat" />
                        <TextInput
                            v-model="settings.alamat"
                            type="text"
                            id="alamat"
                            class="w-full rounded border p-2"
                        />
                    </div>

                    <!-- Telepon -->
                    <div>
                        <InputLabel for="telepon" value="Telepon" />
                        <TextInput
                            v-model="settings.telepon"
                            type="text"
                            id="telepon"
                            class="w-full rounded border p-2"
                        />
                    </div>

                    <!-- Instagram -->
                    <div>
                        <InputLabel for="instagram" value="Instagram" />
                        <TextInput
                            v-model="settings.instagram"
                            type="text"
                            id="instagram"
                            class="w-full rounded border p-2"
                        />
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <InputLabel for="linkedin" value="LinkedIn" />
                        <TextInput
                            v-model="settings.linkedin"
                            type="text"
                            id="linkedin"
                            class="w-full rounded border p-2"
                        />
                    </div>
                </div>

                <div class="mt-6">
                    <PrimaryButton type="submit"
                        >Simpan Perubahan</PrimaryButton
                    >
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref } from 'vue';
import { toast } from 'vue3-toastify';

const props = defineProps({
    setting: Object,
});

const settings = ref({
    id: props.setting.id,
    logo: null,
    name: props.setting.name,
    alamat: props.setting.alamat,
    telepon: props.setting.telepon,
    instagram: props.setting.instagram,
    linkedin: props.setting.linkedin,
});

const logoPreview = ref(
    props.setting.logo ? `/storage/${props.setting.logo}` : null,
);

function handleFileChange(e) {
    const file = e.target.files[0];
    if (!file) return;

    settings.value.logo = file;
    logoPreview.value = URL.createObjectURL(file);
}
const submit = () => {
    router.post(
        route('admin.setting.update', settings.value.id),
        {
            _method: 'put',
            logo: settings.value.logo,
            name: settings.value.name,
            alamat: settings.value.alamat,
            telepon: settings.value.telepon,
            instagram: settings.value.instagram,
            linkedin: settings.value.linkedin,
        },
        {
            forceFormData: true,
            preserveScroll: true,
            onError: (err) => console.log(err),
            onSuccess: () => {
                toast.success('Data berhasil update');
            },
        },
    );
};

const deleteLogo = () => {
    router.delete(route('admin.setting.deleteLogo', settings.value.id), {
        preserveScroll: true,
        onSuccess: () => {
            settings.value.logo = null;
            logoPreview.value = null;
            toast.success('Logo berhasil dihapus');
        },
    });
};
</script>
