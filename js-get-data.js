console.log('js-get-adwords-data loaded');

console.log(window.location.search);

//document.querySelector('').setAttribute();

function changeArrow ( element, change){    
    if (change === 'loss') {
        if ( element.classList.contains('arrow-green') ) {
            element.classList.remove('arrow-green');
        }

        if ( element.classList.contains('rotate') ) {
            element.classList.remove('rotate');
        }
        
        element.classList.add('arrow-red');

    } else if (change === 'growth'){
        
        if ( element.classList.contains('arrow-red') ) {
            element.classList.remove('arrow-red');
        }

        element.classList.add('arrow-green');
        element.classList.add('rotate');
    }
}
function updateDatesFromData(adwordsObject) {
    document.querySelector("#start-date").value = adwordsObject.date_range.current_start_date;
    document.querySelector("#end-date").value = adwordsObject.date_range.current_end_date;
    
    document.querySelector(".previous-start-date").innerText  = adwordsObject.date_range.previous_start_date;
    document.querySelector(".previous-end-date").innerText  = adwordsObject.date_range.previous_end_date;
}
function updateAdwordsData (adwordsObject) {

    document.querySelector(".ad-spend").querySelector('.main-amount-text').querySelector('span').innerText  = adwordsObject.spend.current_spend;
    document.querySelector(".ad-spend").querySelector('.previous-amount').querySelector('span').innerText  = adwordsObject.spend.previous_spend;
    
    changeArrow( document.querySelector(".ad-spend").querySelector('.arrow-image'), adwordsObject.spend.spend_change);

    document.querySelector(".conversions").querySelector('.other-amount-text').innerText  = adwordsObject.conversions.current_conversions;
    document.querySelector(".conversions").querySelector('.previous-amount').innerText  = adwordsObject.conversions.previous_conversions;
    changeArrow( document.querySelector(".conversions").querySelector('.arrow-image'), adwordsObject.conversions.conversions_change);

    document.querySelector(".clicks").querySelector('.other-amount-text').innerText  = adwordsObject.clicks.current_clicks;
    document.querySelector(".clicks").querySelector('.previous-amount').innerText  = adwordsObject.clicks.previous_clicks;
    changeArrow( document.querySelector(".clicks").querySelector('.arrow-image'), adwordsObject.clicks.clicks_change);

    document.querySelector(".conversion-value").querySelector('.main-amount-text').querySelector('span').innerText  = adwordsObject.conv_value.current_conv_value;
    document.querySelector(".conversion-value").querySelector('.previous-amount').querySelector('span').innerText  = adwordsObject.conv_value.previous_conv_value;
    changeArrow( document.querySelector(".conversion-value").querySelector('.arrow-image'), adwordsObject.conv_value.conv_value_change);

    document.querySelector(".cost-per-conversion").querySelector('.other-amount-text').querySelector('span').innerText  = adwordsObject.cost_per_conv.current_cost_per_conv;
    document.querySelector(".cost-per-conversion").querySelector('.previous-amount').querySelector('span').innerText  = adwordsObject.cost_per_conv.previous_cost_per_conv;
    changeArrow( document.querySelector(".cost-per-conversion").querySelector('.arrow-image'), adwordsObject.cost_per_conv.cost_per_conv_change);

    document.querySelector(".impressions").querySelector('.other-amount-text').innerText  = adwordsObject.impressions.current_impressions;
    document.querySelector(".impressions").querySelector('.previous-amount').innerText  = adwordsObject.impressions.previous_impressions;
    changeArrow( document.querySelector(".impressions").querySelector('.arrow-image'), adwordsObject.impressions.impressions_change);
    

}

function updateAnalyticsData (analyticsObject) {

    //console.log(analyticsObject);

    document.querySelector(".analytics").querySelector('.main-amount-text').innerText  = analyticsObject.total_visits.total_curr_visits;
    document.querySelector(".analytics").querySelector('.previous-amount').innerText  = analyticsObject.total_visits.total_prev_visits;
    changeArrow( document.querySelector(".analytics").querySelector('.arrow-image'), analyticsObject.total_visits.total_visits_change);

    document.querySelector(".paid-visits").querySelector('.other-amount-text').innerText  = analyticsObject.paid_visits.paid_curr_visits;
    document.querySelector(".paid-visits").querySelector('.previous-amount').innerText  = analyticsObject.paid_visits.paid_prev_visits;    
    changeArrow( document.querySelector(".paid-visits").querySelector('.arrow-image'), analyticsObject.paid_visits.paid_visits_change);

    document.querySelector(".organic-visits").querySelector('.other-amount-text').innerText  = analyticsObject.organic_visits.organic_curr_visits;
    document.querySelector(".organic-visits").querySelector('.previous-amount').innerText  = analyticsObject.organic_visits.organic_prev_visits;        
    changeArrow( document.querySelector(".organic-visits").querySelector('.arrow-image'), analyticsObject.organic_visits.organic_visits_change);

    document.querySelector(".pageviews").querySelector('.main-amount-text').innerText  = analyticsObject.total_pageviews.total_curr_pageviews;
    document.querySelector(".pageviews").querySelector('.previous-amount').innerText  = analyticsObject.total_pageviews.total_previous_pageviews;
    changeArrow( document.querySelector(".pageviews").querySelector('.arrow-image'), analyticsObject.total_pageviews.total_pageviews_change);

    document.querySelector(".paid-pageviews").querySelector('.other-amount-text').innerText  = analyticsObject.paid_pageviews.paid_curr_pageviews;
    document.querySelector(".paid-pageviews").querySelector('.previous-amount').innerText  = analyticsObject.paid_pageviews.paid_previous_pageviews;    
    changeArrow( document.querySelector(".paid-pageviews").querySelector('.arrow-image'), analyticsObject.paid_pageviews.paid_pageviews_change);

    document.querySelector(".organic-pageviews").querySelector('.other-amount-text').innerText  = analyticsObject.organic_pageviews.organic_curr_pageviews;
    document.querySelector(".organic-pageviews").querySelector('.previous-amount').innerText  = analyticsObject.organic_pageviews.organic_previous_pageviews;    
    changeArrow( document.querySelector(".organic-pageviews").querySelector('.arrow-image'), analyticsObject.organic_pageviews.organic_pageviews_change);
}

function updateWoocommerceData (woocommerceObject) {

    console.log(woocommerceObject);
    document.querySelector(".total-sales").querySelector('.main-amount-text').querySelector('span').innerText  = woocommerceObject.total_sales.total_curr_sales;
    document.querySelector(".total-sales").querySelector('.previous-amount').querySelector('span').innerText  = woocommerceObject.total_sales.total_prev_sales;    
    changeArrow( document.querySelector(".total-sales").querySelector('.arrow-image'), woocommerceObject.total_sales.total_sales_change);

    document.querySelector(".net-sales").querySelector('.main-amount-text').querySelector('span').innerText  = woocommerceObject.net_sales.net_curr_sales;
    document.querySelector(".net-sales").querySelector('.previous-amount').querySelector('span').innerText  = woocommerceObject.net_sales.net_prev_sales;    
    changeArrow( document.querySelector(".net-sales").querySelector('.arrow-image'), woocommerceObject.net_sales.net_sales_change);

    document.querySelector(".orders").querySelector('.other-amount-text').innerText  = woocommerceObject.orders.curr_orders;
    document.querySelector(".orders").querySelector('.previous-amount').innerText  = woocommerceObject.orders.prev_orders;    
    changeArrow( document.querySelector(".orders").querySelector('.arrow-image'), woocommerceObject.orders.orders_change);

    document.querySelector(".product").querySelector('.other-amount-text').innerText  = woocommerceObject.products_sold.curr_products_sold;
    document.querySelector(".product").querySelector('.previous-amount').innerText  = woocommerceObject.products_sold.prev_products_sold;    
    changeArrow( document.querySelector(".product").querySelector('.arrow-image'), woocommerceObject.products_sold.products_sold_change);
}

function getDataWithDates() {

    //console.log('Date changed: ' + document.querySelector('#end-date').value);

    let startDate = document.querySelector('#start-date').value;
    
    let endDate = document.querySelector('#end-date').value;
    

    //console.log(startDate);

    var formDateData = new FormData();
    
    formDateData.append('emptystartdate', '');
    formDateData.append('userchosendate', endDate);

    showLoading();

    let AdwordsDateData = fetchAdwordsData(formDateData);
    
    let analyticsDataObject = fetchAnalyticsData(formDateData); 

    let woocommerceDataObject = fetchWoocommerceData(formDateData);

    woocommerceDataObject.then(function(result) {        
        updateWoocommerceData(result);
        hideLoading();
    });
    
    analyticsDataObject.then(function(result) {
        //console.log(result);
        updateAnalyticsData(result);
    });

    AdwordsDateData.then(function(result) {
        //console.log('This is the adwords Data with date from date picker supplied');
        //console.log(result);
        updateDatesFromData(result);
        updateAdwordsData(result);
        
    });
    
    
}

document.querySelector('#end-date').addEventListener('change', getDataWithDates );
//document.querySelector('#start-date').addEventListener('change', valDates );


function showLoading(){
    console.log('show loading');
    document.querySelector('.overlay').classList.add("display");
    document.querySelector('.loading-container').classList.add("display-flex");
    document.querySelector('#loading').classList.add("display");
}

function hideLoading(){
    console.log('hide loading');
    document.querySelector('.overlay').classList.remove("display");
    document.querySelector('.loading-container').classList.remove("display-flex");
    document.querySelector('#loading').classList.remove("display");
}

//Woocomm
async function fetchWoocommerceData(dateFormData) {
    let url = './send-woocommerce-data.php';

    if (dateFormData !== undefined) {
        const response = await fetch(url, { method: 'POST', body: dateFormData });
        var woocommerceDataObject = await response.json().then(function(data) {
            return data;
        }); 
        return woocommerceDataObject; 
    } else {
        const response = await fetch(url);
        var woocommerceDataObject = await response.json().then(function(data) {
            return data;
        }); 
        return woocommerceDataObject;            
    }
} 

//Analytics
async function fetchAnalyticsData(dateFormData) {
    let url = './send-analytics-data.php';

    if (dateFormData !== undefined) {
        const response = await fetch(url, { method: 'POST', body: dateFormData });
        var analyticsdateObj = await response.json().then(function(data) {
            return data;
        }); 
        return analyticsdateObj;       

    } else {
        console.log('The parameter doesn\'t exist...');
        const response = await fetch(url);    
        var analyticsDataObject = await response.json().then(function(data) {
            return data;
        }); 
        return analyticsDataObject; 
    }
} 
//Adwords
async function fetchAdwordsData(dateFormData) {


    let url = './send-adwords-data.php';

    if (dateFormData !== undefined) {
        console.log('the parameter exists...');
        const response = await fetch(url, { method: 'POST', body: dateFormData });

        var adwordsdateObj = await response.json().then(function(data) {
            return data;
        }); 
        return adwordsdateObj;   
    } else {
        console.log('The parameter doesn\'t exist...');
        const response = await fetch(url);
        var adWordsDataObject = await response.json().then(function(data) {
            return data;
        }); 
        return adWordsDataObject; 
    }

             
}

//If there are no parameters then use the default date - then date changes activate the change
if (window.location.search === '') {

    console.log('no parameters')

    let today = new Date();
    today = today.toISOString().split('T')[0];
    console.log(today);
        
    document.querySelector("#end-date").setAttribute("max", today);

    showLoading();

    let woocommerceDataObject = fetchWoocommerceData();
    
    let adwordsDataObject = fetchAdwordsData(); 
    
    let analyticsDataObject = fetchAnalyticsData();     

    woocommerceDataObject.then(function(result) {
        updateWoocommerceData(result);
        hideLoading(); 
    });

    adwordsDataObject.then(function(result) {
        updateDatesFromData(result);
        updateAdwordsData(result);
    });

    analyticsDataObject.then(function(result) {
        updateAnalyticsData(result);
    });

} else {
    console.log('the url has date parameters');

    //Paremeters would be used when sending the url as a report - therefore the user cannot change the dates and the option is taken away
    document.querySelector('#end-date').classList.add("disable");
    document.querySelector('.date-container').style.padding = "1rem"; 
    document.querySelector('.date-error-container').style.display = "none";

    const params = new Proxy(new URLSearchParams(window.location.search), {
        get: (searchParams, prop) => searchParams.get(prop),
      });
    
    //var url = './send-adwords-data.php';
    
    var formData = new FormData();
    
    formData.append('startdate', params.startdate);
    formData.append('enddate', params.enddate);
    
    showLoading();

    let woocommerceDateData = fetchWoocommerceData(formData);

    woocommerceDateData.then(function(result) {        
        updateWoocommerceData(result);
        hideLoading();
    });

    let tempAdwordsDateData = fetchAdwordsData(formData); 

    tempAdwordsDateData.then(function(result) {        
        updateDatesFromData(result);
        updateAdwordsData(result);        
    }); 

    let AnalyticsDateData = fetchAnalyticsData(formData);

    AnalyticsDateData.then(function(result) {        
        updateAnalyticsData(result);
        
    });

    
}

