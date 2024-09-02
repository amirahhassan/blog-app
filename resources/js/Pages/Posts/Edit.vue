<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

// Define props to access `post`
const props = defineProps({
  post: Object
});
console.log(props.post)

// Setting up the form with the post's current title and body
const form = useForm({
  title: props.post.title,
  body: props.post.body,
});

// Function to handle the form submission for updating the post
const submit = () => {
  if (props.post && props.post.id) {
    form.put(route('posts.update', props.post.id)); // Ensure post.id is passed correctly
  } else {
    console.error("Post data is missing or incomplete");
  }
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
                <input
                  type="text"
                  id="title"
                  v-model="form.title"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <div v-if="form.errors.title" class="mt-2 text-sm text-red-600">
                  {{ form.errors.title }}
                </div>
              </div>

              <!-- Body -->
              <div class="mb-4">
                <label for="body" class="block text-sm font-medium text-gray-700">
                  Body
                </label>
                <textarea
                  id="body"
                  v-model="form.body"
                  rows="4"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                <div v-if="form.errors.body" class="mt-2 text-sm text-red-600">
                  {{ form.errors.body }}
                </div>
              </div>

              <!-- Submit Button -->
              <div class="flex items-center justify-end">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:ring-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2">
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
