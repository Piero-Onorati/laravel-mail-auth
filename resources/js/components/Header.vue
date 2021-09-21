<template>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <!-- LOGO -->
            <div class="logo_box">
                <router-link class="navbar-brand" :to="{name:'home'}">
                    <img :src="'/img/BOOLPRESS.png'" class="logo">
                </router-link>
            </div>

            <!-- TOGGLE -->
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- NAVBAR -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item" v-for="(link,index) in navMenu" :key="index">
                        <router-link class="nav-link" aria-current="page"
                            :to="{ name:link.routeName }"
                        >
                            {{link.label}}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name:'Header',
    data(){
        return{
            navMenu:[
                {
                    label:'Home',
                    routeName:'home'
                },
                {
                    label:'Blog',
                    routeName:'blog'
                },
                {
                    label:'Contacts',
                    routeName:'contacts'
                }
            ]
        }
    }

}
</script>

<style lang="scss" scoped>
nav{
    background-color: #000014;
    font-size: 16px;

    .logo_box{
        width: 150px;
        img{
            width:100%;
        }
    }
   
}

</style>