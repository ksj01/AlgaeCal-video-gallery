<template>
    <div>
        <b-container fluid>Back</b-container>
        <b-container>
            <h4>Video Player</h4>
        <b-embed type="iframe" :src="'https://fast.wistia.net/embed/iframe/' + video.video_id" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="640" height="360">></b-embed>
        <h4>{{video.title}}</h4>
            <h5>{{video.description}}</h5>
        </b-container>
    </div>
</template>

<script>
  export default {
    name: 'VideoPlayer',
    data() {
      return {
        video: []
      };
    },
    methods: {

    },
    created() {
      getVideo: {
        fetch('http://localhost:8080/videos/' + this.$route.params.id).then(response => response.json()).then(responseData => {
          if (responseData.statusCode === 200) {
            this.video = responseData.data;
          } else {
            alert('failure');
          }
        });
      };
    },

  };

</script>