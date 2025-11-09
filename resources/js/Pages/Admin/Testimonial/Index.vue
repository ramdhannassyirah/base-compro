<template>
    <Head title="Testimonials" />
    <AuthenticatedLayout>
        <BaseTable :columns="columns" :rows="rows">
            <template #actions>
                <button
                    @click="showModal = true"
                    class="rounded bg-blue-600 px-4 py-2 text-white"
                >
                    Tambah Data
                </button>
            </template>

            <template #header-no="{ column }">
                <div class="text-center">{{ column.label }}</div>
            </template>

            <template #cell-no="{ row }">
                <div class="text-center">{{ row.no }}</div>
            </template>

            <template #header-name="{ column }">
                <div class="max-w-[300px]">{{ column.label }}</div>
            </template>

            <template #cell-name="{ row }">
                <div class="max-w-[300px] truncate">{{ row.name }}</div>
            </template>

            <template #header-position="{ column }">
                <div class="max-w-[300px]">{{ column.label }}</div>
            </template>

            <template #cell-position="{ row }">
                <div class="max-w-[300px] truncate">{{ row.position }}</div>
            </template>

            <template #header-content="{ column }">
                <div class="max-w-[300px]">{{ column.label }}</div>
            </template>

            <template #cell-content="{ row }">
                <div class="">{{ row.content }}</div>
            </template>

            <template #header-stars="{ column }">
                <div class="max-w-[300px]">{{ column.label }}</div>
            </template>

            <template #cell-stars="{ row }">
                <div class="flex space-x-1 text-yellow-400">
                    <Icon
                        v-for="i in 5"
                        :key="i"
                        :icon="i <= row.stars ? 'mdi:star' : 'mdi:star-outline'"
                        class="h-5 w-5"
                    />
                </div>
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
                    <InputLabel for="name" value="Name" />
                    <TextInput
                        type="text"
                        id="name"
                        class="w-full rounded border p-2"
                        v-model="Form.name"
                    />
                    <InputError class="mt-2" :message="Form.errors.name" />
                </div>

                <div class="">
                    <InputLabel for="position" value="Position" />
                    <TextInput
                        type="text"
                        id="position"
                        class="w-full rounded border p-2"
                        v-model="Form.position"
                    />
                    <InputError class="mt-2" :message="Form.errors.position" />
                </div>

                <div class="">
                    <InputLabel for="stars" value="stars" />
                    <TextInput
                        type="number"
                        id="stars"
                        class="w-full rounded border p-2"
                        v-model="Form.stars"
                        min="1"
                        max="5"
                        @input="
                            if (Form.stars > 5) Form.stars = 5;
                            if (Form.stars < 1) Form.stars = 1;
                        "
                    />
                    <InputError class="mt-2" :message="Form.errors.stars" />
                </div>

                <div class="">
                    <InputLabel for="content" value="Content" />
                    <TextInput
                        type="text"
                        id="content"
                        class="w-full rounded border p-2"
                        v-model="Form.content"
                    />
                    <InputError class="mt-2" :message="Form.errors.content" />
                </div>
            </div>

            <template #footer>
                <button
                    @click="closeModal"
                    class="rounded border px-3 py-1 hover:bg-gray-200"
                >
                    Batal
                </button>
                <button
                    @click="submit"
                    class="rounded bg-blue-600 px-3 py-1 text-white"
                >
                    Simpan
                </button>
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

const props = defineProps({
    testimonials: Object,
});

console.log(props.testimonials);

const showModal = ref(false);

const Form = useForm({
    id: null,
    name: '',
    position: '',
    content: '',
    stars: '',
});

const columns = [
    { label: 'No', key: 'no' },
    { label: 'name', key: 'name' },
    { label: 'position', key: 'position' },
    { label: 'content', key: 'content' },
    { label: 'stars', key: 'stars' },
    { label: 'Aksi', key: 'action' },
];

const rows = computed(() =>
    props.testimonials.data.map((item, index) => ({
        id: item.id,
        no: index + 1,
        name: item.name,
        position: item.position,
        content: item.content,
        stars: item.stars,
        action: item.id,
    })),
);

const submit = () => {
    if (Form.id) {
        Form.put(route('admin.testimonial.update', Form.id), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => {
                console.log(errors); // tampilkan semua error
            },
            onSuccess: () => {
                (Form.reset(), (showModal.value = false));
            },
        });
    } else {
        Form.post(route('admin.testimonial.store'), {
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
    Form.position = item.position;
    Form.content = item.content;
    Form.stars = item.stars;
};

const deleteId = (id) => {
    Form.delete(route('admin.testimonial.destroy', id));
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
