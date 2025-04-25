$(document).ready(function () {
  tinyMCE.init({
    mode: "specific_textareas",
    editor_selector: "tinyeditor",
    theme: "modern",
    color_picker_callback: function (callback, value) {
      callback("#FF0000");
    },
    block_formats: "Parrafo=p;Titulo 1=h2;Titulo 2=h3;Titulo 3=h4;Titulo 4=h5",
    language_url: "/scripts/tinymce/langs/es.js",
    language: "es",
    plugins:
      "contextmenu,textcolor,colorpicker,link ,responsivefilemanager, table ,visualblocks,code,paste,image, charmap, print, preview, anchor,advlist,media, table, contextmenu, paste, lists  ",
    external_filemanager_path: "/scripts/tinymce/plugins/filemanager/",
    filemanager_title: "Responsive Filemanager",
    external_plugins: {
      filemanager: "/scripts/tinymce/plugins/filemanager/plugin.min.js",
      responsivefilemanager:
        "/scripts/tinymce/plugins/responsivefilemanager/plugin.min.js",
    },
    theme_modern_toolbar_location: "bottom",
    paste_auto_cleanup_on_paste: true,

    fontsize_formats:
      "12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 36px 38px 40px 45px 50px 55px 60px 65px 70px 75px",
    toolbar:
      "mybutton,|,formatselect,|,fontsizeselect,forecolor,|,bold,italic,underline,|,alignleft, aligncenter, alignright, alignjustify,bullist,numlist,|,link,unlink,image,media,responsivefilemanager,|,removeformat,code",
    menubar: false,
    resize: true,
    browser_spellcheck: true,
    statusbar: true,
    relative_urls: false,
    image_title: true,
    image_advtab: true,
    style_formats: [
      {
        title: "Image Left",
        selector: "img",
        styles: {
          float: "left",
          margin: "0 10px 0 10px",
        },
      },
      {
        title: "Image Right",
        selector: "img",
        styles: {
          float: "right",
          margin: "0 10px 0 10px",
        },
      },
    ],
    setup: function (editor) {
      editor.on("init", function (e) {
        editor.getDoc().body.style.fontSize = "16px";
      });
      editor.addButton("mybutton", {
        type: "listbox",
        text: "Tema Claro",
        icon: false,
        onselect: function (e) {
          editor.getWin().document.body.style.backgroundColor = this.value();
        },
        values: [
          { text: "Tema Claro", value: "#FFFFFF" },
          { text: "Tema Oscuro", value: "#333333" },
        ],
      });
    },
  });
  $(".file-image").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
    browseClass: "btn  btn-verde",
    showUpload: false,
    showRemove: false,
    browseIcon: '<i class="fas fa-image"></i> ',
    browseLabel: "Imagen",
    language: "es",
    dropZoneEnabled: false,
  });

  $(".file-document").fileinput({
    maxFileSize: 6144,
    previewFileType: "image",
    browseLabel: "Archivo",
    browseClass: "btn  btn-cafe",
    allowedFileExtensions: ["pdf", "xlsx", "xls", "doc", "docx"],
    showUpload: false,
    showRemove: false,
    browseIcon: '<i class="fas fa-folder-open"></i> ',
    language: "es",
    dropZoneEnabled: false,
  });

  $(".file-robot").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["txt", ".txt"],
    browseClass: "btn btn-success btn-file-robot",
    showUpload: false,
    showRemove: false,
    browseLabel: "Robot",
    browseIcon: '<i class="fas fa-robot"></i> ',
    language: "es",
    dropZoneEnabled: false,
    showPreview: false,
  });

  $(".file-sitemap").fileinput({
    maxFileSize: 2048,
    previewFileType: "image",
    allowedFileExtensions: ["xml", ".xml"],
    browseClass: "btn btn-success btn-file-sitemap",
    showUpload: false,
    showRemove: false,
    browseLabel: "SiteMap",
    browseIcon: '<i class="fas fa-sitemap"></i> ',
    language: "es",
    dropZoneEnabled: false,
    showPreview: false,
  });
  $('[data-toggle="tooltip"]').tooltip();
  $(".up_table,.down_table").click(function () {
    var row = $(this).parents("tr:first");
    var value = row.find("input").val();
    var content1 = row.find("input").attr("id");
    var content2 = 0;
    if ($(this).is(".up_table")) {
      if (row.prev().find("input").val() > 0) {
        row.find("input").val(row.prev().find("input").val());
        row.prev().find("input").val(value);
        content2 = row.prev().find("input").attr("id");
        row.insertBefore(row.prev());
      }
    } else {
      if (row.next().find("input").val() > 0) {
        row.find("input").val(row.next().find("input").val());
        row.next().find("input").val(value);
        content2 = row.next().find("input").attr("id");
        row.insertAfter(row.next());
      }
    }
    var route = $("#order-route").val();
    var csrf = $("#csrf").val();
    if (route != "") {
      $.post(route, { csrf: csrf, id1: content1, id2: content2 });
    }
  });

  $(".selectpagination").change(function () {
    var route = $("#page-route").val();
    var pages = $(this).val();
    $.post(route, { pages: pages }, function () {
      location.reload();
    });
  });

  $(".changetheme").on("change", function () {
    var color = "#FFFFFF";

    var contenedor = $(this).attr("data-campo-tiny");
    if ($(this).val() == 1) {
      color = "#333333";
    }
    var editor = window.tinyMCE.get(contenedor);
    editor.getWin().document.body.style.backgroundColor = color;
  });
  $(".switch-form").bootstrapSwitch({
    onText: "Si",
    offText: "No",
  });

  $("#contenido_tipo").on("change", function () {
    var value = $(this).val();
    if (parseInt(value) == 1) {
      //Si es un banner
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-banner").show();
    } else if (parseInt(value) == 2) {
      //Si es un Contenedor
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-seccion").show();
    } else if (parseInt(value) == 3) {
      //Si es un contenido simple
      $(".no-seccion").hide();
      $(".no-banner").hide();
      $(".no-contenido").hide();
      $(".si-contenido").show();
    } else if (parseInt(value) == 5) {
      //Si es un contenido de Contenedor
      $(".no-acordion").hide();
      $(".no-carrousel").hide();
      $(".no-contenido2").hide();
      $(".si-contenido2").show();
    } else if (parseInt(value) == 6) {
      //Si es un contenido de Contenedor
      $(".no-contenido2").hide();
      $(".no-acordion").show();
      $(".no-carrousel").hide();
      $(".si-carrousel").show();
    } else if (parseInt(value) == 7) {
      //Si es un banner
      $(".no-acordion").hide();
      $(".no-contenido2").hide();
      $(".no-acordion").hide();
      $(".no-carrousel").hide();
      $(".si-acordion").show();
    }
  });
  $(".colorpicker")
    .colorpicker({
      onChange: function (e) {
        console.log("entro");
      },
    })
    .on("colorpickerChange colorpickerCreate", function (e) {
      console.log("entro");
      // console.log( e.colorpicker.picker.parents('.input-group'));
      //e.colorpicker.picker.parents('.input-group').find('input').css('background-color', e.value);
    })
    .on("create", function (e) {
      var val = $(this).val();
      $(this).css({ backgroundColor: $(this).val() });
    })
    .on("change", function (e) {
      var val = $(this).val();
      $(this).css({ backgroundColor: $(this).val() });
    });
  // $('.time-picker').wickedpicker({
  //     twentyFour: true,
  //     showSeconds: true,
  //     timeSeparator: '   :   '
  // });
});

function eliminarImagen(campo, ruta) {
  var csrf = $("#csrf").val();
  var csrf_section = $("#csrf_section").val();
  var id = $("#id").val();
  if (confirm("¿Esta seguro de borrar esta imagen?") == true) {
    $.post(
      ruta,
      { id: id, csrf: csrf, csrf_section: csrf_section, campo: campo },
      function (data) {
        if (parseInt(data.elimino) == 1) {
          $("#imagen_" + campo).hide();
        }
      }
    );
  }
  return false;
}
function eliminararchivo(campo, ruta) {
  var csrf = $("#csrf").val();
  var csrf_section = $("#csrf_section").val();
  var id = $("#id").val();
  if (confirm("¿Esta seguro de borrar este Archivo?") == true) {
    $.post(
      ruta,
      { id: id, csrf: csrf, csrf_section: csrf_section, campo: campo },
      function (data) {
        if (parseInt(data.elimino) == 1) {
          $("#archivo_" + campo).hide();
        }
      }
    );
  }
  return false;
}
$(document).ready(function () {
  $("#modalGrafica").on("show.bs.modal", function (event) {
    const button = $(event.relatedTarget); // Botón que abrió el modal
    const id = button.data("id"); // Captura el data-id

    $.ajax({
      method: "post",
      url: `/administracion/programacion/getTicketsValidados?id=${id}`,
      dataType: "json",
      success: function (res) {
        console.log(res);
    
        const tickets = res.ticketsEvento;
    
        const tiposBoleta = {};
    
        tickets.forEach(ticket => {
          const tipo = ticket.boleta_tipo_nombre || "Otro";
          if (!tiposBoleta[tipo]) {
            tiposBoleta[tipo] = { total: 0, validados: 0 };
          }
          tiposBoleta[tipo].total++;
          if (ticket.ticket_estado == 2) {
            tiposBoleta[tipo].validados++;
          }
        });
    
        const coloresBase = [
          "54, 162, 235",  // Azul
          "255, 206, 86",  // Amarillo
          "75, 192, 192",  // Turquesa
          "153, 102, 255", // Morado
          "255, 159, 64",  // Naranja
          "255, 99, 132",  // Rosado
          "46, 144, 119",  // Verde
        ];
    
        const labels = [];
        const data = [];
        const backgroundColors = [];
        let colorIndex = 0;
    
        Object.keys(tiposBoleta).forEach(tipo => {
          const { total, validados } = tiposBoleta[tipo];
          const noValidados = total - validados;
    
          const color = coloresBase[colorIndex % coloresBase.length]; // para que nunca se acaben
    
          if (validados > 0) {
            labels.push(`${tipo} - Validados`);
            data.push(validados);
            backgroundColors.push(`rgba(${color}, 0.7)`); // color más claro
          }
          if (noValidados > 0) {
            labels.push(`${tipo} - No Validados`);
            data.push(noValidados);
            backgroundColors.push(`rgba(${color}, 0.4)`); // color más suave
          }
    
          colorIndex++;
        });
    
        const allTickets = tickets.length;
        const validadosTotal = tickets.filter(t => t.ticket_estado == 2).length;
        const noValidadosTotal = allTickets - validadosTotal;
    
        $("#modalGraficaLabel").text(
          `Información ${res.programacion_bono === 1 ? 'bono:' : 'tickets evento:'} ${res.programacion_nombre}`
        );
    
        if (allTickets === 0) {
          $("#sinDatosMsg").show();
          $("#ticketsgrafica").hide();
          return;
        }
    
        $("#sinDatosMsg").hide();
        $("#ticketsgrafica").show();
    
        // Resumen bonito
        let resumenHTML = `Totales: ${allTickets} | Validados: ${validadosTotal} | No validados: ${noValidadosTotal}<br><br>`;
        resumenHTML += `<strong>Detalles por tipo de boleta:</strong><br>`;
        resumenHTML += '<div class="text-start w-75 m-auto fw-light mt-3">';
        Object.keys(tiposBoleta).forEach((label) => {
          const totalTipo = tiposBoleta[label].total;
          const validadosTipo = tiposBoleta[label].validados;
          const noValidadosTipo = totalTipo - validadosTipo;
          resumenHTML += `• <span>${label}: ${validadosTipo} validados, ${noValidadosTipo} no validados de ${totalTipo} total</span><br>`;
        });
        resumenHTML += "</div>";
    
        $("#resumenTickets").html(resumenHTML).show();
    
        const datos = {
          labels: labels,
          datasets: [{
            label: "Tickets",
            data: data,
            backgroundColor: backgroundColors,
            borderColor: backgroundColors.map(c => c.replace("0.7", "1").replace("0.4", "1")),
            borderWidth: 1,
          }],
        };
    
        const ctx = document.getElementById("ticketsgrafica").getContext("2d");
    
        if (window.myChart) {
          window.myChart.destroy();
        }
    
        window.myChart = new Chart(ctx, {
          type: "pie",
          data: datos,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: "top",
              },
              title: {
                display: true,
                text: `${res.programacion_bono === 1 ? 'Bonos' : 'Tickets'} Validados vs No Validados por Tipo de Boleta`,
              },
              datalabels: {
                color: "#000",
                formatter: (value, context) => {
                  const label = context.chart.data.labels[context.dataIndex];
                  return `${label}: ${value}`;
                },
                font: {
                  weight: "bold",
                },
              },
            },
          },
          plugins: [ChartDataLabels],
        });
      }
    });
    
    
    
  });
  $("#modalGrafica").on("hide.bs.modal", function (event) {
    $("#modalGraficaLabel").text("");
    $("#sinDatosMsg").hide();
    $("#resumenTickets").hide().html("");

    // Destruir la gráfica al cerrar el modal
    if (window.myChart) {
      window.myChart.destroy();
    }
  });
});
