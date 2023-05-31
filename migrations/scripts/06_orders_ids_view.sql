CREATE VIEW orders_ids_view AS
SELECT orders.id
FROM order_assignments
         INNER JOIN orders
                    ON orders.id =
                       order_assignments.order_id;