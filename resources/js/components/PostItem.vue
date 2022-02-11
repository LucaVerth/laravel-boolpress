<template>
    <div class="post-card">
        <div class="post-img">
            <img src="" alt="img...">
        </div>
        <div class="post-content">
            <router-link
                :to="{ name: 'detail', params: { slug: post.slug } }"
                >{{ post.title }}</router-link
            >
            <h5 v-if="post.category">{{ post.category.name }}</h5>
            <span v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</span>
            <p class="main-content-post">
                {{ extractText }}
            </p>
        </div>
        <div class="post-details">
            {{ getDate }}
        </div>
    </div>
</template>

<script>

import dayjs from "dayjs";

export default {
    name: "PostItem",
    props: {
        post: Object,
    },
    computed: {
        extractText() {
            return this.post.content.substr(0, 60) + "...";
        },

        getDate() {
            const date = new Date(this.post.created_at);
            return dayjs(date).format("YYYY-MM-DD");
        },
    },
};
</script>

<style lang="scss" scoped>
.post-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: grey;
    .post-content {
        padding: 1rem;
    }
}
</style>
