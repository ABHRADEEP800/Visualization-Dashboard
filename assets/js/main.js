
var color = ['#2B547E',
'#CFECEC',
'#B3D9D9',
'#81D8D0',
'#77BFC7',
'#92C7C7',
'#78C7C7',
'#7BCCB5',
'#3BB9FF',
'#36454F',
'#29465B',
'#438D80',
'#4E5B31',
'#3A5F0B',
'#4B5320',
'#667C26',
'#4E9258',
'#08A04B',
'#387C44',
'#347235',
'#2B3856',
'#123456',
'#151B54',
'#1589FF',
'#1E90FF',
'#368BC1',
'#4682B4',
'#488AC7',
'#357EC7',
'#3090C7',
'#659EC7',
'#87AFC7',
'#95B9C7',
'#6495ED',
'#191970',
'#000080',
'#151B8D',
'#00008B',
'#15317E',
'#0000A0',
'#0000A5',
'#0020C2',
'#0000CD',
'#0041C2',
'#2916F5',
'#0000FF',
'#0002FF',
'#0909FF',
'#1F45FC',
'#2554C7',
'#1569C7',
'#1974D2',
'#2B60DE',
'#4169E1',
'#2B65EC',
'#306EFF',
'#157DEC',

'#6698FF',
'#56A5EC',
'#38ACEC',
'#00BFFF',

'#C2DFFF',
'#C6DEFF',
'#BDEDFF',
'#B0E0E6',
'#AFDCEC',
'#ADD8E6',
'#B0CFDE',
'#C9DFEC',
'#D5D6EA',
'#E3E4FA',
'#DBE9FA',
'#E6E6FA',
'#EBF4FA',
'#F0F8FF',
'#F8F8FF',
'#00A36C',
'#34A56F',
'#1AA260',
'#50C878',
'#3EB489',

'#556B2F',
'#00827F',
'#008080',
'#007C80',
'#045F5F',
'#045D5D',
'#033E3E',
'#F0FFFF',
'#E0FFFF',

'#CCFFFF',
'#9AFEFF',
'#7DFDFE',
'#57FEFF',
'#00FFFF',
'#0AFFFF',
'#50EBEC',
'#4EE2EC',
'#16E2F5',
'#8EEBEC',
'#AFEEEE',

'#5CB3FF',
'#79BAEC',
'#82CAFF',
'#87CEFA',
'#87CEEB',
'#A0CFEC',
'#B7CEEC',
'#B4CFEC',
'#ADDFFF',
'#66CDAA',
'#AAF0D1',
'#93FFE8',
'#7FFFD4',
'#01F9C6',
'#40E0D0',
'#48D1CC',
'#48CCCD',
'#46C7C7',
'#43C6DB',
'#00CED1',
'#43BFC7',
'#20B2AA',
'#3EA99F',
'#5F9EA0',
'#3B9C9C',
'#008B8B',
'#4E8975',
'#1F6357',
'#306754',
'#006A4E',
'#2E8B57',
'#1B8A6B',
'#31906E',

'#25383C',
'#2C3539',
'#3C565B',
'#4C787E',
'#5E7D7E',
'#3CB371',
'#7C9D8E',
'#78866B',
'#848B79',
'#617C58',
'#728C00',
'#6B8E23',
'#808000',
'#307D7E',
'#348781',
'#438D80',
'#4E5B31',
'#3A5F0B',
'#4B5320',
'#667C26',
'#4E9258',
'#08A04B',
'#387C44',
'#347235'
];

//intensity
var ctx = document.getElementById('Intensity').getContext('2d'); // get the canvas element
        var myChart = new Chart(ctx, { // create a new chart
            type: 'bar',
            data: {
                labels: label, // set the labels
                datasets: [{
                    label: 'Intensity',
                    data: intensity,
                    backgroundColor: color ,
                    borderColor: color,
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
        var ctx1 = document.getElementById('likelihood1').getContext('2d'); // get the canvas element
        var myChart = new Chart(ctx1, { // create a new chart
            type: 'line',
            data: {
                labels: label, // set the labels
                datasets: [{
                    label: 'Likelihood',
                    data: likelihood,
                    backgroundColor:color,
                    borderColor:color,
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
var ctx2 = document.getElementById('relevence').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx2, { // create a new chart
    type: 'polarArea',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'Relevance',
            data: relevance,
            backgroundColor: color,
            borderColor: color,
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
var ctx3 = document.getElementById('topic').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx3, { // create a new chart
    type: 'radar',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'Topic',
            data: topic,
            backgroundColor: color,
            borderColor: color,
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

//Country
var ctx4 = document.getElementById('country').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx4, { // create a new chart
    type: 'bar',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'Country',
            data: country,
            backgroundColor: color,
            borderColor: color,
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

//start_year
var ctx5 = document.getElementById('start_year').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx5, { // create a new chart
    type: 'bar',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'Start Year',
            data: start_year,
            backgroundColor: color,
            borderColor: color,
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

//region
var ctx6 = document.getElementById('region').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx6, { // create a new chart
    type: 'doughnut',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'Region',
            data: region,
            backgroundColor: color,
            borderColor:color,
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

//city
var ctx7 = document.getElementById('city').getContext('2d'); // get the canvas element
var myChart = new Chart(ctx7, { // create a new chart
    type: 'radar',
    data: {
        labels: label, // set the labels
        datasets: [{
            label: 'City',
            data: city,
            backgroundColor: color,
            borderColor:color,
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



