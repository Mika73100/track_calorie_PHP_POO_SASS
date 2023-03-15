







const ctx = document.getElementById('myChart');

new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ['Big Mac', 'Pain au chocolat', 'Pates carbonara'],
    datasets: [{
      label: '',
      data: [400,250,1200],
      borderWidth: false,
      hoverOffset:20,
      backgroundColor: [
        "#FF5E5B",
        "#D8D8D8",
        "#FFED66",
        "#00CECB",
        "#FFED66",
      ],
    }]
  },
  options: {
    responsive:true,
    cutout:"90%",
    plugins:{
        legend:false,
    },
    layout:{
        padding:20
    }
  }
});



///ici je m'occupe du range////

function sliderChangeSize(val){
  document.getElementById("output").innerHTML = val;
}
document.getElementById('size').value =170;

function sliderChangeWeight(val){
  document.getElementById("outputBis").innerHTML = val;
}
document.getElementById('weight').value =70;
