<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3'; // To access the post data passed from the controller

// Get the post data from the page props
const { post } = usePage().props;

// Initialize the form with existing post data
const form = useForm({
    title: post.title || '',
    body: post.body || '',
});

// Submit the form to update the post
const submit = () => {
    form.put(route('posts.update', post.id));
};
</script>

<template>
    <Head title="Edit Post" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Post</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Form for Editing a Post -->
                        <form @submit.prevent="submit">
                            <!-- Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Title
                                </label>
                                <input type="text" id="title" v-model="form.title" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div v-if="form.errors.title" class="mt-2 text-sm text-red-600">
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <!-- Body -->
                            <div class="mb-4">
                                <label for="body" class="block text-sm font-medium text-gray-700">
                                    Body
                                </label>
                                <textarea id="body" v-model="form.body" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                <div v-if="form.errors.body" class="mt-2 text-sm text-red-600">
                                    {{ form.errors.body }}
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-black font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:ring-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                    Update Post
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
