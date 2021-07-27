window.Vue = require("vue");

document.addEventListener("DOMContentLoaded", () => {
    const slider = new Vue({
        el: "#slider",
        data: {},

        methods: {

            forward: function() {
                document.getElementById("slider2").scrollLeft += 220;
            }, // END OF FORWARD

            backwards: function() {
                document.getElementById("slider2").scrollLeft -= 220;
            } // END OF BACKWARDS
        }, // END OF methods

    }); // END OF NEW VUE
});
