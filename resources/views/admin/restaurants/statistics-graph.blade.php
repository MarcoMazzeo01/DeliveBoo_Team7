@extends('layouts.app')

@section('content')



<div class="container mt-5">
  <div class="row row-cols-3 gap-5 justify-content-center pt-5">
    <div class="col text-center">
      <h4>Piatti ordinati: <span id="qty-date">Oggi</span></h4>
      <canvas id="dishQty"></canvas>
    </div>
    <div class="col text-center">
      <h4>Ricavo per piatto: <span id='revenue-date'> Oggi</span></h4>
      <canvas id="revenue"></canvas>
    </div>
<button class="btn btn-primary " id='change_grapich'>Passa ad annuale</button>
  </div>
</div>






<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('script')

{{-- lo script necessita di refactoring, soprattutto l'OrderGrapichcontroller --}}
{{-- provare ad installare vue3 --}}

<script>
const dishQty = document.getElementById('dishQty');
const revenue = document.getElementById('revenue');

const qtyDate = document.getElementById('qty-date');
const revenueDate = document.getElementById('revenue-date'); 
const changeGrapich = document.getElementById('change_grapich');

  const dataToday = @json($dataToday);
  const dataAll = @json($dataAll)

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

  let dataQty = dishesQtyToday;
  let dataRevenue = dishesRevenueToday;

  
  let chartDishesToday = null;
  let chartDishesAll = null;

  function grapichDestroy() {
    
    if (chartDishesToday) {
      chartDishesToday.destroy();
    }
    if (chartDishesAll) {
      chartDishesAll.destroy();
    }
  }

  function grapichView() {
   
    chartDishesToday = new Chart(dishQty, {
      type: 'pie',
      data: {
        labels: dishesName,
        datasets: [{
          label: 'Tot ordini',
          data: dataQty,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    chartDishesAll = new Chart(revenue, {
      type: 'pie',
      data: {
        labels: dishesName,
        datasets: [{
          label: 'Tot Ricavi €',
          data: dataRevenue,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }

  
  window.addEventListener('load', grapichView);

  const button = document.getElementById('change_grapich');
  button.addEventListener('click', () => {
    if(dataQty === dishesQtyAll && dataRevenue === dishesRevenueAll){
      dataQty = dishesQtyToday;
      dataRevenue = dishesRevenueToday;

      qtyDate.innerHTML = 'Oggi';
      revenueDate.innerHTML = 'Oggi';
      changeGrapich.innerHTML = 'Passa ad annuale';
      
    }else{
     
      dataQty = dishesQtyAll;
      dataRevenue = dishesRevenueAll;

      qtyDate.innerHTML = 'Annuale';
      revenueDate.innerHTML = 'Annuale';
      changeGrapich.innerHTML = 'Passa ad odierno';
    }


    
    grapichDestroy();

    
    grapichView();
  });
</script>
@endsection