<template>
    <main>
        <div class="container my_container">
            <div class="img_box">
                <img v-if="post.cover" :src="post.cover" :alt="post.title"> 
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border-secondary mb-3 h-100 my_card">
                        <!-- Card Header -->
                        <div class="card-header border-secondary d-flex justify-content-between align-items-center my_card_header">
                            <h5 class="card-title h-25">{{post.title}}</h5>

                            <div class="social_icons">
                                <i class="bi bi-share"></i>
                                <i class="bi bi-heart-fill mx-3"></i>
                                <i class="bi bi-save2"></i>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body my_card_body">

                            <!-- POST CONTENT -->
                            <p class="card-text">{{post.content}}</p>

                            <!-- TAGS -->
                            <div class="post_tags" v-if="post.tags">
                                <span v-for="(tag,index) in post.tags" :key="index">#{{tag.name}}</span>
                            </div>

                            <!-- CATEGORY -->
                            <span class="btn my_category my-3" v-if="post.category">{{post.category.name}}</span>

                            <!-- AUTHOR+DATE -->
                            <div class="author_date">
                                <div class="author"> Written by: <h6 class="d-inline-block mx-1">User</h6></div>
                                <span class="date_post">Posted on: {{formatDate(post.created_at)}}</span>
                            </div>

                        </div>
                    </div>
                </div>
            <router-link :to="{name:'blog'}" class="btn btn-light my-4 mx-3">Go Back</router-link>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    name:'SiglePost',
    data(){
        return{
            post:[]
        }
    },

    mounted(){
        // Get all the data from the api
        axios
            .get('/api/post/'+this.$route.params.slug)
            .then(response=>{
                this.post=response.data.results;
                console.log(this.post);
            })
            .catch(error =>{
                console.log(error);
            })

        
    },

    methods:{
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
    background-color: black;
    background-size: cover;
    min-height:100vh;
    width: 100%;
    overflow: hidden;
    .my_container{
        background-color: hsla(243, 100%, 4%, 0.8);
        min-height:100vh;
        padding: 0;

        .img_box{
            width: 100%;
            height: 300px;

            img{
                height: 100%;
                width: 100%;
                object-fit: cover;
            }
        }

        .my_card{
            border-radius:0;
            background-color: #F2F2F2;
            box-shadow: 0 1px 3px rgb(214, 206, 242, 0.12), 0 1px 2px rgb(214, 206, 242, 0.24);
            transition: all 0.3s cubic-bezier(.25,.8,.25,1);

            i{
                font-size: 20px;
                color:#010326;
                &:hover{
                    cursor: pointer;
                }
            }

            &:hover .my_card_header>h5{
                cursor: context-menu;
            }

            &:hover  .my_card_body>p{
                cursor: context-menu;
            }

            &:hover .my_card_body>.author_date{
                cursor: context-menu;
            }

            .my_card_header{
                transition:all 0.1s linear;
                background-color: #eee;
                color: #010440;
            }

            .my_card_body{

                p{
                    color:#1D0259;;
                    transition:all 0.3s ease-in;
                }

                .post_tags{
                    color: #5852F2;
                    span{

                        &:hover{
                            cursor: context-menu;
                        }
                    }
                }

                .my_category{
                    background-color: #060d2f;
                    color:white;
                    
                    &:hover{
                        cursor: context-menu;
                    }
                }

                .author_date{
                    text-align: right;
                    font-size:12px;
                    color: #010326;

                    .author{
                        h6{
                            color:#060d2f;
                        }
                    }
                }
            }

            
        }
  }
}
</style>