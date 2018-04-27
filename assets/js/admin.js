(function () {

    var ajaxLoader, selectCountry, selectProvinces, formAdmin, btnInsert;

    window.addEventListener('load', init);

    function init() {
        ajaxLoader = document.querySelector('#ajaxLoader');
        selectCountry = document.querySelector('[name="country"]');
        selectCountry.addEventListener('change', getProvinces);

        selectProvinces = document.querySelector('[name="province"]');
        formAdmin = document.querySelector('#formAdmin');
        formAdmin.addEventListener('submit', sendForm);
        ajax('get', 'getCountries.php', {}, fillCountries);
        btnInsert = document.querySelector('.btn-primary');


    }
//    function serialize(form){
//        var el = form.querySelectorAll('[name]');
//        var params=[];
//        for (var i = 0; i < el.length; i++) {
//            console.log(el[i].name, el[i].value);
//            params.push(el[i].name + "=" +el[i].value);            
//        }
//        return params.join('&');   
//        
//    }

    function serializeObject(form) {
        var el = form.querySelectorAll('[name]');
        var params = {};
        for (var i = 0; i < el.length; i++) {
            params[el[i].name] = el[i].value;//erstellt ein JSON-Objekt
        }
        return params;
    }
    function sendForm(e) {
        e.preventDefault();
        var params = serializeObject(this);
        ajax('post', 'insertCity.php', params, sentForm);
        ajaxLoader.style.display = 'inline';
        //einblenden Loader

    }
    function sentForm(r, status) {
        if (parseInt(r) === 1 && status === 200) {
            ajaxLoader.style.display = 'none';
            //btnInsert.style.backgroundColor = "green";
            btnInsert.classList.remove('btn-light');
            btnclassList.add('btn-success');
            formAdmin.reset();
            setTimeout(function () {
                btn.classList.remove('btn-success');
                btn.classList.add('btn-light');
                //btnInsert.style.backgroundColor = "blue";
            },
                    3000);

            //alert('DONE');
            //ausblenen Loader
        } else {
            alert('FALSE');
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

})();