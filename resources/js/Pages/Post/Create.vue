<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { errorMessages } from "vue/compiler-sfc";

defineProps({});

const form = useForm({
    title: "",
    body: "",
});

let submit = () => {
    form.post("/posts", form);
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create a new post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form
                        @submit.prevent="submit"
                        class="mx-auto rounded px-8 pt-6 pb-8 mb-4"
                    >
                        <div class="mb-4">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="title"
                            >
                                Title
                            </label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="title"
                                type="text"
                                name="title"
                                v-model="form.title"
                                placeholder="Title of the post"
                                required
                            />
                            <div
                                v-if="$page.props.errors.title"
                                v-text="$page.props.errors.title"
                                class="text-red-400 text-bold"
                            ></div>
                        </div>
                        <div class="mb-6">
                            <label
                                class="block text-gray-700 text-sm font-bold mb-2"
                                for="body"
                            >
                                Body
                            </label>
                            <textarea
                                rows="5"
                                cols="5"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                                id="body"
                                name="body"
                                v-model="form.body"
                                placeholder="Body of the post"
                                required
                            />
                            <div
                                v-if="$page.props.errors.body"
                                v-text="$page.props.errors.body"
                                class="text-red-400 text-bold"
                            ></div>
                        </div>
                        <div class="flex items-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
