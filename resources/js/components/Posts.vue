<template>
  <main>
      <div class="container">
          <div class="posts-container">
              <div class="posts-grid"
                v-if="posts"
              >
                  <PostItem
                    v-for="post in posts"
                    :key="post.id"
                    :post="post"
                  />
              </div>

              <div
                v-else
              >Loading...</div>
              <button @click="getPosts(pages.current - 1)" :disabled="pages.current === 1" class="btn bg_blue">Prev</button>
              <button v-for="page in pages.last" :key="page" @click="getPosts(page)" :disabled="page === pages.current" class="btn">{{page}}</button>
              <button @click="getPosts(pages.current + 1)" :disabled="pages.current === pages.last" class="btn bg_blue">Next</button>
          </div>
      </div>
  </main>
</template>

<script>

import PostItem from './PostItem.vue';

export default {
    name: 'Posts',
    components:{
        PostItem,
    },
    data(){
        return {
            apiUrl: 'http://127.0.0.1:8000/api/posts?page=',
            posts: null,
            pages: {}

        }
    },
    mounted(){
        this.getPosts();
    },
    methods:{
        getPosts(page = 1){
            this.post = null;
            axios.get(this.apiUrl + page)
            .then(res=>{
                this.posts = res.data.data;
                this.pages = {
                    current : res.data.current_page,
                    last : res.data.last_page
                }
                console.log(this.posts);
            })
            .catch(function (error) {
                console.log(error);
            })
        }
    },

}
</script>

<style lang="scss" scoped>
main{
    min-height: calc(100vh - 210px);
    // background-color: gold;
    .posts-container{
        padding: 3rem 0;
        .posts-grid{
            display: grid;
            gap: 1.3rem;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: auto;
        }

        .btn{
            margin: 1.5rem 0.25rem;
            &:hover{
                background-color: #438cfa;
            }
        }
    }
}
</style>
