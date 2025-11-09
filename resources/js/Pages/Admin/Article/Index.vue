<template>
    <Head title="Articles" />
    <AuthenticatedLayout>
        <BaseTable :columns="columns" :rows="rows">
            <template #actions>
                <PrimaryButton @click="showModal = true">
                    Tambah Data
                </PrimaryButton>
            </template>

            <template #header-no="{ column }">
                <div class="text-center">{{ column.label }}</div>
            </template>

            <template #cell-no="{ row }">
                <div class="text-center">{{ row.no }}</div>
            </template>

            <template #header-title="{ column }">
                <div class="max-w-[150px]">{{ column.label }}</div>
            </template>

            <template #cell-title="{ row }">
                <div class="max-w-[150px] truncate">{{ row.title }}</div>
            </template>

            <template #header-description="{ column }">
                <div class="max-w-[150px]">{{ column.label }}</div>
            </template>

            <template #cell-description="{ row }">
                <div class="max-w-[150px] truncate">{{ row.description }}</div>
            </template>

            <template #header-thumbnail="{ column }">
                <div class="w-12 text-center">{{ column.label }}</div>
            </template>

            <template #cell-thumbnail="{ row }">
                <div class="w-12 text-center">
                    <img
                        :src="row.thumbnail"
                        class="h-12 w-12 rounded object-cover"
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
                    <div class="">
                        <InputLabel for="thumbnail" value="Thumbnail" />
                        <input
                            type="file"
                            id="thumbnail"
                            accept="image/*"
                            @change="
                                (e) => (Form.thumbnail = e.target.files[0])
                            "
                            class="w-full rounded border p-2"
                        />
                        <InputError
                            class="mt-2"
                            :message="Form.errors.thumbnail"
                        />
                    </div>

                    <div
                        v-if="Form.old_thumbnail && !Form.thumbnail"
                        class="my-2 flex items-center gap-4"
                    >
                        <img
                            :src="Form.old_thumbnail"
                            class="h-20 w-20 rounded object-cover"
                        />

                        <button
                            @click="removeThumbnail"
                            class="mt-2 text-sm text-red-600 hover:underline"
                        >
                            Hapus Thumbnail
                        </button>
                    </div>
                </div>
                <div class="">
                    <InputLabel for="title" value="Judul" />
                    <TextInput
                        type="text"
                        id="title"
                        class="w-full rounded border p-2"
                        v-model="Form.title"
                    />
                    <InputError class="mt-2" :message="Form.errors.title" />
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
                <div class="">
                    <InputLabel for="content" value="Content" />
                    <QuillEditor
                        v-model:content="Form.content"
                        theme="snow"
                        content-type="html"
                        class="custom-quill"
                        style="height: 200px"
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
import { QuillEditor } from '@vueup/vue-quill';
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router, useForm } from '@inertiajs/vue3';
import { BaseTable, BaseModal } from '@/Components/Base';
import { Icon } from '@iconify/vue';
import { computed, ref } from 'vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    articles: Object,
});

const showModal = ref(false);

const Form = useForm({
    id: null,
    thumbnail: null,
    title: '',
    description: '',
    content: '',
});

const columns = [
    { label: 'No', key: 'no' },
    { label: 'thumbnail', key: 'thumbnail' },
    { label: 'Judul', key: 'title' },
    { label: 'Deskripsi', key: 'description' },
    { label: 'Aksi', key: 'action' },
];

const rows = computed(() =>
    props.articles.data.map((item, index) => ({
        id: item.id,
        no: index + 1,
        thumbnail: item.thumbnail,
        title: item.title,
        description: item.description,
        content: item.content,
        action: item.id,
    })),
);

const submit = () => {
    Form.transform((data) => {
        if (!data.thumbnail) {
            delete data.thumbnail;
        }

        if (Form.id) {
            data._method = 'PUT';
        }

        return data;
    }).post(
        Form.id
            ? route('admin.article.update', Form.id)
            : route('admin.article.store'),
        {
            forceFormData: true,
            preserveScroll: true,
            onSuccess: () => {
                resetForm();
                showModal.value = false;
            },
        },
    );
};

const removeThumbnail = () => {
    Form.thumbnail = null;
    Form.old_thumbnail = null;
};

const edit = (item) => {
    showModal.value = true;
    Form.id = item.id;
    Form.title = item.title;
    Form.description = item.description;
    Form.content = item.content;
    Form.thumbnail = null;
    Form.old_thumbnail = item.thumbnail;
};

const deleteId = (id) => {
    Form.delete(route('admin.article.destroy', id));
};

// function handleFileUpload(event) {
//     const file = event.target.files[0];
//     if (file) {
//         Form.thumbnail = file;
//     }
// }

const resetForm = () => {
    Form.reset();
    Form.clearErrors();
    Form.thumbnail = null;
    Form.old_thumbnail = null;
};

const closeModal = () => {
    showModal.value = false;
    resetForm();
};
</script>
