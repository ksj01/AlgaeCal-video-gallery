<template>

    <b-container fluid>
        <b-row class="left" style="margin-left: calc(12.5% + 15px); width: 330px;">
            <b-dropdown id="dropdown-1" text="Video Filter" class="rounded border border-dark my-5" width="330" variant="outline" style="width: 330px" menu-class="w-100">
                <b-dropdown-item>Video Option 1</b-dropdown-item>
                <b-dropdown-item>Video Option 2</b-dropdown-item>
                <b-dropdown-item>Video Option 3</b-dropdown-item>
                <b-dropdown-item>Video Option 4</b-dropdown-item>
                <b-dropdown-item>Video Option 5</b-dropdown-item>
                <b-dropdown-item>Video Option 6</b-dropdown-item>
                <b-dropdown-item>Video Option 7</b-dropdown-item>
                <b-dropdown-item>Video Option 8</b-dropdown-item>
            </b-dropdown>
        </b-row>
        <b-row cols="1" cols-sm="2" cols-md="3" class="w-75 m-auto" align-h="around">
            <VideoSummary v-show="video.id <= 6" no-prefetch v-for="video in video_list" :key="video.id" :video_id="video.video_id" :title="video.title" :category="video.category" :description="video.description"></VideoSummary>
        </b-row>
        <div style="position: relative; left: 44%">
        <b-button class="m-auto" variant="orange-more" id="show-button" @click="showMore()" style="margin-left: -15px;">Show More</b-button>
        </div>
    </b-container>

</template>

<script>
  import VideoSummary from '../../components/VideoSummary.vue';

  export default {
    data() {
      return {
        video_list: null,
      };
    },
    methods: {
      showMore() {
        var cards = document.getElementsByClassName('mb-4 video-preview col');
        for (var i = 0; i < cards.length; i++) {
          cards[i].style.removeProperty('display');
        }
        document.getElementById('show-button').style.setProperty('display', 'none');
      },
      getVideos() {
        fetch('http://localhost:8080/videos').then(response => response.json()).then(responseData => {
          if (responseData.statusCode == 200) {
            this.video_list = responseData.data;
          } else {
            alert('failure');
          }
        });
      },
    },
    components: {
      VideoSummary,
    },
    created() {
      console.log(this.$store.state.loginStore);
      if (this.$store.state.loginStore.list === []) {
        this.$router.push({
          path: "/login"
        });
      } else {
        this.getVideos();
      }

    }

  };
</script>

<style>
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
        color: #35495e;
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

    #dropdown-1__BV_toggle_ {
        text-align: left;
    }

    .dropdown-toggle::after {
        margin-left: 14em;
        margin-top: 0.6em;
    }

    .btn-orange-more {
        color: #fff;
        background-color: #EC5023;
        border-color: #EC5023;
    }
</style>
