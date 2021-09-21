<template>

  <main class="container-fluid">

    <!-- FIRST ROW: HERO -->
    <div class="row first_row">
        <div class="col-12 col-md-6 content_box">                   
            <h2 class="text-white">Stay up to date on the latest news from the world of programming</h2>
            <p>Subscribe to the newsletter and follow us on social networks!</p>
            <div class="social_icons">
                <i class="bi bi-instagram"></i>
                <i class="bi bi-twitter"></i>
                <i class="bi bi-facebook"></i>
                <i class="bi bi-twitch"></i>
            </div>
        </div>
        <div class="col-12 col-md-6 img_box">
            <img :src="'/img/pc.jpg'"  class="first_img">
        </div>

    </div>

    <!-- SECOND ROW:ALL POST(DISPLAYED 4 per PAGE) -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 second_row pt-5 pb-3">
        <div class="col" v-for="post in posts" :key="post.id">
            <div class="card border-secondary bg-transparent mb-3 h-100 my_card">
                <!-- Card Header -->
                <div class="card-header border-secondary text-white d-flex justify-content-between align-items-center my_card_header">
                    <div class="author">
                        <i class="bi bi-person-circle"></i>
                        <h5 class="d-inline-block mx-1">User</h5>
                    </div>
                    <i class="bi bi-share"></i>
                </div>
                <!-- Card Body -->
                <div class="card-body text-light my_card_body">
                    <h5 class="card-title h-25">{{post.title}}</h5>
                    <p class="card-text">{{truncate(post.content, 150)}}</p>
                    <div class="post_date">
                        <span class="date_post">Posted on: {{formatDate(post.created_at)}}</span>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer bg-transparent border-secondary text-white d-flex justify-content-between align-items-center my_card_footer">
                    <router-link :to="{name:'post-detail', params:{slug:post.slug}}" class="btn">Read</router-link>
                    <div class="likeAndSave">
                        <i class="bi bi-heart-fill mx-3"></i>
                        <i class="bi bi-save2"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- NAVIGATION POSTS -->
    <div class="container d-flex justify-content-center">
        <nav aria-label="page-navigation-example" class="navigation_posts">
            <ul class="pagination my-4">
                <li class="page-item" :class="{'disabled' : currentPage==1}">
                    <button class="page-link bg-transparent"  @click="getPost(currentPage-1)">Previous</button>
                </li>
                <li class="page-item" 
                    v-for="i in lastPage" :key="i" 
                    :class="{'active': currentPage==i }"
                    @click="getPost(i)"
                >
                    <span class="page-link bg-transparent">{{i}}</span>
                </li>
                
                <li class="page-item" :class="{'disabled': currentPage == lastPage}" >
                    <button class="page-link bg-transparent" @click="getPost(currentPage + 1)">Next</button>
                </li>
            </ul>
        </nav>
        
    </div>

</main>

</template>

<script>
export default {
    data(){
        return {
            url:'http://localhost:8000/api/posts',
            posts:[],
            currentPage:1,
            lastPage:null
        }
    },

    created(){
        this.getPost(1);
    },

    methods:{

        // Get all the data from the api
        getPost(pagePost){
            axios
                .get(this.url, {params:{
                    page:pagePost
                }})
                .then(response=>{
                    this.posts=response.data.results.data;
                    this.currentPage=response.data.results.current_page;
                    this.lastPage=response.data.results.last_page;
                })
                .catch(error =>{
                    console.log(error);
                })

        },

        // Truncate the content
        truncate(text, maxLength){
            if (text.length > maxLength) {
                return text.substr(0,maxLength) + '...';
            }
            return text;
        },

        // change date format
        formatDate(date){
            //create an instance of the date object
            const postDate = new Date(date);

            let day = postDate.getDate();

            if( day < 10 ){
                day = '0' + day;
            }

            let month = parseInt(postDate.getMonth() + 1);

            if( month < 10 ){
                month = '0' + month;
            }

            return day +'/' + month + '/' + postDate.getFullYear();

        }
    }
}

</script>

<style lang="scss" scoped>

main{
    background-color:#000000 ;
    min-height:100vh;
    width: 100%;
    overflow: hidden;

    .first_row{

        .content_box{
            height: 500px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex-direction: column;
            padding-left: 100px;

            h2{
                font-size: 2rem;
                color: whitesmoke;
                line-height: 50px;
                letter-spacing: 1px;
                padding-bottom: 15px;
            }

            p{
                font-size: 1.25rem;
                color: rgb(109, 109, 109);
                line-height: 32px;
                letter-spacing: 1px;
            }

            .social_icons{
                color:rgb(109, 109, 109);
                font-size: 28px;
                display: flex;


                i{
                    margin-right: 25px;
                    transition:all 0.3s ease-in;
                    &:hover{
                        cursor: pointer;
                        color: #865FD9;
                    }
                }
            }
        
        }


        .img_box{
            width: 100%;
            height: 500px;

            .first_img{
                object-fit: cover;
                width:100%;
                height: 100%;
            }
        }
    }

    .second_row{

        .my_card{
            box-shadow: 0 1px 3px rgb(214, 206, 242, 0.12), 0 1px 2px rgb(214, 206, 242, 0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);

            i{
                font-size: 20px;
                color: #eeeeee;
                &:hover{
                    cursor: pointer;
                }
            }

            &:hover{
                box-shadow: 0 14px 28px rgb(214, 206, 242, 0.25), 0 10px 10px rgb(214, 206, 242, 0.22);
                background-image: linear-gradient(225deg, #000000 0%, #010013 30%, #230c54 85%, #501f74 100%);
            }

            &:hover .my_card_header>.author>h5{
                color: #836AA6;
                cursor: context-menu;
            }

            &:hover  .my_card_body>h5{
                color: #F27329;
                cursor: context-menu;
            }

            &:hover  .my_card_body>p{
                color: whitesmoke;
                cursor: context-menu;
            }

            &:hover  .my_card_body>.post_date{
                color: lightgray;
                cursor: context-menu;
            }

            &:hover  .my_card_footer>a{
                background-color:#865FD9
            }

            &:hover i{
                color:rgb(214, 206, 242)
            }
            .my_card_header{
                background-color:#000014 ;
            }

            .my_card_body{
                h5{
                    color:rgb(168, 168, 168);
                    transition:all 0.3s ease-in;
                }

                p{
                    color:rgb(109, 109, 109);
                    transition:all 0.3s ease-in;
                }

                .post_date{
                    text-align: right;
                    font-size:12px;
                    color: rgb(92, 92, 92);
                }
            }

            .my_card_footer{
   
                a{
                    background-color: #060d2f;
                    color: #eeeeee;
                    transition: 0.3s ease-in;
                }
            }
        }
    }

    .navigation_posts{
        
        li{
            button{
                color:#044BD9;
            }

            span{
                color:#044BD9;

                &:hover{
                    cursor: pointer;
                }
            }
        }
    }
}

</style>