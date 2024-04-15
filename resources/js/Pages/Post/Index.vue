<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    posts: Array,
});

const form = useForm({});

const deletePost = ($id) => {
    form.delete(`/posts/${$id}`);
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="flex justify-between m-4">
                            <h2 class="text-xl font-bold">Posts</h2>
                            <Link
                                :href="`/posts/create`"
                                class="bg-gray-100 border rounded-md p-4 max-w-xs"
                                >Create a post</Link
                            >
                        </div>
                        <div v-if="posts.length > 0">
                            <ul
                                class="flex justify-between p-6"
                                v-for="(post, index) in posts"
                                :key="post.id"
                            >
                                <Link :href="`/posts/${post.id}`"
                                    ><li
                                        class="p-4 bg-gray-100 hover:bg-blue-100 rounded-md"
                                        v-text="post.title"
                                    ></li
                                ></Link>
                                <button
                                    v-on:click="deletePost(post.id)"
                                    class="bg-red-100 hover:bg-red-400 border rounded-md p-4"
                                >
                                    Delete
                                </button>
                            </ul>
                        </div>
                        <div v-else class="p-6">No posts to show!!!</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
