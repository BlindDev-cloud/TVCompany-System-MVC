CREATE VIEW orders_info_view AS
SELECT orders.id,
       orders.topic,
       orders.description,
       orders.created_at,
       orders.cost,
       orders.deadline,
       orders.status,
       clients.name      AS client_name,
       clients.surname   AS client_surname,
       clients.phone     AS client_phone,
       employees.name    AS employee_name,
       employees.surname AS employee_surname,
       order_assignments.role,
       releases.video
FROM order_assignments
         INNER JOIN orders
                    ON orders.id =
                       order_assignments.order_id
         INNER JOIN clients
                    ON clients.id =
                       orders.client_id
         INNER JOIN accounts
                    ON accounts.id =
                       order_assignments.account_id
         INNER JOIN employees
                    ON employees.id =
                       accounts.employee_id
         LEFT JOIN releases
                    ON orders.id =
                       releases.order_id;
