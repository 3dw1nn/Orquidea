@extends('adminlte::page')


@section('title', 'Orquidea')



@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

<head>
    <meta charset="utf-8">
<style>
    .highcharts-figure, .highcharts-data-table table {
        min-width: 360px; 
        max-width: 800px;
        margin: 1em auto;
      }
      
      .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #EBEBEB;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
      }
      .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
      }
      .highcharts-data-table th {
          font-weight: 600;
        padding: 0.5em;
      }
      .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
      }
      .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
      }
      .highcharts-data-table tr:hover {
        background: #f1f7ff;
      }
</style>

<style>
#container {
  height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px; 
  max-width: 800px;
  margin: 1em auto;
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
  padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}
.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

</style>
</head>

<body>
</br>
            <div class="card card-success card-tabs">

  <div class="card-header p-0 pt-1">
<ul class="nav nav-tabs" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Clientes</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Proveedores</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Materiales</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-gastos" role="tab" aria-controls="pills-contact" aria-selected="false">Gastos</a>
    </li>
  </ul>
</div>
  <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div id="clientes"></div>
   </div>

    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

        <div id="proveedores"></div>
    </div>


    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        
        <div id="materiales"></div>
    
    </div>

    <div class="tab-pane fade" id="pills-gastos" role="tabpanel" aria-labelledby="pills-contact-tab">
        
        <div id="ggastos"></div>
    
    </div>
  </div>

</div>

</body>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script src="https://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
    var gclientes = <?php echo json_encode($gclientes)?>;

    Highcharts.chart('clientes', {
        lang: {
        downloadCSV:"Descargar CSV",       
        viewFullscreen:"Ver en pantalla completa",
        exitFullscreen:"Salir de pantalla completa",
        printChart: "Tabla de impresión",
        downloadXLS: "Descargar XLS",
        viewData: "Ver tabla de datos",
        downloadPNG:"Descargar imagen en PNG", 
        downloadJPEG:"Descargar imagen en JPEG", 
        downloadPDF:"Descargar documento en PDF", 
        downloadSVG:"Descargar imagen vectorial SVG", 
        Category: "Categoria",
    },
    chart: {


        type: 'column',
        options3d: {
        enabled: true,
        alpha: 10,
        beta: 25,
        depth: 70
        }
        },

        title: {
            text: 'Resgitro de Clientes'
        },

        xAxis: {

            categories: ['Jul', 'Ago', 'Sep',
                        'Oct', 'Nov', 'Dec', 'En', 'Feb', 'Mar', 'Abr', 'May', 'Jun'
                    ],
            labels: {
            skew3d: true,
            style: {
                fontSize: '16px'
            }
            }
            },
        yAxis: {
            title: {
                text: 'Número de nuevos clientes'
                
            }
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
    column: {
      depth: 25
    }
  },
        series: [{
            name: 'Clientes',
            data: gclientes
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>




<script type="text/javascript">
    var gproveedores = <?php echo json_encode($gproveedores)?>;

    Highcharts.chart('proveedores', {
        lang: {
        downloadCSV:"Descargar CSV",       
        viewFullscreen:"Ver en pantalla completa",
        exitFullscreen:"Salir de pantalla completa",
        printChart: "Tabla de impresión",
        downloadXLS: "Descargar XLS",
        viewData: "Ver tabla de datos",
        downloadPNG:"Descargar imagen en PNG", 
        downloadJPEG:"Descargar imagen en JPEG", 
        downloadPDF:"Descargar documento en PDF", 
        downloadSVG:"Descargar imagen vectorial SVG", 
        Category: "Categoria",
    },
      

        title: {
            text: 'Registro de Proveedores'
        },

        xAxis: {

categories: ['Jul', 'Ago', 'Sep',
            'Oct', 'Nov', 'Dec', 'En', 'Feb', 'Mar', 'Abr', 'May', 'Jun'
        ],
labels: {
  skew3d: true,
  style: {
    fontSize: '16px'
  }
}
},
        yAxis: {
            title: {
                text: 'Número de nuevos Proveedores'
            }
        },

        plotOptions: {
    column: {
      depth: 25
    }
  },
        series: [{
            name: 'Proveedores',
            data: gproveedores
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chart: {


type: 'column',
options3d: {
  enabled: true,
  alpha: 10,
  beta: 25,
  depth: 70
}
},
            }]
        }
    });

</script>



<script>
var gmateriales = <?php echo json_encode($gmateriales)?>;

Highcharts.chart('materiales', {
    lang: {
        downloadCSV:"Descargar CSV",       
        viewFullscreen:"Ver en pantalla completa",
        exitFullscreen:"Salir de pantalla completa",
        printChart: "Tabla de impresión",
        downloadXLS: "Descargar XLS",
        viewData: "Ver tabla de datos",
        downloadPNG:"Descargar imagen en PNG", 
        downloadJPEG:"Descargar imagen en JPEG", 
        downloadPDF:"Descargar documento en PDF", 
        downloadSVG:"Descargar imagen vectorial SVG", 
        Category: "Categoria",
    },
    
  chart: {


    type: 'column',
    options3d: {
      enabled: true,
      alpha: 10,
      beta: 25,
      depth: 70
    }
  },
  title: {
    text: 'Registro de materiales'
  },
  subtitle: {
    text: null
  },
  plotOptions: {
    column: {
      depth: 25
    }
  },
  xAxis: {

    categories: ['Jul', 'Ago', 'Sep',
                'Oct', 'Nov', 'Dec', 'En', 'Feb', 'Mar', 'Abr', 'May', 'Jun'
            ],
    labels: {
      skew3d: true,
      style: {
        fontSize: '16px'
      }
    }
  },
  yAxis: {
    title: {
        text: 'Número de nuevos materiales'
    }
  },

  series: [{
    name: 'Materiales',
    data: gmateriales
  }] 
});
</script>

<script>
var ggastos = <?php echo json_encode($ggastos)?>;

Highcharts.chart('ggastos', {
    lang: {
        downloadCSV:"Descargar CSV",       
        viewFullscreen:"Ver en pantalla completa",
        exitFullscreen:"Salir de pantalla completa",
        printChart: "Tabla de impresión",
        downloadXLS: "Descargar XLS",
        viewData: "Ver tabla de datos",
        downloadPNG:"Descargar imagen en PNG", 
        downloadJPEG:"Descargar imagen en JPEG", 
        downloadPDF:"Descargar documento en PDF", 
        downloadSVG:"Descargar imagen vectorial SVG", 
        Category: "Categoría",
    },
    
  chart: {


    type: 'column',
    options3d: {
      enabled: true,
      alpha: 10,
      beta: 25,
      depth: 70
    }
  },
  title: {
    text: 'Registro de gastos'
  },
  subtitle: {
    text: null
  },
  plotOptions: {
    column: {
      depth: 25
    }
  },
  xAxis: {

    categories: ['Jul', 'Ago', 'Sep',
                'Oct', 'Nov', 'Dec', 'En', 'Feb', 'Mar', 'Abr', 'May', 'Jun'
            ],
    labels: {
      skew3d: true,
      style: {
        fontSize: '16px'
      }
    }
  },
  yAxis: {
    title: {
        text: 'Número de nuevos gastos'
    }
  },
 
  series: [{
    name: 'Gastos',
    data: ggastos
  }] 
});
</script>

</html>

@stop