const axios = require("axios");
import { Chart, registerables } from 'chart.js';
import { indexOf } from 'lodash';
Chart.register(...registerables);

document.addEventListener("DOMContentLoaded", () => {

    window.Vue = require('vue');

    const stats = new Vue({
        el: "#stats",
        data: {
            apartmentId: "",
            views: {},
            messages: {},
            statsData: {},
            years: [],
            selectedYear: "",
            graphType: "",
            activeGraph: false,
            graph: {},
            noStats: false,
        },

        methods: {

            getApartmentId: function() {

                const url = window.location.href;
                const params = url.split("/");
                const id = parseInt(params[params.length -1]);
                this.apartmentId = id;  
            },

            getViews: function() {

                axios
                    .get("/api/views/" + this.apartmentId)
                    .then(data => {
                        
                        this.views = data.data;
                        console.log(this.views);
                    })
                    .catch(error => console.log(error));
            },

            getMessages: function() {
                axios
                    .get("/api/messages/" + this.apartmentId)
                    .then(data => {
                        this.messages = data.data;
                        console.log(this.messages);
                    })
                    .catch(error => console.log(error));
            },

            generateStats: function(year) {
                
                if(this.activeGraph) {
                    this.graph.destroy();
                }

                this.selectedYear = year;
                const months = ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'];
                let stats = [0,0,0,0,0,0,0,0,0,0,0,0];
                this.statsData[this.selectedYear].forEach(month => {
                    stats[month-1]++;
                });
                
                // Chart.js
                const ctx = document.getElementById('statsChart').getContext('2d');
                let myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: months, 
                        datasets: [{
                            label: (this.graphType == 'views') ? '# di Visualizzazioni' : '# di Messaggi',
                            data: stats,
                            backgroundColor: [
                                '#12a19a',
                            ],
                            borderColor: [
                                '#0d736e',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },

                        layout: {
                            padding: {
                                left: 20
                            }
                        },

                        responsive: true
                    }
                });

                this.activeGraph = true;
                this.graph = myChart;
            },

            generateData: function(type) {
                
                this.graphType = type;
                (this.graphType == 'views') ? this.statsData = this.views : this.statsData = this.messages;
                this.years = Object.keys(this.statsData);
                this.noStats = false;

                if(Object.entries(this.statsData).length === 0) {
                    this.noStats = true;
                    if(this.activeGraph) {
                        this.graph.destroy();
                    }
                    return 
                }
            }
        },

        mounted() {

            this.getApartmentId();
            this.getViews();
            this.getMessages();
        }
    })
})