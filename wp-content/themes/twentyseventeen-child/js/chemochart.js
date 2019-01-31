 
 let myChart = document.getElementById('myChart').getContext('2d');

    //Global Options
    Chart.defaults.global.defaultFontFamily ='Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let chemoChart = new Chart(myChart, {
      type: 'pie', //bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[],
        datasets:[{
          label: 'Chemotypes',
          data:[],
          backgroundColor: [                
                'rgba(20, 20, 255, 0.2)',
                'rgba(255, 255, 20, 0.2)',
                'rgba(20, 255, 20, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'],
          borderWidth: 2,
          borderColor: '#777',
          hoverBorderWidth: 3,
          hoverBorderColor: '#000' 
        }]
      },
      options:{
        title:{
          display: true,
          text: '',
          fontSize: 25
        },
        legend:{
          display:true,
          position: 'right',
          labels:{
            fontColor: '#000'
          }
        },
        layout:{
          padding:{
            left: 10,
            right:0,
            top: 0,
            bottom:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    })
    function addData(chart, label, data) {
      chart.data.labels.push(label);
      chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
      });
      chart.update();
    }
    addData(chemoChart,'Chemotype I','<?php echo $cntchemI ?>');
    addData(chemoChart,'Chemotype II','<?php echo $cntchemII ?>');
    addData(chemoChart,'Chemotype III','<?php echo $cntchemIII ?>');

    function updateConfigByMutating(chart, add) {
      chart.options.title.text = add;
      chart.update();
    }
    updateConfigByMutating(chemoChart, '<?php echo "Chemotypes Used in Studies" ?>');