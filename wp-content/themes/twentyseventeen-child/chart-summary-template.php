<?php

/**
* Template Name: chart-summary-template
*/


function chartData($num) {

  global $cntchemI;
  global $cntchemII;
  global $cntchemIII;
  global $wpdb;
  $chemotypes = $wpdb->get_results("SELECT `study_conditions`.`condition_id`,`study_conditions`.`study_id`, `study_chemotypes`.`chemotype_id` FROM `study_conditions` JOIN `study_chemotypes` ON `study_conditions`.`study_id`=`study_chemotypes`.`study_id` WHERE `study_conditions`.`condition_id` = '$num' ");
  foreach($chemotypes as $c) {
    if($c->chemotype_id == '1' ) {
      $cntchemI++;
    }
    if($c->chemotype_id == '2' ) {
      $cntchemII++;
    }
    if($c->chemotype_id == '3' ) {
      $cntchemIII++;
    }
  }
  
}

chartData($myconditionsum);
?>
 
    <canvas id="myChart"></canvas>

  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    //Global Options
    Chart.defaults.global.defaultFontFamily ='Libre Franklin';
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
            left: 5,
            right: 25,
            top: 5,
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
    addData(chemoChart,'Chemotype I - more THC','<?php echo $cntchemI ?>');
    addData(chemoChart,'Chemotype II - equal parts','<?php echo $cntchemII ?>');
    addData(chemoChart,'Chemotype III - more CBD','<?php echo $cntchemIII ?>');

    function updateConfigByMutating(chart, add) {
      chart.options.title.text = add;
      chart.update();
    }
    updateConfigByMutating(chemoChart, '<?php echo "Chemotypes (THC:CBD Ratio) Used in Studies" ?>');
   
  </script>

<?php


