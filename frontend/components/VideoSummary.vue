<template>

    <b-col class="mb-4 video-preview">
        <a :href="'/videos/' + this.video_id">
            <div class="img-overlay-wrap">

                <b-img class="boxy-brown" fluid src="/green.png" width="330" height="205"></b-img>
                <b-button pill class="hide-me" variant="algaecal" style="position: absolute; bottom: calc(50% - 15px); left: calc(50% - 60px); width: 120px;">Watch Now</b-button>
                <svg class="boxy-brown" xmlns="http://www.w3.org/2000/svg" buffered-rendering="static" viewBox="-253 -150 680 410">
                    <path fill="#047D61" fill-opacity="1" class="ac-youtube-button" d="M166.3,19.3c-1.9-7.3-6.2-13.5-13.5-15.5C139.5,0.3,85,0,85,0S30.5,0.3,17.2,3.9
	C9.9,5.8,5.7,12,3.7,19.3C0.1,32.6,0,60,0,60s0.1,27.4,3.7,40.7c2,7.3,6.2,13.5,13.6,15.5C30.5,119.7,85,120,85,120
	s54.5-0.3,67.8-3.9c7.3-1.9,11.6-8.1,13.5-15.5C169.9,87.4,170,60,170,60S169.9,32.6,166.3,19.3z"></path>
                    <path fill="#FFFFFF" d="M112.5,60l-45-25v50"></path>
                </svg>

            </div>

            <b-card-title class="mt-3 mb-0" style="max-width: 330px; font-size: 22px;">
                {{title}}
            </b-card-title>
            <b-card-text style="max-width: 330px; line-height: 20px">
                <p>{{description}}</p>
            </b-card-text>
        </a>
    </b-col>

</template>

<script>
  export default {
    name: 'VideoSummary',
    props: ['id', 'video_id', 'thumbnail', 'title', 'description'],
    data() {
      return {
        mainProps: {blank: true},
      };
    },
  };

</script>

<style>
    .card-deck .card {
        max-width: calc(330px - 30px);
    }

    .img-overlay-wrap {
        position: relative;
        display: inline-block; /* <= shrinks container to image size */
        transition: transform 150ms ease-in-out;
    }

    .img-overlay-wrap b-img { /* <= optional, for responsiveness */
        display: block;
        max-width: 100%;
        height: auto;
    }

    .img-overlay-wrap svg {
        position: absolute;
        top: 0;
        left: 0;
    }

    .video-preview .boxy-brown {
        border: 15px solid #013B2F;
    }

    .video-preview:hover .boxy-brown {
        border: 15px solid #047D61;
    }

    .video-preview:hover svg.boxy-brown {
        display: none;
    }

    .video-preview:hover a {
        text-decoration: none !important;
    }

    .video-preview .hide-me {
        display: none;
    }

    .video-preview:hover .hide-me {
        display: block;
    }

    .btn-algaecal {
        color: #fff;
        background-color: #047D61;
        border-color: #047D61;
    }

    .btn-algaecal:hover {
        color: #fff;
    }

</style>