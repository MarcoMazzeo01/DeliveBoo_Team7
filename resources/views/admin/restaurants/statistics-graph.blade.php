@extends('layouts.app')

@section('content')



<div class="container">
  <div class="row row-cols-3 gap-5 justify-content-center">
    <div class="col text-center">
      <h3>Statistiche oggi:</h3>
      <canvas id="dish-today"></canvas>
    </div>
    <div class="col text-center">
      <h3>Statistiche globali:</h3>
      <canvas id="dish-all"></canvas>
    </div>

  </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('script')
<script>
  const dishesToday = document.getElementById('dish-today');
  const dishesAll = document.getElementById('dish-all');

const dataToday = @json($dataToday);
const dataAll = @json($dataAll)

console.log(dataAll);
console.log(dataToday);

const dishesName = [];

const dishesQtyToday = [];
const dishesRevenueToday = [];

const dishesQtyAll = [];
const dishesRevenueAll = [];

dataToday.forEach(dish => {

  dishesName.push(dish.name)
  dishesQtyToday.push(dish.total_quantity)
  dishesRevenueToday.push(dish.total_price)

});

dataAll.forEach(dish => {

dishesQtyAll.push(dish.total_quantity)
dishesRevenueAll.push(dish.total_price)

});

  new Chart(dishesToday, {

    type: 'pie',
    data: {
      labels: dishesName,
      datasets: [{
        label: 'Tot ordini',
        data: dishesQtyToday,
        borderWidth: 1
      },
      {
        label: 'Tot Ricavi €',
        data: dishesRevenueToday,
        
        borderWidth: 1
      }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(dishesAll, {

type: 'pie',
data: {
  labels: dishesName,
  datasets: [{
    label: 'Tot ordini',
    data: dishesQtyAll,
    borderWidth: 1
  },
  {
    label: 'Tot Ricavi €',
    data: dishesRevenueAll,
    
    borderWidth: 1
  }
]
},
options: {
  scales: {
    y: {
      beginAtZero: true
    }
  }
}
});

</script>
@endsection