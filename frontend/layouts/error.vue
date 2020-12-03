<template>
    <div>
        <NuxtLink to="/"></NuxtLink>
    </div>
</template>

<script>
  export default {
    props: ['error'],
    layout: 'default', // you can set a custom layout for the error page
    beforeCreate() {
      //Check if logged in. Redirect accordingly
        this.$router.push({
          path: '/login',
        });
      }
  }
</script>