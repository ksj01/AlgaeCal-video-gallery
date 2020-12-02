<template>
    <div class="container pb-5" style="max-height: 700px;">
        <div style="min-height: 300px; width: 40%;">
            <b-card style="height: 400px;">
                <h2 class="m-4">{{ title }}</h2>
                <b-form @submit="onSubmit">
                    <b-form-group
                            class="mx-5"
                            id="input-group-1"
                            label-for="input-1"
                    >
                        <b-form-row>
                            <b-form-input
                                    class="mt-4"
                                    id="input-1"
                                    v-model="form.username"
                                    type="text"
                                    required
                                    placeholder="Your Username"
                                    @keyup="dismissed"
                            ></b-form-input>
                            <b-alert
                                    id="invalid-username"
                                    v-model="show"
                                    variant="danger"
                                    fade
                                    class="mt-2"
                                    dismissible
                                    @dismissed="dismissed"
                            >
                                Sorry, that username is not found
                            </b-alert>
                        </b-form-row>
                        <b-form-row>
                            <b-form-checkbox
                                    id="checkbox-1"
                                    v-model="form.remember"
                                    name="checkbox-1"
                                    value="remember"
                                    unchecked-value="forget"
                                    class="my-3"
                            >
                                Remember Me
                            </b-form-checkbox>
                        </b-form-row>
                    </b-form-group>
                    <b-button pill size="sm" class="px-5 mt-5" variant="algaecal" :disabled="(form.username.length < 3)" @click="login">Login</b-button>
                </b-form>
            </b-card>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'LoginForm',
    data() {
      return {
        title: 'User Login',
        isDisabled: true,
        show: false,
        form: {
          username: '',
          remember: false,
        },
      };
    },
    methods: {
      onSubmit() {
        this.dismissed();
      },
      login() {
        //Send API request to verify username here
          fetch('http://localhost:8080/users?username=' + this.form.username)
          .then(response => response.json())
          .then(responseData => {
            if (responseData.statusCode === 200) {
              this.$store.commit('loginStore/login', this.form.username);
            } else {
              this.toggle();
            }
          })
          .catch(error => alert(error.message));
      },

    toggle() {
      this.show = !this.show;
    },
    dismissed() {
        if (document.getElementById('invalid-username')) {
          document.getElementById('invalid-username').childNodes[0].click();
        }
    },
  }
  }
  ;
</script>

<style scoped>
    .container {
        margin: 0 auto;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .title {
        font-family: 'Quicksand',
        'Source Sans Pro',
        -apple-system,
        BlinkMacSystemFont,
        'Segoe UI',
        Roboto,
        'Helvetica Neue',
        Arial,
        sans-serif;
        display: block;
        font-weight: 300;
        font-size: 100px;
        color: #047D61;
        letter-spacing: 1px;
    }

    .subtitle {
        font-weight: 300;
        font-size: 42px;
        color: #526488;
        word-spacing: 5px;
        padding-bottom: 15px;
    }

    .links {
        padding-top: 15px;
    }

    .btn-algaecal {
        color: #fff;
        background-color: #047D61;
        border-color: #047D61;
    }

    .btn-algaecal:hover {
        color: #fff;
        background-color: #013B2F;
    }


</style>