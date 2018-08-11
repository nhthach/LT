
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

  window.Vue = require('vue');
  
  // Vue.component('articlesindex', require('./components/user/ArticlesIndex.vue'));
  // Vue.component('learningindex', require('./components/user/LearningIndex.vue'));
  Vue.component('quizindex', require('./components/frontend/quizIndex.vue'));
  // Vue.component('examindex', require('./components/frontend/examIndex.vue'));
 
  const app = new Vue({el: '#main'});

