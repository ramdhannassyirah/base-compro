<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <BaseTable :columns="columns" :rows="rows">
            <template #actions>
                <PrimaryButton
                    @click="showModal = true"
                    class="rounded bg-blue-600 px-4 py-2 text-white"
                >
                    Tambah Data
                </PrimaryButton>
            </template>

            <template #header-no="{ column }">
                <div class="text-center">{{ column.label }}</div>
            </template>

            <template #cell-no="{ row }">
                <div class="text-center">{{ row.no }}</div>
            </template>

            <template #header-photos="{ column }">
                <div class="w-12 text-center">{{ column.label }}</div>
            </template>

            <template #cell-photos="{ row }">
                <div class="flex gap-2">
                    <img
                        v-for="(photo, index) in row.photos"
                        :key="index"
                        :src="photo"
                        class="h-10 w-10 rounded object-cover"
                        alt="product photo"
                    />
                </div>
            </template>

            <template #header-name="{ column }">
                <div class="max-w-[300px]">{{ column.label }}</div>
            </template>

            <template #cell-name="{ row }">
                <div class="max-w-[300px] truncate">{{ row.name }}</div>
            </template>

            <template #header-action="{ column }">
                <div class="w-12 text-center">{{ column.label }}</div>
            </template>

            <template #cell-action="{ row }">
                <div class="flex w-12 items-center justify-center gap-3">
                    <button
                        @click="edit(row)"
                        class="text-blue-600 hover:text-blue-800"
                    >
                        <Icon icon="lucide:edit" />
                    </button>
                    <button
                        @click="deleteId(row.id)"
                        class="text-red-600 hover:text-red-800"
                    >
                        <Icon icon="tabler:trash" />
                    </button>
                </div>
            </template>
        </BaseTable>

        <BaseModal
            v-model="showModal"
            :title="Form.id ? 'Edit Data' : 'Tambah Data'"
            @reset="resetForm"
        >
            <div class="space-y-4">
                <div class="">
                    <InputLabel for="photos" value="Foto" />
                    <input
                        type="file"
                        name="photos[]"
                        multiple
                        accept="image/*"
                        @change="handlePhotos"
                        class="w-full rounded border p-2"
                    />
                    <InputError
                        class="mt-2"
                        :message="
                            Object.values(Form.errors.photos || {}).join(', ')
                        "
                    />
                </div>

                <div class="">
                    <InputLabel for="name" value="Nama" />
                    <TextInput
                        type="text"
                        id="name"
                        class="w-full rounded border p-2"
                        v-model="Form.name"
                    />
                    <InputError class="mt-2" :message="Form.errors.name" />
                </div>

                <div class="">
                    <InputLabel for="price" value="Harga" />
                    <TextInput
                        type="number"
                        id="price"
                        class="w-full rounded border p-2"
                        v-model="Form.price"
                    />
                    <InputError class="mt-2" :message="Form.errors.price" />
                </div>

                <div class="">
                    <InputLabel for="category" value="Kategori" />
                    <select
                        name="category_id"
                        id="category_id"
                        v-model="Form.category_id"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option value="" disabled>Pilih Kategori</option>

                        <option
                            v-for="item in categories"
                            :key="item.id"
                            :value="Number(item.id)"
                        >
                            {{ item.name }}
                        </option>
                    </select>

                    <InputError
                        class="mt-2"
                        :message="Form.errors.category_id"
                    />
                </div>

                <div class="">
                    <InputLabel for="description" value="Deskripsi" />
                    <TextInput
                        type="text"
                        id="description"
                        class="w-full rounded border p-2"
                        v-model="Form.description"
                    />
                    <InputError
                        class="mt-2"
                        :message="Form.errors.description"
                    />
                </div>
            </div>

            <template #footer>
                <button
                    @click="closeModal"
                    class="rounded border px-3 py-1 hover:bg-gray-200"
                >
                    Batal
                </button>
                <PrimaryButton
                    @click="submit"
                    class="rounded bg-blue-600 px-3 py-1 text-white"
                >
                    Simpan
                </PrimaryButton>
            </template>
        </BaseModal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { BaseTable, BaseModal } from '@/Components/Base';
import { Icon } from '@iconify/vue';
import { computed, ref } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    products: {
        type: Object,
        default: () => ({ data: [] }),
    },
    categories: {
        type: Object,
        default: () => ({ data: [] }),
    },
});

const showModal = ref(false);

const Form = useForm({
    id: null,
    photos: [],
    name: '',
    description: '',
    price: '',
    category_id: 1,
});

console.log(props.products);

const columns = [
    { label: 'No', key: 'no' },
    { label: 'Foto', key: 'photos' },
    { label: 'Nama', key: 'name' },
    { label: 'Deskripsi', key: 'description' },
    { label: 'Harga', key: 'price' },
    { label: 'Aksi', key: 'action' },
];

const rows = computed(() =>
    (props.products?.data ?? []).map((item, index) => ({
        id: item.id,
        no: index + 1,
        photos: item.photos,
        name: item.name,
        description: item.description,
        price: item.price,
        action: item.id,
    })),
);

function handlePhotos(event) {
    Form.photos = Array.from(event.target.files);

    console.log(Form.photos);
}

const submit = () => {
    if (Form.id) {
        Form.put(route('admin.product.update', Form.id), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => {
                console.log(errors);
            },
            onSuccess: () => {
                (Form.reset(), (showModal.value = false));
            },
        });
    } else {
        Form.post(route('admin.product.store'), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => console.log(errors),
            onSuccess: () => {
                Form.reset();
                showModal.value = false;
            },
        });
    }
};

const edit = (item) => {
    showModal.value = true;
    Form.id = item.id;
    Form.name = item.name;
    Form.price = item.price;
    Form.description = item.description;
    Form.category_id = Number(item.category_id);
};

const deleteId = (id) => {
    Form.delete(route('admin.product.destroy', id));
};

const resetForm = () => {
    Form.reset();
    Form.clearErrors();
};

const closeModal = () => {
    showModal.value = false;
    resetForm();
};
</script>
