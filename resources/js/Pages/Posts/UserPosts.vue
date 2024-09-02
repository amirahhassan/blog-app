<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Posts</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-medium">Your Posts</h3>

                        <ul class="mt-4 space-y-4">
                            <li v-for="post in posts" :key="post.id" class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-md font-semibold">{{ post.title }}</h4>
                                </div>
                                <div class="flex space-x-2">
                                    <a :href="route('posts.edit', post.id)" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <button @click="deletePost(post.id)" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Delete
                                    </button>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import { defineComponent } from 'vue';
import { Head } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage } from '@inertiajs/vue3';

const { posts } = usePage().props;

const deletePost = (id) => {
    if (confirm('Are you sure you want to delete this post?')) {
        Inertia.delete(route('posts.destroy', id));
    }
};
</script>
