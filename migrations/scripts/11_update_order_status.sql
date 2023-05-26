CREATE OR REPLACE FUNCTION update_order_status()
    RETURNS TRIGGER AS
$$
BEGIN
    IF NEW.cost IS DISTINCT FROM OLD.cost OR NEW.deadline IS DISTINCT FROM OLD.deadline THEN
        NEW.status = 'agreement';
    END IF;
    RETURN NEW;
END;
$$
    LANGUAGE plpgsql;