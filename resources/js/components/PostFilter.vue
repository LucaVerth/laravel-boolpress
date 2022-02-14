<template>
    <div class="filter-container">
        <div class="filters">
            <div class="category">
                <h4>Filter for Category</h4>
                <span
                    v-for="category in category"
                    :key="`cat${category.id}`"
                    @click="$emit('getCategoryPosts', category.slug)"
                    >{{ category.name }}</span
                >
            </div>
            <div class="tags">
                <h4>Filter for Tags</h4>
                <span
                    v-for="tags in tags"
                    :key="`tag${tags.id}`"
                    @click="$emit('getTagPosts', tags.slug)"
                    >{{ tags.name }}</span
                >
            </div>
        </div>
        <button class="filter-reset btn bg_blue"
            @click="$emit('filterReset')"
        >Reset filters</button>
    </div>
</template>

<script>
export default {
    name: "PostFilter",
    props: {
        category: Array,
        tags: Array,
    },
};
</script>

<style lang="scss" scoped>
.filter-container {
    display: flex;
    align-items: center;
    .filters {
        display: flex;
        justify-content: space-around;
        .category,
        .tags {
            width: 50%;
            margin: 1.5rem;
            text-align: center;
            border: 1px solid cadetblue;
            border-radius: 0.3rem;
            span {
                display: inline-block;
                margin: 0.2rem;
                padding: 0.15rem;
                background-color: rgba(27, 93, 95, 0.5);
                border-radius: 0.35rem;
                cursor: pointer;
                &:hover {
                    background-color: cadetblue;
                }
            }
        }
    }
    .filter-reset{
        max-height: 40px;
        &:hover {
            background-color: #438cfa;
        }
    }
}
</style>
