<template>
    <header>
        <div class="container">
            <nav class="navbar">
                <ul>
                    <li>
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'blog' }">Blog</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'about' }">About</router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'contacts' }"
                            >Contacts</router-link
                        >
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style lang="scss" scoped>
header {
    display: flex;
    align-items: center;
    height: 110px;
    // background-color: red;
    .navbar {
        background-color: rgba(0, 0, 0, 0.6);
        ul {
            display: flex;
            justify-content: space-evenly;
            list-style: none;
            a {
                text-decoration: none;
                color: #fff;
                &:hover {
                    text-decoration: underline;
                    color: red;
                    transition: all 0.2s ease-out;
                }
                &.active {
                    color: blue;
                }
            }
        }
    }
}
</style>
