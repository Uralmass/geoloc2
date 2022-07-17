
jQuery('.city_city span').click(function(){

    var city = jQuery(this).text();

    jQuery('.city span').text(city);

});

// Автоопределение города

window.onload =function(){

    jQuery('.city span').text(ymaps.geolocation.city);

    //jQuery("#user-region").text(ymaps.geolocation.region);

    //jQuery("#user-country").text(ymaps.geolocation.country);

}
