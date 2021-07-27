<template>
    <div class="wrapper-apartment" v-if="!deleted">
        <div class="apartment-main-infos">
                <span class="apartment-title">
                    <h1 @click="showDetails">
                        {{ apartment.title }}
                        <transition name="rotate">
                            <i
                                class="fas fa-chevron-down arrow"
                                :class="showApartmentDetails ? 'rotate' : ''"
                            ></i>
                        </transition>
                    </h1>
                </span>
            <ul class="infos">
                
                <li>
                    <slot name="view"></slot>
                </li>
                <li>
                    <a href="#" class="button-link" @click="destroy">
                         <span> Elimina </span>
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </li>
                <li>
                    <slot name="statistic"></slot>
                </li>
                <li>
                    <slot name="sponsor"></slot>
                </li>
            </ul>
        </div>
        <transition name="slide-down">
            <div class="details" ref="details" v-if="showApartmentDetails">
                <ul>
                    <li>
                        <strong>Indirizzo: </strong>
                        {{ apartment.address }}
                    </li>
                    <li>
                        <strong>Numero di stanze: </strong>
                        {{ apartment.number_rooms }}
                    </li>
                    <li>
                        <strong>Bagni: </strong>
                        {{ apartment.number_toiletes }}
                    </li>
                    <li>
                        <strong>Posti letto: </strong>
                        {{ apartment.number_beds }}
                    </li>
                    <li>
                        <strong>M<sup>2</sup>: </strong>
                        {{ apartment.area }}
                    </li>
                    <li>
                        <ul class="edit-apartment">
                            <li>
                                <slot name="edit"></slot>
                            </li>
                            <li>
                                <slot name="add-image"></slot>
                            </li>
                            <li>
                                <slot name="edit-image"></slot>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            showApartmentDetails: false,
            deleted: false
        };
    },

    props: {
        apartment: Object
    },

    methods: {
        showDetails: function() {
            this.showApartmentDetails = !this.showApartmentDetails;
        },

        destroy: function() {
            console.log(this.apartment.id);
            axios
                .get("/api/apartment/destroy/" + this.apartment.id)
                .then(response => {
                    if (response.status == 200) {
                        this.deleted = true;
                    }
                })
                .catch(error => console.log(error));
        }
    }
};
</script>
