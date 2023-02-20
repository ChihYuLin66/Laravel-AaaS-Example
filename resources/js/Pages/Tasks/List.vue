<script setup="props, { emit }">
import {defineProps, ref, watch} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";

const props = defineProps({
    tasks: {
        type: Object,
        default: () => ({})
    },
    isNew: {
        type: Boolean,
        default: false
    }
})

const emit = defineEmits(['store', 'destory'])

const newTaskContent = ref('');
const store = () => {
    emit('store', newTaskContent.value)
}

const destory = (task) => {
    emit('destory', task)
}

watch(() => props.isNew, (newValue, oldValue) => {
    if (newValue === true) {
        newTaskContent.value = '';
    }
})
</script>

<template>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Content
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="task in tasks"
                :key="task.id">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    # {{ task.id }}
                </td>
                <td class="px-6 py-4">
                    {{ task.content }}
                </td>
                <td class="px-6 py-4">
                    <danger-button @click="destory(task)">
                        Delete
                    </danger-button>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-if="isNew">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                </td>
                <td class="px-6 py-4">
                    <input type="text" v-model="newTaskContent">
                </td>
                <td class="px-6 py-4">
                    <PrimaryButton class="mb-3" @click="store">
                        Save
                    </PrimaryButton>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<style>

</style>
