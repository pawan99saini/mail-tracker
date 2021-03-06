/* global Chart:false */

$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode = 'index'
  var intersect = true

  //var $salesChart = $('#sales-chart')
  // eslint-disable-next-line no-unused-vars
  // var salesChart = new Chart($salesChart, {
  //   type: 'bar',
  //   data: {
  //     labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
  //     datasets: [
  //       {
  //         backgroundColor: '#007bff',
  //         borderColor: '#007bff',
  //         data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
  //       },
  //       {
  //         backgroundColor: '#ced4da',
  //         borderColor: '#ced4da',
  //         data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
  //       }
  //     ]
  //   },
  //   options: {
  //     maintainAspectRatio: false,
  //     tooltips: {
  //       mode: mode,
  //       intersect: intersect
  //     },
  //     hover: {
  //       mode: mode,
  //       intersect: intersect
  //     },
  //     legend: {
  //       display: false
  //     },
  //     scales: {
  //       yAxes: [{
  //         // display: false,
  //         gridLines: {
  //           display: true,
  //           lineWidth: '4px',
  //           color: 'rgba(0, 0, 0, .2)',
  //           zeroLineColor: 'transparent'
  //         },
  //         ticks: $.extend({
  //           beginAtZero: true,

  //           // Include a dollar sign in the ticks
  //           callback: function (value) {
  //             if (value >= 1000) {
  //               value /= 1000
  //               value += 'k'
  //             }

  //             return '$' + value
  //           }
  //         }, ticksStyle)
  //       }],
  //       xAxes: [{
  //         display: true,
  //         gridLines: {
  //           display: false
  //         },
  //         ticks: ticksStyle
  //       }]
  //     }
  //   }
  // })

//   var $visitorsChart = $('#visitors-chart')
//   // eslint-disable-next-line no-unused-vars
//   var visitorsChart = new Chart($visitorsChart, {
//     data: {
//       labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
//       datasets: [{
//         type: 'line',
//         data: [100, 120, 170, 167, 180, 177, 160],
//         backgroundColor: 'transparent',
//         borderColor: '#007bff',
//         pointBorderColor: '#007bff',
//         pointBackgroundColor: '#007bff',
//         fill: false
//         // pointHoverBackgroundColor: '#007bff',
//         // pointHoverBorderColor    : '#007bff'
//       },
//       {
//         type: 'line',
//         data: [60, 80, 70, 67, 80, 77, 100],
//         backgroundColor: 'tansparent',
//         borderColor: '#ced4da',
//         pointBorderColor: '#ced4da',
//         pointBackgroundColor: '#ced4da',
//         fill: false
//         // pointHoverBackgroundColor: '#ced4da',
//         // pointHoverBorderColor    : '#ced4da'
//       }]
//     },
//     options: {
//       maintainAspectRatio: false,
//       tooltips: {
//         mode: mode,
//         intersect: intersect
//       },
//       hover: {
//         mode: mode,
//         intersect: intersect
//       },
//       legend: {
//         display: false
//       },
//       scales: {
//         yAxes: [{
//           // display: false,
//           gridLines: {
//             display: true,
//             lineWidth: '4px',
//             color: 'rgba(0, 0, 0, .2)',
//             zeroLineColor: 'transparent'
//           },
//           ticks: $.extend({
//             beginAtZero: true,
//             suggestedMax: 200
//           }, ticksStyle)
//         }],
//         xAxes: [{
//           display: true,
//           gridLines: {
//             display: false
//           },
//           ticks: ticksStyle
//         }]
//       }
//     }
//   })
})
$.ajaxSetup({
  headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
  });
$('[name=category_id]').change(function(){
  var category_id = $(this).val();
  getTemplate(category_id);
});
$('[name=template_id]').change(function(){
  var template_id = $(this).val();
  getContent(template_id);
});
function getTemplate(category_id)
{
 
    $.ajax({
      url:site_url+"/admin/template/"+category_id,
      type:"GET",
      success:function (data) {
        $('[name=template_id]').empty();
        var html = '<option value="">Select Template</option>'
       $.each(data.template,function(index,subcategory){
        html += '<option value="'+subcategory.id+'">'+subcategory.title+'</option>';
        $('[name=template_id]').append(html);
      })
      }
      })
  
}

function getContent(template_id)
{
  $.ajax({
    url:site_url+"/admin/template/getContent/"+template_id,
    type:"GET",
    success:function (data) {
      insertIntoCkeditor(data.template.description)
    }
    })
}

function insertIntoCkeditor(str){
  CKEDITOR.instances['message'].setData(str);
}


let elements = document.getElementsByClassName("addElement");

    for(let i = 0; i < elements.length; i++) {
        elements[i].onclick = function () {
            var name = elements[i].closest('.form-group').getElementsByTagName('textarea')[0].name
           insertAtCaret(elements[i].innerHTML,name)
        }
    }

    function insertAtCaret(myValue,name){
      myValue = myValue.trim();
      myValue = '['+myValue+']';
      CKEDITOR.instances[name].insertText(myValue);
  };