<template>

    <b-col>
        <NuxtLink :to=video_id>
            <b-card :title=title img-src="https://picsum.photos/300/300/?image=41" img-alt="Image" img-top>
                <b-card-text>
                    {{description}}
                </b-card-text>
            </b-card>
        </NuxtLink>
    </b-col>

</template>

<script>
  export default {
    name: 'VideoSummary',
    props: ['id', 'video_id', 'thumbnail', 'title', 'description'],
    data() {
      return {};
    },
  };

</script>

<style>
    .card-deck .card {
        max-width: calc(25% - 30px);
    }

</style>