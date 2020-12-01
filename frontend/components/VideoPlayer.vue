<template>
    <div>
        <b-container fluid>Back</b-container>
        <b-container>
            <h4>Video Player</h4>
            <div :class="'wistia_embed wistia_async_' + this.video_id" style="height:360px;position:relative;width:640px"></div>
<!--        <b-embed type="iframe" :src="'https://fast.wistia.net/embed/iframe/' + video.video_id" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360">></b-embed>-->
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
          {
            src:
                'https://fast.wistia.com/assets/external/E-v1.js', defer: true
          }
        ],
      }
    },
    name: 'VideoPlayer',
    data() {
      return {
        video_id: '',
        video: []
      };
    },
    methods: {

    },
    beforeMount() {
      window._wq = window._wq || [];
      this.video_id = this.$route.params.id;
    },

    mounted() {
      getVideo: {

        fetch('http://localhost:8080/videos/' + this.video_id).then(response => response.json()).then(responseData => {
          if (responseData.statusCode === 200) {
            this.video = responseData.data;
          } else {
            alert('failure');
          }
        })
            .then(
        _wq.push({
          id: this.$route.params.id,
          options: {
            videoFoam: true,
            playerColor: "ccc",
            playButton: true,
            playbar: false,
            playbackRateControl: false,
            preload: false,
            qualityControl: false,
            settingsControl: false,
            smallPlayButton: false,
            volumeControl: false,
            fullscreenButton: false,
            stillUrl: false,
            wmode: 'transparent',
            plugin: {
            }
          }
        }));
      }
    },

  };

</script>