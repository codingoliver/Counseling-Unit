$(function () {
    loadGraphData();
});

function loadGraphData() {

    $.get('http://localhost/counseling/index.php/Welcome/load_activity_graph_data', {},
        function(data, status) {

            var jsonElements ='';
            var graph_data = jQuery.parseJSON(data);
            $.each(graph_data, function (key, value) {
                jsonElements += '{ "x":"'+value.speciality+'" ,"y": ' + value.count + '},'
            });
            jsonElements = jsonElements.slice(0, jsonElements.length-1);  // remove last comma
            graph_data = JSON.parse('['+jsonElements+"]");
            getMorris('bar', 'bar_chart',graph_data);
        }
    );
}

function getMorris(type, element, graph_data) {
   if (type === 'bar') {
        Morris.Bar({
            element: element,
            data : graph_data,
            xkey: 'x',
            ykeys: ['y'],
            labels: ['Booked Appointments'],
            barColors: ['rgb(233, 30, 99)']
        });
    }
}

