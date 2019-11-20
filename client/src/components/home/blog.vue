
<template>
    <div class="row">
        <div class="col-md-8">
            <p v-if="selectedCat !== null">{{selectedCat.description}}</p>
            <div v-if="posts.length > 0">
                <div v-for="post in posts" :key="post.uuid" class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img :src="post.image" class="card-img" :alt="post.title">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{post.title}}</h5>
                                <p class="card-text">{{post.text}}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div v-else>
                No posts in this sector
            </div>
        </div>
        <div class="col-md-4">
            <ul class="list-group" v-if="selectedCat !== null">
                <li v-for="category in categories" :key="category.uuid" :class="{active: category.uuid == selectedCat.uuid}" @click="getPosts(category)" class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;">
                    {{category.title}}
                    <span class="badge badge-primary badge-pill">{{category.posts_count}}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import * as services from './services'

export default {
    name: 'blog',
    data () {
        return {
            posts: [],
            categories: [],
            selectedCat: null
        }
    },
    mounted: function () {
        this.getCategories()
    },
    methods: {
        getCategories() {
            services.getCategories()
                .then(response => {
                    this.categories = response
                    this.selectedCat = this.categories[0]
                    this.getPosts(this.selectedCat)
                })
        },
        getPosts (category) {
            this.selectedCat = category
            services.getPosts({category: category.uuid})
                .then(response => {
                    this.posts = response
                })
        }
    }
}
</script>