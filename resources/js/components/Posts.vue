<template>
    <main>
        <div class="container">
            <h1>{{ title }}</h1>
            <div class="posts-container">
                <PostFilter
                    :category="category"
                    :tags="tags"
                    @getCategoryPosts="getPostsCategory"
                    @getTagPosts="getPostsTags"
                    @filterReset="getPosts"
                />
                <div class="posts-grid" v-if="posts">
                    <PostItem
                        v-for="post in posts"
                        :key="post.id"
                        :post="post"
                    />
                </div>

                <div v-else>Loading...</div>
                <div v-if="globalPosts">
                    <button
                        @click="getPosts(pages.current - 1)"
                        :disabled="pages.current === 1"
                        class="btn bg_blue"
                    >
                        Prev
                    </button>
                    <button
                        v-for="page in pages.last"
                        :key="page"
                        @click="getPosts(page)"
                        :disabled="page === pages.current"
                        class="btn"
                    >
                        {{ page }}
                    </button>
                    <button
                        @click="getPosts(pages.current + 1)"
                        :disabled="pages.current === pages.last"
                        class="btn bg_blue"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import PostItem from "./PostItem.vue";
import PostFilter from "./PostFilter.vue";

export default {
    name: "Posts",
    components: {
        PostItem,
        PostFilter,
    },
    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/posts",
            posts: null,
            pages: {},
            category: [],
            tags: [],
            success: true,
            error: "",
            globalPosts: true,
            title: 'Blog Posts'
        };
    },
    mounted() {
        this.getPosts();
    },
    methods: {
        getPosts(page = 1) {
            this.reset();
            this.globalPosts = true;
            axios
                .get(this.apiUrl + "?page=" + page)
                .then((res) => {
                    this.posts = res.data.post.data;
                    this.category = res.data.category;
                    this.tags = res.data.tags;
                    this.pages = {
                        current: res.data.post.current_page,
                        last: res.data.post.last_page,
                    };
                    // console.log(this.category);
                    // console.log(this.tags);
                    // console.log(this.posts);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getPostsCategory(slug_category) {
            this.reset();
            axios
                .get(this.apiUrl + "/postcategory/" + slug_category)
                .then((res) => {
                    this.posts = res.data.category.posts;
                    this.globalPosts = false;
                    this.title = 'Blog Posts for: ' + res.data.category.name;
                    if (!res.data.success) {
                        this.error = res.data.error;
                        this.success = false;
                    }
                });
        },
        getPostsTags(slug_tag) {
            this.reset();
            axios.get(this.apiUrl + "/posttag/" + slug_tag).then((res) => {
                this.posts = res.data.tags.posts;
                this.title = 'Blog Posts for: ' + res.data.tags.name;
                this.globalPosts = false;
                if (!res.data.success) {
                    this.error = res.data.error;
                    this.success = false;
                }
            });
        },
        reset() {
            this.error = "";
            this.success = true;
            this.posts = null;
            this.title = 'Blog Posts';
        },
    },
};
</script>

<style lang="scss" scoped>
main {
    min-height: calc(100vh - 210px);
    // background-color: gold;
    .posts-container {
        padding: 1.5rem 0;
        .posts-grid {
            display: grid;
            margin: 2rem 0;
            gap: 1.3rem;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: auto;
        }
        .btn {
            margin: 1.5rem 0.25rem;
            &:hover {
                background-color: #438cfa;
            }
        }
    }
}
</style>
