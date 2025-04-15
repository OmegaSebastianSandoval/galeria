var videos = [];
$(document).ready(function () {
  $(".news-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    adaptiveHeight: true,

    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
  $(".dropdown-toggle").dropdown();
  $(".carouselsection").carousel({
    quantity: 4,
    sizes: {
      900: 3,
      500: 1,
    },
  });
  $(".banner-video-youtube").each(function () {
    console.log($(this).attr("data-video"));
    var datavideo = $(this).attr("data-video");
    var idvideo = $(this).attr("id");
    var playerDefaults = {
      autoplay: 0,
      autohide: 1,
      modestbranding: 0,
      rel: 0,
      showinfo: 0,
      controls: 0,
      disablekb: 1,
      enablejsapi: 0,
      iv_load_policy: 3,
    };
    var video = { videoId: datavideo, suggestedQuality: "hd720" };
    videos[videos.length] = new YT.Player(idvideo, {
      videoId: datavideo,
      playerVars: playerDefaults,
      events: {
        onReady: onAutoPlay,
        onStateChange: onFinish,
      },
    });
  });
  function onAutoPlay(event) {
    event.target.playVideo();
    event.target.mute();
  }
  function onFinish(event) {
    if (event.data === 0) {
      event.target.playVideo();
    }
  }
  $("header .menu-responsive").on("click", function () {
    if ($("header nav").is(":visible")) {
      $("header nav").hide(300);
    } else {
      $("header nav").show(300);
    }
  });
  $("header .menu-responsive-cierra").on("click", function () {
    if ($("header nav").is(":visible")) {
      $("header nav").hide(300);
    } else {
      $("header nav").show(300);
    }
  });
});
$(document).ready(function () {
  $("#formValidar").on("submit", function (e) {
    e.preventDefault();
    $(".loader-bx").addClass("show");

    let data = $(this).serialize();
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      data: data,
      dataType: "json",
      success: function (response) {
        switch (response.status) {
          case "success":
            Swal.fire({
              icon: "success",
              title: "Listo!",
              text: response.message,
              confirmButtonColor: "#192a4b",
              confirmButtonText: "Aceptar",
            }).then(function () {
              window.location.href = response.redirect;
            });
            break;
          case "error":
            Swal.fire({
              icon: "error",
              title: "Error",
              text: response.message,
              confirmButtonColor: "#192a4b",
              confirmButtonText: "Aceptar",
            });
            break;
        }
      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud:", error);
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Ocurrió un error al procesar la solicitud.",
          confirmButtonColor: "#192a4b",
        });
      },
      complete: function () {
        $(".loader-bx").removeClass("show");
      },
    });
  });
});
