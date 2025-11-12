<template>
    <Head title="Inbox" />
    <AuthenticatedLayout>
        <BaseTable :columns="columns" :rows="rows">
            <template #header-no="{ column }">
                <div class="w-12 text-center">{{ column.label }}</div>
            </template>

            <template #cell-no="{ row }">
                <div class="w-12 text-center">{{ row.no }}</div>
            </template>

            <template #header-name="{ column }">
                <div class="">{{ column.label }}</div>
            </template>

            <template #cell-name="{ row }">
                <div class="">{{ row.name }}</div>
            </template>

            <template #header-email="{ column }">
                <div class="">{{ column.label }}</div>
            </template>

            <template #cell-email="{ row }">
                <div class="">{{ row.email }}</div>
            </template>

            <template #header-message="{ column }">
                <div class="">{{ column.label }}</div>
            </template>

            <template #cell-message="{ row }">
                <div class="">{{ row.message }}</div>
            </template>

            <template #header-action="{ column }">
                <div class="w-12 text-center">{{ column.label }}</div>
            </template>

            <template #cell-action="{ row }">
                <div class="flex w-12 items-center justify-center gap-3">
                    <button
                        @click="deleteId(row.id)"
                        class="text-red-600 hover:text-red-800"
                    >
                        <Icon icon="tabler:trash" />
                    </button>
                </div>
            </template>
        </BaseTable>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { BaseTable } from '@/Components/Base';
import { Icon } from '@iconify/vue';
import { computed } from 'vue';
import { toast } from 'vue3-toastify';

const props = defineProps({
    contacts: Object,
});

const form = useForm({
    id: '',
    name: '',
    email: '',
    message: '',
});

const columns = [
    { label: 'No', key: 'no' },
    { label: 'Nama', key: 'name' },
    { label: 'Email', key: 'email' },
    { label: 'Pesan', key: 'message' },
    { label: 'Aksi', key: 'action' },
];

const rows = computed(() =>
    props.contacts.data.map((item, index) => ({
        id: item.id,
        no: index + 1,
        name: item.name,
        email: item.email,
        message: item.message,
        action: item.id,
    })),
);

const deleteId = (id) => {
    form.delete(route('admin.contact.destroy', id), {
        onSuccess: () => {
            toast.success('Data berhasil dihapus');
        },
    });
};
</script>
