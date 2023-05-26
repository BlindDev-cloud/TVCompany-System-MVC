CREATE OR REPLACE PROCEDURE set_order_status_procedure(
    p_order_id INTEGER,
    p_status VARCHAR(100)
)
    LANGUAGE plpgsql
AS $$
BEGIN
    UPDATE orders
    SET status = p_status
    WHERE id = p_order_id;
END;
$$;