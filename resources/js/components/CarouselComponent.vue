<template>
    <div class="carousel">
        <transition-group name="slide-left" tag="div" class="wrapper-images">
            <img
                v-for="(image, index) in images"
                :key="image"
                class="slide"
                :src="image"
                v-if="index == activeImage"
            />
        </transition-group>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            images: [
                "/storage/assets/neonbrand-iAftdIcgpFc-unsplash.jpg",
                "/storage/assets/pexels-jean-van-der-meulen-1454806.jpg",
                "/storage/assets/pexels-max-vakhtbovych-6758529.jpg",
                "/storage/assets/r-architecture-CCjAPxoQWgQ-unsplash.jpg"
            ],

            activeImage: 0
        };
    },

    methods: {
        nextImage: function() {
            const max = this.images.length - 1;

            this.activeImage == max
                ? (this.activeImage = 0)
                : this.activeImage++;
        }
    },

    mounted() {
        setInterval(this.nextImage, 4000);
    }
};
</script>
