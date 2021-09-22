<template>
<main class="d-flex justify-content-center align-items-center">
  <div class="container my_container p-5">

    <h2>Hi there! Do you want to ask us something?</h2>

    <div v-if="success" class="alert alert-light">Messaggio inviato</div>

    <form @submit.prevent="sendForm" >

      <!-- NAME -->
      <div class="mb-3">
        <label for="your_name" class="form-label">Name</label>
        <input type="text" v-model="name" class="form-control" name="name" id="your_name" placeholder="What's your name?">
        <p v-for="(error,index) in errors.name" :key="index">{{error}}</p>
      </div>

      <!-- EMAIL ADRESS -->
      <div class="mb-3">
        <label for="your_email" class="form-label">Email address</label>
        <input type="email" v-model="email" class="form-control" name="email" id="your_email" placeholder="Email...">
        <p v-for="(error,index) in errors.email" :key="index">{{error}}</p>
      </div>

      <!-- MESSAGE -->
      <div class="mb-3">
        <label for="your_message" class="form-label">Example textarea</label>
        <textarea  v-model="message" class="form-control" name="message" id="your_message" rows="3" placeholder="Write me a message..."></textarea>
        <p v-for="(error,index) in errors.message" :key="index">{{error}}</p>
      </div>

      <!-- BUTTON -->
      <button type="submit" class="btn">{{sending ? 'invio in corso' : 'Submit'}}</button>
      
    </form>
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
      this.sending=true;
      this.success=false;
      axios.post('/api/contacts',{
        'name': this.name,
        'email': this.email,
        'message': this.message
      })
      .then(response=>{

        if (!response.data.success) {
          this.errors=response.data.errors;
          this.success=false;
        } else {
          this.success=true;
          console.log(response);
          this.sending=false;
          this.name="";
          this.email="";
          this.message="";
        }

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

  .my_container{
    background-color: hsla(243, 100%, 4%, 0.9);
    border-radius:10px;

    h2{
      font-size: 2rem;
      color: whitesmoke;
      line-height: 50px;
      letter-spacing: 1px;
      padding-bottom: 15px;
    }

    form{
      
      color: rgb(109, 109, 109);

      button{
        background-color:#6C60BF;
        color: #eeeeee;
        transition: 0.3s ease-in;

        &:hover{
          background-color: #40012F;
        }
      }
    }
  }
 
}

</style>