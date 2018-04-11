'use strict';

var app = angular.module('Questionnaire', [
    'ngAnimate',
    'ngMaterial',
    'md.time.picker',
    'angular-click-outside'
]).config(function ($locationProvider, $mdThemingProvider, $mdDateLocaleProvider) {

    $mdThemingProvider.theme('default').primaryPalette('blue');
    $locationProvider.html5Mode(true);

    $mdDateLocaleProvider.formatDate = function(date) {
        return moment(date).format('DD-MM-YYYY');
     };
});

angular.module('Questionnaire').controller('formCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

    $scope.message = {
        hour: 'Hour is required',
        minute: 'Minute is required',
        meridiem: 'Meridiem is required'
      }

    $scope.step = 1;
    $scope.quote = 'flights';
    $scope.searchSuburbResults = {};
    $scope.airportsResults = {};
    $scope.citiesResults = {};
    $scope.searchLink = null;
    $scope.resendLink = null;

    $scope.tmp_travel_insurance_destination

    $scope.resend = false;
    $scope.resent = false;

    $scope.step1 = {
        'full_name': {
            'value': null,
            'required': true,
            'type': 'text'
        },
        'contact_number': {
            'value': null,
            'required': false,
            'type': 'text'
        },
        'email': {
            'value': null,
            'required': true,
            'type': 'email'
        },
        'suburb': {
            'value': null,
            'required': true,
            'type': 'text'
        },
        'what_times': {
            'value': {
                'business_hours': null,
                'after_hours': null,
                'weekends': null,
                'anytime': null
            },
            'required': true,
            'type': 'checkbox'
        },
        // 'visa': {
        //     'value': null,
        //     'required': true,
        //     'type': 'text'
        // },
        'trip_name': {
            'value': null,
            'required': true,
            'type': 'text'
        },
        'receive_quote': {
            'value': {
                'phone': null,
                'sms': null,
                'email': null
            },
            'required': true,
            'type': 'checkbox'
        },
    };


    $scope.step2 = {
        'flights': {
            'flights_from': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_to': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_depart': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            // 'flights_duration': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            'flights_arrival': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            'flights_passengers': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_passengers_adult': {
                'value': 0,
                'required': false,
                'type': 'text'
            },
            'flights_passengers_children': {
                'value': 0,
                'required': false,
                'type': 'text',
                'age': []
            },
            'flights_from_one_way': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_to_one_way': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            // 'flights_depart_one_way': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            'flights_passengers_one_way': {
              'value': new Date().format,
              'required': false,
              'type': 'datetime'
            },
            'cities': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'cities_values_from': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cities_values_to': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cities_values_depart': {
                            'value': new Date(),
                            'required': false,
                            'type': 'datetime'
                        },
                        'cities_values_passengers': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cabins': {
                            'type': 'multifield',
                            'required': false,
                            'values': [
                                {
                                    'passenger_count': {
                                        'value': 0,
                                        'required': true,
                                        'type': 'text'
                                    },
                                    'passenger_adult': {
                                        'value': 0,
                                        'required': false,
                                        'type': 'text'
                                    },
                                    'passenger_children': {
                                        'value': 0,
                                        'required': false,
                                        'type': 'text',
                                        'age': []
                                    },
                                    'passenger_show': false
                                }
                            ]
                        },
                    }
                ]
            },
            'flights_flex_dates': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'flights_preffered_airline': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_comments': {
                'value': null,
                'required': false,
                'type': 'text'
            },
            'flights_cabin_class': {
                'value': {
                    'economy': null,
                    'premium-economy': null,
                    'business': null,
                    'anytime': null
                },
                'required': true,
                'type': 'checkbox'
            },
            'flights_visa': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'flights_insurance': {
                'value': {
                    'yes': null
                },
                'required': false,
                'type': 'checkbox'
            },
        },
        'accommodation': {
            'accomm_location': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            // 'accomm_ammountofpeople': {
            //     'value': null,
            //     'required': true,
            //     'type': 'text'
            // },
            'accomm_check_in': {
                'value': new Date(),
                'required': true,
                'type': 'datetime'
            },
            // 'accomm_duration': {
            //     'value': null,
            //     'required': true,
            //     'type': 'text'
            // },
            'accomm_check_out': {
                'value': new Date(),
                'required': true,
                'type': 'datetime'
            },
            'accomm_type': {
              'value': {
                  'hotel': null,
                  'apartment': null,
                  'holiday_house': null,
                  'hostel_backpackers': null
              },
              'other_value': null,
              'required': false,
              'type': 'checkbox_other'
            },
            'accomm_room_info': {
              'value': {
                  'one_bedroom': null,
                  'two_bedroom': null,
                  'three_bedroom': null
              },
              'other_value': null,
              'required': false,
              'type': 'checkbox_other'
            },
            'accomm_other_info': {
                'value': {
                    'balcony': null,
                    'smoking': null,
                    'airconditioning': null,
                    'breakfast': null,
                    'ocean_view': null,
                    'free_parking': null,
                    'wifi': null,
                    'other': null
                },
                'other_value': null,
                'required': false,
                'type': 'checkbox_other'
            },
            'cabins': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'passenger_count': {
                            'value': 0,
                            'required': true,
                            'type': 'text'
                        },
                        'passenger_adult': {
                            'value': 0,
                            'required': false,
                            'type': 'text'
                        },
                        'passenger_children': {
                            'value': 0,
                            'required': false,
                            'type': 'text',
                            'age': []
                        },
                        'passenger_show': false
                    }
                ]
            },
        },
        'cruise': {
            'cruse_number_of_passengers': {
                'value': 0,
                'required': false,
                'type': 'text'
            },
            'cabins': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'passenger_count': {
                            'value': 0,
                            'required': true,
                            'type': 'text'
                        },
                        'passenger_adult': {
                            'value': 0,
                            'required': false,
                            'type': 'text'
                        },
                        'passenger_children': {
                            'value': 0,
                            'required': false,
                            'type': 'text',
                            'age': []
                        },
                        'passenger_show': false
                    }
                ]
            },
            'cruise_departure_port': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cruise_arrival_port': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cruise_lenght_of_cruise': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cruise_month_from': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cruise_month_to': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cruise_other_information': {
                'value': {
                    'interior': null,
                    'ocean_view': null,
                    'balcony': null,
                    'suite': null
                },
                'required': true,
                'type': 'checkbox'
            },
            'cruise_comments': {
                'value': null,
                'required': true,
                'type': 'text'
            },
        },
        'travel_insurance': {
            // 'travel_insurance_destination': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            'travel_insurance_destination': {
                'value': null,
                'other_value': null,
                'required': true,
                'type': 'text'
            },
            'travel_insurance_departure_date': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            'travel_insurance_return_date': {
                'value': new Date(),
                'required': false,
                'type': 'text'
            },
            // 'travel_insurance_age_of_traveler': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            'cabins': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'passenger_count': {
                            'value': 0,
                            'required': true,
                            'type': 'text'
                        },
                        'passenger_age': {
                            'value': 0,
                            'required': false,
                            'type': 'text',
                            'age': []
                        },
                        'passenger_show': false
                    }
                ]
            }

        },
        'car_hire': {
            'car_hire_pickup_location': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'car_hire_drop_off_location': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'car_hire_pickup_date': {
                'value': new Date(),
                'required': true,
                'type': 'datetime'
            },
            'car_hire_pickup_time': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            'car_hire_drop_off_date': {
                'value': new Date(),
                'required': true,
                'type': 'datetime'
            },
            'car_hire_drop_off_time': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            // 'car_hire_number_of_passangers': {
            //     'value': null,
            //     'required': true,
            //     'type': 'text'
            // },
            'car_hire_type_of_vehicle': {
              'value': {
                  'sedan': null,
                  'van': null,
                  'mini_bus': null,
                  'luxury_convertible': null,
                  'cheapest_option': null
              },
              'required': true,
              'type': 'checkbox'
            },
            'car_hire_number_of_cars': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'car_hire_other': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'cabins': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'passenger_count': {
                            'value': 0,
                            'required': true,
                            'type': 'text'
                        },
                        'passenger_adult': {
                            'value': 0,
                            'required': false,
                            'type': 'text'
                        },
                        'passenger_children': {
                            'value': 0,
                            'required': false,
                            'type': 'text',
                            'age': []
                        },
                        'passenger_show': false
                    }
                ]
            },
        }
    };

    $scope.step1.trip_name.value = $location.search()['name'];

    $scope.packages = [];
    $scope.package_essentials = {
        'packages_visa': {
            'value': null,
            'required': true,
            'type': 'text'
        },
        'packages_insurance': {
            'value': {
                'yes': null
            },
            'required': false,
            'type': 'checkbox'
        }
    };

    $scope.addPackage = function () {
        $scope.packages.push({
            'packages_from': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'packages_to': {
                'value': null,
                'required': true,
                'type': 'text'
            },
            'packages_depart': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            // 'packages_duration_of_trip': {
            //     'value': null,
            //     'required': true,
            //     'type': 'text'
            // },
            'packages_arrival': {
                'value': new Date(),
                'required': false,
                'type': 'datetime'
            },
            // 'packages_passengers': {
            //     'value': null,
            //     'required': true,
            //     'type': 'text'
            // },
            'packages_accomm_type': {
                'value': null,
                'other_value': null,
                'required': false,
                'type': 'radio_other'
            },
            'packages_accomm_room_info': {
                'value': null,
                'other_value': null,
                'required': false,
                'type': 'radio_other'
            },
            'packages_accomm_other_info': {
                'value': {
                    'balcony': null,
                    'smoking': null,
                    'airconditioning': null,
                    'breakfast': null,
                    'free_parking': null,
                    'wifi': null,
                    'other': null
                },
                'other_value': null,
                'required': false,
                'type': 'checkbox_other'
            },
            'packages_car_hire_add': {
                'value': {
                    'yes': null
                },
                'required': false,
                'type': 'checkbox'
            },
            // 'packages_car_hire_pickup_location': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            // 'packages_car_hire_drop_off_location': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            // 'packages_car_hire_pickup_date': {
            //     'value': new Date(),
            //     'required': false,
            //     'type': 'datetime'
            // },
            // 'packages_car_hire_pickup_time': {
            //     'value': null,
            //     'required': false,
            //     'type': 'time'
            // },
            // 'packages_car_hire_drop_off_date': {
            //     'value': new Date(),
            //     'required': false,
            //     'type': 'datetime'
            // },
            // 'packages_car_hire_drop_off_time': {
            //     'value': null,
            //     'required': false,
            //     'type': 'time'
            // },
            // 'packages_car_hire_number_of_passangers': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            // 'packages_car_hire_type_of_vehicle': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            // 'packages_car_hire_number_of_cars': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            // 'packages_car_hire_other': {
            //     'value': null,
            //     'required': false,
            //     'type': 'text'
            // },
            'cabins': {
                'type': 'multifield',
                'required': false,
                'values': [
                    {
                        'passenger_count': {
                            'value': 0,
                            'required': true,
                            'type': 'text'
                        },
                        'passenger_adult': {
                            'value': 0,
                            'required': false,
                            'type': 'text'
                        },
                        'passenger_children': {
                            'value': 0,
                            'required': false,
                            'type': 'text',
                            'age': []
                        },
                        'passenger_show': false
                    }
                ]
            }
        });
    }

    $scope.addPackage();

    $scope.deletePackage = function (index) {
        $scope.packages.splice(index, 1);
    }

    $scope.addCabin = function (cabins) {
        cabins.values.push({
            'passenger_count': {
                'value': 0,
                'required': false,
                'type': 'text'
            },
            'passenger_adult': {
                'value': 0,
                'required': false,
                'type': 'text'
            },
            'passenger_children': {
                'value': 0,
                'required': false,
                'type': 'text',
                'age': []
            },
            'passenger_show': false
        })
    }

    $scope.closeCabins = function(cabins) {
        angular.forEach(cabins.values, function (value, key) {
            value.passenger_show = false;
        });

    }

    $scope.showCabin = function(cabins, index) {
        angular.forEach(cabins.values, function (value, key) {
            if (index != key) {
                value.passenger_show = false;
            }
        });

        cabins.values[index].passenger_show = !cabins.values[index].passenger_show;
    }

    $scope.passengers_action = function (passenger,action,counter_fields = []) {
        switch (action) {
            case '+':
                passenger.value++;
                if (passenger.hasOwnProperty('age')) {
                    passenger.age.push({ 'value': null });
                }

                if (counter_fields.length) {
                    angular.forEach(counter_fields, function (value, key) {
                        value.value++;

                    });
                }

                break;
            case '-':
                if (passenger.value > 0) {
                    passenger.value--;

                    if (passenger.hasOwnProperty('age')) {
                        passenger.age.pop();
                    }

                    if (counter_fields.length) {
                        angular.forEach(counter_fields, function (value, key) {
                            value.value--;

                        });
                    }
                }
                break;
        }

    }

    $scope.deleteCabin = function (cabins, index) {
        cabins.values.splice(index, 1);
    }

    $scope.addCity = function () {
        $scope.step2.flights.cities.values.push({
                        'cities_values_from': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cities_values_to': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cities_values_depart': {
                            'value': new Date(),
                            'required': false,
                            'type': 'datetime'
                        },
                        'cities_values_passengers': {
                            'value': null,
                            'required': false,
                            'type': 'text'
                        },
                        'cabins': {
                            'type': 'multifield',
                            'required': false,
                            'values': [
                                {
                                    'passenger_count': {
                                        'value': 0,
                                        'required': true,
                                        'type': 'text'
                                    },
                                    'passenger_adult': {
                                        'value': 0,
                                        'required': false,
                                        'type': 'text'
                                    },
                                    'passenger_children': {
                                        'value': 0,
                                        'required': false,
                                        'type': 'text',
                                        'age': []
                                    },
                                    'passenger_show': false
                                }
                            ]
                        },
                    });
    }

    $scope.passengersAction = function (item,action) {
        switch (action) {
            case '+':
                if (item == 'children') {
                    $scope.step2.flights.flights_passengers_children.value++;
                    $scope.step2.flights.flights_passengers_children.age.push({ 'value': null })
                } if (item == 'adult') {
                    $scope.step2.flights.flights_passengers_adult.value++;
                }
                break;
            case '-':
                if (item == 'children' && $scope.step2.flights.flights_passengers_children.value > 0) {
                    $scope.step2.flights.flights_passengers_children.value--;
                    $scope.step2.flights.flights_passengers_children.age.pop();
                } if (item == 'adult' && $scope.step2.flights.flights_passengers_adult.value > 0) {
                    $scope.step2.flights.flights_passengers_adult.value--;
                }
                break;
        }
        $scope.step2.flights.flights_passengers.value = $scope.step2.flights.flights_passengers_adult.value + $scope.step2.flights.flights_passengers_children.value;

    }

    // $scope.packagespassengersAction = function (item,action) {
    //     switch (action) {
    //         case '+':
    //             if (item == 'children') {
    //                 $scope.package.packages_passengers_children.value++;
    //                 $scope.package.packages_passengers_children.age.push({ 'value': null })
    //             } if (item == 'adult') {
    //                 $scope.package.packages_passengers_adult.value++;
    //             }
    //             break;
    //         case '-':
    //             if (item == 'children' && $scope.package.packages_passengers_children.value > 0) {
    //                 $scope.package.packages_passengers.value--;
    //                 $scope.package.packages_passengers_children.age.pop();
    //             } if (item == 'adult' && $scope.package.packages_passengers_adult.value > 0) {
    //                 $scope.package.packages_passengers_adult.value--;
    //             }
    //             break;
    //     }
    //     $scope.package.packages_passengers.value = $scope.package.packages_passengers_adult.value + $scope.package.packages_passengers_children.value;
    //
    // }

    $scope.deleteCity = function (index) {
        $scope.step2.flights.cities.values.splice(index, 1);
    }

    $scope.validateStep = function (step) {
        var fail = [];

        angular.forEach(step, function (value, key) {
            if (value.required) {
                switch (value.type) {
                    case 'checkbox':
                        var passCheck = false;
                        angular.forEach(value.value, function (v, k) {
                            if (v) {
                                passCheck = true;
                            }
                        });
                        if (!passCheck) {
                            fail.push(key);
                        }
                        break;
                    case 'radio_other':
                        if (value.value != null || value.value != '') {
                            if (value.value == 'other') {
                                if (value.other_value == null || value.other_value == '') {
                                    fail.push(key);
                                }

                            }
                        }

                        if (value.value == null) {
                            fail.push(key);
                        }
                        break;
                    case 'checkbox_other':
                        passCheck = false;
                        angular.forEach(value.value, function (v, k) {
                            if (v != null && v != false) {
                                if (k == 'other') {
                                    if ((value.other_value == null || value.other_value == '') && !passCheck) {
                                        passCheck = false;
                                    } else {
                                        passCheck = true;
                                    }
                                } else {
                                    passCheck = true;
                                }
                            }
                        });

                        if (!passCheck) {
                            fail.push(key);
                        }
                        break;
                    case 'datetime':
                    //console.log(value);
                        if (value.value == null || value.value == '') {
                            fail.push(key);
                        }
                        break;
                    case 'text':
                        if (value.value == null || value.value == '') {
                            fail.push(key);
                        }
                        break;

                }
            }
        });

        if (fail.length == 0) {
            return true;
        } else {
            return false;
        }

    }

    $scope.postForm = function (step2=true) {

        var s2 = $scope.step2[$scope.quote];

        if ($scope.quote == 'packages') {
            s2 = $scope.packages;
        }

        if (!step2) {
          s2 = null;
        }

        var values = JSON.stringify({
            'step_1': $scope.step1,
            'step_2': {
                'quote': $scope.quote,
                'values': s2
            }
        });

        var postLink = '/questionnaire-accept';

        if ($scope.q != undefined && $scope.q != '') {
            postLink = '/questionnaire-update/' + $scope.q;
        }


        $http.post(postLink, values).
            success(function (data, status, headers, config) {
                $scope.searchLink = data.link;
                $scope.resend = data.resend;

                console.log(data);
            }).
            error(function (data, status, headers, config) {
                console.log(data);
            });
    }

    $scope.resendQuestionnaire = function () {

        var postLink = '/questionnaire-resend/' + $scope.q;

        $http.post(postLink).
            success(function (data, status, headers, config) {
                if (data.success > 0) {
                    $scope.resent = true;
                }
                console.log(data);
            }).
            error(function (data, status, headers, config) {
                console.log(data);
            });
    }

    $scope.searchRedirect = function () {
        window.location.replace($scope.searchLink);
    }

    $scope.airports = function (input) {
        if (input != undefined && input != '') {
            $http.get('/search-airports/' + input).
                success(function (data, status, headers, config) {
                    $scope.airportsResults = data;
                }).
                error(function (data, status, headers, config) {
                    console.log(data);
                });
        } else {
            $scope.airportsResults = {};
        }
    }

    $scope.cities = function (input) {
        if (input != undefined && input != '') {
            $http.get('/search-cities/' + input).
                success(function (data, status, headers, config) {
                    $scope.citiesResults = data;
                }).
                error(function (data, status, headers, config) {
                    console.log(data);
                });
        } else {
            $scope.citiesResults = {};
        }
    }

    $scope.autocomplete = function () {
        if ($scope.step1.suburb.value != undefined && $scope.step1.suburb.value != '') {
            $http.get('/search-autocomplete/' + $scope.step1.suburb.value).
                success(function (data, status, headers, config) {
                    $scope.searchSuburbResults = data;
                }).
                error(function (data, status, headers, config) {
                    console.log(data);
                });
        } else {
            $scope.searchSuburbResults = {};
        }

    }

    $scope.changeStep = function (num) {
        switch (num) {
            case 1:
                $scope.step = num;
                break;
            case 2:
                if ($scope.validateStep($scope.step1)) {
                    $scope.step = num;
                }
                break;
            case 3:

                var validatePackages = true;

                if ($scope.quote == 'packages' && validatePackages) {
                    var pass = true;
                    angular.forEach($scope.packages, function (value, key) {
                        if (!$scope.validateStep(value)) {
                            pass = false;
                        }
                    });

                    if (pass) {

                        $scope.postForm();

                        $scope.step = num;
                    }

                } else if ($scope.validateStep($scope.step2[$scope.quote])) {

                    $scope.postForm();

                    $scope.step = num;
                }

                break;
           case 4:
               if ($scope.validateStep($scope.step1)) {
                   $scope.postForm(false);
                   $scope.step = num;
               }
               break;
        }
    }

    $scope.correctDatetimeFiled = function (step) {
        angular.forEach(step, function (value, key) {
                switch (value.type) {
                    case 'datetime':
                        value.value = new Date(value.value);
                        break;
                }
        });
    }

    $scope.getQ = function (q) {
        $http.get('/questionnaire-get/' + q).
            success(function (data, status, headers, config) {
                $scope.step1 = data.step_1;
                $scope.quote = data.step_2.quote;

                if($scope.quote == 'packages') {
                    $scope.packages = data.step_2.values;

                    angular.forEach($scope.packages, function (value, key) {
                        $scope.correctDatetimeFiled(value);
                    });
                } else {
                    $scope.step2[data.step_2.quote] = data.step_2.values;

                    $scope.correctDatetimeFiled($scope.step2[data.step_2.quote]);

                    if($scope.quote == 'flights') {
                        angular.forEach($scope.step2[data.step_2.quote]['cities']['values'], function (value, key) {
                            $scope.correctDatetimeFiled(value);
                        });
                    }
                }

            }).
            error(function (data, status, headers, config) {
                console.log(data);
            });
    }

    // Check if it is a edit page
    $scope.q = $location.search()['q'];
    if ($scope.q != undefined && $scope.q != '') {
        $scope.getQ($scope.q);
    }

}]);
