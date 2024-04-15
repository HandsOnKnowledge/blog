<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    posts: Array,
});

defineOptions({
    layout: AuthenticatedLayout,
});
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul v-for="(post, index) in posts" :key="post.id">
                        <Link :href="`posts/` + post.id"
                            ><div
                                class="bg-gray-100 hover:bg-blue-100 m-4 p-4 rounded-md"
                            >
                                <li
                                    v-text="
                                        post.title +
                                        ' posted by: ' +
                                        post.author_name
                                    "
                                    class="text-xl font-bold"
                                ></li>
                                <li v-text="post.body"></li></div
                        ></Link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
