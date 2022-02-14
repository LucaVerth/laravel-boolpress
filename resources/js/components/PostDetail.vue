<template>
    <main class="container">
        <div v-if="post">
            <h3>{{ post.title }}</h3>
            <h4 v-if="post.category">Category: {{ post.category.name }}</h4>
            <h3>Tags:</h3>
            <ul v-for="(tag, index) in post.tags" :key="index">
                <li>{{tag.name}}</li>
            </ul>
            <p>
                {{ post.content }}
            </p>
        </div>
        <div v-else>Loading...</div>
    </main>
</template>

<script>
export default {
    name: "PostDetail",
    data() {
        return {
            apiUrl: "http://127.0.0.1:8000/api/posts/",
            post: {
                title: "",
                content: "",
                category: {},
                tags: [],
            },
        };
    },
    methods: {
        getApiData() {
            this.post = null;
            axios.get(this.apiUrl + this.$route.params.slug).then((res) => {
                this.post = res.data;
                console.log(res.data);
            });
        },
    },
    mounted() {
        this.getApiData();
    },
};
</script>

<style lang="scss" scoped>
main{
    height: calc(100vh - 210px);
}
</style>
