<template>
    <div>
        <b-container fluid>
            <b-row class="left" style="margin-left: calc(12.5% + 15px); width: 330px;">

                <a href="/videos">Back</a>
            </b-row>
        </b-container>
        <b-container>
            <h4>{{title}}</h4>

<!--            Required for Wistia's embedded videos.-->
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

            //Wistia video magic
          {src: 'https://fast.wistia.com/assets/external/E-v1.js', defer: true},
        ],
      };
    },
    name: 'VideoPlayer',
    data() {
      return {
        title: 'Video Player',
        video_id: '',
        video: [],
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
      };
    },
    mounted() {
      //This variable is necessary for Wistia
      window._wq = window._wq || [];

      //Getting the Wistia video_id from the URI, and using it to create a dynamic page for its associated video.
      this.video_id = this.$route.params.id;
      fetch('http://localhost:8080/videos/' + this.video_id)
      .then(response => response.json())
      .then(responseData => {
        if (responseData.statusCode === 200) {
          this.video = responseData.data;
        }
      })
      .then(
          _wq.push({
            id: this.video_id,
            options: this.options,
          }))
          .catch(error => alert(error));
    },

  };

</script>