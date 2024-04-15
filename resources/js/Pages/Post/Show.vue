<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import { errorMessages } from "vue/compiler-sfc";
import { computed } from "vue";

defineProps({
    post: Object,
});

const form = useForm({
    title: "",
    body: "",
});

const user = computed(() => usePage().props.auth.user);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ post.title }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between m-4">
                        <h2 class="text-xl font-bold">{{ post.title }}</h2>
                        <Link
                            :href="`/posts/${post.id}/edit`"
                            class="bg-blue-100 hover:bg-blue-500 border rounded-md p-4"
                            v-show="post.user_id == user.id"
                            >Edit post</Link
                        >
                    </div>
                    <div class="m-4">
                        <p>{{ post.body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
