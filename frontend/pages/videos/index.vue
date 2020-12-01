<template>

    <b-container fluid>
        <b-row>
            <b-col>
                <h1>Welcome to Our Video Library</h1>
            </b-col>
        </b-row>
        <b-row>
            <b-dropdown id="dropdown-1" text="Dropdown Button" class="m-md-2">
                <b-dropdown-item>Cras justo odio</b-dropdown-item>
                <b-dropdown-item>Dapibus ac facilisis in</b-dropdown-item>
                <b-dropdown-item>Morbi leo risus</b-dropdown-item>
                <b-dropdown-item>Porta ac consectetur ac</b-dropdown-item>
                <b-dropdown-item>Vestibulum at eros</b-dropdown-item>
            </b-dropdown>
        </b-row>
        <b-row cols="1" cols-sm="2" cols-md="3" class="w-75 m-auto" align-h="around">
            <VideoSummary v-for="video in videos" :key="video.id" :video_id="video.video_id" :title="video.title" :category="video.category" :description="video.description"></VideoSummary>
        </b-row>
    </b-container>

</template>

<script>
  import VideoSummary from '../../components/VideoSummary.vue';

  export default {
    data() {
      return {
        videos: null,
      };
    },
    methods: {
      getVideos() {
        fetch('http://localhost:8080/videos').then(response => response.json()).then(responseData => {
          if (responseData.statusCode == 200) {
            this.videos = responseData.data;
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
      this.getVideos();
    },
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
</style>
