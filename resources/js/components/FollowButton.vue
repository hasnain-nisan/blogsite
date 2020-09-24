<template>
  <div>
   <a class="btn btn-primary ml-2" @click="followUser" v-text="buttonText"></a>
  </div>
</template>

<script>
  export default {

    props: ['userId', 'followsId'],

    mounted() {
      console.log("Follow Unfollow button component mounted");
    },

    data: function() {
      return {
        status: this.followsId,
      }
    },

    methods: {
      followUser() {
        axios.post('/follow/' + this.userId )
        .then(response => {
          this.status = !this.status;
        })
        .catch(errors => {
          if(errors.response.status == 401) {
            window.location = '/login';
          }
        });
      }
    },

    computed: {
      buttonText() {
        return (this.status)? 'Unfollow' : 'Follow';
      }
    }
  }
</script>
