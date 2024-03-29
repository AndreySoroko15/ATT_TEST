    function getJson(data) {
        $('#search').on('input', function() {
            let tbody = $('.orders_table tbody');
            // console.log(typeof data);
            jsonToArray = JSON.parse(data);
            // console.log(jsonObj);
            
            let filteredArray = [];

            let search = $(this).val().toLowerCase();

            filteredArray = jsonToArray.filter(function(val) {
                if (val.name.toLowerCase().includes(search) || 
                    val.order_id.includes(search) || val.title.toLowerCase().includes(search) ||
                    val.cost.includes(search))
                {
                    var newObj = {name : val.name, order_id: val.order_id, 
                                  title: val.title, cost: val.cost}
                    return newObj;
                }
            })
            // console.log(filteredArray);
            tbody.empty();

            if(filteredArray.length === 0) {
                // console.log('пусто');
                $('#noSearchMatches').text('Совпадений не найдено :(');
            }

            filteredArray.forEach(function(val) {
                let tableRow = "<tr>" +
                    "<td>" + val.order_id + "</td>" +
                    "<td>" + val.name + "</td>" +
                    "<td>" + val.title + "</td>" +
                    "<td>" + val.cost + "</td>" +
                    "</tr>";
    
                tbody.append(tableRow);
            });
            
        })
    }