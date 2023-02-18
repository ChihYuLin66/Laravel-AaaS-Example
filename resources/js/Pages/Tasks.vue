<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TasksList from '@/Pages/Tasks/List.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {onMounted, reactive, ref} from "vue";

let apiUrl = '/api/tasks';

const tasks = reactive({
    'data': []
});

const isNew = ref(false);
const addHandler = () => {
    isNew.value = true;
}

const getTasks = () => {
    axios.get(apiUrl)
        .then((response) => {
            console.log(response);
            tasks.data = response.data;
        })
}
const saveTask = (content) => {
    axios.post(apiUrl, { content })
        .then((response) => {
            isNew.value = false;
            getTasks();
        });
}

const deleteTask = (task) => {
    axios.delete(apiUrl + `/${task.id}`).then((response) => {
        getTasks();
    });
}

onMounted(() => {
    getTasks();
})

</script>

<template>
    <Head title="Tasks" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Tasks</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <PrimaryButton class="mb-3" @click="addHandler">
                    Add
                </PrimaryButton>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <TasksList :tasks="tasks.data" :is-new="isNew" @store="saveTask" @destory="deleteTask"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
