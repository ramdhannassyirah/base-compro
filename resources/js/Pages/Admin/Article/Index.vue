<template>
    <AuthenticatedLayout>
        <div class="space-y-2">
            <input
                type="file"
                @change="handleFileUpload"
            />
            <input type="text" v-model="Form.title" placeholder="Title" />
            <input
                type="text"
                v-model="Form.description"
                placeholder="Description"
            />
            <input type="text" v-model="Form.content"  placeholder="Content"></input>

            <button @click.prevent="submit">Submit</button>
        </div>

        <div v-for="(item, index) in articles.data" :key="index" class="">
            <img class="h-12 w-12" :src="item.thumbnail" alt="" />
            <h1>{{ item.title }}</h1>
            <p>{{ item.description }}</p>
            <p>{{ item.content }}</p>
            <button @click="edit(item)">Edit</button>
            <button @click="deleteId(item.id)">Delete</button>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    articles: Object,
});

const Form = useForm({
    id: null,
    thumbnail: null,
    title: '',
    description: '',
    content: '',
});

const submit = () => {
    if (Form.id) {
        Form.put(route('admin.article.update', Form.id), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => {
                console.log(errors); // tampilkan semua error
            },
            onSuccess: () => Form.reset(),
        });
    } else {
        Form.post(route('admin.article.store'), {
            preserveScroll: true,
            preserveState: true,
            onError: (errors) => console.log(errors),
            onSuccess: () => Form.reset(),
        });
    }
};


const edit = (item) => {
    Form.id = item.id;
    Form.title = item.title;
    Form.description = item.description;
    Form.content = item.content;
    Form.thumbnail = item.thumbnail;

    console.log(item);
};

const deleteId = (id) => {
    Form.delete(route('admin.article.destroy', id));
};


function handleFileUpload(event) {
    const file = event.target.files[0];
    if (file) {
        Form.thumbnail = file;
    }
}

console.log(props.articles);
</script>
