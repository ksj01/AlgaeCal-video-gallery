<template>

    <b-container fluid>


        <b-row class="left custom-left-align-12">
            <b-dropdown id="dropdown-1" text="Video Filter" class="rounded border border-dark my-5" width="330" variant="outline" style="width: 330px" menu-class="w-100">
                <b-dropdown-item-button>Video Option 1</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 2</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 3</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 4</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 5</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 6</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 7</b-dropdown-item-button>
                <b-dropdown-item-button>Video Option 8</b-dropdown-item-button>
            </b-dropdown>
        </b-row>


        <b-row cols="1" cols-sm="2" cols-md="3" class="w-75 m-auto" align-h="around">
            <VideoSummary v-show="video.id <= 6" no-prefetch v-for="video in video_list" :key="video.id" :video_id="video.video_id" :title="video.title" :category="video.category" :description="video.description"></VideoSummary>
        </b-row>


        <div class="btn-orange-more-container">
            <b-button class="m-auto" variant="orange-more" id="show-button" @click="showMore()">Show More</b-button>
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

      //Display more than the 6 initial videos. Note: This is not fledged out and is pretty much just for display purposes
      showMore() {
        let cards = document.getElementsByClassName('mb-4 video-preview col');
        for (let i = 0; i < cards.length; i++) {
          cards[i].style.removeProperty('display');
        }
        document.getElementById('show-button').style.setProperty('display', 'none');
      },

      getVideos() {
        fetch('http://localhost:8080/videos')
        .then(response => response.json())
        .then(responseData => {
          if (responseData.statusCode === 200) {
            this.video_list = responseData.data;
          }
        }).catch(error => alert(error));
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


    /*These make the dropdown bar look identical to the spec*/
    #dropdown-1__BV_toggle_ {
        text-align: left;
    }

    .dropdown-toggle::after {
        margin-left: 14em;
        margin-top: 0.6em;
    }

    /*This is for the orange "Show More" button*/
    .btn-orange-more {
        color: #fff;
        background-color: #EC5023;
        border-color: #EC5023;
    }

    #show-button {
        margin-left: -15px;
    }

    .btn-orange-more-container {
        position: relative; left: 44%;
    }
</style>
