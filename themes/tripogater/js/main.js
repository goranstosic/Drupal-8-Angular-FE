(function ($) {

    Drupal.behaviors.checknestedcheckboxes = {

        attach: function (context, settings) {

          $(".acidjs-css3-treeview").delegate("label input:checkbox", "change", function() {
              var
                  checkbox = $(this),
                  nestedList = checkbox.parent().next().next(),
                  selectNestedListCheckbox = nestedList.find("label:not([for]) input:checkbox");

              if(checkbox.is(":checked")) {
                  return selectNestedListCheckbox.prop("checked", true);
              }
              selectNestedListCheckbox.prop("checked", false);
          });
        }

      }

})(jQuery);

(function ($) {

    Drupal.behaviors.myModuleBehavior = {

        attach: function (context, settings) {

          // $('html').click(function() {
          //     $('.custom-modal').hide();
          //  })
          //
          //  $('.testie').click(function(e){
          //      e.stopPropagation();
          //  });
          //
          // $('#cruise-number-of-passengers').click(function(e) {
          //  $('.custom-modal').toggle();
          // });

          $('html').click(function() {
              $('#passengers-pop').hide();
           })

           $('#passenger-field').click(function(e){
               e.stopPropagation();
           });

          $('#flights-passengers').click(function(e) {
           $('#passengers-pop').toggle();
          });


          $('html').click(function() {
              $('#passengers-pop1').hide();
           })

           $('#passenger-field1').click(function(e){
               e.stopPropagation();
           });

          $('#flights-passengers-one-way').click(function(e) {
           $('#passengers-pop1').toggle();
          });

          $('html').click(function() {
              $('#country-list').hide();
           })

           $('#ti-destination').click(function(e){
               e.stopPropagation();
           });

          $('#ti-destination-other').click(function(e) {
           $('#country-list').toggle();
          });

          // $('html').click(function() {
          //     $('.passenger-popup').hide();
          //  })
          //
          //  $('.passenger-field-multicity').click(function(e){
          //      e.stopPropagation();
          //  });
          //
          // $('#flights-passengers-multi-city').click(function(e) {
          //  $('.passenger-popup').toggle();
          // });


          // $('html').click(function() {
          //     $('.passenger-popup').hide();
          //  })
          //
          //  $('.passenger-field2').click(function(e){
          //      e.stopPropagation();
          //  });
          //
          // $('#flights-passengers-packages').click(function(e) {
          //  $('.passenger-popup').toggle();
          // });

        }

      }

})(jQuery);

// LEAVING WEBSITE ALERT

(function ($) {

    Drupal.behaviors.checknestedcheckboxes = {

        attach: function (context, settings) {

          $("a.external").click(function () {
            alert("Note: You are leaving this website");
          });
        }

      }

})(jQuery);

// CHECKBOX VALIDATORS

(function ($) {

    Drupal.behaviors.checknestedcheckboxes = {

        attach: function (context, settings) {

          $('.myCB1').click(function(){
              if($('#what_times_cb1').is(':checked') || $('#what_times_cb2').is(':checked') || $('#what_times_cb3').is(':checked') || $('#what_times_cb4').is(':checked'))
                  $(".myCB1").attr("required", false);
              else
                  $(".myCB1").attr("required", true);
          });

          $('.myCB2').click(function(){
              if($('#receive_quote_cb1').is(':checked') || $('#receive_quote_cb2').is(':checked') || $('#receive_quote_cb3').is(':checked'))
                  $(".myCB2").attr("required", false);
              else
                  $(".myCB2").attr("required", true);
          });

        }

      }

})(jQuery);

// TIMEPICKER

(function ($) {

    Drupal.behaviors.checknestedcheckboxes = {

        attach: function (context, settings) {

         $('#timepicker1').timepicker();

        }

      }

})(jQuery);


// MAP

(function ($) {

    Drupal.behaviors.checknestedcheckboxes = {

        attach: function (context, settings) {

              var test_plots = {
                  "paris": {
                      latitude: 48.86,
                      longitude: 2.3444444444444,
                      href: "/cities/paris",
                      target: "_blank",
                      value: "Europe",
                      tooltip: {
                          content: "Paris"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "tokyo": {
                      latitude: 35.689488,
                      longitude: 139.691706,
                      href: "/cities/tokyo",
                      target: "_blank",
                      value: "Asia",
                      tooltip: {
                          content: "Tokyo"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "moscow": {
                      latitude: 55.755786,
                      longitude: 37.617633,
                      href: "/cities/moscow",
                      target: "_blank",
                      value: "Europe",
                      tooltip: {
                          content: "Moscow"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "los_angeles": {
                      latitude: 34.052234,
                      longitude: -118.243685,
                      href: "/cities/los-angeles",
                      target: "_blank",
                      value: "Americas",
                      tooltip: {
                          content: "Los Angeles"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "punta_arenas": {
                      latitude: -53.163833,
                      longitude: -70.917068,
                      href: "/cities/punta-arenas",
                      target: "_blank",
                      value: "Americas",
                      tooltip: {
                          content: "Punta Arenas"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      }
                  },
                  "kiruna": {
                      latitude: 67.855737,
                      longitude: 20.225231,
                      href: "/cities/kiruna",
                      target: "_blank",
                      value: "Europe",
                      tooltip: {
                          content: "Kiruna"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "reykjavik": {
                      latitude: 64.135338,
                      longitude: -21.89521,
                      href: "/cities/reykjavik",
                      target: "_blank",
                      value: "Europe",
                      tooltip: {
                          content: "Reykjavík"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "saint_petersburg": {
                      latitude: 60.0518446,
                      longitude: 29.658234,
                      href: "/cities/saint-petersburg",
                      target: "_blank",
                      value: "Europe",
                      tooltip: {
                          content: "Saint Petersburg"
                      },
                      attrs: {
                          fill: "#e03f3f"
                      },
                      size: 20
                  },
                  "pretoria": {
                      latitude: -25.746019,
                      longitude: 28.18712,
                      href: "/cities/pretoria",
                      target: "_blank",
                      value: "Africa",

                      tooltip: {
                          content: "Pretoria"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "sydney": {
                      latitude: -33.8688,
                      longitude: 151.2093,
                      href: "/cities/sydney",
                      target: "_blank",
                      value: "Oceania",

                      tooltip: {
                          content: "Sydney"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "melbourne": {
                      latitude: -37.8211619,
                      longitude: 144.9567819,
                      href: "/cities/melbourne",
                      target: "_blank",
                      value: "Oceania",

                      tooltip: {
                          content: "Melbourne"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "hong_kong": {
                      latitude: 22.3526738,
                      longitude: 113.9876163,
                      href: "/cities/hong-kong",
                      target: "_blank",
                      value: "Asia",

                      tooltip: {
                          content: "Hong Kong"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "berlin": {
                      latitude: 52.5067614,
                      longitude: 13.284651,
                      href: "/cities/berlin",
                      target: "_blank",
                      value: "Europe",

                      tooltip: {
                          content: "Berlin"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "belgrade": {
                      latitude: 44.8151597,
                      longitude: 20.2825153,
                      href: "/cities/belgrade",
                      target: "_blank",
                      value: "Europe",

                      tooltip: {
                          content: "Belgrade"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "new_york": {
                      latitude: 40.6974034,
                      longitude: -74.1197631,
                      href: "/cities/new-york",
                      target: "_blank",
                      value: "Americas",

                      tooltip: {
                          content: "New York"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "vancouver": {
                      latitude: 49.0220805,
                      longitude: -123.2709703,
                      href: "/cities/vancouver",
                      target: "_blank",
                      value: "Americas",

                      tooltip: {
                          content: "Vancouver"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "cairo": {
                      latitude: 30.0594838,
                      longitude: 31.223445,
                      href: "/cities/cairo",
                      target: "_blank",
                      value: "Africa",

                      tooltip: {
                          content: "Cairo"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  },
                  "rio_de_janeiro": {
                      latitude: -22.0622496,
                      longitude: -44.0442261,
                      href: "/cities/rio-de-janeiro",
                      target: "_blank",
                      value: "Americas",

                      tooltip: {
                          content: "Rio De Janeiro"
                      },
                      attrs: {
                          fill: "#e03f3f",
                      },
                      size: 20
                  }
              };

              var getElemID = function(elem) {
                  // Show element ID
                  return $(elem.node).attr("data-id");
              };

              $(".mapcontainer_equi").mapael({
                  map: {
                      name: "world_countries",
                      defaultArea: {
                          tooltip: {
                              content: getElemID
                          },
                          attrs: {
                              fill: "#003663",
                              stroke: "#fff"
                          },
                          attrsHover: {
                              fill: "#337ab7"
                          }
                      }
                  },
                  plots: test_plots,
                  legend: {
                      plot: {
                        mode: "horizontal",
                          slices: [{
                              label: "Oceania",
                              sliceValue: "Oceania",
                              width: 18,
                              height: 60,
                              attrs: {
                                  fill: "#e03f3f"
                              },
                              attrsHover: {
                                  transform: "s1.5"
                              },
                              clicked: true
                          }, {
                              label: "Europe",
                              sliceValue: "Europe",
                              width: 18,
                              height: 60,
                              attrs: {
                                  fill: "#dac9c2"
                              },
                              attrsHover: {
                                  transform: "s1.5"
                              },
                              clicked: true
                          }, {
                              label: "Americas",
                              sliceValue: "Americas",
                              width: 18,
                              height: 60,
                              attrs: {
                                  fill: "#b98c31"
                              },
                              attrsHover: {
                                  transform: "s1.5"
                              },
                              clicked: true
                          }, {
                              label: "Asia",
                              sliceValue: "Asia",
                              width: 18,
                              height: 60,
                              attrs: {
                                  fill: "#00ffc7"
                              },
                              attrsHover: {
                                  transform: "s1.5"
                              },
                              clicked: true
                          }, {
                              label: "Africa",
                              sliceValue: "Africa",
                              width: 18,
                              height: 60,
                              attrs: {
                                  fill: "#00f3ff"
                              },
                              attrsHover: {
                                  transform: "s1.5"
                              },
                              clicked: true
                          }
                        ]
                      }
                  }
              });

        }

      }

})(jQuery);


// WOW.JS

new WOW().init();

// SWIPER

var swiper = new Swiper('.swiper-container', {
  pagination: {
    el: '.swiper-pagination',
    dynamicBullets: true,
  },
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  autoplay: {
    delay: 4500,
    disableOnInteraction: false,
  }
});
