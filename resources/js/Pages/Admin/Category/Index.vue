<template>
    <Head title="Categories" />
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
                    <InputLabel for="name" value="Nama" />
                    <TextInput
                        type="text"
                        id="name"
                        class="w-full rounded border p-2"
                        v-model="Form.name"
                    />
                    <InputError class="mt-2" :message="Form.errors.name" />
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
import { toast } from 'vue3-toastify';

const props = defineProps({
    category: {
        type: Object,
        default: () => ({ data: [] }),
    },
});

const showModal = ref(false);

const Form = useForm({
    id: null,
    name: '',
});

const columns = [
    { label: 'No', key: 'no' },
    { label: 'Nama', key: 'name' },
    { label: 'Aksi', key: 'action' },
];

const rows = computed(() =>
    (props.category?.data ?? []).map((item, index) => ({
        id: item.id,
        no: index + 1,
        name: item.name,
        action: item.id,
    })),
);

const submit = () => {
    if (Form.id) {
        Form.put(route('admin.category.update', Form.id), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => {
                console.log(errors);
            },
            onSuccess: () => {
                (Form.reset(),
                    (showModal.value = false),
                    toast.success('Data berhasil diedit'));
            },
        });
    } else {
        Form.post(route('admin.category.store'), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => console.log(errors),
            onSuccess: () => {
                Form.reset();
                showModal.value = false;
                toast.success('Data berhasil disimpan');
            },
        });
    }
};

const edit = (item) => {
    showModal.value = true;
    Form.id = item.id;
    Form.name = item.name;
};

const deleteId = (id) => {
    Form.delete(route('admin.category.destroy', id), {
        onSuccess: () => {
            toast.success('Data berhasil dihapus');
        },
    });
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
