//intensity
var ctx = document.getElementById('Intensity').getContext('2d'); // get the canvas element
        var myChart = new Chart(ctx, { // create a new chart
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // set the labels
                datasets: [{
                    label: 'Intensity',
                    data: [1,2,3],
                    backgroundColor: [ // set the background color
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [ // set the border color
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1 // set the border width
                }]
            },
            options: { // set the options
                scales: {
                    y: {
                        beginAtZero: true // set the minimum value of the y-axis to 0
                    }
                }
            }
        }); 

        //likelihood
        var ctx = document.getElementById('likelihood1').getContext('2d'); // get the canvas element
        var myChart = new Chart(ctx, { // create a new chart
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // set the labels
                datasets: [{
                    label: 'Intensity',
                    data: [1,2,3],
                    backgroundColor: [ // set the background color
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [ // set the border color
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1 // set the border width
                }]
            },
            options: { // set the options
                scales: {
                    y: {
                        beginAtZero: true // set the minimum value of the y-axis to 0
                    }
                }
            }
        }); 

        //relevence
var ctx = document.getElementById('relevence').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx, { // create a new chart
    type: 'pie',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // set the labels
        datasets: [{
            label: 'Intensity',
            data: [1,2,3],
            backgroundColor: [ // set the background color
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // set the border color
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // set the border width
        }]
    },
    options: { // set the options
        scales: {
            y: {
                beginAtZero: true // set the minimum value of the y-axis to 0
            }
        }
    }
}); 

//year
var ctx = document.getElementById('year').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx, { // create a new chart
    type: 'doughnut',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // set the labels
        datasets: [{
            label: 'Intensity',
            data: [1,2,3],
            backgroundColor: [ // set the background color
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // set the border color
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1 // set the border width
        }]
    },
    options: { // set the options
        scales: {
            y: {
                beginAtZero: true // set the minimum value of the y-axis to 0
            }
        }
    }
}); 

