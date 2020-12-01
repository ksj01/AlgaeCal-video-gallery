<template>
    <div>
        <b-container fluid>
            <b-row class="left" style="margin-left: calc(12.5% + 15px); width: 330px;">

<!--                TODO: That weird rendering break issue is happening with this link as well. Maybe it's a pre-fetching thing with a sort of circular link? I don't know.                &ndash;&gt;-->
            <a href="/videos">Back</a>
            </b-row>
        </b-container>
        <b-container>
            <h4 vartical-align="top">Video Player</h4>

                <div :class="'wistia_embed wistia_async_' + this.video_id" height="360" width="640" style="height:360px;position:relative;width:640px"></div>

            <h4>{{video.title}}</h4>
            <h5>{{video.description}}</h5>
        </b-container>
    </div>
</template>

<script>
  export default {
    head() {
      return {
        script: [
          { src: 'https://fast.wistia.com/assets/external/E-v1.js', defer: true },
        ],
      };
    },
    name: 'VideoPlayer',
    data() {
      return {
        video_id: '',
        video: [],
      };
    },
    methods: {},
    beforeCreate() {
      window._wq = window._wq || [];
      this.video_id = this.$route.params.id;
    },
    beforeMount() {

        fetch('http://localhost:8080/videos/' + this.video_id).then(response => response.json()).then(responseData => {
          if (responseData.statusCode === 200) {
            this.video = responseData.data;
          } else {
            alert('failure');
          }
        }).then(
            _wq.push({
              id: this.video_id,
              embedded: function(video) {
                console.log("I got a handle to the video!", video);
              },

              options: {
                videoFoam: true,
                playerColor: '#047D61',
                playButton: true,
                playbar: false,
                playbackRateControl: false,
                qualityControl: false,
                settingsControl: false,
                smallPlayButton: false,
                volumeControl: false,
                fullscreenButton: false,
                stillUrl: false,
                wmode: 'transparent',
                plugin: {},
              },
            }));
    },

    mounted() {

    },

  };

</script>