document.getElementById('year').addEventListener('change', react, false);
document.getElementById('emp').addEventListener('change', react, false);
function react(){
    let eYear=document.getElementById('year');
    let eEmp=document.getElementById('emp');
    let eChart=document.getElementById('chart');
    eChart.src='chart.php?e='+eEmp.value+'&a='+eYear.value;
}
