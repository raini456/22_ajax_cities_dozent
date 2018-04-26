(function () {

 var selectCountry, selectProvinces, selectCities, trValues, trHeader;
 var infoKeys = ['iso2', 'iso3', 'city', 'province', 'country', 'pop'];

 window.addEventListener('load', init);

 function init() {
  selectCountry = document.querySelector('[name="country"]');
  selectCountry.addEventListener('change', getProvinces);
  selectCountry.addEventListener('change', function () {
   deleteOptions(selectCities);
  });


  selectProvinces = document.querySelector('[name="province"]');
  selectProvinces.addEventListener('change', getCities);

  selectCities = document.querySelector('[name="city"]');
  selectCities.addEventListener('change', getCityInfo);

  trHeader = document.querySelector('table thead tr');
  trValues = document.querySelector('table tbody tr');

  ajax('get', 'getCountries.php', {}, fillCountries);
 }

 function showCityInfo(json) {
  var city = JSON.parse(json);
  trHeader.innerHTML = '';
  trValues.innerHTML = '';
  for (var i = 0; i < infoKeys.length; i++) {
   var th = document.createElement('th');
   var td = document.createElement('td');
   th.innerHTML = infoKeys[i].toUpperCase();
   td.innerHTML = city[infoKeys[i]];
   trHeader.appendChild(th);
   trValues.appendChild(td);
  }
  initMap(parseFloat(city.lat), parseFloat(city.lng));
 }

 function getCityInfo() {
  ajax('get', 'getCityInfo.php', {'id': this.value}, showCityInfo);
 }

 function getCities() {
  ajax('get', 'getCities.php', {'province': this.value}, fillCities);
 }

 function fillCities(json) {
  var cities = JSON.parse(json);
  deleteOptions(selectCities);
  for (var i = 0; i < cities.length; i++) {
   var opt = document.createElement('option');
   opt.text = cities[i].city;
   opt.value = cities[i].id;
   selectCities.appendChild(opt);
  }
 }



 function deleteOptions(selectBox) {
  var max = selectBox.options.length;
  for (var i = 1; i < max; i++) {
   selectBox.removeChild(selectBox.options[1]);
  }
 }

 function fillProvinces(json) {
  var provinces = JSON.parse(json);
  deleteOptions(selectProvinces);
  for (var i = 0; i < provinces.length; i++) {
   var opt = document.createElement('option');
   opt.text = provinces[i].province;
   opt.value = provinces[i].province;
   selectProvinces.appendChild(opt);
  }
 }

 function getProvinces() {
  ajax('get', 'getProvinces.php', {'iso3': this.value}, fillProvinces);
 }

 function fillCountries(json) {
  var countries = JSON.parse(json);

  for (var i = 0; i < countries.length; i++) {
   var opt = document.createElement('option');
   opt.text = countries[i].country;//Afghanistan
   opt.value = countries[i].iso3;//AF
   selectCountry.appendChild(opt);
  }
 }

// function fillCountries(r) {
//  var countries = r.split(',');//AF;Afghanistan,AX;Aland,...
//  for (var i = 0; i < countries.length; i++) {
//   var country = countries[i].split(';');//AF;Afghanistan
//   var opt = document.createElement('option');
//   opt.text = country[1];//Afghanistan
//   opt.value = country[0];//AF
//   selectCountry.appendChild(opt);
//  }
// }




})();