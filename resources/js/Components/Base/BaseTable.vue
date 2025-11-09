<template>
    <div class="space-y-4 rounded-xl bg-white p-4 shadow-md">
        <!-- Search Bar -->
        <div class="flex flex-wrap items-center justify-between gap-3">
            <TextInput
                v-model="search"
                placeholder="Cari data..."
                class="w-full sm:w-60"
            />

            <slot name="actions" />
        </div>

        <!-- TABEL RESPONSIVE -->
        <div class="overflow-x-auto rounded-lg border">
            <table
                class="w-full min-w-10 overflow-x-auto text-left text-sm text-gray-700"
            >
                <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                    <tr>
                        <th
                            v-for="column in columns"
                            :key="column.key"
                            @click="toggleSort(column.key)"
                            class="cursor-pointer select-none px-4 py-3"
                        >
                            <slot
                                :name="`header-${column.key}`"
                                :column="column"
                            >
                                <div class="flex items-center gap-1">
                                    {{ column.label }}
                                    <span v-if="sortKey === column.key">
                                        <span v-if="sortOrder === 'asc'"
                                            >▲</span
                                        >
                                        <span v-else>▼</span>
                                    </span>
                                </div>
                            </slot>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="(row, rowIndex) in paginatedRows"
                        :key="rowIndex"
                        class="border-b transition hover:bg-gray-50"
                    >
                        <td
                            v-for="column in columns"
                            :key="column.key"
                            class="px-4 py-3"
                        >
                            <slot :name="`cell-${column.key}`" :row="row">
                                {{ row[column.key] }}
                            </slot>
                        </td>
                    </tr>

                    <tr v-if="paginatedRows.length === 0">
                        <td
                            :colspan="columns.length"
                            class="py-4 text-center text-gray-400"
                        >
                            Tidak ada data ditemukan
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div
            class="flex flex-wrap items-center justify-between gap-3 pt-2 text-sm"
        >
            <span>
                Menampilkan {{ start + 1 }} - {{ end }} dari
                {{ filteredRows.length }}
            </span>

            <div class="flex gap-2">
                <button
                    @click="prevPage"
                    :disabled="page === 1"
                    class="rounded border px-3 py-1 hover:bg-gray-100 disabled:opacity-50"
                >
                    Previous
                </button>
                <button
                    @click="nextPage"
                    :disabled="end >= filteredRows.length"
                    class="rounded border px-3 py-1 hover:bg-gray-100 disabled:opacity-50"
                >
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import TextInput from '../TextInput.vue';

const props = defineProps({
    columns: {
        type: Array,
        required: true,
    },
    rows: {
        type: Array,
        default: () => [],
    },
});

const search = ref('');
const sortKey = ref(null);
const sortOrder = ref('asc');
const page = ref(1);
const perPage = ref(5);

const toggleSort = (key) => {
    if (sortKey.value === key) {
        sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortKey.value = key;
        sortOrder.value = 'asc';
    }
};

const filteredRows = computed(() => {
    if (!search.value) return props.rows;
    return props.rows.filter((row) =>
        Object.values(row).some((val) =>
            String(val ?? '')
                .toLowerCase()
                .includes(search.value.toLowerCase()),
        ),
    );
});

const sortedRows = computed(() => {
    if (!sortKey.value) return filteredRows.value;
    return [...filteredRows.value].sort((a, b) => {
        const x = a[sortKey.value];
        const y = b[sortKey.value];
        if (x < y) return sortOrder.value === 'asc' ? -1 : 1;
        if (x > y) return sortOrder.value === 'asc' ? 1 : -1;
        return 0;
    });
});

const start = computed(() => (page.value - 1) * perPage.value);
const end = computed(() =>
    Math.min(start.value + perPage.value, sortedRows.value.length),
);
const paginatedRows = computed(() =>
    sortedRows.value?.slice(start.value, end.value),
);

const prevPage = () => page.value > 1 && page.value--;
const nextPage = () => end.value < filteredRows.value.length && page.value++;
</script>
