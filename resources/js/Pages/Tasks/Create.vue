<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Dropdown from "@/Components/Dropdown.vue";

const props = defineProps({
    tasks: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    title: '',
    due_date: '',
    description: '',
    category_id: ""
    
});

const submit = () => {
    form.post(route("tasks.store"));
};

const categories = [];
</script>

<template>
    <Head title="Task Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Task Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit"> <!-- is the graphql part called programmatically? or wrap the element in the apollo component -->
                            <div class="mb-6">
                                <InputLabel value="Title" for="title" />

                                <TextInput
                                    id="title"
                                    required
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-3/4"
                                    placeholder="Title"
                                />

                                <InputError :message="form.errors.title" class="mt-2" />
                            </div>
                            <div class="mb-6">
                                <label
                                    for="due_date"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Due date</label
                                >
                                <input
                                    v-model="form.due_date"
                                    name="due_date"
                                    type="date"
                                    min="{{today()}}"
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                                <div
                                    v-if="form.errors.due_date"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.due_date }}
                                </div>
                            </div>

                            <div class="mb-6">
                                <label
                                    for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Category</label
                                >
                                <select
                                    v-model="form.category_id"
                                    name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                >
                                    <option

                                        v-for="category in categories"
                                        value="category.id"
                                    >{{category.name}}</option>
                                </select>
                                <div
                                    v-if="form.errors.category_id"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.category_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Description</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.description"
                                    name="description"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.description"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>