<template>
    <AuthenticatedLayout>
    <div class="max-w-4xl mx-auto py-12">
      <!-- Dashboard Header -->
      <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Dashboard</h1>

      <!-- Total Posts -->
      <p class="text-lg text-gray-600 text-center mb-6">Total Posts: {{ postCount }}</p>

      <!-- Add Post Button -->
    <div class="text-center mb-8">
      <Link
        :href="route('posts.create')"
        class="inline-block px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow hover:bg-indigo-700 transition-colors"
      >
        Add New Post
      </Link>
    </div>

      <!-- Posts List -->
      <ul class="space-y-4">
        <li
          v-for="post in posts"
          :key="post.id"
          class="p-6 bg-white shadow-md rounded-md hover:bg-gray-100 transition-colors"
        >
          <h2 class="text-xl font-semibold text-gray-800">{{ post.title }}</h2>
          <p class="mt-2 text-gray-600">{{ post.body }}</p>
        </li>
      </ul>
    </div>
</AuthenticatedLayout>
  </template>

  <script setup>
  import { ref } from 'vue';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Link, usePage } from '@inertiajs/vue3';

  // Props from the server-side
  const props = defineProps({
    postCount: Number,
    posts: Array,
  });
  </script>

  <style scoped>
  /* Add additional styles here if needed, or use Tailwind utility classes */
  </style>
