Submitted By: Maryam Saleem

Modified Files:

Http/Controllers/inventoryController.php
routes/api.php
database/seeders/inventorySeeder.php
app/Http/Requests/storeInventoryRequest.php
app/Models/inventory.php
database/migrations/2022_12_05_100217_create__inventory__table.php
Database Name = Task5 Table Name = inventory

------------------- Routes -------------------

Read entire inventory: http://127.0.0.1:8000/api/inventory (Method = GET)
Read an item using id: http://127.0.0.1:8000/api/inventory/(id) (Method = GET)
Insert an item: http://127.0.0.1:8000/api/inventory/insert (Method = POST) ------- (set key = Accept and value = application/json in header in postman)
Update an item using id: http://127.0.0.1:8000/api/inventory/update/(id) (Method = PUT or POST)
Delete an item using id: http://127.0.0.1:8000/api/inventory/delete/(id) (Method = DELETE or POST)
