<template>
    <div class="post-card">
        <!-- <div class="post-img">
            <img src="" alt="img...">
        </div> -->
        <div class="post-content">
            <router-link
                :to="{ name: 'detail', params: { slug: post.slug } }"
                >{{ post.title }}</router-link
            >
            <h5 v-if="post.category">{{ post.category.name }}</h5>
            <!-- <span v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</span> -->
            <p class="main-content-post">
                {{ extractText }}
            </p>
        </div>
        <div class="post-details">
            Posted on: {{ getDate }}
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
    background-color: rgba(128, 128, 128, 0.418);
    border: 1px solid transparent;
    border-radius: 10px;
    box-shadow: 5px 5px 20px;
    .post-content {
        padding: 1rem;
        a{
            text-decoration: none;
            color: #000;
            font-weight: bold;
            &:hover {
                text-decoration: underline;
                color: #438cfa;
            }
        }
    }
    .post-details {
        text-align: left;
        padding-left: 1rem;
        padding-bottom: 0.5rem;
    }
}
</style>
