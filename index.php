<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATT test</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script> 
</head>
<body>
    <div class="container">
        <form action="./db/request.php" id="sorting_form" method="POST">
            <div class="select_sort">
                <select name="sort" id="sort">
                    <option value="id_asc" selected>Id &#8593</option>
                    <option value="id_desc">Id &#8595</option>
                    <option value="name_asc">Имя &#8593</option>
                    <option value="name_desc">Имя &#8595</option>
                    <option value="title_asc">Товар &#8593</option>
                    <option value="title_desc">Товар &#8595</option>
                    <option value="cost_asc">Стоимость &#8593</option>
                    <option value="cost_desc">Стоимость &#8595</option>
                </select>
            </div>
        </form>
        <input id="search" type="text" placeholder="Поиск...">
        <Table class="orders_table">
            <thead>
                <tr>
                    <th class="orders_id">id</th>
                    <th class="orders_name">Имя</th>
                <th class="orders_title">Товар</th>
                    <th class="orders_cost">Цена</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </Table>
        <p id="noSearchMatches"></p>
    </div>
    <script src="./js/search.js"></script>           
    <script>
        $(document).ready(function() {
            var selectedSort = <?php echo json_encode($_POST['sort'] ?? "default"); ?>;
            // console.log(selectedSort);

            function ajaxRequest() {
                $.ajax({
                    url: 'db/request.php',
                    type: 'POST',
                    data: { sortingMethod: selectedSort },
                    success: function(response) {
                        let tbody = $('.orders_table tbody');
                        let orders = JSON.parse(response);
                
                        tbody.empty();

                        orders.forEach(function(order) {
                            let table = "<tr>" +
                                "<td>" + order.order_id + "</td>" +
                                "<td>" + order.name + "</td>" +
                                "<td>" + order.title + "</td>" +
                                "<td>" + order.cost + "</td>" +
                                "</tr>";
                    
                            tbody.append(table);

                            
                        });

                        getJson(response)
                    },

                    error: function(error) {
                        console.error('Error:', error);
                    }
                });
            }

            ajaxRequest();

            $('#sort', '#sorting_form').on('change submit', function(e) {
                e.preventDefault();
                selectedSort = $('#sort').val();
                console.log(selectedSort);
                ajaxRequest();
            });
    });
</script>
</body>
</html>
