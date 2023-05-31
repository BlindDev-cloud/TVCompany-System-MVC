CREATE OR REPLACE FUNCTION set_order_status_demonstration()
    RETURNS TRIGGER AS
$$
BEGIN
    UPDATE orders
    SET status = 'demonstration'
    WHERE id = NEW.order_id;

    RETURN NEW;
END;
$$
    LANGUAGE plpgsql;