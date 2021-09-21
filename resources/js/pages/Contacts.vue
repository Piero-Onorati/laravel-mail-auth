<template>
<main>
  <div class="container">
    <div>
      <form @submit.prevent="sendForm">

        <!-- NAME -->
        <div class="mb-3">
          <label for="your_name" class="form-label">Name</label>
          <input type="text" v-model="name" class="form-control" name="name" id="your_name" placeholder="What's your name?">
        </div>

        <!-- EMAIL ADRESS -->
        <div class="mb-3">
          <label for="your_email" class="form-label">Email address</label>
          <input type="email" v-model="email" class="form-control" name="email" id="your_email" placeholder="Email...">
        </div>

        <!-- MESSAGE -->
        <div class="mb-3">
          <label for="your_message" class="form-label">Example textarea</label>
          <textarea  v-model="message" class="form-control" name="message" id="your_message" rows="3" placeholder="Write me a message..."></textarea>
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>

</main>
</template>

<script>
export default {
  data(){
    return{
      name:'',
      email:'',
      message:'',
      errors:{},
      sending:false,
      success:false
    }
  },

  methods:{
    sendForm(){
      axios.post('/api/contacts',{
        'name': this.name,
        'email': this.email,
        'message': this.message
      })
      .then(response=>{
        console.log(response);
      })
      .catch(error=>{
        console.log(error);
      })
    }

  }

}
</script>

<style lang="scss" scoped>

main{
  background-image: url('/img/bg_2.jpg');
  background-size: cover;
  min-height:calc(100vh - 140px);
  width: 100%;
  overflow: hidden;
}

</style>