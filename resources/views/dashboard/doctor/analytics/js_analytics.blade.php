<script>

var doctorMessage = document.getElementById('doctorMessage');

var encode_date_array = {!!$encode_date_array!!};
console.log(encode_date_array);

var encode_months_x_axes = {!!$encode_months_x_axes!!};
console.log(encode_months_x_axes);

const obj = {};

 for (const key of encode_months_x_axes) {
      obj[key] = '';
    //   console.log(key);
      for (const value in encode_date_array) {
          if(value == key){
              console.log(value);
              obj[key] = encode_date_array[key];
          }
      }
    //   if(obj[key] == )
 }

var y_Axes = Object.values(obj);

console.log(y_Axes);

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
                max:20,
            }
        }],
        xAxes:[{
            ticks: {
              
                maxTicksLimit:'',
                // min:0,
                max:10,
            }
        }],
    }
}
    

})

</script>