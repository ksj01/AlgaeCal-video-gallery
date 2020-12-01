<template>
  <div>
    <Header />
    <Nuxt />
  </div>
</template>

<script>
  import Header from '../components/Header.vue';
  export default {
    components: {
      Header
    },
    beforeCreate() {
      //TODO Check if logged in. Redirect accordingly
    }
  }
</script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Belleza&display=swap');

html, body {
  font-family: 'Belleza', sans-serif;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
}

.button--green {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #047D61;
  color: #047D61;
  text-decoration: none;
  padding: 10px 30px;
}

.button--green:hover {
  color: #fff;
  background-color: #013B2F;
}

.button--grey {
  display: inline-block;
  border-radius: 4px;
  border: 1px solid #35495e;
  color: #35495e;
  text-decoration: none;
  padding: 10px 30px;
  margin-left: 15px;
}

.button--grey:hover {
  color: #fff;
  background-color: #35495e;
}
</style>
