<template>
    <div>
    <div id="navbar">
        <NavBar></NavBar>
    </div>
  <div id="login">
    <LoginForm></LoginForm>
  </div>
    </div>
</template>

<script>
  import LoginForm from '../components/LoginForm.vue';
  import NavBar from '../components/NavBar.vue';

export default {
  name: 'login',
  components: {
    LoginForm,
    NavBar
  }
}
</script>

<style>

</style>
