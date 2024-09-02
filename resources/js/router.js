import Vue from 'vue';
import Router from 'vue-router';
import PostList from './components/PostList.vue';
import PostForm from './components/PostForm.vue';

Vue.use(Router);

export default new Router({
  mode: 'history', // Use history mode to remove hash from URLs
  routes: [
    {
      path: '/posts',
      name: 'PostList',
      component: PostList,
    },
    {
      path: '/posts/create',
      name: 'CreatePost',
      component: PostForm,
    },
    {
      path: '/posts/:id/edit',
      name: 'EditPost',
      component: PostForm,
      props: true,
    },
  ],
});
