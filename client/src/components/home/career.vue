
<template>
    <div class="row">
        <div class="col-md-8">
            <p v-if="selectedSect !== null">{{selectedSect.description}}</p>
            <div v-if="offers.length > 0">
                <div v-for="offer in offers" :key="offer.uuid" class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img :src="offer.image" class="card-img" :alt="offer.title">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{offer.title}}</h5>
                                <p class="card-text">{{offer.text}}</p>
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
            <ul class="list-group" v-if="selectedSect !== null">
                <li v-for="sector in sectors" :key="sector.uuid" :class="{active: sector.uuid == selectedSect.uuid}" @click="getOffers(sector)" class="list-group-item d-flex justify-content-between align-items-center" style="cursor: pointer;">
                    {{sector.title}}
                    <span class="badge badge-primary badge-pill">{{sector.offers_count}}</span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import * as services from './services'

export default {
    name: 'career',
    data () {
        return {
            offers: [],
            sectors: [],
            selectedSect: null
        }
    },
    mounted: function () {
        this.getSectors()
    },
    methods: {
        getSectors() {
            services.getSectors()
                .then(response => {
                    this.sectors = response
                    this.selectedSect = this.sectors[0]
                    this.getOffers(this.selectedSect)
                })
        },
        getOffers (sector) {
            this.selectedSect = sector
            services.getOffers({sector: sector.uuid})
                .then(response => {
                    this.offers = response
                })
        }
    }
}
</script>