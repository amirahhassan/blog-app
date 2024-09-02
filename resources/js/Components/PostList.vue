<template>
    <div>
      <button @click="navigateToCreate">Create Post</button>
      <ul>
        <li v-for="post in posts" :key="post.id">
          {{ post.title }}
          <button @click="navigateToEdit(post.id)">Edit</button>
          <button @click="deletePost(post.id)">Delete</button>
        </li>
      </ul>
    </div>
  </template>

  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        posts: [],
      };
    },
    created() {
      this.fetchPosts();
    },
    methods: {
      async fetchPosts() {
        const response = await axios.get('/posts'); // Adjust the endpoint if needed
        this.posts = response.data;
      },
      navigateToCreate() {
        this.$router.push('/posts/create');
      },
      navigateToEdit(id) {
        this.$router.push(`/posts/${id}/edit`);
      },
      async deletePost(id) {
        await axios.delete(`/posts/${id}`);
        this.fetchPosts(); // Refresh the list
      }
    }
  };
  </script>
