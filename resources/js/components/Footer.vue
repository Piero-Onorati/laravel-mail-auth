<template>
  <footer class="py-4">
      <div class="container d-flex justify-content-between">
          <!-- LOGO -->
            <div class="logo_box">
                <router-link class="navbar-brand" :to="{name:'home'}">
                    <img :src="'/img/BOOLPRESS.png'" class="logo">
                </router-link>
            </div>

            <ul class="nav">
                <li class="nav-item">
                    <router-link :to="{name:'home'}" class="nav-link active" aria-current="page" href="#">Home</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name:'blog'}" class="nav-link" href="#">Blog</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name:'contacts'}" class="nav-link" href="#">Contacts</router-link>
                </li>
            </ul>

            <span>&#169; Copyright, 2021</span>
      </div>
  </footer>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
footer{
    background-color: rgb(14, 14, 14);

    .logo_box{
        width: 150px;
        img{
            width:100%;
        }
    }

    span{
        font-size: 14px;
        color: lightgray;
    }
   
}

</style>