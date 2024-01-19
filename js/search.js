
    // // alert('search');
    // function tableToArray(tableId) {
    //   const dataArray = [];
    //   $(tableId + ' tr').each(function(row, tr){
    //     dataArray[row] = [];
    //     $(tr).find('td').each(function(col, td){
    //       dataArray[row].push($(td).text());
    //     });
    //   });
    //   return dataArray;
    // }

    // // $('#sort').on('change', function() {
    // //     const selectedOption = $(this).val();
    // //     const myTableArray = tableToArray('.orders_table');
    // //     console.log('Массив для', selectedOption, ':', myTableArray);
    // //     // Далее вы можете выполнять дополнительные действия с массивом
    // // });
    // function handleTable() {
    //     const selectedOption = $('#sort').val();
    //     const myTableArray = tableToArray('#myTable');
    //     console.log('Массив для', selectedOption, ':', myTableArray);
    //     // Далее вы можете выполнять дополнительные действия с массивом
    //   }


    function getJson(data) {
        $('#search').on('input', function() {
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
            
        })
    }