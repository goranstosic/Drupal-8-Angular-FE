'use strict';

var app = angular.module('Search', [
    'ngAnimate',
    'ngMaterial'
]).config(function ($locationProvider) {
    $locationProvider.html5Mode(true);
});

angular.module('Search').controller('searchCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

    $scope.searchInput = '';
    $scope.searchSuburbResults = {};

    $scope.searchResults = {};
    $scope.multipleIds = [];

    $scope.countries_index = 0;
    $scope.states_index = 0;
    $scope.regions_index = 0;
    $scope.cities_index = 0;
    $scope.suburbs_index = 0;

    $scope.selectedAgents = 0;
    $scope.randomlySelectNum = 1;

    $scope.mailToMyself = false;

    $scope.success_num = 0;

    $scope.setField = function (field, value) {
        $scope[field] = value;

        return value;
    }

    $scope.prepareAgentIds = function () {

        var ids = [];

        angular.forEach($scope.searchResults, function (value, key) {

            if (key == 'countries') {
                angular.forEach(value, function (countries_value, countries_key) {
                    angular.forEach(countries_value.states, function (states_value, states_key) {
                        angular.forEach(states_value.cities, function (cities_value, cities_key) {
                            angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                                angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                                    if (suburb_value.selected) {
                                        angular.forEach(suburb_value.values, function (v, k) {
                                            ids.push(v.agent_uid);
                                        });
                                    }
                                });
                            });
                        });
                    });
                });
            }
        });

        return ids;

    }

    $scope.calcSelectedAgents = function () {

        var num = 0;

        angular.forEach($scope.searchResults, function (value, key) {

            if (key == 'countries') {
                angular.forEach(value, function (countries_value, countries_key) {
                    angular.forEach(countries_value.states, function (states_value, states_key) {
                        angular.forEach(states_value.cities, function (cities_value, cities_key) {
                            angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                                angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                                    if (suburb_value.selected) {
                                        num += suburb_value.values.length;
                                    }
                                });
                            });
                        });
                    });
                });
            }
        });

        $scope.selectedAgents = num;
        $scope.randomlySelectNum = num;

    }

    $scope.selectCountry = function (country) {
        angular.forEach(country.states, function (states_value, states_key) {
            states_value.selected = country.selected;
            angular.forEach(states_value.cities, function (cities_value, cities_key) {
                cities_value.selected = country.selected;
                angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                    regions_value.selected = country.selected;
                    angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                        suburb_value.selected = country.selected;
                    });
                });
            });
        });

        $scope.calcSelectedAgents();
    }

    $scope.calcCountryAgents = function (value) {

        var num = 0;

        angular.forEach(value.states, function (states_value, states_key) {
            angular.forEach(states_value.cities, function (cities_value, cities_key) {
                angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                    angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                        num += suburb_value.values.length;
                    });
                });
            });
        });

        return num;
    }

    $scope.selectRegion = function (region) {
        angular.forEach(region.suburbs, function (suburb_value, suburb_key) {
            suburb_value.selected = region.selected;
        });

        $scope.calcSelectedAgents();
    }

    $scope.calcRegionAgents = function (value) {

        var num = 0;

        angular.forEach(value.suburbs, function (suburb_value, suburb_key) {
            num += suburb_value.values.length;
        });

        return num;
    }

    $scope.selectState = function (state) {
        angular.forEach(state.cities, function (cities_value, cities_key) {
            cities_value.selected = state.selected;
            angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                regions_value.selected = state.selected;
                angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                    suburb_value.selecsuccessted = state.selected;
                });
            });
        });

        $scope.calcSelectedAgents();
    }

    $scope.calcStateAgents = function (values) {

        var num = 0;

        angular.forEach(values.cities, function (cities_value, cities_key) {
            angular.forEach(cities_value.regions, function (regions_value, regions_key) {
                angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                    num += suburb_value.values.length;
                });
            });
        });

        return num;

    }


    $scope.selectCity = function (city) {
        angular.forEach(city.regions, function (regions_value, regions_key) {
            regions_value.selected = city.selected;
            angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                suburb_value.selected = city.selected;
            });
        });

        $scope.calcSelectedAgents();
    }


    $scope.calcCityAgents = function (values) {
        var num = 0;

        angular.forEach(values.regions, function (regions_value, regions_key) {
            angular.forEach(regions_value.suburbs, function (suburb_value, suburb_key) {
                num += suburb_value.values.length;
            });
        });

        return num;
    }

    $scope.deleteMultiple = function (item) {
        var index = $scope.multipleIds.indexOf(item);
        $scope.multipleIds.splice(index, 1);
    }

    $scope.multipleSearch = function () {
        angular.forEach($scope.searchSuburbResults, function (value, key) {
            if (value['title'] == $scope.searchInput) {
                if (!$scope.multipleIds.find(function isThere(element) { return element['nid'] == value['nid']; })) {
                    $scope.multipleIds.push({
                        'nid': value['nid'],
                        'title': value['title']
                    });
                    $scope.searchInput = null;
                }
            }
        });
    }

    $scope.selectSuburbAgent = function () {
        $scope.calcSelectedAgents();
    }

    $scope.getRandom = function (a) {
        for (let i = a.length; i; i--) {
            let j = Math.floor(Math.random() * i);
            [a[i - 1], a[j]] = [a[j], a[i - 1]];
        }
    }

    $scope.sendRequest = function () {

        var ids = shuffle($scope.prepareAgentIds());
        var q = $location.search()['q'];

        ids = ids.slice(0, $scope.randomlySelectNum);

        var values = JSON.stringify(ids);

        if (q != undefined && q != '') {
            $http.post('/questionnaire-send/' + q + '?mail_me=' + $scope.mailToMyself, values).
                success(function (data, status, headers, config) {
                    $scope.success_num = data.success;
                    console.log(data);
                }).
                error(function (data, status, headers, config) {
                    console.log(data);
                });
        }

    }

    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;

        // While there remain elements to shuffle...
        while (0 !== currentIndex) {

            // Pick a remaining element...
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;

            // And swap it with the current element.
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }

        return array;
    }

    $scope.search = function (distance) {
        var ids = [];

        angular.forEach($scope.multipleIds, function (value, key) {
            ids.push(value['nid']);
        });

        $scope.success_num = 0;

        var linkQuery = '/search-query/' + ids.toString() + '/' + distance;

        $http.get(linkQuery).
            success(function (data, status, headers, config) {
                $scope.searchResults = data;
                $scope.calcSelectedAgents();
            }).
            error(function (data, status, headers, config) {
            });
    }

    $scope.doMultiple = function (item) {
        if (item != undefined) {
            $scope.multipleIds.push(item);
        }
    }

    $scope.autocomplete = function () {
        if ($scope.searchInput != undefined && $scope.searchInput != '') {

            $http.get('/search-autocomplete/' + $scope.searchInput).
                success(function (data, status, headers, config) {
                    $scope.searchSuburbResults = data;
                }).
                error(function (data, status, headers, config) {
                    
                });
        } else {
            $scope.searchSuburbResults = {};
        }

        return $scope.searchSuburbResults;
        
    }


}]);