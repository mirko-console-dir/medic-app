<script>

// DOCTORMESSAGE
var doctorMessage = document.getElementById('doctorMessage');

var encode_date_array = {!!$encode_date_array!!};
// console.log(encode_date_array);

var encode_months_x_axes = {!!$encode_months_x_axes!!};
// console.log(encode_months_x_axes);

const obj = {};

 for (const key of encode_months_x_axes) {
      obj[key] = '';
    //   console.log(key);
      for (const value in encode_date_array) {
          if(value == key){
            //   console.log(value);
              obj[key] = encode_date_array[key];
          }
      }
    //   if(obj[key] == )
 }

var y_Axes = Object.values(obj);

// console.log(y_Axes);

//  console.log(obj);



var doctorMessageGraph = new Chart(doctorMessage, {
type: 'bar',
data:{
    labels: encode_months_x_axes,
    datasets:[{
        label: 'Messages',
        data:y_Axes,
        backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                ],
                borderWidth: 1
    },
]
},
options:{
    scales: {
        yAxes:[{
            ticks: {
                min:0,
                max:10,
                fontColor: '#ffffff',

            },
            gridLines: {
            zeroLineColor: '#84BE46',
            
            }
        }],
        xAxes:[{
            ticks: {
              
                maxTicksLimit:'',
                // min:0,
                max:10,
                fontColor: '#ffffff',
                
            },
            gridLines: {
            zeroLineColor: '#84BE46',
            }
        }],
    }
}
    

})
// 






// DOCTOR REVIEWS
var doctorReview = document.getElementById('doctorReview');

var encode_review_date_array = {!!$encode_review_date_array!!};
var encode_review_months_x_axes = {!!$encode_review_months_x_axes!!};

console.log(encode_review_date_array);
console.log(encode_review_months_x_axes);

const obj_review = {};

 for (const key of encode_review_months_x_axes) {
      obj_review[key] = '';
    //   console.log(key);
      for (const value in encode_review_date_array) {
          if(value == key){
              console.log(value);
              obj_review[key] = encode_review_date_array[key];
          }
      }
    //   if(obj[key] == )
 }

var y_axes_review = Object.values(obj_review);

console.log(y_axes_review);

var doctorReviewGraph = new Chart(doctorReview, {
type: 'bar',
data:{
    labels: encode_review_months_x_axes,
    datasets:[{
        label: 'Reviews per month',
        data: y_axes_review,
        backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                    'rgba(46, 168, 233, 1)',
                ],
                borderWidth: 1
    },
]
},
options:{
    scales: {
        yAxes:[{
            ticks: {
                min:0,
                max:10,
                fontColor: '#ffffff',

            },
            gridLines: {
            zeroLineColor: '#84BE46',
            
            }
        }],
        xAxes:[{
            ticks: {
              
                maxTicksLimit:'',
                // min:0,
                max:10,
                fontColor: '#ffffff',
                
            },
            gridLines: {
            zeroLineColor: '#84BE46',
            }
        }],
    }
}
    

})





// GRAFICO DOCTORTORTAVOTES

var doctorVote = document.getElementById('doctorVote');

var vote_1 = {!!$vote_1!!}
var vote_2 = {!!$vote_2!!}
var vote_3 = {!!$vote_3!!}
var vote_4 = {!!$vote_4!!}
var vote_5 = {!!$vote_5!!}

var v_1 = Object.values(vote_1);
var v_2 = Object.values(vote_2);
var v_3 = Object.values(vote_3);
var v_4 = Object.values(vote_4);
var v_5 = Object.values(vote_5);

var doctorVotes = new Chart(doctorVote, {
    type: 'doughnut',
    data: {
    datasets: [{
        data: [v_1, v_2, v_3, v_4, v_5],
         backgroundColor: [
                    'rgba(46, 168, 233, 1)',
                    'rgba(133, 190, 70, 1)',
                    'rgba(0, 29, 63, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(74, 128, 15, 1)',],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        '1',
        '2',
        '3',
        '4',
        '5',
    ]
},
    options: {

    }
});






</script>